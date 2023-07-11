<style>
    .page-header {
        background: linear-gradient(0deg, rgba(34,193,195,1) 0%, rgba(253,187,45,1) 100%);
        width: 100%;
        justify-content: center;
        text-align: center;
        color: #fff;
        height: 100px;
        font-size: 22px;
        border-radius: 1px 1px 40% 40%;
    }
    .products-row {
        margin-top: 30px;
        display: flex;
        border-radius: 10px;
        overflow: hidden;
        flex-wrap: wrap;
        justify-content: center;
    }
    .product-box {
        width: 200px;
        margin: 10px;
        padding: 10px;
        text-align: center;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    
</style>

@extends('layouts.master')
@section('title', 'Wishlist')
@section('content')
    <header class="page-header">
        <h1>Wishlist</h1>
    </header>
    
    <div class="products-row">
        @foreach ($products as $product)
            <x-product-box :product="$product" />
        @endforeach
    </div>
    @include('pages.components.footer')
@endsection