<?php $__env->startSection('container'); ?>
<div class="flex flex-col items-center">
    <h1 class="text-2xl text-gray-300 font-bold font-pop">Projects</h1>
    <hr class="w-48 font-bold bg-yellow-500 h-1 border-0 rounded">
    <div class="flex flex-row flex-wrap justify-evenly w-full my-10">
       <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo $__env->make('partials.card', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/projects/index.blade.php ENDPATH**/ ?>