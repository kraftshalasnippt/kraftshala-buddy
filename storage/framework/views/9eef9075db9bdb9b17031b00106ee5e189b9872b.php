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
        <th>City</th>
        <th>State</th>
        <th>Student Name</th>
        <th>Email</th>
        <th>Phone</th>
      </tr>
    </thead>
    <tbody>
      <?php $__currentLoopData = $colleges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <td><?php echo e($user->id); ?></td>
        <td><?php echo e($user->name); ?></td>
        <td><?php echo e($user->city); ?></td>
        <td><?php echo e($user->state); ?></td>
        <td><?php echo e($user->student_name); ?></td>
        <td><?php echo e($user->email); ?></td>
        <td><?php echo e($user->mobile); ?></td>
        <td>
          <form action="<?php echo e(action('CollegeController@destroynew', $user->id)); ?>" method="post">
            <?php echo e(csrf_field()); ?>

            <button id="delete" class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
  </table>
  </div>
<?php $__env->stopSection(); ?>

<script type="text/javascript">
    $(document).ready(function () {  
      $("#delete").on("click", function(){
          return confirm("Do you want to delete this item?");
      });
    });
</script>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>