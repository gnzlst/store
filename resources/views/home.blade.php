@extends('layouts.app')
@section('title', 'Homepage')
@section('data-page-id', 'home')

@section('content')
    <div class="home">
        <section class="hero">
            <div class="hero-slider">
                @for ($i = 1; $i <= 8; $i++)
                    <div><img src="/images/home-sliders/slide-{{ $i }}.jpg" alt="PC Factory Slide {{ $i }}"
                              title="PC Factory Slide {{ $i }}"></div>
                @endfor
            </div>
        </section>
        <section class="display-products" data-token="{{ $token }}" id="root">
            <h2>Featured Products</h2>
            <div class="grid-container">
                <div class="grid-x grid-padding-x medium-unstack equal-height-cards">
                    <div class="cell medium-4" v-cloak v-for="feature in featured">
                        <div class="card">
                            <h5>
                                @{{ stringLimit(feature.name, 24) }}
                            </h5>
                            <div class="card-section">
                                <img :src="'/' + feature.image_path">
                            </div>
                            <div class="card-divider-more">
                                <a :href="'/product/' + feature.id" class="button more expanded">
                                    <i class="fa fa-search" aria-hidden="true"></i>&nbsp;
                                    See More
                                </a>
                            </div>
                            <div class="card-divider-add-to-cart">
                                <button v-if="feature.quantity > 0" @click.prevent="addToCart(feature.id)"
                                        class="button cart expanded"><i class="fa fa-cart-plus" aria-hidden="true"></i>&nbsp;
                                    $@{{ feature.price.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,') }} - Add to cart
                                </button>
                                <button v-else class="button warning expanded" disabled>
                                    Out of Stock
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h2>Product Picks</h2>
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
            </div>
            <div class="text-center">
                <i v-show="loading" class="fa fa-spinner fa-spin fa-3x fa-fw"></i>
            </div>
        </section>
    </div>
@stop