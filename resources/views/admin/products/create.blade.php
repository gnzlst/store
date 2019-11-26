@extends('admin.layout.base')
@section('title', 'Create Product')
@section('data-page-id', 'adminProduct')
@section('content')
    <div class="add-product">
        <div class="row expanded">
            <div class="page-header">
                <div class="grid-x">
                    <div class="cell medium-12 large-12">
                        <h3 class="margin-0-auto">
                            <i class="fa fa-plus fa-fw" aria-hidden="true"></i>
                            Add inventory item
                        </h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="row expanded">
            <div class="page-header-breadcrumbs">
                <div class="grid-x">
                    <div class="cell medium-12 large-12">
                        <h6 class="margin-0-auto">
                            <nav aria-label="You are here:" role="navigation">
                                <ul class="breadcrumbs margin-0-auto">
                                    <li><i class="fa fa-home fa-fw margin-right-icon" aria-hidden="true"></i>
                                        <a href="/admin">Dashboard</a></li>
                                    <li>
                                        <span class="show-for-sr">Current: </span> Add item
                                    </li>
                                </ul>
                            </nav>
                        </h6>
                    </div>
                </div>
            </div>
        </div>

        <div class="row expanded">
            <div class="page-wrapper">
                <div class="page-background">
                    <div class="grid-container fluid">
                        @include('includes.message')
                        @if(isset($message))
                            <p>{{ $message }}</p>
                        @endif
                        <div class="grid-x grid-margin-x">
                            <div class="cell small-12">
                                <form method="post" action="/admin/product/create" enctype="multipart/form-data"
                                      autocomplete="off">
                                    <div class="row">
                                        <div class="grid-x grid-margin-x">
                                            <div class="cell small-12 medium-6 column">
                                                <label>Name
                                                    <input class="input-group-field input" type="text" name="name"
                                                           placeholder="Product name"
                                                           value="{{\App\Classes\Request::old('post', 'name')}}">
                                                </label>
                                            </div>
                                            <div class="cell small-12 medium-6 column">
                                                <label>Price
                                                    <input class="input-group-field input" type="text" name="price"
                                                           placeholder="Product price"
                                                           value="{{\App\Classes\Request::old('post', 'price')}}">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="grid-x grid-margin-x">
                                            <div class="cell small-12 medium-6 column">
                                                <label>Category
                                                    <select name="category" id="product-category">
                                                        <option value="{{\App\Classes\Request::old('post', 'category') ? : ''}}">
                                                            {{\App\Classes\Request::old('post', 'category') ? : 'Select category'}}</option>
                                                        @foreach($categories as $category)
                                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </label>
                                            </div>
                                            <div class="cell small-12 medium-6 column">
                                                <label>Subcategory
                                                    <select name="subcategory" id="product-subcategory">
                                                        <option value="{{\App\Classes\Request::old('post', 'subcategory') ? : ''}}">
                                                            {{\App\Classes\Request::old('post', 'subcategory') ? : 'Select subcategory'}}
                                                        </option>
                                                    </select>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="grid-x grid-margin-x">
                                            <div class="cell small-12 medium-6 column">
                                                <label>Quantity
                                                    <select name="quantity">
                                                        <option value="{{\App\Classes\Request::old('post', 'quantity') ? : ''}}">
                                                            {{\App\Classes\Request::old('post', 'quantity') ? : 'Select quantity'}} </option>
                                                        @for($i=1; $i<=50; $i++)
                                                            <option value="{{$i}}">{{$i}}</option>
                                                        @endfor
                                                    </select>
                                                </label>
                                            </div>
                                            <div class="cell small-12 medium-6 column">
                                                <label>Image
                                                    <input type="file" name="productImage" class="input-group-field">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="grid-x grid-margin-x">
                                            <div class="cell small-12 column">
                                                <label>Description
                                                    <textarea name="description" rows="5" cols="5"
                                                              placeholder="Few words about the product...">{{\App\Classes\Request::old('post', 'description')}}</textarea>
                                                </label>
                                                <input type="hidden" name="token"
                                                       value="{{\App\classes\CSRFToken::_token()}}">
                                            </div>
                                        </div>
                                    </div>
                                    <button class="button alert" type="reset">Reset</button>
                                    <input class="button success float-right" type="submit" value="Save Product">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection