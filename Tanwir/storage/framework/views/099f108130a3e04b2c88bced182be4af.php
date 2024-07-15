<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['label', 'id', 'type', 'name']));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['label', 'id', 'type', 'name']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<div class="flex items-center justify-between">
    <label for="<?php echo e($id); ?>" class="block text-sm font-medium leading-6 text-gray-300"><?php echo e($label); ?></label>
</div>
<div class="mt-2">
    <input id="<?php echo e($id); ?>" name="<?php echo e($name); ?>" type="<?php echo e($type); ?>" required class="block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-900 placeholder:text-gray-800 focus:ring-2 focus:ring-inset focus:ring-yellow-500 sm:text-sm sm:leading-6"/>
</div><?php /**PATH /var/www/html/resources/views/components/input-form.blade.php ENDPATH**/ ?>