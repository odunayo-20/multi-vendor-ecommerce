@extends('Layouts.auth-layout')
@section('content')

@section('title', 'Color')

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
                  <h4> Colors Table</h4>

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
                        @forelse ($colors as $color)
                            <tr>
                                <td>{{$color->name}}</td>
                                <td><span style="background-color: {{$color->code}}" class="btn">{{$color->code}}</span></td>
                                <td>{{$color->status}}</td>
                                <td>
                                    <button type="button" class="btn btn-outline-primary">Edit</button>
                                    <form class="d-inline" action="{{route('color.destroy', $color->id)}}" method="POST" onsubmit="return confirm('Are you sure you want to do this?')">
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
