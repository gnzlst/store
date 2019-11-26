@extends('admin.layout.base')
@section('title', 'Product Categories')
@section('data-page-id', 'adminProductCategories')
@section('content')
    <div class="category">
        <div class="row expanded">
            <div class="page-header">
                <div class="grid-x">
                    <div class="cell medium-12 large-12">
                        <h3 class="margin-0-auto">
                            <i class="fa fa-compress fa-fw" aria-hidden="true"></i>
                            Product Categories
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
                                        <span class="show-for-sr">Current: </span> Product Categories
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
                            <div class="cell medium-8 large-8">
                                <form action="" method="post">
                                    <div class="input-group">
                                        <input type="text" class="input-group-field" placeholder="Search by name"
                                               required>
                                        <div class="input-group-button">
                                            <input type="submit" class="button secondary small" value="Search">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="cell medium-4 large-4">
                                <form action="/admin/product/categories" method="post">
                                    <div class="input-group">
                                        <input type="text" class="input-group-field" name="name"
                                               placeholder="Category name">
                                        <input type="hidden" name="token"
                                               value="{{ \App\classes\CSRFToken::_token() }}">
                                        <div class="input-group-button">
                                            <input type="submit" class="button success small" value="Create">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="cell medium-12 large-12">
                                @if(count($categories))
                                    <h3>List of Categories</h3>
                                    <table class="hover stack unstriped list-tables list-categories"
                                           data-form="deleteForm">
                                        <thead>
                                        <tr>
                                            <th>Category</th>
                                            <th>Slug</th>
                                            <th>Created at</th>
                                            <th>Updated at</th>
                                            <th colspan="3">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($categories as $category)
                                            <tr>
                                                <td>{{$category['name']}}</td>
                                                <td>{{$category['slug']}}</td>
                                                <td>
                                                    <time class="timeago" datetime="{{$category['created_at']}}"
                                                          title="{{$category['created_at']}}">{{$category['created_at']}}</time>
                                                </td>
                                                <td>
                                                    <time class="timeago" datetime="{{$category['updated_at']}}"
                                                          title="{{$category['updated_at']}}">{{$category['updated_at']}}</time>
                                                </td>
                                                <td>
                                                    <a data-open="add-subcategory-{{ $category['id'] }}" data-tooltip
                                                       aria-haspopup="true" class="has-tip top"
                                                       data-disable-hover="false" tabindex="1" title="Add Subcategory">
                                                        <i class="fa fa-plus button-add"></i></a>
                                                    <div class="reveal my-modal tiny"
                                                         id="add-subcategory-{{$category['id']}}"
                                                         data-reveal data-close-on-click="false"
                                                         data-close-on-esc="false"
                                                         data-animation-in="scale-in-up"
                                                         data-animation-out="slide-out-up">
                                                        <div class="my-modal-header">
                                                            <h5 class="my-modal-title">Add Sub-Category</h5>
                                                            <a href="/admin/product/categories" class="close-button"
                                                               aria-label="Close reveal" type="button">
                                                                <span aria-hidden="true">&times;</span>
                                                            </a>
                                                        </div>
                                                        <div class="my-modal-body">
                                                            <div class="notification callout success"></div>
                                                            <form>
                                                                <div class="input-group">
                                                                    <input type="text"
                                                                           id="subcategory-name-{{$category['id']}}"
                                                                           required>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="my-modal-footer">
                                                            <a href="/admin/product/categories" type="button"
                                                               class="button secondary my-modal-button"
                                                               aria-label="Close reveal">Close
                                                            </a>
                                                            <button type="submit" id="{{ $category['id'] }}"
                                                                    class="button success my-modal-button close-reveal-modal add-subcategory"
                                                                    data-token="{{ \App\classes\CSRFToken::_token() }}">
                                                                Create
                                                            </button>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>

                                                    <a data-tooltip aria-haspopup="true" class="has-tip top"
                                                       data-disable-hover="false" tabindex="1" title="Edit Category"
                                                       data-open="item-edit-{{ $category['id'] }}">
                                                        <i class="fa fa-edit button-edit"></i>
                                                    </a>
                                                    <div class="reveal my-modal tiny"
                                                         id="item-edit-{{$category['id']}}"
                                                         data-reveal data-close-on-click="false"
                                                         data-close-on-esc="false"
                                                         data-animation-in="scale-in-up"
                                                         data-animation-out="slide-out-up">
                                                        <div class="my-modal-header">
                                                            <h5 class="my-modal-title">Edit Category</h5>
                                                            <a href="/admin/product/categories" class="close-button"
                                                               aria-label="Close reveal" type="button">
                                                                <span aria-hidden="true">&times;</span>
                                                            </a>
                                                        </div>
                                                        <div class="my-modal-body">
                                                            <div class="notification callout success"></div>
                                                            <form>
                                                                <div class="input-group">
                                                                    <input type="text" name="name"
                                                                           id="item-name-{{$category['id']}}"
                                                                           value="{{ $category['name'] }}" required>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="my-modal-footer">
                                                            <a href="/admin/product/categories" type="button"
                                                               class="button secondary my-modal-button"
                                                               aria-label="Close reveal">Close
                                                            </a>
                                                            <button type="submit" id="{{ $category['id'] }}"
                                                                    class="button primary my-modal-button close-reveal-modal update-category"
                                                                    data-token="{{ \App\classes\CSRFToken::_token() }}">
                                                                Update category
                                                            </button>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <form method="post"
                                                          action="/admin/product/categories/{{ $category['id'] }}/delete"
                                                          class="delete-item">
                                                        <input type="hidden" name="token"
                                                               value="{{ \App\classes\CSRFToken::_token() }}">
                                                        <button type="submit" data-tooltip aria-haspopup="true"
                                                                class="has-tip top"
                                                                data-disable-hover="false" tabindex="1"
                                                                title="Delete Category">
                                                            <i class="fa fa-times button-delete"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <div class="title-bar-right">
                                        {!! $links !!}
                                    </div>
                                @else
                                    <h3 class="text-center subheader">Whoops... There are not categories here. Create
                                        one!</h3>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row expanded">
            <div class="page-wrapper">
                <div class="page-background">
                    <div class="grid-container fluid">

                        <div class="grid-x grid-margin-x">

                            <div class="cell medium-12 large-12">
                                @if(count($subcategories))
                                    <h3>List of Subcategories</h3>
                                    <table class="hover stack unstriped list-tables list-subcategories"
                                           data-form="deleteForm">
                                        <thead>
                                        <tr>
                                            <th>Category</th>
                                            <th>Subcategory</th>
                                            <th>Slug</th>
                                            <th>Created at</th>
                                            <th>Updated at</th>
                                            <th colspan="3">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($subcategories as $subcategory)
                                            <tr>
                                                <td>{{$subcategory['category_name']}}</td>
                                                <td>{{$subcategory['name']}}</td>
                                                <td>{{$subcategory['slug']}}</td>
                                                <td>
                                                    <time class="timeago" datetime="{{$subcategory['created_at']}}"
                                                          title="{{$subcategory['created_at']}}">{{$subcategory['created_at']}}</time>
                                                </td>
                                                <td>
                                                    <time class="timeago" datetime="{{$subcategory['updated_at']}}"
                                                          title="{{$subcategory['updated_at']}}">{{$subcategory['updated_at']}}</time>
                                                </td>
                                                <td>
                                                    <a data-tooltip aria-haspopup="true" class="has-tip top"
                                                       data-disable-hover="false" tabindex="1" title="Edit SubCategory"
                                                       data-open="item-subcategory-{{ $subcategory['id'] }}">
                                                        <i class="fa fa-edit button-edit"></i>
                                                    </a>
                                                    <div class="reveal my-modal tiny"
                                                         id="item-subcategory-{{$subcategory['id']}}"
                                                         data-reveal data-close-on-click="false"
                                                         data-close-on-esc="false"
                                                         data-animation-in="scale-in-up"
                                                         data-animation-out="slide-out-up">
                                                        <div class="my-modal-header">
                                                            <h5 class="my-modal-title">Edit Subcategory</h5>
                                                            <a href="/admin/product/categories" class="close-button"
                                                               aria-label="Close reveal" type="button">
                                                                <span aria-hidden="true">&times;</span>
                                                            </a>
                                                        </div>
                                                        <div class="my-modal-body">
                                                            <div class="notification callout success"></div>
                                                            <form>
                                                                <div class="row">
                                                                    <div class="large-12 columns">
                                                                        <input type="text"
                                                                               id="item-subcategory-name-{{$subcategory['id']}}"
                                                                               value="{{ $subcategory['name'] }}"
                                                                               required>
                                                                    </div>
                                                                    <div class="large-12 columns">
                                                                        <label>Select category
                                                                            <select id="item-category-{{ $subcategory['category_id'] }}">
                                                                                @foreach(\App\Models\Category::all() as $category)
                                                                                    @if($category->id == $subcategory['category_id'])
                                                                                        <option selected="selected"
                                                                                                value="{{ $category->id }}">
                                                                                            {{ $category->name }}
                                                                                        </option>
                                                                                    @endif
                                                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="my-modal-footer">
                                                            <a href="/admin/product/categories" type="button"
                                                               class="button secondary my-modal-button"
                                                               aria-label="Close reveal">Close
                                                            </a>
                                                            <button type="submit" id="{{$subcategory['id']}}"
                                                                    class="button primary my-modal-button close-reveal-modal update-subcategory"
                                                                    data-category-id="{{$subcategory['category_id']}}"
                                                                    data-token="{{ \App\Classes\CSRFToken::_token() }}">
                                                                Update category
                                                            </button>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <form method="post"
                                                          action="/admin/product/subcategory/{{ $subcategory['id'] }}/delete"
                                                          class="delete-item">
                                                        <input type="hidden" name="token"
                                                               value="{{ \App\classes\CSRFToken::_token() }}">
                                                        <button type="submit" data-tooltip aria-haspopup="true"
                                                                class="has-tip top"
                                                                data-disable-hover="false" tabindex="1"
                                                                title="Delete SubCategory">
                                                            <i class="fa fa-times button-delete"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <div class="title-bar-right">
                                        {!! $subcategories_links !!}
                                    </div>
                                @else
                                    <h3 class="text-center subheader">Whoops... There are not Subcategories here. Create
                                        one!</h3>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('includes.delete-modal')
@endsection