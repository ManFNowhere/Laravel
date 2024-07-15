<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>Tanwir K Mahdi</title>
    <!-- <link rel="icon" href="storage/logo.png"> -->
  <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css','resources/js/app.js']); ?>
  <?php echo $__env->make('partials.font', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<body >
<?php echo $__env->make('partials.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<main class="bg-black w-full">
<?php echo $__env->yieldContent('container'); ?>
</main>



<script>
    const menuButton =document.getElementById('open-menu');
    const mobileMenu =document.getElementById('mobile-menu');

    menuButton.addEventListener('click', function(event){
        console.log('click');
        mobileMenu.classList.toggle('hidden');
    });


</script>

</body>
</html>
<?php /**PATH /var/www/html/resources/views/layouts/app.blade.php ENDPATH**/ ?>