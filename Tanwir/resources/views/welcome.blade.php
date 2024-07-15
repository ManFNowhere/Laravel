@extends('layouts.app')


@section('container')

<section class="min-h-100svh">
    <div class="flex flex-row w-full">

        <div class="flex flex-col w-1/2 lg:p-10 p-2 justify-center">
            <h2 class="lg:text-xl text-gray-400 font-pop ">Hallo i am</h2>
            <h2 class="lg:text-4xl text-yellow-500 font-pop font-bold text-lg">Tanwir Khalid Mahdi</h2>
            <h2 class="lg:text-8xl text-white font-bold text-xl">Web</h2>
            <h2 class="text-xl lg:text-8xl text-white font-bold pl-10 ">Developer</h2>
            <p class="text-gray-400 font-pop text-sm"> Welcome to my digital playground! With a passion for crafting beautiful and functional websites, I transform lines of code into interactive experiences. Whether it's front-end magic with HTML/CSS and JavaScript, or back-end wizardry with Python and Laravel, I'm always up for a challenge.</p>
            <a href="#services" class="bg-yellow-500 w-fit text-gray-800 font-pop p-2 my-4 rounded" >See my services</a>
        </div>

        <div class="flex flex-col w-1/2">
            <img src="img/banner.png" alt="" class="w-50">
        </div>

    </div>
</section>


<section id="about" class="w-full bg-black p-2 flex flex-col lg:flex-row">
    <div class="lg:w-1/2 flex flex-col justify-center">
        <img src="img/profile.jpg" alt="profile" class="rounded-full aspect-auto w-80 h-80 lg:w-96 lg:h-96 mx-auto shadow-2xl">
    </div>

    <div class="lg:w-1/2 flex flex-col mx-auto lg:justify-center my-20">
        <h1 class="text-gray-300 text-4xl font-pop">About me</h1>
        <hr class="w-32 font-bold bg-yellow-500 h-1 border-0 rounded">
        <p class="text-gray-400 mt-5">
            I am a {{ \Carbon\Carbon::parse('1997-01-03')->age }}-year-old technology enthusiast and a student at a prestigious university in Northern Germany, proficient in web development using Java, Python, and PHP. Additionally, I have experience in crafting applications for both iOS and Android platforms with flutter frameworks. Currently, I am based in Germany.
        </p>        
        <div class="pr-5 mt-4">
            <h1 class="text-xl text-gray-300 font-pop">HTML/CSS</h1>
            <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                <div class="bg-yellow-500 h-2.5 rounded-full" style="width: 80%"></div>
            </div>
        </div>
        <div class="pr-5 mt-4">
            <h1 class="text-xl text-gray-300 font-pop">Laravel</h1>
            <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                <div class="bg-yellow-500 h-2.5 rounded-full" style="width: 90%"></div>
            </div>
        </div>
        <div class="pr-5 mt-4">
            <h1 class="text-xl text-gray-300 font-pop">Python</h1>
            <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                <div class="bg-yellow-500 h-2.5 rounded-full" style="width: 40%"></div>
            </div>
        </div>
        <div class="pr-5 mt-4">
            <h1 class="text-xl text-gray-300 font-pop">Java</h1>
            <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                <div class="bg-yellow-500 h-2.5 rounded-full" style="width: 50%"></div>
            </div>
        </div>
    </div>
</section>


<section id="services" class="w-full text-center my-20" >
    <h1 class="text-4xl text-gray-300 font-pop">Services</h1>
    <div class="flex flex-wrap justify-evenly">
        <div class="p-1 rounded m-2 bg-gradient-to-b from-yellow-500 to-black w-64">
            <div class="bg-black">
                <div class="text-white text-6xl p-2"><i class="fa-solid fa-code"></i></div>
                <h1 class="text-gray-300 text-xl font-bold font-pop">HTML/CSS</h1>
                <p class="text-gray-300 text-sm">Proficient in front-end development with HTML/CSS. Comfortable creating responsive layouts and styling.</p>
            </div>
        </div>

        <div class="p-1 rounded m-2 bg-gradient-to-t from-yellow-500 to-black w-64">
            <div class="bg-black">
                <div class="text-white text-6xl p-2"><i class="fa-brands fa-laravel"></i></div>
                <h1 class="text-gray-300 text-xl font-bold font-pop">Laravel</h1>
                <p class="text-gray-300 text-sm">Experienced in Laravel framework. Capable of building robust back-end applications, e-commerce, company page and APIs.</p>
            </div>
        </div>

        <div class="p-1 rounded m-2 bg-gradient-to-b from-yellow-500 to-black w-64">
            <div class="bg-black">
                <div class="text-white text-6xl p-2"><i class="fa-brands fa-python"></i></div>
                <h1 class="text-gray-300 text-xl font-bold font-pop">Python</h1>
                <p class="text-gray-300 text-sm">Skilled in Python programming language. Proficient in scripting, automation, and data analysis.</p>
            </div>
        </div>

        <div class="p-1 rounded m-2 bg-gradient-to-t from-yellow-500 to-black w-64">
            <div class="bg-black">
                <div class="text-white text-6xl p-2"><i class="fa-brands fa-java"></i></div>
                <h1 class="text-gray-300 text-xl font-bold font-pop">Java</h1>
                <p class="text-gray-300 text-sm">Knowledgeable in Java programming language. Familiar with object-oriented programming and enterprise-level applications.</p>
            </div>
        </div>
    </div>

</section>


<section class="w-full my-4 flex flex-col lg:flex-row items-center justify-evenly">
    <h1 class="text-6xl text-yellow-500 font-bold font-pop">Language</h1>
    <div class="flex flex-col lg:flex-row justify-evenly mt-5">

        <div class="flex flex-col justify-center text-center m-4 p-5 bg-gray-900 rounded">
            <h1 class="text-yellow-500 text-2xl font-bold font-pop">English</h1>
            <p class="text-gray-300 font-pop">Fluent</p>
        </div>
        <div class="flex flex-col justify-center text-center m-4 p-5 bg-gray-900 rounded">
            <h1 class="text-yellow-500 text-2xl font-bold font-pop">German</h1>
            <p class="text-gray-300 font-pop">Proficient</p>
        </div>
        <div class="flex flex-col justify-center text-center m-4 p-5 bg-gray-900 rounded">
            <h1 class="text-yellow-500 text-2xl font-bold font-pop">Bahasa</h1>
            <p class="text-gray-300 font-pop">Native</p>
        </div>

    </div>
</section>

<section id="contact" class="text-center mt-28 p-10">
    <hr class="font-bold bg-yellow-500 h-1 border-0 rounded mx-5">
    <h1 class="text-6xl text-gray-300 font-khand font-bold my-10">Let's Collaborate</h1>
    <p class="text-gray-300 font-pop mb-10">I am excited to connect and explore potential opportunities for collaboration. Whether you have a project in mind or just want to say hello, feel free to reach out. Together, we can create something remarkable and innovative. Looking forward to hearing from you and starting a conversation that could lead to amazing results.</p>
    <a href="mailto:Tanwirkhalid.m@gmail.com" class="bg-yellow-500 text-gray-800 text-xl font-bold font-pop p-2 rounded">Get in Touch</a>
</section>



@include('partials.footer')
@endsection