

<?php $__env->startSection('content'); ?>
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Register User
  </div>
  <div class="card-body">
    <?php if($errors->any()): ?>
      <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
      </div><br />
    <?php endif; ?>
      <form method="post" action="<?php echo e(route('users.external_store')); ?>">
        <?php echo csrf_field(); ?>
        <div class="form-group">
        
            <input type="text" name="username" placeholder="Username">   
        </div>

        <div class="form-group">
            <input type="password" name="password" placeholder="Password">   
        </div>

        <div class="form-group">
            <input type="text" name="first_name" placeholder="Firstname">   
        </div>

        <div class="form-group">
            <input type="text" name="last_name" placeholder="Lastname">   
        </div>
          <button type="submit" class="btn btn-primary">Register</button>
      </form>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.login_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\laravel_erp\resources\views/users/create.blade.php ENDPATH**/ ?>