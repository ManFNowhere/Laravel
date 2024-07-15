<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @include('components.font')
</head>
<body class="bg-slate-900">
    <div class="w-3/4 bg-gray-800 p-5 mx-auto my-30 text-center rounded">
        <h1 class="text-xl text-white font-bold">Add Movie</h1>
        <form id="movieForm">
            @csrf
            <div class="mt-5">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title (API)</label>
                <input type="text" name="title" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500" required />
            </div>
            
            <button type="submit" class="bg-green-500 text-white p-2 rounded hover:bg-purple-400 mt-5">Get</button>
        </form>

       

      <form action="{{ route('store.movie') }}" method="post" enctype= multipart/form-data>
        @csrf
            <div id="movieResults" class="flex flex-col mt-10">
                <!-- Movie results will be appended here -->
            </div>
            <div class="mt-5">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Trailer file</label>
                <input name="trailer" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file">
            </div>
            <div class="mt-5">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Movie file</label>
                <input name="movie" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file">
            </div>
            <div class="flex flex-row text-center mt-5 justify-evenly">
                <div class="flex items-center">
                    <input id="free" name="type" type="radio" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" required>
                    <label for="free" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Free movie</label>
                </div>
                <div class="flex items-center">
                    <input id="paid" name="type" type="radio" value="2" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="paid" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Paid movie</label>
                </div>
            </div>
            <button type="submit" class="bg-green-500 text-white p-2 rounded hover:bg-purple-400 mt-5">Add</button>
      </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#movieForm').on('submit', function(e){
                e.preventDefault();
                
                $.ajax({
                    url: "{{ route('get.movie') }}",
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(data){
                        $('#movieResults').empty();
                        if (Array.isArray(data) && data.length > 0) {
                            data.forEach(function(movie) {
                                $('#movieResults').append('<div class="flex items-center"><input id="movieId" name="movieId" type="radio" value="'+ movie.id+'"' +
                                'class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 '+
                                'dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" required><label for="movieId" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">'+ movie.title+'</label></a></div>');
                            });
                        } else {
                            $('#movieResults').append('<div class="mt-10 text-white">No movies found</div>');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                        $('#movieResults').empty();
                        $('#movieResults').append('<div class="mt-10 text-white">An error occurred while fetching movies</div>');
                    }
                });
            });
        });
    </script>
</body>
</html>
