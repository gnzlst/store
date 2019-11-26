@extends('admin.layout.base')
@section('title', 'Edit Product')
@section('data-page-id', 'adminProduct')
@section('content')
    <div class="add-product">
        <div class="row expanded">
            <div class="page-header">
                <div class="grid-x">
                    <div class="cell medium-12 large-12">
                        <h3 class="margin-0-auto">
                            <i class="fa fa-edit fa-fw" aria-hidden="true"></i>
                            Editing {{ $product->name }}
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
                                        <a href="/admin">Dashboard</a>
                                    </li>
                                    <li><a href="/admin/products">Manage items</a></li>
                                    <li>
                                        <span class="show-for-sr">Current: </span> {{ $product->name }}
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
                                <form method="post" action="/admin/product/edit" enctype="multipart/form-data"
                                      autocomplete="off">
                                    <div class="row">
                                        <div class="grid-x grid-margin-x">
                                            <div class="cell small-12 medium-6 column">
                                                <label>Name
                                                    <input class="input-group-field input" type="text" name="name"
                                                           placeholder="Product name"
                                                           value="{{$product->name}}">
                                                </label>
                                            </div>
                                            <div class="cell small-12 medium-6 column">
                                                <label>Price
                                                    <input class="input-group-field input" type="text" name="price"
                                                           placeholder="Product price"
                                                           value="{{$product->price}}">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="grid-x grid-margin-x">
                                            <div class="cell small-12 medium-6 column">
                                                <label>Category
                                                    <select name="category" id="product-category">
                                                        @foreach($categories as $category)
                                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </label>
                                            </div>
                                            <div class="cell small-12 medium-6 column">
                                                <label>Subcategory
                                                    <select name="subcategory" id="product-subcategory">
                                                        <option value="{{$product->subCategory->id}}">
                                                            {{$product->subCategory->name}}
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
                                                        <option value="{{$product->quantity}}">
                                                            {{$product->quantity}} </option>
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
                                                              placeholder="Few words about the product...">{{$product->description}}</textarea>
                                                </label>
                                                <input type="hidden" name="token"
                                                       value="{{\App\classes\CSRFToken::_token()}}">
                                                <input type="hidden" name="product_id"
                                                       value="{{$product->id}}">

                                            </div>
                                        </div>
                                    </div>
                                    <input class="button primary float-right" type="submit" value="Update Product">
                                </form>
                                <div class="row-expanded">
                                    <div class="small 12">
                                        <table class="table-delete-modal" data-form="deleteForm">
                                            <tr>
                                                <td>
                                                    <form method="post"
                                                          action="/admin/product/{{ $product->id }}/delete"
                                                          class="delete-item">
                                                        <input type="hidden" name="token"
                                                               value="{{ \App\classes\CSRFToken::_token() }}">
                                                        <button class="button alert" type="submit">Delete Product
                                                        </button>
                                                    </form>

                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('includes.delete-modal')
@endsection