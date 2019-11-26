<?php

use App\Models\Category;

$categories = Category::with('subCategories')->get();
?>
<header class="navigation">
    <div class="title-bar toggle" data-responsive-toggle="main-animated-menu" data-hide-for="medium">
        <button class="menu-icon" type="button" data-toggle></button>
        <div class="title-bar-title"><a href="/">PC Factory</a></div>
    </div>

    <div class="top-bar" id="main-animated-menu" data-animate="hinge-in-from-top hinge-out-from-top"
         data-responsive-menu="drilldown medium-dropdown" data-click-open="true" data-disable-hover="true"
         data-close-on-click-inside="false" data-dropdown-menu>

        <div class="top-bar-left">
            <ul class="dropdown menu" data-dropdown-menu>
                <li class="menu-text logo" onclick="location.href='/'"></li>
                <li><a href="/products">Products</a></li>
                @if(count($categories))
                    <li>
                        <a href="/products/category">Categories</a>
                        <ul class="menu vertical dropdown">
                            @foreach($categories as $category)
                                <li>
                                    <a href="/products/category/{{ $category->slug }}">{{ $category->name }}</a>
                                    @if(count($category->subCategories))
                                        <ul class="menu vertical sub">
                                            @foreach($category->subCategories as $subCategory)
                                                <li>
                                                    <a href="/products/category/{{ $category->slug }}/{{ $subCategory->slug }}">
                                                        {{ $subCategory->name }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
        <div class="top-bar-right">
            <ul class="menu">
                @if(isAuthenticated())
                    <li><a href="#">Welcome {{ user()->full_name }}</a></li>
                    <li><a href="/cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;Cart</a></li>
                    <li><a href="/logout">Logout</a></li>
                @else
                    <li><a href="/login">Sign In</a></li>
                    <li><a href="/register">Register</a></li>
                    <li><a href="/cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;Cart</a></li>
                @endif
            </ul>
        </div>
    </div>
</header>
