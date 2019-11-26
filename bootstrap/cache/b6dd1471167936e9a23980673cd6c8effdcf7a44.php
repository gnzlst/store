<?php $__env->startSection('title', 'Product Categories'); ?>
<?php $__env->startSection('data-page-id', 'adminProductCategories'); ?>
<?php $__env->startSection('content'); ?>
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
                        <?php echo $__env->make('includes.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php if(isset($message)): ?>
                            <p><?php echo e($message); ?></p>
                        <?php endif; ?>
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
                                               value="<?php echo e(\App\classes\CSRFToken::_token()); ?>">
                                        <div class="input-group-button">
                                            <input type="submit" class="button success small" value="Create">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="cell medium-12 large-12">
                                <?php if(count($categories)): ?>
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
                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($category['name']); ?></td>
                                                <td><?php echo e($category['slug']); ?></td>
                                                <td>
                                                    <time class="timeago" datetime="<?php echo e($category['created_at']); ?>"
                                                          title="<?php echo e($category['created_at']); ?>"><?php echo e($category['created_at']); ?></time>
                                                </td>
                                                <td>
                                                    <time class="timeago" datetime="<?php echo e($category['updated_at']); ?>"
                                                          title="<?php echo e($category['updated_at']); ?>"><?php echo e($category['updated_at']); ?></time>
                                                </td>
                                                <td>
                                                    <a data-open="add-subcategory-<?php echo e($category['id']); ?>" data-tooltip
                                                       aria-haspopup="true" class="has-tip top"
                                                       data-disable-hover="false" tabindex="1" title="Add Subcategory">
                                                        <i class="fa fa-plus button-add"></i></a>
                                                    <div class="reveal my-modal tiny"
                                                         id="add-subcategory-<?php echo e($category['id']); ?>"
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
                                                                           id="subcategory-name-<?php echo e($category['id']); ?>"
                                                                           required>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="my-modal-footer">
                                                            <a href="/admin/product/categories" type="button"
                                                               class="button secondary my-modal-button"
                                                               aria-label="Close reveal">Close
                                                            </a>
                                                            <button type="submit" id="<?php echo e($category['id']); ?>"
                                                                    class="button success my-modal-button close-reveal-modal add-subcategory"
                                                                    data-token="<?php echo e(\App\classes\CSRFToken::_token()); ?>">
                                                                Create
                                                            </button>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>

                                                    <a data-tooltip aria-haspopup="true" class="has-tip top"
                                                       data-disable-hover="false" tabindex="1" title="Edit Category"
                                                       data-open="item-edit-<?php echo e($category['id']); ?>">
                                                        <i class="fa fa-edit button-edit"></i>
                                                    </a>
                                                    <div class="reveal my-modal tiny"
                                                         id="item-edit-<?php echo e($category['id']); ?>"
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
                                                                           id="item-name-<?php echo e($category['id']); ?>"
                                                                           value="<?php echo e($category['name']); ?>" required>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="my-modal-footer">
                                                            <a href="/admin/product/categories" type="button"
                                                               class="button secondary my-modal-button"
                                                               aria-label="Close reveal">Close
                                                            </a>
                                                            <button type="submit" id="<?php echo e($category['id']); ?>"
                                                                    class="button primary my-modal-button close-reveal-modal update-category"
                                                                    data-token="<?php echo e(\App\classes\CSRFToken::_token()); ?>">
                                                                Update category
                                                            </button>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <form method="post"
                                                          action="/admin/product/categories/<?php echo e($category['id']); ?>/delete"
                                                          class="delete-item">
                                                        <input type="hidden" name="token"
                                                               value="<?php echo e(\App\classes\CSRFToken::_token()); ?>">
                                                        <button type="submit" data-tooltip aria-haspopup="true"
                                                                class="has-tip top"
                                                                data-disable-hover="false" tabindex="1"
                                                                title="Delete Category">
                                                            <i class="fa fa-times button-delete"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                    <div class="title-bar-right">
                                        <?php echo $links; ?>

                                    </div>
                                <?php else: ?>
                                    <h3 class="text-center subheader">Whoops... There are not categories here. Create
                                        one!</h3>
                                <?php endif; ?>
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
                                <?php if(count($subcategories)): ?>
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
                                        <?php $__currentLoopData = $subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($subcategory['category_name']); ?></td>
                                                <td><?php echo e($subcategory['name']); ?></td>
                                                <td><?php echo e($subcategory['slug']); ?></td>
                                                <td>
                                                    <time class="timeago" datetime="<?php echo e($subcategory['created_at']); ?>"
                                                          title="<?php echo e($subcategory['created_at']); ?>"><?php echo e($subcategory['created_at']); ?></time>
                                                </td>
                                                <td>
                                                    <time class="timeago" datetime="<?php echo e($subcategory['updated_at']); ?>"
                                                          title="<?php echo e($subcategory['updated_at']); ?>"><?php echo e($subcategory['updated_at']); ?></time>
                                                </td>
                                                <td>
                                                    <a data-tooltip aria-haspopup="true" class="has-tip top"
                                                       data-disable-hover="false" tabindex="1" title="Edit SubCategory"
                                                       data-open="item-subcategory-<?php echo e($subcategory['id']); ?>">
                                                        <i class="fa fa-edit button-edit"></i>
                                                    </a>
                                                    <div class="reveal my-modal tiny"
                                                         id="item-subcategory-<?php echo e($subcategory['id']); ?>"
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
                                                                               id="item-subcategory-name-<?php echo e($subcategory['id']); ?>"
                                                                               value="<?php echo e($subcategory['name']); ?>"
                                                                               required>
                                                                    </div>
                                                                    <div class="large-12 columns">
                                                                        <label>Select category
                                                                            <select id="item-category-<?php echo e($subcategory['category_id']); ?>">
                                                                                <?php $__currentLoopData = \App\Models\Category::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                    <?php if($category->id == $subcategory['category_id']): ?>
                                                                                        <option selected="selected"
                                                                                                value="<?php echo e($category->id); ?>">
                                                                                            <?php echo e($category->name); ?>

                                                                                        </option>
                                                                                    <?php endif; ?>
                                                                                    <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                                            <button type="submit" id="<?php echo e($subcategory['id']); ?>"
                                                                    class="button primary my-modal-button close-reveal-modal update-subcategory"
                                                                    data-category-id="<?php echo e($subcategory['category_id']); ?>"
                                                                    data-token="<?php echo e(\App\Classes\CSRFToken::_token()); ?>">
                                                                Update category
                                                            </button>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <form method="post"
                                                          action="/admin/product/subcategory/<?php echo e($subcategory['id']); ?>/delete"
                                                          class="delete-item">
                                                        <input type="hidden" name="token"
                                                               value="<?php echo e(\App\classes\CSRFToken::_token()); ?>">
                                                        <button type="submit" data-tooltip aria-haspopup="true"
                                                                class="has-tip top"
                                                                data-disable-hover="false" tabindex="1"
                                                                title="Delete SubCategory">
                                                            <i class="fa fa-times button-delete"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                    <div class="title-bar-right">
                                        <?php echo $subcategories_links; ?>

                                    </div>
                                <?php else: ?>
                                    <h3 class="text-center subheader">Whoops... There are not Subcategories here. Create
                                        one!</h3>
                                <?php endif; ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo $__env->make('includes.delete-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mystore\resources\views/admin/products/categories.blade.php ENDPATH**/ ?>