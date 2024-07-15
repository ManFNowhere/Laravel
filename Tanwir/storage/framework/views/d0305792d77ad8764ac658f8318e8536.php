<section class="bg-gray-900 rounded-lg p-6" id="tailwind-section">
    <h2 class="text-2xl text-white font-bold my-4">2. Tailwind</h2>
    <article class="space-y-6">
        <p class="text-white">After creating a Laravel project, you can install Tailwind CSS. Navigate to your project folder and run the following commands:</p>
        <pre class="bg-gray-800 rounded-lg p-4 overflow-x-auto" tabindex="0">
            <code class="text-white">
$ npm install -D tailwindcss postcss autoprefixer
$ npx tailwindcss init -p</code>
        </pre>

        <p class="text-white">You will find a file named <b>tailwind.config.js</b> in your project's root folder. Open that file and add the following configuration:</p>
        <pre class="bg-gray-800 rounded-lg p-4 overflow-x-auto" tabindex="0">
            <code class="text-white">
/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}</code>
        </pre>

        <p class="text-white">Next, add Tailwind to your CSS. Open your CSS file located at <b>./resources/css/app.css</b> and add the following lines:</p>
        <pre class="bg-gray-800 rounded-lg p-4 overflow-x-auto" tabindex="0">
            <code class="text-white">
@tailwind base;
@tailwind components;
@tailwind utilities;</code>
        </pre>

        <p class="text-white">After configuring Tailwind, run the following command to compile your CSS:</p>
        <pre class="bg-gray-800 rounded-lg p-4overflow-x-auto" tabindex="0">
            <code class="text-white">
$ npm run dev</code>
        </pre>

        <p class="text-white">Finally, you can use Tailwind CSS in your Laravel project. Insert the following code into the <code>&lt;head&gt;</code> tag of your HTML:</p>
        <pre class="bg-gray-800 rounded-lg p-4 overflow-x-auto" tabindex="0">
            <code class="text-white">
@vite(['resources/css/app.css','resources/js/app.js']) </code>
        </pre>
          
        <p class="text-white">For more information, you can <a href="https://tailwindcss.com/docs/installation" target="_blank" class="underline decoration-solid text-blue-400">visit the Tailwind documentation</a>.</p>
    </article>       
</section>
<?php /**PATH /var/www/html/resources/views/tutorial/tailwind.blade.php ENDPATH**/ ?>