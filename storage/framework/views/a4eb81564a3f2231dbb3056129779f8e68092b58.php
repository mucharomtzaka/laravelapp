<?php $__env->startSection('content'); ?>
<div class="row">
<div class="col-lg-12 mb-3 mt-3 ">
<div class="pull-left">
  <h2>Users Management</h2>  
</div>
<div class="pull-right">
<div class="input-group mb-3">
<?php echo Form::open(array('route' => 'users.index','method'=>'GET')); ?>

  <input type="text" class="form-control" placeholder="Keyword" aria-label="Recipient's username" aria-describedby="button-addon2" name="search" 
    value="<?php echo e(request('search')); ?>" >
  <button class="btn btn-outline-secondary mt-3" type="submit" id="button-addon2">Search</button>
<?php echo Form::close(); ?>

</div>
</div>
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user-create')): ?>
  <a class="btn btn-success" href="<?php echo e(route('users.create')); ?>"> Create New User</a>
<?php endif; ?>
</div>
</div>
<?php if($message = Session::get('success')): ?>
<div class="alert alert-success">
<p><?php echo e($message); ?></p>
</div>
<?php endif; ?>
<div class="table-responsive">
<table class="table table-bordered">
<tr>
<th>No</th>
<th>Username</th>
<th>Type</th>
<th>Roles</th>
<th>Action</th>
</tr>
<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
<td><?php echo e(++$i); ?></td>
<td><?php echo e($user->name); ?></td>
<td><?php echo e($user->type_account); ?></td>
<td>
<?php echo e($user->roles()->pluck('name')->implode(' ')); ?>


</td>
<td>
<a class="btn btn-info btn-small" href="<?php echo e(route('users.show',$user->id)); ?>">
Show
</a>
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user-edit')): ?>
<a class="btn btn-primary btn-small" href="<?php echo e(route('users.edit',$user->id)); ?>">Edit</a>
<?php echo Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']); ?>

<?php endif; ?>
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user-delete')): ?>
<?php echo Form::submit('Delete', ['class' => 'btn btn-danger btn-small']); ?>

<?php echo Form::close(); ?>

<?php endif; ?>
</td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>
</div>
<?php echo $data->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /storage/emulated/0/akunapp/resources/views/users/index.blade.php ENDPATH**/ ?>