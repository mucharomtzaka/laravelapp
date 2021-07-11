<?php $__env->startSection('content'); ?>
<div class="row mt-3 ">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>Create New User</h2>
</div>
<div class="pull-right">
<a class="btn btn-primary" href="<?php echo e(route('users.index')); ?>"> Back</a>
</div>
</div>
</div>
<?php if(count($errors) > 0): ?>
<div class="alert alert-danger">
<strong>Whoops!</strong> There were some problems with your input.<br><br>
<ul>
<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<li><?php echo e($error); ?></li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
</div>
<?php endif; ?>
<?php echo Form::open(array('route' => 'users.store','method'=>'POST')); ?>

<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group mb-3 mt-3">
<strong>Name:</strong>
<?php echo Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')); ?>

</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group mb-3 mt-3">
<strong>Email:</strong>
<?php echo Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')); ?>

</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group mb-3 mt-3">
<strong>Password:</strong>
<?php echo Form::password('password', array('placeholder' => 'Password','class' => 'form-control')); ?>

</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group mb-3 mt-3">
<strong>Confirm Password:</strong>
<?php echo Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')); ?>

</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group mb-3 mt-3">
<strong>Role:</strong>
<?php echo Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')); ?>

</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group mb-3 mt-3">
<strong>Account Type:</strong>
<select class="form-select" aria-label="Default select example" name="type_account">
  <option selected value="">Open this select menu</option>
  <option value="Personal">Personal</option>
  <option value="Bussines">Bussines</option>
</select>
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 text-center">
<button type="submit" class="btn btn-primary">Submit</button>
</div>
</div>
<?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /storage/emulated/0/akunapp/resources/views/users/create.blade.php ENDPATH**/ ?>