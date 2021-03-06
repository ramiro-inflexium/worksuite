<?php $__env->startSection('page-title'); ?>
    <div class="row bg-title">
        <!-- .page title -->
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title"><i class="<?php echo e($pageIcon); ?>"></i> <?php echo e($pageTitle); ?></h4>
        </div>
        <!-- /.page title -->
        <!-- .breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="<?php echo e(route('super-admin.dashboard')); ?>"><?php echo app('translator')->getFromJson('app.menu.home'); ?></a></li>
                <li><a href="<?php echo e(route('admin.clients.index')); ?>"><?php echo e($pageTitle); ?></a></li>
                <li class="active"><?php echo app('translator')->getFromJson('app.addNew'); ?></li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('head-script'); ?>
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css')); ?>">
    <style>
        .m-b-10{
            margin-bottom: 10px;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-inverse">
                <div class="panel-heading"> Add Package Info</div>
                <div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">
                        <?php echo Form::open(['id'=>'createClient','class'=>'ajax-form','method'=>'POST']); ?>

                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Name</label>
                                            <input type="text" id="name" name="name" value="" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Max Employees</label>
                                            <input type="number" name="max_employees" id="max_employees" value=""  class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Annual Price ($)</label>
                                            <input type="number" name="annual_price" id="annual_price" value=""  class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class="form-group">
                                            <label>Monthly Price ($)</label>
                                            <input type="number" name="monthly_price" id="monthly_price"  value=""   class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Stripe Annual Plan ID</label>
                                            <input type="text" id="stripe_annual_plan_id" name="stripe_annual_plan_id" value="" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Stripe Monthly Plan ID</label>
                                            <input type="text" name="stripe_monthly_plan_id" id="stripe_monthly_plan_id" value=""  class="form-control">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Max Storage Size (MB)</label>
                                            <input type="number" id="max_storage_size" name="max_storage_size" value="" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class="form-group">
                                            <label>Max File Size (MB)</label>
                                            <input type="number" name="max_file_size" id="max_file_size"  value=""   class="form-control">
                                        </div>
                                    </div>
                                </div>



                                <div class="row">
                                    <div class="col-md-6 ">
                                        <div class="form-group">
                                            <label>Billing Cycle</label>
                                            <input type="number" name="billing_cycle" id="billing_cycle"  value=""   class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class="form-group">
                                            <label>Sort</label>
                                            <input type="text" name="sort" id="sort"  value=""   class="form-control">
                                        </div>
                                    </div>

                                </div>

                                <h3 class="box-title">Select Modules</h3>
                                <hr>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="row form-group module-in-package">
                                            <?php $__currentLoopData = $modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="col-md-2">
                                                    <div class="checkbox checkbox-inline checkbox-info m-b-10">
                                                        <input id="<?php echo e($module->module_name); ?>" name="module_in_package[<?php echo e($module->id); ?>]" value="<?php echo e($module->module_name); ?>"
                                                               type="checkbox">
                                                        <label for="<?php echo e($module->module_name); ?>"><?php echo e(ucfirst($module->module_name)); ?></label>
                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label class="control-label">Description</label>
                                            <textarea name="description"  id="description"  rows="5" value="" class="form-control"></textarea>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="form-actions">
                                <button type="submit" id="save-form" class="btn btn-success"> <i class="fa fa-check"></i> <?php echo app('translator')->getFromJson('app.save'); ?></button>
                                <button type="reset" class="btn btn-default"><?php echo app('translator')->getFromJson('app.reset'); ?></button>
                            </div>
                        <?php echo Form::close(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>    <!-- .row -->

<?php $__env->stopSection(); ?>

<?php $__env->startPush('footer-script'); ?>
<script src="<?php echo e(asset('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js')); ?>"></script>

<script>
    $('#save-form').click(function () {
        $.easyAjax({
            url: '<?php echo e(route('super-admin.packages.store')); ?>',
            container: '#createClient',
            type: "POST",
            redirect: true,
            data: $('#createClient').serialize()
        })
    });
</script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.super-admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>