@extends('admin.layout.base')
@section('title', 'Manage Inventory')
@section('data-page-id', 'adminProduct')
@section('content')
    <div class="products">
        <div class="row expanded">
            <div class="page-header">
                <div class="grid-x">
                    <div class="cell medium-12 large-12">
                        <h3 class="margin-0-auto">
                            <i class="fa fa-compress fa-fw" aria-hidden="true"></i>
                            Manage Inventory Items
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
                                        <span class="show-for-sr">Current: </span> Manage items
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

                        <div class="grid-x grid-padding-x">
                            <div class="small-12 cell">
                                <a href="/admin/product/create" class="button success float-right">
                                    <i class="fa fa-plus"></i> Add New Product
                                </a>
                            </div>
                        </div>

                        <div class="grid-x grid-margin-x">
                            <div class="cell medium-12 large-12">
                                @if(count($products))
                                    <h3>List of Products</h3>
                                    <table class="hover stack unstriped list-tables list-products"
                                           data-form="deleteForm">
                                        <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Stock</th>
                                            <th>Category</th>
                                            <th>Subcategory</th>
                                            <th>Created at</th>
                                            <th>Updated at</th>
                                            <th colspan="2">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($products as $product)
                                            <tr>
                                                <td><img src="/{{$product['image_path']}}" alt="{{$product['name']}}"
                                                         title="{{$product['name']}}" class="image-list-products"/></td>
                                                <td>{{$product['name']}}</td>
                                                <td class="pull-right">{{$product['price']}}</td>
                                                <td class="pull-right">{{$product['quantity']}}</td>
                                                <td>{{$product['category_name']}}</td>
                                                <td>{{$product['sub_category_name']}}</td>
                                                <td>
                                                    <time class="timeago" datetime="{{$product['created_at']}}"
                                                          title="{{$product['created_at']}}">{{$product['created_at']}}</time>
                                                </td>
                                                <td>
                                                    <time class="timeago" datetime="{{$product['updated_at']}}"
                                                          title="{{$product['updated_at']}}">{{$product['updated_at']}}</time>
                                                </td>
                                                <td>
                                                    <a href="/admin/product/{{$product['id']}}/edit" data-tooltip
                                                       aria-haspopup="true"
                                                       class="has-tip top"
                                                       data-disable-hover="false" tabindex="1"
                                                       title="Edit {{$product['name']}}">
                                                        <i class="fa fa-edit button-edit"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <div class="title-bar-right">
                                        {!! $links !!}
                                    </div>
                                @else
                                    <h3 class="text-center subheader">Whoops... There are not products here. Create
                                        one!</h3>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection