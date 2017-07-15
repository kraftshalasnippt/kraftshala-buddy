<?php $__env->startSection('content'); ?>
	<div class="container">
	<h1>Edit the Task</h1>

<form method="POST" action="/admin_user/<?php echo e($user->id); ?>">

	<div class="form-group">
		<input name="name" class="form-control"><?php echo e($user->name); ?></input>	
	</div>


	<div class="form-group">
		<button type="submit" name="update" class="btn btn-primary"><?php echo e($user->name); ?></button>
	</div>
<?php echo e(csrf_field()); ?>

</form>



</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>