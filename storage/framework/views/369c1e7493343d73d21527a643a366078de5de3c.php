<?php $__env->startSection('content'); ?>
<style>
.card-body label{
    width: 50%;
    margin-bottom: 0px;
}
.card-body{
    padding: 0.5rem 0px 0px 0px
}
.card-body div.gray{
    background-color: lightgray;
}
.card-body div{
    display: flex;
    padding: 5px 1.25rem;
    align-items: center;
}
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center h4 font-weight-bold"><?php echo e(ucfirst($days_week)); ?>'s <?php echo e(__(' Weather')); ?></div>
                    <div class="card-body  justify-content-center">
                        <div class="h5 text-center justify-content-center font-weight-bold">
                            <?php echo e(ucwords($response["daily"][$id]["weather"][0]["description"])); ?>

                        </div>
                        <div class="gray">
                            <label>Min Temp: </label> <b><?php echo e(round ($response["daily"][$id]["temp"]["min"])); ?>°C</b>
                        </div>
                        <div>
                            <label>Max Temp: </label><b><?php echo e(round ($response["daily"][$id]["temp"]["max"])); ?>°C</b>
                        </div>
                        <div class="gray">
                            <label>Day Temp: </label><b><?php echo e(round ($response["daily"][$id]["temp"]["day"])); ?>°C</b>
                        </div>
                        <div>
                            <label>Night Temp: </label><b><?php echo e(round ($response["daily"][$id]["temp"]["night"])); ?>°C</b>
                        </div>
                        <div class="gray">
                            <label>Pressure: </label><b><?php echo e($response["daily"][$id]["pressure"]); ?> hPa</b>
                        </div>
                        <div>
                            <label>Humidity: </label><b><?php echo e($response["daily"][$id]["humidity"]); ?>%</b>
                        </div>
                        <div class="gray">
                            <label>Wind Speed: </label><b><?php echo e(round ($response["daily"][$id]["wind_speed"])); ?> mph</b>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/weather/resources/views/day.blade.php ENDPATH**/ ?>