<?php $__env->startSection('content'); ?>
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2> Show User</h2>
</div>
<div class="pull-right mb-3">
<a class="btn btn-primary" href="<?php echo e(route('users.index')); ?>"> Back</a>
</div>
</div>
</div>
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group mt-3 mb-3">
<strong>Name:</strong>
<?php echo e($user->name); ?>

</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group mt-3 mb-3">
<strong>Email:</strong>
<?php echo e($user->email); ?>

</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group mb-3 mt-3">
<strong>Roles:</strong>
<?php echo e($user->roles()->pluck('name')->implode(' ')); ?>

</div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /storage/emulated/0/akunapp/resources/views/users/show.blade.php ENDPATH**/ ?>