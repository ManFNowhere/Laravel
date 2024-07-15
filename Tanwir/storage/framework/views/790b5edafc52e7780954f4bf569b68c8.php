<?php $__env->startSection('container'); ?>

<section class="flex flex-col-reverse justify-between md:flex-row w-full min-h-svh">
    <aside class="md:w-1/6 p-4 bg-gray-800 rounded">
        <?php if (isset($component)) { $__componentOriginalf0abaf5655467014ab792a3a8a29df50 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf0abaf5655467014ab792a3a8a29df50 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-h2','data' => ['text' => 'Category']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('text-h2'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['text' => 'Category']); ?>
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
        <ul class="text-white">
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li id="<?php echo e($category->Category); ?>" class="category-item hover:bg-gray-700 p-2">
                    <a href="#<?php echo e($category->Category); ?>"><?php echo e($category->Category); ?></a>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </aside>

    <div id="tutorial-sections" class="md:w-5/6 p-2">
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div id="<?php echo e($category->Category); ?>-body" class="category-body w-full my-2 <?php echo e($index == 0 ? '' : 'hidden'); ?> flex flex-col items-center">
                <?php if (isset($component)) { $__componentOriginal45bb95a52c0972cd9db09105bc1f4b01 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal45bb95a52c0972cd9db09105bc1f4b01 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-h1','data' => ['text' => 'Tutorial '.e($category->Category).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('text-h1'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['text' => 'Tutorial '.e($category->Category).'']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal45bb95a52c0972cd9db09105bc1f4b01)): ?>
<?php $attributes = $__attributesOriginal45bb95a52c0972cd9db09105bc1f4b01; ?>
<?php unset($__attributesOriginal45bb95a52c0972cd9db09105bc1f4b01); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal45bb95a52c0972cd9db09105bc1f4b01)): ?>
<?php $component = $__componentOriginal45bb95a52c0972cd9db09105bc1f4b01; ?>
<?php unset($__componentOriginal45bb95a52c0972cd9db09105bc1f4b01); ?>
<?php endif; ?>
                <div class="flex flex-col md:flex-row justify-center">
                    <?php $__currentLoopData = $tutorials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tutorial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($tutorial->category->Category == $category->Category): ?>
                            <div class="mx-4 md:m-4">
                                <a href="<?php echo e(route('tutorial.show', ['tutorial'=>$tutorial->id])); ?>">
                                    <div class="p-1 rounded md:m-2 hover:bg-gradient-to-b from-yellow-500 to-black">
                                        <div class="bg-gray-700 p-5 rounded w-60 text-center h-fit">
                                            <?php if (isset($component)) { $__componentOriginalf0abaf5655467014ab792a3a8a29df50 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf0abaf5655467014ab792a3a8a29df50 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-h2','data' => ['text' => ''.e($tutorial->title).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('text-h2'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['text' => ''.e($tutorial->title).'']); ?>
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
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <script>
        // JavaScript to handle category toggle
        document.addEventListener('DOMContentLoaded', function () {
            const categoryItems = document.querySelectorAll('.category-item');
            const categoryBodies = document.querySelectorAll('.category-body');

            categoryItems.forEach((item, index) => {
                item.addEventListener('click', () => {
                    // Hide all category bodies
                    categoryBodies.forEach(body => {
                        body.classList.add('hidden');
                    });

                    // Show the selected category body
                    categoryBodies[index].classList.remove('hidden');
                });
            });
        });
    </script>

</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/tutorial/index.blade.php ENDPATH**/ ?>