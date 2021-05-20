<?php $__env->startSection('content'); ?>
<style>
a.days{
    text-decoration: unset;
    color: black;
}
a.days .card:hover{
    margin-top: -5px;
}
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <?php if($location_found == true): ?>
                <div class="card">
                    <div class="card-header"><?php echo e(__('7 Weather Day Forcast ' . $message)); ?></div>
                        <div class="card-body d-flex flex-wrap justify-content-center">
                        <?php for($x = 0; $x <= 6; $x++): ?>
                            <div class="col-md-3">
                                <a class="days" href="/weather/<?php echo e(strtolower($days_week[$x])); ?>/<?php echo e($x); ?>">
                                    <div class="card">
                                        <div class="card-header text-center h4 font-weight-bold">
                                            <?php echo e(__(ucwords($days_week[$x]))); ?>

                                        </div>
                                        <div class="card-body ">
                                            <div class="h5 text-center">
                                                <?php echo e(ucwords($response["daily"][$x]["weather"][0]["description"])); ?>

                                            </div>
                                            <hr>
                                            <label>Min Temp: <b><?php echo e(round ($response["daily"][$x]["temp"]["min"])); ?>°C</b></label>
                                            <br>
                                            <label>Max Temp: <b><?php echo e(round ($response["daily"][$x]["temp"]["max"])); ?>°C</b></label>
                                            <br>
                                        </div>
                                    </div>
                                </a>
                                <br>
                            </div>
                        <?php endfor; ?>
                    </div>
                </div>
            <?php elseif($location_found == false): ?>
                <div class="card">
                    <div class="card-header"><?php echo e(__($message)); ?></div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/weather/resources/views/weather.blade.php ENDPATH**/ ?>