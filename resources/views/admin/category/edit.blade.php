@extends('Layouts.auth-layout')
@section('title', 'Category')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <form action="{{ route('admin.category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="card-header">
                                    <h4>Category</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" value="{{old('name', $category->name)}}" name="name" class="form-control">
                                                @error('name')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Slug</label>
                                                <input type="text" value="{{old('slug', $category->slug)}}" name="slug" class="form-control">
                                                @error('slug')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Meta Title</label>
                                                <textarea name="meta_title" id="" cols="30" rows="10" class="form-control">{{old('meta_title', $category->meta_title)}}</textarea>
                                                @error('meta_title')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Meta Keyword</label>
                                                <textarea name="meta_keyword" id="" cols="30" rows="10" class="form-control">{{old('meta_keyword', $category->meta_keyword)}}</textarea>
                                                @error('meta_keyword')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Meta Description</label>
                                                <textarea name="meta_description" class="summernote-simple">{{old('meta_description', $category->meta_description)}}</textarea>
                                                @error('meta_description')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea name="description" class="summernote-simple">
                                                    {{old('description', $category->description)}}
                                                </textarea>
                                                @error('description')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Status</label>
                                                <input type="checkbox" name="status"
                                                    class="form-input-check form-input-check-lg">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <input type="file" name="category_image" id="" class="form-control">
                                            @error('category_image')
                                            {{-- @dd($category->image) --}}
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                            <img src="{{ asset($category->image) }}" style="width: 100px; height:100px;" alt="">
                                        </div>

                                    </div>


                                </div>

                                <div class="card-footer text-right">
                                    <button class="btn btn-primary">Submit</button>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>
    </section>
    </div>
@endsection
@push('script')
    {{-- <script src="{{asset('admin/assets/bundles/summernote/summernote-bs4.js')}}"></script>
  <script src="{{asset('admin/assets/bundles/codemirror/lib/codemirror.js')}}"></script>
  <script src="{{asset('admin/assets/bundles/codemirror/mode/javascript/javascript.js')}}"></script>
  <script src="{{asset('admin/assets/bundles/jquery-selectric/jquery.selectric.min.js')}}"></script>
  <script src="{{asset('admin/assets/bundles/ckeditor/ckeditor.js')}}"></script>
  <!-- Page Specific JS File -->
  <script src="{{asset('admin/assets/js/page/ckeditor.js')}}"></script> --}}
@endpush
