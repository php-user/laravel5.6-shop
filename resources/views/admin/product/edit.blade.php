@extends('layouts-admin.master')
@section('title', "| Edit product")

@section('content')

<h4 class="mt-3 mb-4">Edit Product</h4>

<form action="{{ route('products.update', ['id' => $product->id]) }}" method="post" enctype="multipart/form-data" class="mb-5">
    @csrf
    @method('put')

    <input type="hidden" name="_method" value="put">

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="name" value="{{ $product->name }}">
                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="content">Category:</label>
                <select class="form-control" id="category_id" name="category_id" required>
                    @foreach($categories as $category)
                        @if($category->name === $product->category->name)
                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                        @else
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                    @endforeach
                </select>
                @if ($errors->has('category_id'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('category_id') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="price">Price:</label>
                <input class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" id="price" type="text" name="price" value="{{ $product->price }}">
                @if ($errors->has('price'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('price') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" id="description" name="description">{!! app_nl2br($product->description, true) !!}</textarea>
                @if ($errors->has('description'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>

    <div class="row my-3">
        <div class="col-sm-6">
            <img src="{{ asset('storage/products/' . $product->image) }}" alt="img" height="150px" class="img-fluid">
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <input type="file" 
                       class="jfilestyle form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" 
                       data-text="Upload image" 
                       name="image" 
                >

                @if ($errors->has('image'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('image') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group my-4">
                <label class="custom-checkbox">Is Visible:
                    <input type="checkbox" 
                           name="is_visible"
                           class="form-checkbox{{ $errors->has('is_visible') ? ' is-invalid' : '' }}"
                           value="{{ $product->is_visible ?: 'on' }}"
                           {{ $product->is_visible ? 'checked' : '' }}
                    >
                    <span class="checkmark"></span>
                </label>
                @if ($errors->has('is_visible'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('is_visible') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>

    <button class="btn btn-outline-secondary mt-3">Update</button>
</form>

@endsection
