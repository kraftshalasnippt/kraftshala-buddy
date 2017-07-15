<!-- index.blade.php -->

<?php $__env->startSection('content'); ?>
<?php if(session('status')): ?>
   <div class="alert alert-success">
        <?php echo e(session('status')); ?>

    </div>
<?php endif; ?>

  <div class="container">
  <a href="/home" class="btn btn-info" style="margin-right:2%;">Back</a>
  <a href="<?php echo e(action('CollegeController@create')); ?>" class="btn btn-primary">Add new college</a>
  <br><br>
    <table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>City</th>
        <th>State</th>
        <th>Description</th>
        <th>Active</th>
        <th>Website</th>
        <th>Email Domain</th>
        <th>Created At</th>
      </tr>
    </thead>
    <tbody>
      <?php $__currentLoopData = $colleges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $college): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <td><?php echo e($college->id); ?></td>
        <td><a href="<?php echo e(action('CollegeController@show', $college['id'])); ?>"><?php echo e($college->name); ?></a></td>
        <td><?php echo e($college->city); ?></td>
        <td><?php echo e($college->state); ?></td>
        <td><?php echo e($college->description); ?></td>
        <td><?php echo e($college->active); ?></td>
        <td><?php echo e($college->website); ?></td>
        <td><?php echo e($college->email_domain); ?></td>
        <td><?php echo e($college->created_at); ?></td>
        <td><a href="<?php echo e(action('CollegeController@edit', $college['id'])); ?>" class="btn btn-warning">Edit</a></td>
        <td>
          <form action="<?php echo e(action('CollegeController@destroy', $college['id'])); ?>" method="post">
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