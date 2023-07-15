<style>
    .container{
        min-width: 800px;
        margin: 0 auto;
    }
    .card {
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }
    .card .card-header {
        background: #f5f5f5;
        color: red;
        font-size: 24px;
        text-align: center;
        margin-bottom: 20px;
    }
    .card .card-body{
        padding: 20px;
    }
    .form-group {
        margin-bottom: 20px;
        font-weight: bold;
    }
    .form-label {
        display: block;
        font-weight: bold;
    }
    .form-control {
        border-radius: 7px;
        border: 1px solid #ddd;
        width: 100%;
        padding: 8px;
    }
    .form-check {
        display: inline-block;
        margin-right: 10px;
    }
    .invalid-feedback {
        color: red;
        font-size: 17px;
    }
</style>
@extends('layouts.admin')
@section('title', 'Create Product')
@section('content')
    <h1 class="page-title">Create Products</h1>
    <div class="container">
        <div class="row mb-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Create Product</h5>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('adminpanel.products.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="title" style="display: block;font-weight: bold">Title</label>
                                        <input style="font-weight: bold; border-radius: 7px;" type="text" name="title"
                                            id="title" class="form-control @error('title') is-invalid @enderror"
                                            value="{{ old('title') }}">
                                        @error('title')
                                            <span class="invalid-feedback">
                                                <strong>{{ message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="price" style="display: block;font-weight: bold">Price</label>
                                        <input style="font-weight: bold; border-radius: 7px;" type="number" name="price"
                                            id="price" class="form-control @error('price') is-invalid @enderror"
                                            value="{{ old('price') }}">
                                        @error('price')
                                            <span class="invalid-feedback">
                                                <strong>{{ message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            <div class="row mb-3">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="category_id">Category</label>
                                        <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror" >
                                            <option value="">Select category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{$category->id}}" {{old('category_id') == $category->id ? 'selected': ''}}>{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <span class="invalid-feedback">
                                                <strong>{{message}}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                                        @error('image')
                                            <span class="invalid-feedback">
                                                <strong>{{ message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="colors">Colors </label> &nbsp; &nbsp;
                                        @foreach ($colors as $color)
                                            <div class="form-check form-check-inline">
                                                <input type="checkbox" name="colors[]" class="form-check-input" id="{{$color->name}}" value="{{$color->id}}">
                                                <label for="{{$color->name}}" class="form-check-label"> {{$color->name}}</label>
                                            </div>
                                        @endforeach
                                        @error('colors')
                                            <span class="invalid-feedback">
                                            <strong>{{ message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description">Descriptions</label>                                          
                                            <textarea placeholder="Describe Your Product..." name="description" id="" cols="30" rows="10" class="form-control @error('description') is-invalid @enderror"></textarea>                                        
                                            @error('description')
                                                <span class="invalid-feedback">
                                                    <strong>{{message}}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group text-end">
                                <button class="btn btn-primary" type="submit">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
