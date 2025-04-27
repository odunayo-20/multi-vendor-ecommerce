@extends('Layouts.app')
@section('title', 'All Categories')
@section('content')
    <!-- Categories Start -->
<div class="container-fluid pt-5">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Categories</span></h2>
    <div class="row px-xl-5 pb-3">

        @forelse ($categories as $category)
        <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
            <a class="text-decoration-none" href="{{route('frontend.product', $category->slug)}}">
                <div class="cat-item d-flex align-items-center mb-4">
                    <div class="overflow-hidden" style="width: 100px; height: 100px;">
                        <img class="img-fluid" src="{{asset($category->image)}}" alt="">
                    </div>
                    <div class="flex-fill pl-3">
                        <h6>{{$category->name}}</h6>
                        {{-- <small class="text-body">100 Products</small> --}}
                    </div>
                </div>
            </a>
        </div>
        @empty
        <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
            <a class="text-decoration-none" href="#">
                <div class="cat-item img-zoom d-flex align-items-center mb-4">
                    <div class="overflow-hidden" style="width: 100px; height: 100px;">
                        <img class="img-fluid" src="img/cat-3.jpg" alt="">
                    </div>
                    <div class="flex-fill pl-3">
                        <h6>No Category</h6>
                        <small class="text-body">Zero Products</small>
                    </div>
                </div>
            </a>
        </div>
        @endforelse



    </div>
</div>
<!-- Categories End -->
@endsection
