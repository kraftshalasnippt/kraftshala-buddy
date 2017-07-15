<!-- index.blade.php -->

<?php $__env->startSection('content'); ?>
<?php if(session('status')): ?>
   <div class="alert alert-success">
        <?php echo e(session('status')); ?>

    </div>
<?php endif; ?>

  <div class="container">
  <a href="/home" class="btn btn-info" style="margin-right:2%;">Back</a>
  <br><br>
    <table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>College</th>
        <th>Year of Graduation</th>
        <th>Email</th>
        <th>Verified</th>
        <th>Created At</th>
      </tr>
    </thead>
    <tbody>
      <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <td><?php echo e($user->id); ?></td>
        <td><a href="<?php echo e(action('AppUserController@display', $user->id)); ?>"><?php echo e($user->name); ?></a></td>
        <td><?php echo e($user->college); ?></td>
        <td><?php echo e($user->year_of_graduation); ?></td>
        <td><?php echo e($user->email); ?></td>
        <td><?php echo e($user->verified?'Yes':'No'); ?></td>
        <td><?php echo e($user->created_at); ?></td>
        <td>
          <form action="<?php echo e(action('AppUserController@destroybanneduser', $user->id)); ?>" method="post">
            <?php echo e(csrf_field()); ?>

            <input name="_method" type="hidden" value="DELETE">
            <button id="delete" class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
  </table>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>