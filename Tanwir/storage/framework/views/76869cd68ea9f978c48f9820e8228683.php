<?php $__env->startSection('container'); ?>


<div class="flex flex-row justify-center my-4" role="banner">
    <h1 class="text-white text-2xl font-bold">Learn Accessibility component</h1>
</div>

<div class="flex flex-row justify-evenly items-center" role="main">
    <!-- navbar -->
    <div class="m-4" role="region">
        <a href="<?php echo e(route('navbar.accessibility')); ?>" aria-label="Navbar component" >
            <div class="p-1 rounded m-2 hover:bg-gradient-to-b from-yellow-500 to-black ">
                <div class="bg-gray-700 p-5 rounded w-30 text-center min-w-40 ">
                    <h1 class="text-white text-2xl font-bold font-pop">Navbar</h1>
                </div>
            </div>
        </a>
    </div>

    <!-- form -->
    <div class="m-4" role="region">
        <a href="<?php echo e(route('form.accessibility')); ?>" aria-label="form component" >
            <div class="p-1 rounded m-2 hover:bg-gradient-to-b from-yellow-500 to-black ">
                <div class="bg-gray-700 p-5 rounded w-30 text-center min-w-40 ">
                    <h1 class="text-white text-2xl font-bold font-pop">Form</h1>
                </div>
            </div>
        </a>
    </div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/accessibility/index.blade.php ENDPATH**/ ?>