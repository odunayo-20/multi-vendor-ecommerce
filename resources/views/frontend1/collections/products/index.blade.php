@extends('Layouts.app')
@section('title', 'All Products')

@section('content')


<livewire:frontend.product.index :category="$category">


@endsection
