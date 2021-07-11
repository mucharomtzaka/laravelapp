<?php $__env->startSection('content'); ?>
<div class="row">
<div class="col-lg-12 mb-3 mt-3 ">
<div class="pull-left">
  <h2>Activity Management</h2>  
</div>
<div class="pull-right">
<div class="input-group mb-3">
<?php echo Form::open(array('route' => 'activities.index','method'=>'GET')); ?>

  <input type="text" class="form-control" placeholder="Keyword" aria-label="Recipient's username" aria-describedby="button-addon2" name="search" 
    value="<?php echo e(request('search')); ?>" >
  <button class="btn btn-outline-secondary mt-3" type="submit" id="button-addon2">Search</button>
<?php echo Form::close(); ?>

</div>
</div>
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
<th>Event</th>
<th>Description</th>
<th>operator</th>
<th>Date</th>
</tr>
<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
<td><?php echo e(++$i); ?></td>
<td><?php echo e($user->event); ?></td>
<td><?php echo e($user->description); ?></td>
<td>
  <?php echo e($user->user['name']); ?>

</td>
<td>
  <?php echo e($user->created_at); ?>

</td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>
</div>
<?php echo $data->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /storage/emulated/0/akunapp/resources/views/activity/index.blade.php ENDPATH**/ ?>