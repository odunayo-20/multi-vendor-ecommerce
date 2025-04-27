<div>
    @section('title', 'Brand')

    <div>
        @include('livewire.admin.brand.modal-form')


        <!-- Modal -->

            {{-- <div class="row">
                <div class="col-md-12">
                    @if (session('success'))
                        <div class="alert alert-primary" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <h3>Brand
                                <a href="" class="btn btn-sm btn-primary float-end" data-bs-toggle="modal" data-bs-target="#createModal">Create</a>
                            </h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-hover table-bordered table-sm table-responsive-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">S/N</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Slug</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($brands as $brand)
                                        <tr>
                                            <td>{{$loop->index+1}}</td>
                                            <td> @if($brand->category)

                                                {{$brand->category->name}}
                                            @else
                                                <h3>No Category</h3>
                                            @endif
                                            </td>
                                            <td>{{$brand->name}}</td>
                                            <td>{{$brand->slug}}</td>
                                            <td>{{$brand->status == '1' ? 'hidden' : 'visible'}}</td>
                                            <td>
                                                <a href="#" wire:click='editBrand({{ $brand->id }})' class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">Edit</a>
                                                <a href="#"  wire:click='deleteBrand({{ $brand->id }})' class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Del</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5">No Record Found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $brands->links() }}
                        </div>
                    </div>
                </div>
            </div> --}}

            <div class="main-content">
                <section class="section">
                  <div class="section-body">
                    <div class="row">
                        <div class="col-md-12">
                            @if (session('success'))
                            <div class="alert alert-primary" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        </div>
                        <div class="col-12">
                          <div class="card">
                            <div class="card-header">
                                {{-- <div class="row"> --}}
                                    <div class="col-md-6">
                                        <h3>Brand</h3>
                                    </div>
                                    <div class="col-md-6"> <a href="" class="btn btn-sm btn-primary"data-bs-toggle="modal" data-bs-target="#createModal">Create</a></div>
                                {{-- </div> --}}

                            </div>
                            <div class="card-body">
                              <div class="table-responsive">
                                <table class="table table-striped table-hover"  style="width:100%;" id="save-stage">
                                  <thead>
                                    <tr>
                                      <th>Name</th>
                                      <th>Slug</th>
                                      <th>Status</th>
                                      <th>Action</th>
                                    </tr>
                                  </thead>
                                 <tbody>
                                    @forelse ($brands as $brand)
                                        <tr>
                                            <td>{{$brand->name}}</td>
                                            <td>{{$brand->slug}}</td>
                                            <td>{{$brand->status}}</td>
                                            <td>
                                                <a href="#" wire:click='editBrand({{ $brand->id }})' class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">Edit</a>
                                                <a href="#"  wire:click='deleteBrand({{ $brand->id }})' class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Del</a>
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
