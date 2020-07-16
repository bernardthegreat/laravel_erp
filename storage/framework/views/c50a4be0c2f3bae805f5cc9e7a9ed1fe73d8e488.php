

<?php $__env->startSection('content'); ?>

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Client Profile</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/purchases/suppliers">Suppliers</a></li>
          <li class="breadcrumb-item active"><?php echo e($suppliers->name_long); ?></li>
        </ol>
      </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3">
        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <img class="profile-user-img img-fluid img-circle" src="<?php echo e(asset('img/avatar.png')); ?>"
                alt="User profile picture">
            </div>
            <h3 class="profile-username text-center"><?php echo e($suppliers->name_long); ?> </h3>
          </div>
        </div>
      </div>
      <div class="col-md-9">
        <div class="card">
          <form role="form" method="post" action="<?php echo e(route('suppliers.update', $suppliers->id )); ?>">
            <div class="card-body">
              <?php echo csrf_field(); ?>
              <?php echo method_field('PATCH'); ?>
              <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" name="name_long" id="" value="<?php echo e($suppliers->name_long); ?>"
                  placeholder="Name">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Address</label>
                <input type="text" class="form-control" name="address" id="" value="<?php echo e($suppliers->address); ?>"
                  placeholder="Address">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Contact #</label>
                <input type="text" class="form-control" name="contact_no" id="" value="<?php echo e($suppliers->contact_no); ?>"
                  placeholder="Contact #">
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\laravel_erp\resources\views/suppliers/edit.blade.php ENDPATH**/ ?>