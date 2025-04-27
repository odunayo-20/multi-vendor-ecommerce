<div>
    @section('title', 'Size')

    @include('livewire.admin.size.size-modal-form')
            <!-- Modal -->

                <div class="main-content">
                    <section class="section">
                      <div class="section-body">
                        <div class="row">
                            <div class="col-md-12">
                                @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif
                            </div>
                            <div class="col-12">
                              <div class="card">
                                <div class="card-header">
                                    <h3>Size
                                        <a href="" class="btn btn-sm btn-primary float-end" data-bs-toggle="modal" data-bs-target="#createModal">Create</a>
                                    </h3>

                                </div>
                                <div class="card-body">
                                  <div class="table-responsive">
                                    <table class="table table-striped table-hover" id="save-stage" style="width:100%;">
                                      <thead>
                                        <tr>
                                          <th>Name</th>
                                          {{-- <th>Slug</th> --}}
                                          <th>Status</th>
                                          <th>Action</th>
                                        </tr>
                                      </thead>
                                     <tbody>
                                        @forelse ($sizes as $size)
                                            <tr>
                                                <td>{{$size->name}}</td>
                                                {{-- <td><span style="background-size: {{$size->code}}" class="btn">{{$size->code}}</span></td> --}}
                                                <td>{{$size->status == '1' ? 'hidden' : 'visible'}}</td>
                                                <td>
                                                    <a href="#" wire:click='editSize({{ $size->id }})' class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">Edit</a>
                                                    <a href="#"  wire:click='deleteSize({{ $size->id }})' class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Del</a>
                                                </td>
                                            </tr>
                                        @empty

                                        @endforelse
                                     </tbody>
                                    </table>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                      </div>
                    </section>
                </div>
            </div>

            @push('script')
            <script>

                window.addEventListener('close-modal', event => {
                    $('#createModal').modal('hide');
                    $('#editModal').modal('hide');
                    $('#deleteModal').modal('hide');
                });
                </script>
            @endpush

    </div>
