@extends('layouts.site')
@section('title','trang chu')
@section('content')
<main>
	<x-slider/>
    {{-- <x-features/> --}}
    <x-flash-sale/>
    <x-product-new/>
    <x-home-post/>
</main>



@endsection
