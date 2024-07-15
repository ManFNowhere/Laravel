<?php $__env->startSection('container'); ?>

<section class="flex flex-col-reverse justify-between md:flex-row w-full min-h-svh">
    <h2 class="text-2xl text-white font-bold my-4">PHPUnit</h2>
    <p class="text-white">Laravel has testing tools build-in, which are PHPUnit and Pest. and now we will talk about PHPUnit, how to create and to use it. By default there are folder tests on your 
        root folder. Inside this folder you can find Feature and Unit folders. Feature folder is for testing the whole feature of your application, while Unit folder is for testing the smallest unit of your application.
    </p>
    <article>
        <h3 class="text-xl text-white font-bold">1. What is it?</h3>
        <p class="text-white">PHPUnit is a programmer-oriented testing framework for PHP. It is an instance of the xUnit architecture for unit testing frameworks. PHPUnit is a tool that supports the creation and execution of tests. It is a unit testing framework for the PHP programming language. It is an instance of the xUnit architecture for unit testing frameworks.</p>    
    </article>
    <article>
        <h3 class="text-xl text-white font-bold">2. How to create a test?</h3>
        <p class="text-white">To create a test, you can use the command <code>php artisan make:test TestName</code>. This command will create a new test file in the folder tests/Feature or tests/Unit. You can also create a test file manually.</p>
        <p class="text-white mb-2">Manual example:</p>
        <pre class="bg-gray-800 text-white p-2 rounded-lg">
            <code>
                &lt;?php
                namespace Tests\Feature;
                use Tests\TestCase;
                use Illuminate\Foundation\Testing\RefreshDatabase;
                class ExampleTest extends TestCase
                {
                    /**
                    * A basic test example.
                    *
                    * @return void
                    */
                    public function testBasicTest()
                    {
                        $response = $this->get('/');
                        $response->assertStatus(200);
                    }
                }
            </code>
        </pre>
        <p class="text-white mt-2">Explanation:</p>
        <ul class="text-white">
            <li><code>namespace Tests\Feature;</code> is the namespace of the test file.</li>
            <li><code>use Tests\TestCase;</code> is the class that the test file extends.</li>
            <li><code>use Illuminate\Foundation\Testing\RefreshDatabase;</code> is a trait that you can use to refresh the database after each test.</li>
            <li><code>class ExampleTest extends TestCase</code> is the class that the test file extends.</li>
            <li><code>public function testBasicTest()</code> is the test method.</li>
            <li><code>$response = $this->get('/');</code> is the request to the route /.</li>
            <li><code>$response->assertStatus(200);</code> is the assertion that the status of the response is 200.</li>
        </ul>
    </article>
    
    <article class="bg-gray-900 rounded-lg p-6">
        <h3 class="text-xl text-white font-bold mb-4">3. When we need testing?</h3>
        <p class="text-white mt-2">
            When do we need to test our project?
            <ul class="text-white list-disc pl-6">
                <li>When we want to make sure that our code works as expected.</li>
                <li>When we want to make sure that our code does not break when we make changes.</li>
                <li>When we want to make sure that our code is secure.</li>
                <li>When we want to make sure that our code is efficient.</li>
                <li>When we want to make sure that our code is maintainable.</li>
            </ul>
        </p>
    </article>
    
    <article class="bg-gray-900 rounded-lg p-6">
        <h3 class="text-xl text-white font-bold mb-4">4. Terms in PHPUnit</h3>
        <p class="text-white mt-2">
            Terms in PHPUnit:
            <ul class="text-white list-disc pl-6">
                <li>Test Case: A test case is a class that contains test methods.</li>
                <li>Test Method: A test method is a method that contains test code.</li>
                <li>Assertion: An assertion is a statement that checks if a condition is true.</li>
                <li>Fixture: A fixture is a set of data that is used to test a unit of code.</li>
                <li>Mock Object: A mock object is an object that simulates the behavior of a real object.</li>
                <li>Stub: A stub is a type of mock object that returns a predefined value.</li>
                <li>Spy: A spy is a type of mock object that records the behavior of a real object.</li>
            </ul>
        </p>
    </article>
    
    <article class="bg-gray-900 rounded-lg p-6">
        <h3 class="text-xl text-white font-bold mb-4">5. Example</h3>
        <p class="text-white mt-2">For example, I have a controller like this:</p>
        <pre class="bg-gray-800 text-white p-2 rounded-lg">
            <code>
                &lt;?php
    
                namespace App\Http\Controllers;
    
                use App\Models\Category;
                use App\Models\Tutorial;
                use Illuminate\Http\Request;
    
                class TutorialController extends Controller
                {
                    /**
                     * Display a listing of the resource.
                     */
                    public function index()
                    {   
                        $category = Category::all();
                        $tutorial = Tutorial::all();
                        return view('tutorial.index', ['categories'=>$category, 'tutorials'=>$tutorial]);
                    }
    
                    /**
                     * Show the form for creating a new resource.
                     */
                    public function create()
                    {
                        return view('tutorial.add');
                    }
    
                    /**
                     * Store a newly created resource in storage.
                     */
                    public function store(Request $request)
                    {
                        $data = $request->validate([
                            'title' => 'required',
                            'category' => 'required',
                            'body' => 'required',
                        ]);
                   
                        $category = Category::where('Category', $data['category'])->first();
                        if(!$category){
                            Category::create(['Category'=>$data['category']]);
                            $category = Category::where('Category', $data['category'])->first();
                        }
                        $data['slug'] = str_replace(' ','_',strtolower($data['title']));
                        $data['category_id'] = $category->id;
                        Tutorial::create($data);
                        // redirect to Dashboard
                        return redirect('/dashboard');
                    }
    
                    /**
                     * Display the specified resource.
                     */
                    public function show(string $id)
                    {
                        $data = Tutorial::find($id);
                        return view('tutorial.show',['data'=>$data]);
                    }
    
                    /**
                     * Show the form for editing the specified resource.
                     */
                    public function edit(string $id)
                    {
                        $data = Tutorial::find($id);
                        return view('tutorial.edit', ['data'=>$data]);
                    }
    
                    /**
                     * Update the specified resource in storage.
                     */
                    public function update(Request $request, string $id)
                    {
                        // Validate incoming request data
                        $data = $request->validate([
                            'title' => 'required',
                            'category' => 'required',
                            'body' => 'required',
                        ]);
                        $tutorial = Tutorial::find($id);
                        $category = Category::where('Category', $data['category'])->first();
                        if(!$category){
                            Category::create(['Category'=>$data['category']]);
                            $category = Category::where('Category', $data['category'])->first();
                        }
                        $data['slug'] = str_replace(' ', '_', strtolower($data['title']));
                        $data['category_id'] = $category->id;
                        $tutorial->update($data);
                        return redirect('/dashboard');
                    }
    
                    /**
                     * Remove the specified resource from storage.
                     */
                    public function destroy(string $id)
                    {
                        $tutorial = Tutorial::find($id);
                        $tutorial->delete();
                        return redirect('/dashboard');
                    }
    
                }
            </code>
        </pre>
        <p class="text-white mt-2">Here is an example of a test case for the controller above:</p>
        <pre class="bg-gray-800 text-white p-2 rounded-lg">
            <code>
                &lt;?php
                namespace Tests\Feature;
    
                use App\Models\Category;
                use App\Models\Tutorial;
                use Illuminate\Foundation\Testing\RefreshDatabase;
                use Illuminate\Foundation\Testing\WithoutMiddleware;
                use Tests\TestCase;
    
                class TutorialControllerTest extends TestCase
                {
                    use RefreshDatabase;
                    use WithoutMiddleware; // optional, to remove middleware
    
                    /** @test */
                    public function it_can_display_a_list_of_tutorials()
                    {
                        // Create dummy data
                        $category = Category::factory()->create();
                        $tutorial = Tutorial::factory()->create();
    
                        // Send request to /tutorials
                        $response = $this->get('/tutorials');
    
                        // Verify successful response and correct view
                        $response->assertStatus(200);
                        $response->assertViewIs('tutorial.index');
                        $response->assertViewHas('categories');
                        $response->assertViewHas('tutorials');
                    }
    
                    /** @test */
                    public function it_can_create_a_new_tutorial()
                    {
                        // Create dummy request data
                        $data = [
                            'title' => 'Test Tutorial',
                            'category' => 'Test Category',
                            'body' => 'Lorem ipsum',
                        ];
    
                        // Send POST request to /tutorials
                        $response = $this->post('/tutorials', $data);
    
                        // Verify redirect to /dashboard after creation
                        $response->assertRedirect('/dashboard');
    
                        // Check if tutorial is stored in database
                        $this->assertDatabaseHas('tutorials', [
                            'title' => 'Test Tutorial',
                        ]);
                    }
    
                    // Tests for other methods like edit, update, show, destroy, etc.
                }
            </code>
        </pre>
        <p class="text-white mt-2">Explanation:</p>
        <ul class="text-white list-disc pl-6">
            <li><code>use RefreshDatabase;</code> is a trait that you can use to refresh the database after each test.</li>
            <li><code>use WithoutMiddleware;</code> is a trait that you can use to remove middleware.</li>
            <li><code>public function it_can_display_a_list_of_tutorials()</code> is the test method.</li>
            <li><code>$category = Category::factory()->create();</code> is the creation of dummy data.</li>
            <li><code>$tutorial = Tutorial::factory()->create();</code> is the creation of dummy data.</li>
            <li><code>$response = $this->get('/tutorials');</code> is the request to the route /tutorials.</li>
            <li><code>$response->assertStatus(200);</code> is the assertion that the status of the response is 200.</li>
            <li><code>$response->assertViewIs('tutorial.index');</code> is the assertion that the view is tutorial.index.</li>
            <li><code>$response->assertViewHas('categories');</code> is the assertion that the view has categories.</li>
            <li><code>$response->assertViewHas('tutorials');</code> is the assertion that the view has tutorials.</li>
        </ul>
        <p class="text-white mt-2">To run all tests, you can use the artisan command:</p>
        <pre class="bg-gray-800 text-white p-2 rounded-lg">
            <code>
                php artisan test
            </code>
        </pre>
        <p class="text-white mt-2">Or you can run a specific test with:</p>
        <pre class="bg-gray-800 text-white p-2 rounded-lg">
            <code>
                php artisan test tests/Feature/TutorialControllerTest.php
            </code>
        </pre>
    </article>
        </section>

</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/tutorial/test.blade.php ENDPATH**/ ?>