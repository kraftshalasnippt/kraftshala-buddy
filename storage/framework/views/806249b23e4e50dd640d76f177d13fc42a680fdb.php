<!-- index.blade.php -->

<?php $__env->startSection('content'); ?>
<?php if(session('status')): ?>
   <div class="alert alert-success">
        <?php echo e(session('status')); ?>

    </div>
<?php endif; ?>

<div class="container">
  	<div class="row">
        <div class="col-md-8 col-md-offset-2">
        	<a href="<?php echo e(action('CollegeController@open', $user->id)); ?>" class="btn btn-info" style="margin-right:2%;">Back</a>
            <div class="panel panel-default">
                <div class="panel-heading">User Details</div>
                <div class="panel-body">
                <a href="<?php echo e(action('AppUserController@edit', $user->id)); ?>" class="btn btn-info" style="margin-right:2%;">Edit</a>
                <?php if(is_null($user->ban)||!$user->ban): ?>
                <a href="<?php echo e(action('AppUserController@bantoggle', $user->id)); ?>" class="btn btn-danger" style="margin-right:2%;">Ban</a>
                <?php else: ?>
                <a href="<?php echo e(action('AppUserController@bantoggle', $user->id)); ?>" class="btn btn-warning" style="margin-right:2%;">Unban</a>
                <?php endif; ?>

                <?php if(is_null($user->verified)||!$user->verified): ?>
                <a href="<?php echo e(action('AppUserController@verifyuser', $user->id)); ?>" class="btn btn-warning" style="margin-right:2%;">Verify User</a>
                <?php else: ?>
                <a href="" class="btn btn-info disabled" style="margin-right:2%;">User Verified</a>
                <?php endif; ?>

                <?php if(is_null($user->verified)||!$user->mobile_verified): ?>
                <a href="<?php echo e(action('AppUserController@verifymobile', $user->id)); ?>" class="btn btn-warning" style="margin-right:2%;">Verify Mobile</a>
                <?php else: ?>
                <a href="" class="btn btn-info disabled" style="margin-right:2%;">Mobile Verified</a>
                <?php endif; ?>

                <?php if(is_null($user->verified)||!$user->email_verified): ?>
                <a href="<?php echo e(action('AppUserController@verifyemail', $user->id)); ?>" class="btn btn-warning" style="margin-right:2%;">Verify Email</a>
                <?php else: ?>
                <a href="" class="btn btn-info disabled" style="margin-right:2%;">Email Verified</a>
                <?php endif; ?>
                <br><br>
                <p><b>Name :</b><?php echo e(' '.$user->name); ?></p>
                <p><b>Email :</b><?php echo e(' '.$user->email); ?></p>
                <p><b>Mobile :</b><?php echo e(' '.$user->mobile); ?></p>
                <p><b>College :</b><?php echo e(' '.$user->college); ?></p>
                <p><b>Year of graduation :</b><?php echo e(' '.$user->year_of_graduation); ?></p>
                <p><b>Status :</b><?php echo e($user->alumni?' Alumni':' Student'); ?></p>
                <p><b>Description :</b><?php echo e(' '.$user->description); ?></p>
                <?php if($user->alumni): ?>
                	<?php if($user->cur_org): ?>
                	<p><b>Current Organisation :</b><?php echo e(' '.$user->cur_org); ?></p>
                	<?php endif; ?>
                <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>