<?php $__env->startSection('page-title'); ?>
    <div class="row bg-title">
        <!-- .page title -->
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title"><i class="<?php echo e($pageIcon); ?>"></i> <?php echo e(__($pageTitle)); ?></h4>
        </div>
        <!-- /.page title -->
        <!-- .breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="<?php echo e(route('admin.dashboard')); ?>"><?php echo app('translator')->getFromJson('app.menu.home'); ?></a></li>
                <li class="active"><?php echo e(__($pageTitle)); ?></li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('head-script'); ?>
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/custom-select/custom-select.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/bootstrap-select/bootstrap-select.min.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-inverse">
                <div class="panel-heading"><?php echo app('translator')->getFromJson('modules.accountSettings.updateTitle'); ?></div>

                <div class="vtabs customvtab m-t-10">

                    <?php echo $__env->make('sections.admin_setting_menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                    <div class="tab-content">
                        <div id="vhome3" class="tab-pane active">
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <?php echo Form::open(['id'=>'editSettings','class'=>'ajax-form','method'=>'PUT']); ?>

                                    <div class="form-group">
                                        <label for="company_name"><?php echo app('translator')->getFromJson('modules.accountSettings.companyName'); ?></label>
                                        <input type="text" class="form-control" id="company_name" name="company_name"
                                               value="<?php echo e($global->company_name); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="company_email"><?php echo app('translator')->getFromJson('modules.accountSettings.companyEmail'); ?></label>
                                        <input type="email" class="form-control" id="company_email" name="company_email"
                                               value="<?php echo e($global->company_email); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="company_phone"><?php echo app('translator')->getFromJson('modules.accountSettings.companyPhone'); ?></label>
                                        <input type="tel" class="form-control" id="company_phone" name="company_phone"
                                               value="<?php echo e($global->company_phone); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1"><?php echo app('translator')->getFromJson('modules.accountSettings.companyWebsite'); ?></label>
                                        <input type="text" class="form-control" id="website" name="website"
                                               value="<?php echo e($global->website); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1"><?php echo app('translator')->getFromJson('modules.accountSettings.companyLogo'); ?></label>

                                        <div class="col-md-12">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail"
                                                     style="width: 200px; height: 150px;">
                                                    <?php if(is_null($global->logo)): ?>
                                                        <img src="https://placeholdit.imgix.net/~text?txtsize=25&txt=<?php echo app('translator')->getFromJson('modules.accountSettings.uploadLogo'); ?>&w=200&h=150"
                                                             alt=""/>
                                                    <?php else: ?>
                                                        <img src="<?php echo e(asset('user-uploads/app-logo/'.$global->logo)); ?>"
                                                             alt=""/>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail"
                                                     style="max-width: 200px; max-height: 150px;"></div>
                                                <div>
                                <span class="btn btn-info btn-file">
                                    <span class="fileinput-new"> <?php echo app('translator')->getFromJson('app.selectImage'); ?> </span>
                                    <span class="fileinput-exists"> <?php echo app('translator')->getFromJson('app.change'); ?> </span>
                                    <input type="file" name="logo" id="logo"> </span>
                                                    <a href="javascript:;" class="btn btn-danger fileinput-exists"
                                                       data-dismiss="fileinput"> <?php echo app('translator')->getFromJson('app.remove'); ?> </a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="address"><?php echo app('translator')->getFromJson('modules.accountSettings.companyAddress'); ?></label>
                                        <textarea class="form-control" id="address" rows="5"
                                                  name="address"><?php echo e($global->address); ?></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="address"><?php echo app('translator')->getFromJson('modules.accountSettings.defaultCurrency'); ?></label>
                                        <select name="currency_id" id="currency_id" class="form-control">
                                            <?php $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option
                                                        <?php if($currency->id == $global->currency_id): ?> selected <?php endif; ?>
                                                value="<?php echo e($currency->id); ?>"><?php echo e($currency->currency_symbol.' ('.$currency->currency_code.')'); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="address"><?php echo app('translator')->getFromJson('modules.accountSettings.defaultTimezone'); ?></label>
                                        <select name="timezone" id="timezone" class="form-control select2">
                                            <?php $__currentLoopData = $timezones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php if($global->timezone == $tz): ?> selected <?php endif; ?>><?php echo e($tz); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="address"><?php echo app('translator')->getFromJson('modules.accountSettings.dateFormat'); ?></label>
                                        <select name="date_format" id="date_format" class="form-control select2">
                                            <option value="d-m-Y" <?php if($global->date_format == 'd-m-Y'): ?> selected <?php endif; ?> >d-m-Y (<?php echo e($dateObject->format('d-m-Y')); ?>) </option>
                                            <option value="m-d-Y" <?php if($global->date_format == 'm-d-Y'): ?> selected <?php endif; ?> >m-d-Y (<?php echo e($dateObject->format('m-d-Y')); ?>) </option>
                                            <option value="Y-m-d" <?php if($global->date_format == 'Y-m-d'): ?> selected <?php endif; ?> >Y-m-d (<?php echo e($dateObject->format('Y-m-d')); ?>) </option>
                                            <option value="d.m.Y" <?php if($global->date_format == 'd.m.Y'): ?> selected <?php endif; ?> >d.m.Y (<?php echo e($dateObject->format('d.m.Y')); ?>) </option>
                                            <option value="m.d.Y" <?php if($global->date_format == 'm.d.Y'): ?> selected <?php endif; ?> >m.d.Y (<?php echo e($dateObject->format('m.d.Y')); ?>) </option>
                                            <option value="Y.m.d" <?php if($global->date_format == 'Y.m.d'): ?> selected <?php endif; ?> >Y.m.d (<?php echo e($dateObject->format('Y.m.d')); ?>) </option>
                                            <option value="d/m/Y" <?php if($global->date_format == 'd/m/Y'): ?> selected <?php endif; ?> >d/m/Y (<?php echo e($dateObject->format('d/m/Y')); ?>) </option>
                                            <option value="m/d/Y" <?php if($global->date_format == 'm/d/Y'): ?> selected <?php endif; ?> >m/d/Y (<?php echo e($dateObject->format('m/d/Y')); ?>) </option>
                                            <option value="Y/m/d" <?php if($global->date_format == 'Y/m/d'): ?> selected <?php endif; ?> >Y/m/d (<?php echo e($dateObject->format('Y/m/d')); ?>) </option>
                                            <option value="d-M-Y" <?php if($global->date_format == 'd-M-Y'): ?> selected <?php endif; ?> >d-M-Y (<?php echo e($dateObject->format('d-M-Y')); ?>) </option>
                                            <option value="d/M/Y" <?php if($global->date_format == 'd/M/Y'): ?> selected <?php endif; ?> >d/M/Y (<?php echo e($dateObject->format('d/M/Y')); ?>) </option>
                                            <option value="d.M.Y" <?php if($global->date_format == 'd.M.Y'): ?> selected <?php endif; ?> >d.M.Y (<?php echo e($dateObject->format('d.M.Y')); ?>) </option>
                                            <option value="d-M-Y" <?php if($global->date_format == 'd-M-Y'): ?> selected <?php endif; ?> >d-M-Y (<?php echo e($dateObject->format('d-M-Y')); ?>) </option>
                                            <option value="d M Y" <?php if($global->date_format == 'd M Y'): ?> selected <?php endif; ?> >d M Y (<?php echo e($dateObject->format('d M Y')); ?>) </option>
                                            <option value="d F, Y" <?php if($global->date_format == 'd F, Y'): ?> selected <?php endif; ?> >d F, Y (<?php echo e($dateObject->format('d F, Y')); ?>) </option>
                                            <option value="D/M/Y" <?php if($global->date_format == 'D/M/Y'): ?> selected <?php endif; ?> >D/M/Y (<?php echo e($dateObject->format('D/M/Y')); ?>) </option>
                                            <option value="D.M.Y" <?php if($global->date_format == 'D.M.Y'): ?> selected <?php endif; ?> >D.M.Y (<?php echo e($dateObject->format('D.M.Y')); ?>) </option>
                                            <option value="D-M-Y" <?php if($global->date_format == 'D-M-Y'): ?> selected <?php endif; ?> >D-M-Y (<?php echo e($dateObject->format('D-M-Y')); ?>) </option>
                                            <option value="D M Y" <?php if($global->date_format == 'D M Y'): ?> selected <?php endif; ?> >D M Y (<?php echo e($dateObject->format('D M Y')); ?>) </option>
                                            <option value="d D M Y" <?php if($global->date_format == 'd D M Y'): ?> selected <?php endif; ?> >d D M Y (<?php echo e($dateObject->format('d D M Y')); ?>) </option>
                                            <option value="D d M Y" <?php if($global->date_format == 'D d M Y'): ?> selected <?php endif; ?> >D d M Y (<?php echo e($dateObject->format('D d M Y')); ?>) </option>
                                            <option value="dS M Y" <?php if($global->date_format == 'dS M Y'): ?> selected <?php endif; ?> >dS M Y (<?php echo e($dateObject->format('dS M Y')); ?>) </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="address"><?php echo app('translator')->getFromJson('modules.accountSettings.timeFormat'); ?></label>
                                        <select name="time_format" id="time_format" class="form-control select2">
                                            <option value="h:i A" <?php if($global->time_format == 'H:i A'): ?> selected <?php endif; ?> >12 Hour  (6:20 PM) </option>
                                            <option value="h:i a" <?php if($global->time_format == 'H:i a'): ?> selected <?php endif; ?> >12 Hour  (6:20 pm) </option>
                                            <option value="H:i" <?php if($global->time_format == 'H:i'): ?> selected <?php endif; ?> >24 Hour  (18:20) </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="address"><?php echo app('translator')->getFromJson('modules.accountSettings.changeLanguage'); ?></label>
                                        <select name="locale" id="locale" class="form-control select2">
                                            <option <?php if($global->locale == "en"): ?> selected <?php endif; ?> value="en">English
                                            </option>
                                            <?php $__currentLoopData = $languageSettings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($language->language_code); ?>" <?php if($global->locale == $language->language_code): ?> selected <?php endif; ?> ><?php echo e($language->language_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        
                                        <label for="address"><?php echo app('translator')->getFromJson('modules.accountSettings.getLocation'); ?></label>

                                        <input type="text" class="form-control" id="gmap_geocoding_address">

                                    </div>

                                    <div class="form-group col-sm-6 col-xs-12">
                                        <label for="address"><?php echo app('translator')->getFromJson('app.latitude'); ?></label>
                                        <input type="text" id="latitude" class="form-control" name="latitude"
                                               value="<?php echo e($global->latitude); ?>" >
                                    </div>
                                    <div class="form-group col-sm-6 col-xs-12">
                                        <label for="address"><?php echo app('translator')->getFromJson('app.longitude'); ?></label>
                                        <input type="text" class="form-control"  id="longitude" name="longitude"
                                               value="<?php echo e($global->longitude); ?>" >
                                    </div>
                                    <br>
                                    <div class="col-sm-12 col-xs-12">
                                        <div class="form-group">
                                        <div id="gmap_geocoding" class="gmaps"></div>
                                        </div>
                                    </div>

                                    <button type="submit" id="save-form"
                                            class="btn btn-success waves-effect waves-light m-r-10">
                                        <?php echo app('translator')->getFromJson('app.update'); ?>
                                    </button>
                                    <button type="reset"
                                            class="btn btn-inverse waves-effect waves-light"><?php echo app('translator')->getFromJson('app.reset'); ?></button>
                                    <?php echo Form::close(); ?>

                                </div>
                            </div>

                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


    </div>
    <!-- .row -->

<?php $__env->stopSection(); ?>

<?php $__env->startPush('footer-script'); ?>
<script src="<?php echo e(asset('plugins/bower_components/custom-select/custom-select.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bower_components/bootstrap-select/bootstrap-select.min.js')); ?>"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo e($googleApiKey); ?>&libraries=places"></script>


<script>
    $(".select2").select2({
        formatNoMatches: function () {
            return "<?php echo e(__('messages.noRecordFound')); ?>";
        }
    });

    $('#save-form').click(function () {
        $.easyAjax({
            url: '<?php echo e(route('admin.settings.update', [$global->id])); ?>',
            container: '#editSettings',
            type: "POST",
            redirect: true,
            file: true
        })
    });

    $(document).ready(function () {
        $("#getLoaction").click(function () {
            $('body').block({
                message: '<p style="margin:0;padding:8px;font-size:24px;">Just a moment...</p>'
                , css: {
                    color: '#fff'
                    , border: '1px solid #fb9678'
                    , backgroundColor: '#fb9678'
                }
            });

            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                alert("Geolocation is not supported by this browser.");
                $("#locationMsg").html('');
            }
        });
    });


    function showPosition(position) {
        $('#latitude').val(position.coords.latitude);
        $('#longitude').val(position.coords.longitude);
        initialize();
        $('body').unblock();
    }

</script>

<script>
    //Get Latitude And Longitude
    var geocoder = new google.maps.Geocoder();

    function geocodePosition(pos) {
        geocoder.geocode(
                {
                    latLng: pos
                }, function (responses) {
                    if (responses && responses.length > 0) {
                        updateMarkerAddress(responses[0].formatted_address);
                    } else {
                        updateMarkerAddress('Cannot determine address at this location.');
                    }
                });
    }

    function updateMarkerStatus(str) {
        //document.getElementById('markerStatus').innerHTML = str;
    }

    function updateMarkerPosition(latLng) {
        $('#latitude').val(latLng.lat());
        $('#longitude').val(latLng.lng());
    }

    function updateMarkerAddress(str) {

        //  $('#currentlocation').val(str);

    }

    function initialize() {
        //Latitude longitude of default

        var clat = $('#latitude').val();
        var clong = $('#longitude').val();

        clat = parseFloat(clat);
        clong = parseFloat(clong);

        var latLng = new google.maps.LatLng(clat, clong);

        var mapOptions = {
            center: latLng,
            zoom: 16,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        map = new google.maps.Map(document.getElementById('gmap_geocoding'),
                mapOptions);

        var input = document.getElementById('gmap_geocoding_address');

        var autocomplete = new google.maps.places.Autocomplete(input);

        //autocomplete.bindTo('bounds', map);

        var infowindow = new google.maps.InfoWindow();
        marker = new google.maps.Marker({
            map: map,
            position: latLng,
            title: 'ReferSell',
            map: map,
            draggable: true
        });
        updateMarkerPosition(latLng);
        geocodePosition(latLng);

        // Add dragging event listeners.
        google.maps.event.addListener(marker, 'dragstart', function () {
            updateMarkerAddress('Dragging...');
        });

        google.maps.event.addListener(marker, 'drag', function () {
            updateMarkerStatus('Dragging...');
            updateMarkerPosition(marker.getPosition());
        });

        google.maps.event.addListener(marker, 'dragend', function () {

            updateMarkerStatus('Drag ended');
            geocodePosition(marker.getPosition());
        });
        google.maps.event.addListener(autocomplete, 'place_changed', function () {
            infowindow.close();
            var place = autocomplete.getPlace();

            if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
            } else {
                map.setCenter(place.geometry.location);
                map.setZoom(10);  // Why 17? Because it looks good.
            }

            /* var image = new google.maps.MarkerImage(
             place.icon,
             new google.maps.Size(71, 71),
             new google.maps.Point(0, 0),
             new google.maps.Point(17, 34),
             new google.maps.Size(35, 35));
             marker.setIcon(image);*/
            marker.setPosition(place.geometry.location);
            updateMarkerPosition(place.geometry.location);

            var address = '';

        });

        // Sets a listener on a radio button to change the filter type on Places
        // Autocomplete.
        function setupClickListener(id, types) {
            var radioButton = document.getElementById(id);
            google.maps.event.addDomListener(radioButton, 'click', function () {
                autocomplete.setTypes(types);
            });
        }

    }

    $('#gmap_geocoding_address').keydown(function (event) {
        if (event.keyCode == 13) {
            event.preventDefault();
            return false;
        }
    });


    <?php if(!is_null($global->latitude)): ?>
    initialize();
    <?php endif; ?>

</script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>