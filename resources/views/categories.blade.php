@extends('layouts.app')
@section('title')
    Categories
    @if(isset($category) && $showBreadCrumbs) - {{ $category->name }} @endif
    @if(isset($subcategory)) - {{ $subcategory->name }} @endif
@endsection
@section('data-page-id', 'categories')

@section('content')
    <div class="home">
        <section class="display-products" data-token="{{ $token }}" data-urlParams="{{ $urlParams }}" id="root">
            @if(isset($category) && $showBreadCrumbs)
                <div class="row column">
                    <nav aria-label="You are here:" role="navigation">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home fa-fw margin-right-icon" aria-hidden="true"></i>
                                <a href="/">Index</a>
                            </li>
                            <li>
                                <a href="/products/category/{{ $category->slug }}">{{ $category->name }}</a>
                            </li>
                            @if(isset($subcategory))
                                <li>
                                    <span class="show-for-sr">Current: </span> {{ $subcategory->name }}
                                </li>
                            @endif
                            <li>

                            </li>
                        </ul>
                    </nav>
                </div>
            @else
                <h2>Categories</h2>
            @endif

            <div class="grid-container">
                <div class="grid-x grid-padding-x medium-unstack equal-height-cards">
                    <div class="cell medium-3" v-cloak v-for="product in products">
                        <div class="card">
                            <h5>
                                @{{ stringLimit(product.name, 18) }}
                            </h5>
                            <div class="card-section">
                                <img :src="'/' + product.image_path">
                            </div>
                            <div class="card-divider-more">
                                <a :href="'/product/' + product.id" class="button more expanded">
                                    <i class="fa fa-search" aria-hidden="true"></i>&nbsp;
                                    See More
                                </a>
                            </div>
                            <div class="card-divider-add-to-cart">
                                <button v-if="product.quantity > 0" @click.prevent="addToCart(product.id)"
                                        class="button cart expanded"><i class="fa fa-cart-plus" aria-hidden="true"></i>&nbsp;
                                    $@{{ product.price.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,') }} - Add to cart
                                </button>
                                <button v-else class="button warning expanded" disabled>
                                    Out of Stock
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <h2 v-if="products.length === 0">Whoops... There are not products in this category.</h2>
            </div>
            <div class="text-center">
                <i v-show="loading" class="fa fa-spinner fa-spin fa-3x fa-fw"></i>
            </div>
        </section>
    </div>
@stop