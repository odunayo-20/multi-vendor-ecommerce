@extends('Layouts.auth-layout')
@section('title', 'Brand')

@endsection
@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-body">
        <div class="row">
          <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
              <form action="{{ route('brand.store') }}" method="post">
                @csrf
                <div class="card-header">
                  <h4>Create Brand</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control" name="category_id" id="">
                                    <option value="">--Select Category--</option>
                                    @forelse ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @empty
                                    <option value="">no Record</option>
                                    @endforelse
                                </select>
                                @error('category_id')
                                   <span class="text-danger">{{$message}}</span>
                               @enderror
                              </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Name</label>
                               <input  name="name" type="text" class="form-control">
                               @error('name')
                                   <span class="text-danger">{{$message}}</span>
                               @enderror
                              </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Slug</label>
                               <input name="slug" type="text" class="form-control">
                               @error('slug')
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
