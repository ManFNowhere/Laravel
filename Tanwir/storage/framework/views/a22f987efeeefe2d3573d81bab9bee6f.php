<!doctype html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learn Accessibility</title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css','resources/js/app.js']); ?>
</head>
<body class="bg-gray-800">
    <div class="flex flex-col justify-center" role="main">
        <div class="bg-gray-800 text-white p-2">
            <h1 class="text-lg">Learn form component</h1>
        </div>
        <form action="" class="mx-10 bg-gray-700 p-5 rounded">
            <h1 class="text-lg text-white">Form</h1>
            <div class="w-1/2 my-2">
                <label for="username" class="block mb-2 text-sm text-white">Username</label>
                <input type="text" name="username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1" required>
            </div>
            <button type="submit" class="p-2 bg-blue-600 hover:bg-blue-500 text-white rounded">Submit</button>
        </form>
    </div>
</body>
</html><?php /**PATH /var/www/html/resources/views/accessibility/form.blade.php ENDPATH**/ ?>