<?php $__env->startSection('page-title'); ?>
    <div class="row bg-title">
        <!-- .page title -->
        <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title"><i class="<?php echo e($pageIcon); ?>"></i> <?php echo e(__($pageTitle)); ?> #<?php echo e($project->id); ?> - <span class="font-bold"><?php echo e(ucwords($project->project_name)); ?></span></h4>
        </div>
        <!-- /.page title -->
        <!-- .breadcrumb -->
        <div class="col-lg-6 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="<?php echo e(route('member.dashboard')); ?>"><?php echo app('translator')->getFromJson('app.menu.home'); ?></a></li>
                <li><a href="<?php echo e(route('member.projects.index')); ?>"><?php echo e(__($pageTitle)); ?></a></li>
                <li class="active"><?php echo app('translator')->getFromJson('modules.projects.overview'); ?></li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('head-script'); ?>
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/icheck/skins/all.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/custom-select/custom-select.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/bootstrap-select/bootstrap-select.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/multiselect/css/multi-select.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-12">

            <section>
                <div class="sttabs tabs-style-line">
                    <div class="white-box">
                        <nav>
                            <ul>
                                <li class="tab-current"><a href="<?php echo e(route('member.projects.show', $project->id)); ?>"><span><?php echo app('translator')->getFromJson('modules.projects.overview'); ?></span></a>
                                </li>

                                <?php if(in_array('employees',$modules)): ?>
                                <li><a href="<?php echo e(route('member.project-members.show', $project->id)); ?>"><span><?php echo app('translator')->getFromJson('modules.projects.members'); ?></span></a></li>
                                <?php endif; ?>

                                <?php if(in_array('tasks',$modules)): ?>
                                <li><a href="<?php echo e(route('member.tasks.show', $project->id)); ?>"><span><?php echo app('translator')->getFromJson('app.menu.tasks'); ?></span></a></li>
                                <?php endif; ?>

                                <li><a href="<?php echo e(route('member.files.show', $project->id)); ?>"><span><?php echo app('translator')->getFromJson('modules.projects.files'); ?></span></a></li>
                                <?php if(in_array('timelogs',$modules)): ?>
                                <li><a href="<?php echo e(route('member.time-log.show-log', $project->id)); ?>"><span><?php echo app('translator')->getFromJson('app.menu.timeLogs'); ?></span></a></li>
                                <?php endif; ?>
                            </ul>
                        </nav>
                    </div>
                    <div class="content-wrap">
                        <section id="section-line-1" class="show">
                            <div class="row">

                                <div  <?php if($project->isProjectAdmin || $user->can('edit_projects')): ?> class="col-md-6" <?php else: ?> class="col-md-12" <?php endif; ?>>
                                    <div class="white-box">
                                        <h3 class="b-b">Project #<?php echo e($project->id); ?> - <span
                                                    class="font-bold"><?php echo e(ucwords($project->project_name)); ?></span>
                                            <?php if($project->isProjectAdmin || $user->can('edit_projects')): ?>
                                              <a href="<?php echo e(route('member.projects.edit', $project->id)); ?>" class="pull-right btn btn-info btn-outline btn-rounded btn-xs" style="font-size: small"><i class="icon-note"></i> <?php echo app('translator')->getFromJson('app.edit'); ?></a>
                                            <?php endif; ?>
                                        </h3>

                                        <div><?php echo $project->project_summary; ?></div>
                                    </div>
                                </div>

                                <?php if($project->isProjectAdmin || $user->can('edit_projects')): ?>
                                    <div class="col-md-6">
                                    <div class="white-box">
                                        <h3 class="box-title b-b"><i class="fa fa-clock-o"></i> <?php echo app('translator')->getFromJson('modules.projects.activeTimers'); ?></h3>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th><?php echo app('translator')->getFromJson('modules.projects.whoWorking'); ?></th>
                                                    <th><?php echo app('translator')->getFromJson('modules.projects.activeSince'); ?></th>
                                                    <th>&nbsp;</th>
                                                </tr>
                                                </thead>
                                                <tbody id="timer-list">
                                                <?php $__empty_1 = true; $__currentLoopData = $activeTimers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$time): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                    <tr>
                                                        <td><?php echo e($key+1); ?></td>
                                                        <td><?php echo e(ucwords($time->user->name)); ?></td>
                                                        <td class="font-bold timer"><?php echo e($time->duration); ?></td>
                                                        <td><a href="javascript:;" data-time-id="<?php echo e($time->id); ?>" class="label label-danger stop-timer"><?php echo app('translator')->getFromJson('app.stop'); ?></a></td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                    <tr>
                                                        <td colspan="3"><?php echo app('translator')->getFromJson('messages.noActiveTimer'); ?></td>
                                                    </tr>
                                                <?php endif; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>


                            </div>

                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-sm-12">
                                    <div class="white-box">
                                        <div class="row row-in">
                                            <?php if(in_array('tasks',$modules)): ?>
                                            <div class="col-lg-3 col-sm-6 row-in-br">
                                                <div class="col-in row">
                                                    <div class="col-md-6 col-sm-6 col-xs-6"><i class="ti-layout-list-thumb"></i>
                                                        <h5 class="text-muted vb"><?php echo app('translator')->getFromJson('modules.projects.openTasks'); ?></h5>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                                        <h3 class="counter text-right m-t-15 text-danger"><?php echo e(count($openTasks)); ?></h3>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-danger"
                                                                 role="progressbar" aria-valuenow="40" aria-valuemin="0"
                                                                 aria-valuemax="100" style="width: <?php echo e($openTasksPercent); ?>%"><span
                                                                        class="sr-only"><?php echo e($openTasksPercent); ?>% Complete (success)</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endif; ?>
                                            <div class="col-lg-3 col-sm-6 row-in-br  b-r-none">
                                                <div class="col-in row">
                                                    <div class="col-md-6 col-sm-6 col-xs-6"><i
                                                                class="ti-calendar"></i>
                                                        <h5 class="text-muted vb"><?php echo app('translator')->getFromJson('modules.projects.daysLeft'); ?></h5>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                                        <h3 class="counter text-right m-t-15 text-info"><?php echo e($daysLeft); ?></h3>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-info"
                                                                 role="progressbar" aria-valuenow="40" aria-valuemin="0"
                                                                 aria-valuemax="100" style="width: <?php echo e($daysLeftPercent); ?>%"><span
                                                                        class="sr-only"><?php echo e($daysLeftPercent); ?>% Complete (success)</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php if(in_array('timelogs',$modules)): ?>
                                            <div class="col-lg-3 col-sm-6 row-in-br">
                                                <div class="col-in row">
                                                    <div class="col-md-6 col-sm-6 col-xs-6"><i class="ti-alarm-clock"></i>
                                                        <h5 class="text-muted vb"><?php echo app('translator')->getFromJson('modules.projects.hoursLogged'); ?></h5>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                                        <h3 class="counter text-right m-t-15 text-success"><?php echo e(floor($hoursLogged)); ?></h3>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-success"
                                                                 role="progressbar" aria-valuenow="40" aria-valuemin="0"
                                                                 aria-valuemax="100" style="width: 100%"><span
                                                                        class="sr-only">100% Complete (success)</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endif; ?>
                                            <div class="col-lg-3 col-sm-6  b-0">
                                                <div class="col-in row">
                                                    <div class="col-md-6 col-sm-6 col-xs-6"><i class="ti-alert"></i>
                                                        <h5 class="text-muted vb"><?php echo app('translator')->getFromJson('app.completion'); ?></h5>
                                                    </div>
                                                    <?php if($project->completion_percent < 50): ?>
                                                        <?php $statusColor = 'danger'; ?>
                                                    <?php elseif($project->completion_percent >= 50 && $project->completion_percent < 75): ?>
                                                        <?php $statusColor = 'warning'; ?>
                                                    <?php else: ?>
                                                        <?php $statusColor = 'success'; ?>
                                                    <?php endif; ?>
                                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                                        <h3 class="counter text-right m-t-15 text-<?php echo e($statusColor); ?>"><?php echo e($project->completion_percent); ?>%</h3>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 col-xs-12">

                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-<?php echo e($statusColor); ?>"
                                                                 role="progressbar" aria-valuenow="40" aria-valuemin="0"
                                                                 aria-valuemax="100" style="width: <?php echo e($project->completion_percent); ?>%"><span
                                                                        class="sr-only"><?php echo e($project->completion_percent); ?>% Complete (success)</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-9">
                                    <div class="row">

                                        <?php if($user->can('view_clients')): ?>
                                        
                                        <div class="col-md-6">
                                            <div class="panel panel-default">
                                                <div class="panel-heading"><?php echo app('translator')->getFromJson('modules.client.clientDetails'); ?></div>
                                                <div class="panel-wrapper collapse in">
                                                    <div class="panel-body">
                                                        <?php if(!is_null($project->client)): ?>
                                                            <?php if(count($project->client->client) > 0): ?>
                                                        <dl>
                                                            <dt><?php echo app('translator')->getFromJson('modules.client.companyName'); ?></dt>
                                                            <dd class="m-b-10"><?php echo e($project->client->client[0]->company_name); ?></dd>

                                                        </dl>
                                                            <?php endif; ?>
                                                        <dl>
                                                            <dt><?php echo app('translator')->getFromJson('modules.client.clientName'); ?></dt>
                                                            <dd class="m-b-10"><?php echo e(ucwords($project->client->name)); ?></dd>
                                                        </dl>
                                                            
                                                        <?php else: ?>
                                                            <?php echo app('translator')->getFromJson('messages.noClientAddedToProject'); ?>
                                                        <?php endif; ?>

                                                            
                                                            <?php if(isset($fields)): ?>
                                                                <dl>
                                                                    <?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <dt><?php echo e(ucfirst($field->label)); ?></dt>
                                                                        <dd class="m-b-10">
                                                                            <?php if( $field->type == 'text'): ?>
                                                                                <?php echo e(isset($project->custom_fields_data['field_'.$field->id]) ? $project->custom_fields_data['field_'.$field->id] : '-'); ?>

                                                                            <?php elseif($field->type == 'password'): ?>
                                                                                <?php echo e(isset($project->custom_fields_data['field_'.$field->id]) ? $project->custom_fields_data['field_'.$field->id] : '-'); ?>

                                                                            <?php elseif($field->type == 'number'): ?>
                                                                                <?php echo e(isset($project->custom_fields_data['field_'.$field->id]) ? $project->custom_fields_data['field_'.$field->id] : '-'); ?>


                                                                            <?php elseif($field->type == 'textarea'): ?>
                                                                                <?php echo e(isset($project->custom_fields_data['field_'.$field->id]) ? $project->custom_fields_data['field_'.$field->id] : '-'); ?>

                                                                            <?php elseif($field->type == 'radio'): ?>
                                                                                <?php echo e(!is_null($project->custom_fields_data['field_'.$field->id]) ? $project->custom_fields_data['field_'.$field->id] : '-'); ?>

                                                                            <?php elseif($field->type == 'select'): ?>
                                                                                <?php echo e((!is_null($project->custom_fields_data['field_'.$field->id]) && $project->custom_fields_data['field_'.$field->id] != '') ? $field->values[$project->custom_fields_data['field_'.$field->id]] : '-'); ?>

                                                                            <?php elseif($field->type == 'checkbox'): ?>
                                                                                <?php echo e(!is_null($project->custom_fields_data['field_'.$field->id]) ? $field->values[$project->custom_fields_data['field_'.$field->id]] : '-'); ?>

                                                                            <?php elseif($field->type == 'date'): ?>
                                                                                <?php echo e(isset($project->dob)?Carbon\Carbon::parse($project->dob)->format('Y-m-d'):Carbon\Carbon::now()->format('m/d/Y')); ?>

                                                                            <?php endif; ?>
                                                                        </dd>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </dl>
                                                            <?php endif; ?>

                                                            
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endif; ?>

                                        
                                        <div class="col-md-6">
                                            <div class="panel panel-default">
                                                <div class="panel-heading"><?php echo app('translator')->getFromJson('modules.projects.members'); ?></div>
                                                <div class="panel-wrapper collapse in">
                                                    <div class="panel-body">
                                                        <div class="message-center">
                                                            <?php $__empty_1 = true; $__currentLoopData = $project->members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                            <a href="#">
                                                                <div class="user-img">
                                                                    <?php echo ($member->user->image) ? '<img src="'.asset('user-uploads/avatar/'.$member->user->image).'"
                                                            alt="user" class="img-circle" width="40" height="40">' : '<img src="'.asset('default-profile-2.png').'"
                                                            alt="user" class="img-circle" width="40" height="40">'; ?>

                                                                </div>
                                                                <div class="mail-contnet">
                                                                    <h5><?php echo e(ucwords($member->user->name)); ?></h5>
                                                                    <span class="mail-desc"><?php echo e($member->user->email); ?></span>
                                                                </div>
                                                            </a>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                                <?php echo app('translator')->getFromJson('messages.noMemberAddedToProject'); ?>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        
                                        <div class="col-md-6">
                                            <div class="panel panel-default">
                                                <div class="panel-heading"><?php echo app('translator')->getFromJson('modules.projects.openTasks'); ?></div>
                                                <div class="panel-wrapper collapse in">
                                                    <div class="panel-body">
                                                        <ul class="list-task list-group" data-role="tasklist">
                                                            <?php $__empty_1 = true; $__currentLoopData = $openTasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                            <li class="list-group-item" data-role="task">
                                                                <?php echo e(($key+1).'. '.ucfirst($task->heading)); ?> <label
                                                                        class="label label-success pull-right"><?php echo e($task->due_date->format('d M')); ?></label>
                                                            </li>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                                <li class="list-group-item" data-role="task">
                                                                    <?php echo app('translator')->getFromJson('modules.projects.noOpenTasks'); ?>
                                                                </li>
                                                            <?php endif; ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        
                                        <div class="col-md-6">
                                            <div class="panel panel-default">
                                                <div class="panel-heading"><?php echo app('translator')->getFromJson('modules.projects.files'); ?></div>
                                                <div class="panel-wrapper collapse in">
                                                    <div class="panel-body">
                                                        <ul class="list-task list-group" data-role="tasklist">
                                                            <?php $__empty_1 = true; $__currentLoopData = $recentFiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                                <li class="list-group-item" data-role="task">
                                                                   <?php echo e(($key+1)); ?>. <?php echo e($file->filename); ?> <a target="_blank" href="<?php echo e(asset('user-uploads/project-files/'.$project->id.'/'.$file->hashname)); ?>" class="btn btn-info btn-circle"><i class="fa fa-search"></i></a>
                                                                </li>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                                <li class="list-group-item" data-role="task">
                                                                    <?php echo app('translator')->getFromJson('messages.noFileUploaded'); ?>
                                                                </li>
                                                            <?php endif; ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                
                                <div class="col-md-3" id="project-timeline">
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><?php echo app('translator')->getFromJson('modules.projects.activityTimeline'); ?></div>
                                        <div class="panel-wrapper collapse in">
                                            <div class="panel-body">
                                                <div class="steamline">
                                                    <?php $__currentLoopData = $activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activ): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="sl-item">
                                                        <div class="sl-left"><i class="fa fa-circle text-info"></i>
                                                        </div>
                                                        <div class="sl-right">
                                                            <div><?php echo e($activ->activity); ?> <span class="sl-date"><?php echo e($activ->created_at->diffForHumans()); ?></span></div>
                                                        </div>
                                                    </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div><!-- /content -->
                </div><!-- /tabs -->
            </section>
        </div>


    </div>
    <!-- .row -->

<?php $__env->stopSection(); ?>

<?php $__env->startPush('footer-script'); ?>
<script src="<?php echo e(asset('js/cbpFWTabs.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bower_components/custom-select/custom-select.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bower_components/bootstrap-select/bootstrap-select.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bower_components/multiselect/js/jquery.multi-select.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js')); ?>"></script>
<script type="text/javascript">
//    (function () {
//
//        [].slice.call(document.querySelectorAll('.sttabs')).forEach(function (el) {
//            new CBPFWTabs(el);
//        });
//
//    })();

    $('#timer-list').on('click', '.stop-timer', function () {
       var id = $(this).data('time-id');
        var url = '<?php echo e(route('admin.time-logs.stopTimer', ':id')); ?>';
        url = url.replace(':id', id);
        var token = '<?php echo e(csrf_token()); ?>'
        $.easyAjax({
            url: url,
            type: "POST",
            data: {timeId: id, _token: token},
            success: function (data) {
                $('#timer-list').html(data.html);
            }
        })

    });

</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.member-app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>