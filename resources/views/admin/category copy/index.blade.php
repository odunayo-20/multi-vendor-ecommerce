@extends('Layouts.auth-layout')
@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-body">
        <div class="row">
            <div class="col-12">
                {{-- @if (session('success'))
<span class="text-success">{{$message}} {{ session('success')}}</span>
                @endif --}}
              <div class="card">
                <div class="card-header">
                  <h4>Table With State Save</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped table-hover" id="save-stage" style="width:100%;">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Meta Title</th>
                          <th>Status</th>
                          <th>Action</th>

                        </tr>
                      </thead>
                     <tbody>
                        @foreach ($categories as $category)
<tr>
    <td>
      {{ $category->name }}
    </td>
    <td>
      {{ $category->meta_title }}
    </td>
    <td>
      {{ $category->status }}
    </td>
    <td>
        <button class="btn btn-outline-primary">Edit</button>
    </td>
</tr>
                        @endforeach

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
