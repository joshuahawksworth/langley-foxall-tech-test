<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e(__('Dashboard')); ?></div>
                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    <?php echo e(__('You are logged in!')); ?>

                 
                </div>
            </div>

            <br>
            
            <form action="home" method="POST">
            <?php echo csrf_field(); ?>
                <div class="card">
                    <div class="card-body">
                        <label>Your current prefered location: <?php echo e($preferred_location); ?></label>
                    </div>
                    <div  class="card-body">
                        <label>Change prefered location:</label>
                        <input type="text" id="preferred_location" name="preferred_location">
                        <input type="submit" value="Submit">
                    </div>
                </div>
            </form>

            <br>

            <a href="/weather" class="btn btn-primary"> View the weather for your prefered location</a>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/weather/resources/views/home.blade.php ENDPATH**/ ?>