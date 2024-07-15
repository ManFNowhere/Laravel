<?php $__env->startSection('container'); ?>
<div class="min-h-svh">

    <div class="bg-gray-900 text-center p-2 mx-4 rounded ">
        <?php if (isset($component)) { $__componentOriginal45bb95a52c0972cd9db09105bc1f4b01 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal45bb95a52c0972cd9db09105bc1f4b01 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-h1','data' => ['text' => 'Projects']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('text-h1'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['text' => 'Projects']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal45bb95a52c0972cd9db09105bc1f4b01)): ?>
<?php $attributes = $__attributesOriginal45bb95a52c0972cd9db09105bc1f4b01; ?>
<?php unset($__attributesOriginal45bb95a52c0972cd9db09105bc1f4b01); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal45bb95a52c0972cd9db09105bc1f4b01)): ?>
<?php $component = $__componentOriginal45bb95a52c0972cd9db09105bc1f4b01; ?>
<?php unset($__componentOriginal45bb95a52c0972cd9db09105bc1f4b01); ?>
<?php endif; ?>
        <div class="flex flex-col mt-4">
        <?php if(count($project) > 0): ?>
            <?php $__currentLoopData = $project; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="flex flex-row justify-between bordered border-2 border-yellow-500 p-2 rounded my-2">
                    <?php if (isset($component)) { $__componentOriginalf0abaf5655467014ab792a3a8a29df50 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf0abaf5655467014ab792a3a8a29df50 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-h2','data' => ['text' => ''.e($d->title).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('text-h2'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['text' => ''.e($d->title).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf0abaf5655467014ab792a3a8a29df50)): ?>
<?php $attributes = $__attributesOriginalf0abaf5655467014ab792a3a8a29df50; ?>
<?php unset($__attributesOriginalf0abaf5655467014ab792a3a8a29df50); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf0abaf5655467014ab792a3a8a29df50)): ?>
<?php $component = $__componentOriginalf0abaf5655467014ab792a3a8a29df50; ?>
<?php unset($__componentOriginalf0abaf5655467014ab792a3a8a29df50); ?>
<?php endif; ?>
                    <div>
                        <a href="/edit-project/<?php echo e($d->slug); ?>" class="bg-green-500 text-white text-xl p-1 rounded hover:bg-green-400"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="/delete-project/<?php echo e($d->slug); ?>" class="bg-red-500 text-white text-xl p-1 rounded hover:bg-red-400"><i class="fa-solid fa-trash"></i></a>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <?php if (isset($component)) { $__componentOriginal45bb95a52c0972cd9db09105bc1f4b01 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal45bb95a52c0972cd9db09105bc1f4b01 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-h1','data' => ['text' => 'No project yet!']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('text-h1'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['text' => 'No project yet!']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal45bb95a52c0972cd9db09105bc1f4b01)): ?>
<?php $attributes = $__attributesOriginal45bb95a52c0972cd9db09105bc1f4b01; ?>
<?php unset($__attributesOriginal45bb95a52c0972cd9db09105bc1f4b01); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal45bb95a52c0972cd9db09105bc1f4b01)): ?>
<?php $component = $__componentOriginal45bb95a52c0972cd9db09105bc1f4b01; ?>
<?php unset($__componentOriginal45bb95a52c0972cd9db09105bc1f4b01); ?>
<?php endif; ?>
        <?php endif; ?>
        <?php if (isset($component)) { $__componentOriginalfb5b48b69fbd6989c24c2377cf6cf379 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfb5b48b69fbd6989c24c2377cf6cf379 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.link-button','data' => ['link' => '/add-project','text' => 'Add Project']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('link-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['link' => '/add-project','text' => 'Add Project']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfb5b48b69fbd6989c24c2377cf6cf379)): ?>
<?php $attributes = $__attributesOriginalfb5b48b69fbd6989c24c2377cf6cf379; ?>
<?php unset($__attributesOriginalfb5b48b69fbd6989c24c2377cf6cf379); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfb5b48b69fbd6989c24c2377cf6cf379)): ?>
<?php $component = $__componentOriginalfb5b48b69fbd6989c24c2377cf6cf379; ?>
<?php unset($__componentOriginalfb5b48b69fbd6989c24c2377cf6cf379); ?>
<?php endif; ?>
        </div>
    </div>
    <div class="bg-gray-900 text-center p-2 mx-4 my-10 rounded">
        <?php if (isset($component)) { $__componentOriginal45bb95a52c0972cd9db09105bc1f4b01 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal45bb95a52c0972cd9db09105bc1f4b01 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-h1','data' => ['text' => 'Tutorial']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('text-h1'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['text' => 'Tutorial']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal45bb95a52c0972cd9db09105bc1f4b01)): ?>
<?php $attributes = $__attributesOriginal45bb95a52c0972cd9db09105bc1f4b01; ?>
<?php unset($__attributesOriginal45bb95a52c0972cd9db09105bc1f4b01); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal45bb95a52c0972cd9db09105bc1f4b01)): ?>
<?php $component = $__componentOriginal45bb95a52c0972cd9db09105bc1f4b01; ?>
<?php unset($__componentOriginal45bb95a52c0972cd9db09105bc1f4b01); ?>
<?php endif; ?>
        <div class="flex flex-col mt-4">
        <?php if(count($tutorial) > 0): ?>
            <?php $__currentLoopData = $tutorial; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="flex flex-row items-center justify-between bordered border-2 border-yellow-500 p-2 rounded my-2">
                    <div class="w-1/2 text-left"><?php if (isset($component)) { $__componentOriginalf0abaf5655467014ab792a3a8a29df50 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf0abaf5655467014ab792a3a8a29df50 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-h2','data' => ['text' => ''.e($t->title).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('text-h2'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['text' => ''.e($t->title).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf0abaf5655467014ab792a3a8a29df50)): ?>
<?php $attributes = $__attributesOriginalf0abaf5655467014ab792a3a8a29df50; ?>
<?php unset($__attributesOriginalf0abaf5655467014ab792a3a8a29df50); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf0abaf5655467014ab792a3a8a29df50)): ?>
<?php $component = $__componentOriginalf0abaf5655467014ab792a3a8a29df50; ?>
<?php unset($__componentOriginalf0abaf5655467014ab792a3a8a29df50); ?>
<?php endif; ?></div>
                    <div class="w-2/6 text-left"><?php if (isset($component)) { $__componentOriginalf0abaf5655467014ab792a3a8a29df50 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf0abaf5655467014ab792a3a8a29df50 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-h2','data' => ['text' => ''.e($t->category->Category).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('text-h2'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['text' => ''.e($t->category->Category).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf0abaf5655467014ab792a3a8a29df50)): ?>
<?php $attributes = $__attributesOriginalf0abaf5655467014ab792a3a8a29df50; ?>
<?php unset($__attributesOriginalf0abaf5655467014ab792a3a8a29df50); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf0abaf5655467014ab792a3a8a29df50)): ?>
<?php $component = $__componentOriginalf0abaf5655467014ab792a3a8a29df50; ?>
<?php unset($__componentOriginalf0abaf5655467014ab792a3a8a29df50); ?>
<?php endif; ?></div>
                    <div class="flex flex-row w-1/6 justify-end">
                        <a href="<?php echo e(route('tutorial.edit', ['tutorial'=>$t->id])); ?>" class="bg-green-500 text-white text-xl mx-2 p-1 rounded hover:bg-green-400"><i class="fa-solid fa-pen-to-square"></i></a>
                        <form action="<?php echo e(route('tutorial.destroy', ['tutorial' => $t->id])); ?>" method="POST" onsubmit="return confirm('Are you sure you want to delete this tutorial?')">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="bg-red-500 text-white text-xl p-1 rounded hover:bg-red-400"><i class="fa-solid fa-trash"></i></button>
                        </form>    
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <?php if (isset($component)) { $__componentOriginal45bb95a52c0972cd9db09105bc1f4b01 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal45bb95a52c0972cd9db09105bc1f4b01 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-h1','data' => ['text' => 'No Tutorial yet!']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('text-h1'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['text' => 'No Tutorial yet!']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal45bb95a52c0972cd9db09105bc1f4b01)): ?>
<?php $attributes = $__attributesOriginal45bb95a52c0972cd9db09105bc1f4b01; ?>
<?php unset($__attributesOriginal45bb95a52c0972cd9db09105bc1f4b01); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal45bb95a52c0972cd9db09105bc1f4b01)): ?>
<?php $component = $__componentOriginal45bb95a52c0972cd9db09105bc1f4b01; ?>
<?php unset($__componentOriginal45bb95a52c0972cd9db09105bc1f4b01); ?>
<?php endif; ?>
        <?php endif; ?>
        <?php if (isset($component)) { $__componentOriginalfb5b48b69fbd6989c24c2377cf6cf379 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfb5b48b69fbd6989c24c2377cf6cf379 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.link-button','data' => ['link' => ''.e(route('tutorial.create')).'','text' => 'Add Tutorial']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('link-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['link' => ''.e(route('tutorial.create')).'','text' => 'Add Tutorial']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfb5b48b69fbd6989c24c2377cf6cf379)): ?>
<?php $attributes = $__attributesOriginalfb5b48b69fbd6989c24c2377cf6cf379; ?>
<?php unset($__attributesOriginalfb5b48b69fbd6989c24c2377cf6cf379); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfb5b48b69fbd6989c24c2377cf6cf379)): ?>
<?php $component = $__componentOriginalfb5b48b69fbd6989c24c2377cf6cf379; ?>
<?php unset($__componentOriginalfb5b48b69fbd6989c24c2377cf6cf379); ?>
<?php endif; ?>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/users/dashboard.blade.php ENDPATH**/ ?>