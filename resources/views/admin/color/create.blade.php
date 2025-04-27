@extends('Layouts.auth-layout')

@section('title', 'Color')

@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-body">
        <div class="row">
          <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
              <form action="{{ route('color.store') }}" method="post">
                @csrf
                <div class="card-header">
                  <h4>Create Color</h4>
                </div>
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Name</label>
                               <input  name="name" value="{{ old('name') }}" type="text" class="form-control">
                               @error('name')
                                   <span class="text-danger">{{$message}}</span>
                               @enderror
                              </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Code</label>
                               <input name="code" value="{{ old('code') }}" type="text" class="form-control">
                               @error('code')
                                   <span class="text-danger">{{$message}}</span>
                               @enderror
                              </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Status</label>
                               <input name="status" type="checkbox" class="form-input-checkbox">
                              </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                  <button class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
</div>
@endsection
