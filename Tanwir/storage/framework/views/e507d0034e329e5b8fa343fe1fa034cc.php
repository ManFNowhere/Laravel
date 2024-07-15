<section class="bg-gray-900 rounded-lg p-6" id="laravel-section">
    <h2 class="text-2xl text-white font-bold my-4">1. Laravel</h2>
    <article>
        <h3 class="text-xl text-white font-bold">1.1 Preparation</h3>
        <p class="text-white">Before we make laravel project, we need to prepare something in our system. According to laravel 11 documentation we need <b>php>8.2</b> and <b>Composer</b>.
            now we make our sistem compatible with all requirement of laravel 11.</p>
            <div class="bg-gray-900 rounded-lg p-6">
                <h4 class="text-lg text-white font-bold mb-4">Install or Upgrade PHP</h4>
                <div class="space-y-6">
                    <div>
                        <h5 class="text-lg text-white font-bold mb-2">On Linux System</h5>
                        <pre class="bg-gray-800 rounded-lg p-4 overflow-x-auto" tabindex="0">
                            <code class="text-white">
$ sudo apt-get update && sudo apt-get upgrade
$ sudo apt-get install php8.2
$ php -v</code>
                        </pre>
                    </div>
                    <div>
                        <h5 class="text-lg text-white font-bold mb-2">On macOS</h5>
                        <p class="text-white mb-2">For macOS, it's recommended to use Homebrew (brew) to install PHP.</p>
                        <pre class="bg-gray-800 rounded-lg p-4 overflow-x-auto" tabindex="0">
                            <code class="text-white">
$ brew install php@8.2</code>
                        </pre>
                        <p class="text-white mt-2">If you don't have Homebrew installed, <a href="https://brew.sh/" target="_blank" class="underline decoration-solid text-blue-400">visit the documentation to install it.</a></p>
                    </div>
                </div>
            </div>
            <div class="bg-gray-900 rounded-lg p-6">
    <h4 class="text-lg text-white font-bold mb-4">Install or Upgrade Composer</h4>
    <div class="space-y-6">
        <div>
            <h5 class="text-lg text-white font-bold mb-2">On Linux System</h5>
            <p class="text-white mb-2">To install Composer on a Linux system, follow these steps:</p>
            <pre class="bg-gray-800 rounded-lg p-4 overflow-x-auto  focus:outline-none" tabindex="0">
                <code class="text-white">
$ php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
$ php composer-setup.php
$ php -r "unlink('composer-setup.php');"
$ sudo mv composer.phar /usr/local/bin/composer
$ composer -V</code>
            </pre>
            <p class="text-white mt-2">To upgrade Composer, use the command below:</p>
            <pre class="bg-gray-800 rounded-lg p-4 overflow-x-auto" tabindex="0">
                <code class="text-white">
$ composer self-update</code>
            </pre>
        </div>
        <div>
            <h5 class="text-lg text-white font-bold mb-2">On macOS</h5>
            <p class="text-white mb-2">For macOS, you can use Homebrew to install Composer:</p>
            <pre class="bg-gray-800 rounded-lg p-4 overflow-x-auto" tabindex="0">
                <code class="text-white">
$ brew install composer</code>
            </pre>
            <p class="text-white mt-2">To upgrade Composer, use the command below:</p>
            <pre class="bg-gray-800 rounded-lg p-4 overflow-x-auto" tabindex="0">
                <code class="text-white">
$ composer self-update</code>
            </pre>
            <p class="text-white mt-2">If you don't have Homebrew installed, <a href="https://brew.sh/" target="_blank" class="underline decoration-solid text-blue-400">visit the documentation to install it.</a></p>
        </div>
    </div>
</div>


    </article>

    <article class="bg-gray-900 rounded-lg p-6">
        <h3 class="text-xl text-white font-bold mb-4">1.2 Installation</h3>
        
        <div class="space-y-6">
            <div>
                <h4 class="text-lg text-white font-bold mb-4">Install Laravel Project</h4>
                <p class="text-white mb-2">To create a new Laravel project, you can use Composer:</p>
                <pre class="bg-gray-800 rounded-lg p-4 overflow-x-auto" tabindex="0">
                    <code class="text-white">
$ composer create-project laravel/laravel project-name</code>
                </pre>
                <p class="text-white mb-2">To run laravel that you just created, you can run this code:</p>
                <pre class="bg-gray-800 rounded-lg p-4 overflow-x-auto" tabindex="0">
                    <code class="text-white">
$ cd example-app
$ php artisan serve
$ php artisan migrate</code>
                </pre>
                <p class="text-white mt-2">Replace <code class="bg-gray-700 rounded px-2 py-1">project-name</code> with the desired name of your project.</p>
            </div>

            <div>
                <h4 class="text-lg text-white font-bold mb-4">Laravel Project with Sail</h4>
                <p class="text-white mb-2">Laravel Sail provides a simple command-line interface for interacting with Laravel's default Docker configuration. Follow these steps to set up a new Laravel project with Sail:</p>
                <pre class="bg-gray-800 rounded-lg p-4 overflow-x-auto" tabindex="0">
                    <code class="text-white">
$ curl -s "https://laravel.build/example-app" | bash</code>
                </pre>
                <p class="text-white mt-2">Replace <code class="bg-gray-700 rounded px-2 py-1">example-app</code> with the desired name of your project.</p>
                <p class="text-white mt-2">Next, navigate to your project directory and start Sail:</p>
                <pre class="bg-gray-800 rounded-lg p-4 overflow-x-auto" tabindex="0">
                    <code class="text-white">
$ cd example-app
$ ./vendor/bin/sail up -d
$ ./vendor/bin/sail migrate</code>
                </pre>
                <p class="text-white mt-2">You can stop Sail by using:</p>
                <pre class="bg-gray-800 rounded-lg p-4 overflow-x-auto" tabindex="0">
                    <code class="text-white">
$ ./vendor/bin/sail down</code>
                </pre>
            </div>
            <p class="text-white mt-2">for more information you can <a href="https://laravel.com/docs/11.x/installation" target="_blank" class="underline decoration-solid text-blue-400">visit the laravel documentation.</a></p>
        </div>

    
    </article>
    
    <article class="bg-gray-900 rounded-lg p-6">
    <h3 class="text-xl text-white font-bold mb-4">1.3 Rebuild Existing Project</h3>
    
    <div class="space-y-6">
        <div>
            <h4 class="text-lg text-white font-bold mb-4">Rebuild Laravel Project</h4>
            <p class="text-white mb-2">To rebuild an existing Laravel project, follow these steps:</p>
            <p class="text-white mb-2">1. Clone your project repository:</p>
            <pre class="bg-gray-800 rounded-lg p-4 overflow-x-auto" tabindex="0">
                <code class="text-white">
$ git clone https://github.com/your-username/your-project.git</code>
            </pre>
            <p class="text-white mt-2">Replace <code class="bg-gray-700 rounded px-2 py-1">your-username</code> and <code class="bg-gray-700 rounded px-2 py-1">your-project</code> with your GitHub username and repository name, respectively.</p>

            <p class="text-white mb-2">2. Navigate to your project directory:</p>
            <pre class="bg-gray-800 rounded-lg p-4 overflow-x-auto" tabindex="0">
                <code class="text-white">
$ cd your-project</code>
            </pre>

            <p class="text-white mb-2">3. Install project dependencies using Composer:</p>
            <pre class="bg-gray-800 rounded-lg p-4 overflow-x-auto" tabindex="0">
                <code class="text-white">
$ composer install</code>
            </pre>

            <p class="text-white mb-2">4. Copy the example environment file and set the application key:</p>
            <pre class="bg-gray-800 rounded-lg p-4 overflow-x-auto" tabindex="0">
                <code class="text-white">
$ cp .env.example .env
$ php artisan key:generate</code>
            </pre>

            <p class="text-white mb-2">5. Set up your database configuration in the <code class="bg-gray-700 rounded px-2 py-1">.env</code> file:</p>
            <pre class="bg-gray-800 rounded-lg p-4 overflow-x-auto" tabindex="0">
                <code class="text-white">
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password</code>
            </pre>

            <p class="text-white mb-2">6. And last step you can run migration with php or sail depend on your project, after migration complete you can run the application.</p>

            <p class="text-white mt-2">You should now be able to access your Laravel application at <a href="localhost" target="_blank" class="underline decoration-solid text-blue-400">localhost</a> or <a href="http://127.0.0.1:8000" target="_blank" class="underline decoration-solid text-blue-400">http://127.0.0.1:8000</a>.</p>
        </div>
    </div>
</article>
<article class="bg-gray-900 rounded-lg p-6">
    <h3 class="text-xl text-white font-bold mb-4">1.4 Layout and Components</h3>
    
    <div class="space-y-6">
        <p class="text-white mt-2">
            To make development efficient, we can make all content in page into components. In that way we can use components in every page and not to write code every single we need something.
            And to do this, we can use Blade template. Let say now we want to make layout, first we need make a folder <code class="bg-gray-800 p-2 rounded">layouts</code> in <code class="bg-gray-800 p-2 rounded">resouces/view</code>.
            In that folder we can make Blade file, like  <code class="bg-gray-800 p-2 rounded">app.blade.php</code>, in this file we will write our html structure and were the content will show. here the example of <code class="bg-gray-800 p-2 rounded">app.blade.php</code>:
            <pre>
                <code class="bg-gray-800 p-2 rounded">app.blade.php</code>
            </pre>
    </div>

    
</article>

</section><?php /**PATH /var/www/html/resources/views/tutorial/laravel.blade.php ENDPATH**/ ?>