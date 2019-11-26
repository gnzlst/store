@extends('layouts.app')
@section('title') {{$product->name}} @endsection
@section('data-page-id', 'product')

@section('content')
    <div class="product" id="product" data-token="{{$token}}" data-id="{{$product->id}}">
        <div class="text-center">
            <i v-show="loading" class="fa fa-spinner fa-spin fa-3x fa-fw"></i>
        </div>
        <section class="item-container" v-if="loading == false">
            <div class="row column">
                <nav aria-label="You are here:" role="navigation">
                    <ul class="breadcrumbs">
                        <li><i class="fa fa-home fa-fw margin-right-icon" aria-hidden="true"></i>
                            <a href="/">Index</a>
                        </li>
                        <li>
                            <a :href="'/products/category/' + category.slug">@{{ category.name }}</a>
                        </li>
                        <li>
                            <a :href="'/products/category/' + category.slug + '/' + subCategory.slug">@{{subCategory.name }}</a>
                        </li>
                        <li>
                            <span class="show-for-sr">Current: </span> @{{ product.name }}
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="grid-x grid-margin-x">
                <div class="cell medium-5">
                    <img :src="'/' + product.image_path" width="100%" height="auto" class="thumbnail">
                </div>
                <div class="cell auto offset-1">
                    <div class="product-details">
                        <h2> @{{ product.name }}</h2>
                        <p>@{{ product.description }}</p>
                        <h2 class="float-right">$@{{ product.price.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')
                            }}</h2>
                        <button v-if="product.quantity > 0" @click.prevent="addToCart(product.id)"
                                class="button alert expanded"><i class="fa fa-cart-plus" aria-hidden="true"></i>&nbsp;
                            Add to cart
                        </button>
                        <button v-else class="button warning expanded" disabled>
                            Out of Stock
                        </button>
                    </div>
                </div>
            </div>
        </section>
        <section class="home" v-if="loading == false">
            <div class="display-products">
                <h2>Similar Products</h2>
                <div class="grid-container">
                    <div class="grid-x grid-padding-x medium-unstack equal-height-cards">
                        <div class="cell medium-3" v-cloak v-for="similar in similarProducts">
                            <div class="card">
                                <h5>
                                    @{{ stringLimit(similar.name, 18) }}
                                </h5>
                                <div class="card-section">
                                    <img :src="'/' + similar.image_path">
                                </div>
                                <div class="card-divider-more">
                                    <a :href="'/product/' + similar.id" class="button more expanded">
                                        <i class="fa fa-search" aria-hidden="true"></i>&nbsp;
                                        See More
                                    </a>
                                </div>
                                <div class="card-divider-add-to-cart">
                                    <button v-if="similar.quantity > 0" @click.prevent="addToCart(similar.id)"
                                            class="button cart expanded"><i class="fa fa-cart-plus"
                                                                            aria-hidden="true"></i>&nbsp;
                                        $@{{ similar.price.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,') }} - Add to Cart
                                    </button>
                                    <button v-else class="button warning expanded" disabled>
                                        Out of Stock
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop