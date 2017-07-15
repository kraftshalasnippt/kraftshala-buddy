

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Details</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="<?php echo e(action('CollegeController@update', $id)); ?>">
                        <?php echo e(csrf_field()); ?>

                        <input name="_method" type="hidden" value="PATCH">

                        <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                            <label for="name" class="col-md-4 control-label">College Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>"  autofocus>

                                <?php if($errors->has('name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="city" class="col-md-4 control-label">City</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control" name="city"  autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="state" class="col-md-4 control-label">State</label>

                            <div class="col-md-6">
                                <input id="state" type="text" class="form-control" name="state"  autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description" class="col-md-4 control-label">Description</label>

                            <div class="col-md-6">
                                <textarea id="description" rows="3" class="form-control" name="description"  autofocus></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="active" class="col-md-4 control-label">Active</label>
                            <div class="col-md-6">
                                <label class="radio-inline"><input style="width:1.2em;height:1.2em;" type="radio" id="active" class="form-control" name="active" value="true" >True</label>
                                <label class="radio-inline"><input style="width:1.2em;height:1.2em;" type="radio" id="active" class="form-control" name="active" value="false" >False</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="website" class="col-md-4 control-label">Website</label>

                            <div class="col-md-6">
                                <input id="website" type="text" class="form-control" name="website"  autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email_domain" class="col-md-4 control-label">Email_Domain</label>

                            <div class="col-md-6">
                                <input id="email_domain" type="text" class="form-control" name="email_domain"  autofocus>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update College Details
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