

<?php $__env->startSection('content'); ?>
<div class="container">
    <h3>CL Control Panel</h3>
	<a href="<?php echo e(action('CLUserController@users',Auth::user()->college)); ?>">List of Users</a><br><br>
	<a href="<?php echo e(action('CLUserController@bannedusers',Auth::user()->college)); ?>">List of Banned Users</a>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>