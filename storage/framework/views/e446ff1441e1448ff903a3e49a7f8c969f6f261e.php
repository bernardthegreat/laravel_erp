

<?php $__env->startSection('content'); ?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Profile</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/users">Users</a></li>
                    <li class="breadcrumb-item active"><?php echo e($users->first_name); ?> <?php echo e($users->middle_name); ?>

                        <?php echo e($users->last_name); ?> <?php echo e($users->name_suffix); ?></li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>


<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-danger card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="<?php echo e(asset('img/avatar.png')); ?>"
                                alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center"><?php echo e($users->first_name); ?> <?php echo e($users->middle_name); ?>

                            <?php echo e($users->last_name); ?> <?php echo e($users->name_suffix); ?></h3>

                        <!-- <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Sales</b> <a class="float-right">1,322</a>
                  </li>
                </ul> -->

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card">

                    <form role="form" method="post" action="<?php echo e(route('users.update', $users->id )); ?>">

                        <div class="card-body">

                            <div class="form-group">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PATCH'); ?>
                                <label for="first_name">First Name</label>
                                <input type="text" class="form-control" name="first_name" id=""
                                    value="<?php echo e($users->first_name); ?>" placeholder="First Name">
                            </div>
                            <div class="form-group">
                                <label for="middle_name">Middle Name</label>
                                <input type="text" class="form-control" name="middle_name" id=""
                                    value="<?php echo e($users->middle_name); ?>" placeholder="Middle Name">
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input type="text" class="form-control" name="last_name" id=""
                                    value="<?php echo e($users->last_name); ?>" placeholder="Last Name">
                            </div>

                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" name="username" id=""
                                    value="<?php echo e($users->username); ?>" placeholder="Username">
                            </div>

                            <div class="form-group">
                                <label for="password">New Password</label>
                                <input type="password" class="form-control" name="password" id="" value=""
                                    placeholder="New Password">
                            </div>

                            <div class="form-group">
                                <label for="prefix">Name Suffix</label>
                                <input type="text" class="form-control" name="prefix" id="prefix" value="<?php echo e($users->prefix); ?>"
                                    placeholder="Prefix" autocomplete="off">
                            </div>

                            <?php
                                $user = auth()->user();
                            ?>
                            <?php if($user->role == 'admin'): ?>

                            <label for="roles">Role</label>
                            <div class="input-group mb-3">
                                
                                <select id="roles" name="role" class="form-control" style="width: 100px;">
                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($role); ?>">
                                        <?php echo e($role); ?>

                                    </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            <?php endif; ?>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                    </form>

                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
<!-- /.card -->





<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\laravel_erp\resources\views/users/edit.blade.php ENDPATH**/ ?>