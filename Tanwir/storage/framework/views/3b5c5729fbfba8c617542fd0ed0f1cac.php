<?php $__env->startSection('container'); ?>

<div class="flex flex-col items-center bg-gray-900 p-2 rounded min-h-svh">
    <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <?php echo $__env->make('partials.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    <?php $__errorArgs = ['url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <?php echo $__env->make('partials.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    <?php $__errorArgs = ['type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <?php echo $__env->make('partials.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    <h1 class="text-xl text-white font-bold font-pop">Add project</h1>
    <?php if(count($data)>0): ?>
    <form action="/update-project" method="post" class="w-full flex flex-col items-center">
        <?php echo csrf_field(); ?>
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <div class="w-1/2 my-2">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Project title</label>
                <input value="<?php echo e($d->title); ?>" type="text" id="title" name="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-500 focus:border-yellow-500 block w-full p-2.5" placeholder="Title project" required />
            </div>
            <div class="w-1/2 my-2">
                <label for="url" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Project url</label>
                <input value="<?php echo e($d->url); ?>" type="text" id="url" name="url" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-500 focus:border-yellow-500 block w-full p-2.5" placeholder="Title url" required />
            </div>
            <div class="w-1/2 my-2">
                <label for="type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Project type</label>
                <input value="<?php echo e($d->type); ?>" type="text" id="type" name="type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-500 focus:border-yellow-500 block w-full p-2.5" placeholder="Title type" required />
            </div>
            <div class="w-1/2 my-2 hidden">
                <label for="oldSlug" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Project type</label>
                <input value="<?php echo e($d->slug); ?>" type="text" id="oldSlug" name="oldSlug" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-500 focus:border-yellow-500 block w-full p-2.5" placeholder="Title type" required />
            </div>
            
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <button type="sumbit" class="text-lg text-white font-pop bg-yellow-500 p-2 rounded hover:bg-yellow-400">Update</button>
    </form>     
    <?php else: ?>
    <form action="/store-project" method="post" class="w-full flex flex-col items-center">
    <?php echo csrf_field(); ?>
            <div class="w-1/2 my-2">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Project title</label>
                <input value="<?php echo e(old('title')); ?>" type="text" id="title" name="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-500 focus:border-yellow-500 block w-full p-2.5" placeholder="Title project" required />
            </div>
            <div class="w-1/2 my-2">
                <label for="url" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Project url</label>
                <input value="<?php echo e(old('url')); ?>" type="text" id="url" name="url" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-500 focus:border-yellow-500 block w-full p-2.5" placeholder="Title url" required />
            </div>
            <div class="w-1/2 my-2">
                <label for="type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Project type</label>
                <input value="<?php echo e(old('type')); ?>" type="text" id="type" name="type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-500 focus:border-yellow-500 block w-full p-2.5" placeholder="Title type" required />
            </div>
        <button type="sumbit" class="text-lg text-white font-pop bg-yellow-500 p-2 rounded hover:bg-yellow-400">Store</button>
    </form>           
    <?php endif; ?>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/users/add.blade.php ENDPATH**/ ?>