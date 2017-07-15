<?php $__env->startSection('content'); ?>
<div class="container">
                <?php if(Auth::user()->role == 'Admin'): ?>
                    <h3>Admin Panel</h3>
                    <a href="/admin_user">Admin/CL user table</a><br><br>
                    <a href="/college">List of Colleges</a><br><br>
                    <a href="/appuser/bannedusers">List of Banned Users</a><br><br>
                    <a href="/college/newcollege">New College Requests</a><br><br>
                <?php else: ?>
                    
                <?php endif; ?>
               
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>