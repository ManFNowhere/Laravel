<div class="m-4 ">
    <a href="<?php echo e($d->url); ?>" target="_blank" rel="noopener noreferrer" >
        <div class="p-1 rounded m-2 hover:bg-gradient-to-b from-yellow-500 to-black ">
            <div class="bg-gray-700 p-5 rounded w-60 text-center h-fit">
                <h1 class="text-white text-2xl font-bold font-pop"><?php echo e($d->title); ?></h1>
                <div class="text-white text-6xl my-5"><i class="fa-brands fa-<?php echo e($d->type); ?>"></i></div>
            </div>
        </div>
    </a>
</div><?php /**PATH /var/www/html/resources/views/partials/card.blade.php ENDPATH**/ ?>