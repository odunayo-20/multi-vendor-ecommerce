@extends('Layouts.auth-layout')

@section('title', 'Category')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <form action="{{route('admin.category.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-header">
                                    <h4>Category</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" name="name" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Slug</label>
                                                <input type="text" name="slug" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Meta Title</label>
                                                <textarea name="meta_title" id="" cols="30" rows="10" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Meta Keyword</label>
                                                <textarea name="meta_keyword" id="" cols="30" rows="10" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Meta Description</label>
                                                <textarea name="meta_description" class="summernote-simple"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea name="description" class="summernote-simple"></textarea>
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
