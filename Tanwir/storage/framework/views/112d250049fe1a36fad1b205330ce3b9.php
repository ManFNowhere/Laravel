<?php $__env->startSection('container'); ?>

<section class="flex flex-col-reverse justify-between md:flex-row w-full min-h-svh">
    <aside class="md:w-1/6 p-4 pt-10 bg-gray-800 rounded text-center">
        <?php if (isset($component)) { $__componentOriginalfb5b48b69fbd6989c24c2377cf6cf379 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfb5b48b69fbd6989c24c2377cf6cf379 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.link-button','data' => ['link' => ''.e(route('tutorial.index')).'','text' => 'Back to tutorial']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('link-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['link' => ''.e(route('tutorial.index')).'','text' => 'Back to tutorial']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfb5b48b69fbd6989c24c2377cf6cf379)): ?>
<?php $attributes = $__attributesOriginalfb5b48b69fbd6989c24c2377cf6cf379; ?>
<?php unset($__attributesOriginalfb5b48b69fbd6989c24c2377cf6cf379); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfb5b48b69fbd6989c24c2377cf6cf379)): ?>
<?php $component = $__componentOriginalfb5b48b69fbd6989c24c2377cf6cf379; ?>
<?php unset($__componentOriginalfb5b48b69fbd6989c24c2377cf6cf379); ?>
<?php endif; ?>
    </aside>

    <div class="md:w-5/6 min-h-svh bg-gray-900 p-4">
        <?php if (isset($component)) { $__componentOriginal45bb95a52c0972cd9db09105bc1f4b01 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal45bb95a52c0972cd9db09105bc1f4b01 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-h1','data' => ['text' => ''.e($data->title).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('text-h1'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['text' => ''.e($data->title).'']); ?>
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
        <?php echo $data->body; ?>

    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/tutorial/show.blade.php ENDPATH**/ ?>