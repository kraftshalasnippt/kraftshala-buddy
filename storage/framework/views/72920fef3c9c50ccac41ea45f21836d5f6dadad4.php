

<?php $__env->startSection('content'); ?>
<div class="container">
<?php if(session('status')): ?>
   <div class="alert alert-success">
        <?php echo e(session('status')); ?>

    </div>
<?php endif; ?>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add New User</div>
                <div class="panel-body">
                    <form enctype="multipart/form-data" class="form-horizontal" method="POST" action="<?php echo e(url('appuser')); ?>">
                        <?php echo e(csrf_field()); ?>


                        <input type="hidden" name="collegeid" value="<?php echo e($college->id); ?>" />

                        <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>" required autofocus>

                                <?php if($errors->has('name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="disabledSelect" class="col-md-4 control-label">College</label>
                            <div class="col-md-6">
                                <select id="disabledSelect" class="form-control" name="college">
                                    <option value="<?php echo e($college->name); ?>" selected><?php echo e($college->name); ?></option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="year_of_graduation" class="col-md-4 control-label">Year of Graduation</label>

                            <div class="col-md-6">
                                <input id="year_of_graduation" type="text" class="form-control" name="year_of_graduation" required autofocus>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required>

                                <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                <?php if($errors->has('password')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="status" class="col-md-4 control-label">Status</label>
                            <div class="col-md-6">
                                <label class="radio-inline"><input style="width:1.2em;height:1.2em;" type="radio" id="status" class="form-control" name="status" value="Student" required>Student</label>
                                <label class="radio-inline"><input style="width:1.2em;height:1.2em;" type="radio" id="status" class="form-control" name="status" value="Alumni" required>Alumni</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Add User
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>