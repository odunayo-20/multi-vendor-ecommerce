@extends('Layouts.auth-layout')
@section('title', 'Brand')

@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-body">
        <div class="row">
            <div class="col-md-12">
                @if (session('success'))
                <span class="bg-success text-white">{{ session('success') }}</span>
            @endif
            </div>
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4> Brands Table</h4>

                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped table-hover" id="save-stage" style="width:100%;">
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
                                    <button type="button" class="btn btn-outline-primary">Edit</button>
                                    <form class="d-inline" action="{{route('brand.destroy', $brand->id)}}" method="POST" onsubmit="return confirm('Are you sure you want to do this?')">
                                        @csrf
@method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger" >Delete</button>
                                    </form>
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
@endsection
