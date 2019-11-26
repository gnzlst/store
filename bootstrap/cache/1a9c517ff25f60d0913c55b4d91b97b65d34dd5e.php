<?php $__env->startSection('title', 'Users'); ?>
<?php $__env->startSection('data-page-id', 'adminUsers'); ?>
<?php $__env->startSection('content'); ?>
    <div class="category">
        <div class="row expanded">
            <div class="page-header">
                <div class="grid-x">
                    <div class="cell medium-12 large-12">
                        <h3 class="margin-0-auto">
                            <i class="fa fa-users fa-fw" aria-hidden="true"></i>
                            Users
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
                                        <span class="show-for-sr">Current: </span> Users
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

                        <div class="grid-x grid-padding-x">
                            <div class="small-12 cell">
                                <a class="button success float-right"
                                   data-open="item-create-user">
                                    <i class="fa fa-plus"></i> Add New User
                                </a>
                            </div>
                        </div>

                        <div class="grid-x grid-margin-x">
                            <div class="cell medium-4 large-4">
                                <div class="reveal my-modal tiny"
                                     id="item-create-user"
                                     data-reveal data-close-on-click="false"
                                     data-close-on-esc="false"
                                     data-animation-in="scale-in-up"
                                     data-animation-out="slide-out-up">
                                    <div class="my-modal-header">
                                        <h5 class="my-modal-title">Add new User</h5>
                                        <a href="/admin/users" class="close-button"
                                           aria-label="Close reveal" type="button">
                                            <span aria-hidden="true">&times;</span>
                                        </a>
                                    </div>
                                    <div class="my-modal-body">
                                        <div class="notification callout success"></div>
                                        <form action="/admin/users/register" method="post" autocomplete="off">
                                            <div class="input-group">
                                                <span class="input-group-label"><i class="fa fa-address-card fa-fw"
                                                                                   aria-hidden="true"></i></span>
                                                <input class="input-group-field" type="text" name="full_name"
                                                       placeholder="Full Name"
                                                       value="<?php echo e(\App\Classes\Request::old('post', 'full_name')); ?>">
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-label"><i class="fa fa-at fa-fw"
                                                                                   aria-hidden="true"></i></span>
                                                <input class="input-group-field" type="text" name="email"
                                                       placeholder="Email Address"
                                                       value="<?php echo e(\App\Classes\Request::old('post', 'email')); ?>">
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-label"><i class="fa fa-user fa-fw"
                                                                                   aria-hidden="true"></i></span>
                                                <input class="input-group-field" type="text" name="username"
                                                       placeholder="Username"
                                                       value="<?php echo e(\App\Classes\Request::old('post', 'username')); ?>">
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-label"><i class="fa fa-key fa-fw"
                                                                                   aria-hidden="true"></i></span>
                                                <input class="input-group-field" type="password" name="password"
                                                       placeholder="Password">
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-label"><i class="fa fa-road fa-fw"
                                                                                   aria-hidden="true"></i></span>
                                                <input class="input-group-field" type="text" name="street_address"
                                                       placeholder="Street and Number"
                                                       value="<?php echo e(\App\Classes\Request::old('post', 'street_address')); ?>">
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-label">
                                                    <i class="fa fa-mail-bulk fa-fw" aria-hidden="true"></i>
                                                </span>
                                                <input class="input-group-field" type="text" name="post_code"
                                                       placeholder="Post Code"
                                                       value="<?php echo e(\App\Classes\Request::old('post', 'post_code')); ?>">
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-label"><i class="fa fa-city fa-fw"
                                                                                   aria-hidden="true"></i></span>
                                                <input class="input-group-field" type="text" name="city_suburb_town"
                                                       placeholder="City, Suburb or Town"
                                                       value="<?php echo e(\App\Classes\Request::old('post', 'city_suburb_town')); ?>">
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-label"><i class="fa fa-flag fa-fw"
                                                                                   aria-hidden="true"></i></span>
                                                <input class="input-group-field" type="text" name="state_territory"
                                                       placeholder="State or Territory"
                                                       value="<?php echo e(\App\Classes\Request::old('post', 'state_territory')); ?>">
                                            </div>
                                            <div class="input-group">
                            <span class="input-group-label"><i class="fa fa-globe-asia fa-fw"
                                                               aria-hidden="true"></i></span>
                                                <input class="input-group-field" type="text" name="country"
                                                       placeholder="Country"
                                                       value="<?php echo e(\App\Classes\Request::old('post', 'country')); ?>">
                                            </div>
                                            <div class="input-group">
                                                <fieldset class="switch" tabindex="0">
                                                    <input id="administrator" type="checkbox" name="administrator">
                                                    <label for="administrator">Administrator?</label>
                                                </fieldset>
                                            </div>
                                            <input type="hidden" name="token" value="<?php echo e(\App\Classes\CSRFToken::_token()); ?>">
                                            <button type="submit"
                                                    class="button success expanded my-modal-button close-reveal-modal register-user"
                                                    data-token="<?php echo e(\App\classes\CSRFToken::_token()); ?>">
                                                Create
                                            </button>
                                        </form>
                                    </div>
                                    <div class="my-modal-footer">
                                        <a href="/admin/users" type="button"
                                           class="button secondary my-modal-button"
                                           aria-label="Close reveal">Close
                                        </a>

                                    </div>
                                </div>
                            </div>


                            <div class="cell medium-12 large-12">
                                <?php if(count($users)): ?>
                                    <h3>List of Users</h3>
                                    <table class="hover stack unstriped list-tables list-users"
                                           data-form="deleteForm">
                                        <thead>
                                        <tr>
                                            <th>Username</th>
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th>Street Address</th>
                                            <th>Post Code</th>
                                            <th>City</th>
                                            <th>State</th>
                                            <th>Country</th>
                                            <th>Role</th>
                                            <th>Created At</th>
                                            <th>Deleted At</th>
                                            <th colspan="2">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($user['username']); ?></td>
                                                <td><?php echo e($user['full_name']); ?></td>
                                                <td><?php echo e($user['email']); ?></td>
                                                <td><?php echo e($user['street_address']); ?></td>
                                                <td><?php echo e($user['post_code']); ?></td>
                                                <td><?php echo e($user['city_suburb_town']); ?></td>
                                                <td><?php echo e($user['state_territory']); ?></td>
                                                <td><?php echo e($user['country']); ?></td>
                                                <td>
                                                    <span class="label <?php if($user['role'] === 'admin'): ?> warning  <?php endif; ?> <?php if($user['role'] === 'user'): ?> primary <?php endif; ?>">
                                                        <?php if($user['role'] === 'admin'): ?>
                                                            Administrator
                                                        <?php endif; ?>
                                                        <?php if($user['role'] === 'user'): ?>
                                                            Client
                                                        <?php endif; ?>
                                                    </span>
                                                </td>
                                                <td>
                                                    <time class="timeago" datetime="<?php echo e($user['created_at']); ?>"
                                                          title="<?php echo e($user['created_at']); ?>"><?php echo e($user['created_at']); ?></time>
                                                </td>
                                                <td>
                                                    <time class="timeago" datetime="<?php echo e($user['updated_at']); ?>"
                                                          title="<?php echo e($user['updated_at']); ?>"><?php echo e($user['updated_at']); ?></time>
                                                </td>
                                                <td>
                                                    <a data-tooltip aria-haspopup="true" class="has-tip top"
                                                       data-disable-hover="false" tabindex="1" title="Edit Category"
                                                       data-open="item-edit-<?php echo e($user['id']); ?>">
                                                        <i class="fa fa-edit button-edit"></i>
                                                    </a>
                                                    <div class="reveal my-modal tiny"
                                                         id="item-edit-<?php echo e($user['id']); ?>"
                                                         data-reveal data-close-on-click="false"
                                                         data-close-on-esc="false"
                                                         data-animation-in="scale-in-up"
                                                         data-animation-out="slide-out-up">
                                                        <div class="my-modal-header">
                                                            <h5 class="my-modal-title">Edit Category</h5>
                                                            <a href="/admin/users" class="close-button"
                                                               aria-label="Close reveal" type="button">
                                                                <span aria-hidden="true">&times;</span>
                                                            </a>
                                                        </div>
                                                        <div class="my-modal-body">
                                                            <div class="notification callout success"></div>
                                                            <form>
                                                                <div class="input-group">
                                                                    <input type="text" name="name"
                                                                           id="item-name-<?php echo e($user['id']); ?>"
                                                                           value="<?php echo e($user['username']); ?>" required>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="my-modal-footer">
                                                            <a href="/admin/users" type="button"
                                                               class="button secondary my-modal-button"
                                                               aria-label="Close reveal">Close
                                                            </a>
                                                            <button type="submit" id="<?php echo e($user['id']); ?>"
                                                                    class="button primary my-modal-button close-reveal-modal update-category"
                                                                    data-token="<?php echo e(\App\classes\CSRFToken::_token()); ?>">
                                                                Update category
                                                            </button>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <form method="post"
                                                          action="/admin/product/categories/<?php echo e($user['id']); ?>/delete"
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
                                    <h3 class="text-center subheader">Whoops... There are not Users here. Create
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
<?php echo $__env->make('admin.layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mystore\resources\views/admin/users/users.blade.php ENDPATH**/ ?>