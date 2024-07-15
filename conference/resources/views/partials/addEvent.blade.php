@extends('layouts.main')

@section('container')
<section class="bg-gray-50 dark:bg-gray-900 text-center">
   <div class="flex flex-col items-center bg-gray-800 max-sm:mx-8 md:mx-32 mt-12 py-8 rounded-lg">
   
   <!-- Error handling-->
   @error('data')
      @include('partials.error')
   @enderror
   @error('description')
      @include('partials.error')
   @enderror
   @error('cover')
      @include('partials.error')
   @enderror
   @error('title')
      @include('partials.error')
   @enderror
   @error('time_id')
      @include('partials.error')
   @enderror
    <!-- start form add event -->

   <h2 class="mb-1 text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">Form Event</h2>
   <form action="{{ ($title==='Edit Event')?$data->slug:'add-event' }}" class="w-full px-10 text-center" method="post" enctype="multipart/form-data">
      @csrf
      <div class="my-5">
         <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Event Name</label>
         <input type="text" value="{{ ($title==='Edit Event')?$data->title: old('title') }}" name="title" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Example Event" required>
      </div>

      <div class="my-s">
         <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Event description</label>
         <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your description for your event here..." required>{{($title==='Edit Event')?$data->description:old('description') }}</textarea>
      </div>

      <!-- cover input -->
      @if($title!=='Edit Event')  
      <div class="flex items-center justify-center w-full mt-10">
         <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-30 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                  <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                  </svg>
                  <p class="text-l text-gray-500 dark:text-gray-400">Cover Event</p>
                  <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                  <p class="text-xs text-gray-500 dark:text-gray-400">PNG or JPG (MIN. 800x400px)</p>
            </div>
            <input id="dropzone-file" name="cover" type="file" class="hidden"/>
         </label>
      </div> 

      @endif

      <div class="my-5 flex flex-col lg:flex-row justify-between">
         <!-- available dates -->
         <div class="mt-5 lg:mr-2">
            <select id="date" name="date_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
               @if ($title==='Edit Event')
                  <option value="{{ $data->date->id }}" selected>{{$data->date->date}}</option>
               @else
               <option selected>Select date</option>
               @endif
               @foreach ($dates as $date)
                  <option value="{{ $date->id }}">{{ $date->date }}</option>
               @endforeach
            </select>
         </div>

         <!-- room -->
         <div class="mt-5 lg:mr-2">
            <select id="room" name="room_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
               <!-- <option selected>Select room</option> -->
               @if (($title==='Edit Event'))
                  <option value="{{ $data->room->id }}" selected>{{ $data->room->room_name}}</option>
                  @foreach ($room as $r)
                     <option value="{{ $r->id }}">{{ $r->room_name }}</option>
                  @endforeach
               @endif
            </select>
         </div>
         
         <!-- time -->
         <div class="mt-5 lg:mr-2">
            <select id="time_id" name="time_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
               <!-- <option selected>Select time</option> -->
               @if (($title==='Edit Event'))
                  <option value="{{ $data->time->id }}" selected>{{ $data->time->time_events}}</option>
                  @foreach ($time as $t)
                     <option value="{{ $t->id }}">{{ $t->time_events }}</option>
                  @endforeach
               @endif
              
            </select>
         </div>

         <!-- input file -->
         @if($title!=='Edit Event')            
            <input class="mt-5 block w-full lg:w-1/2 xl:w-2/3 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" name="data" type="file">
         @endif
      </div>
      <a href="{{($title==='Edit Event')?'/event/delete-event/'.$data->slug:'dashboard' }}"class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-3 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">{{ ($title==='Edit Event')?'Delete':'Back' }}</a>
      <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">{{ ($title==='Edit Event')?'Update':'Submit' }}</button>
   </form>
</div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
   $(document).ready(function() {
      $('#date').change(function() {
         var selectedDate = $(this).val();
         if (selectedDate) {
            $.ajax({
               url: '{{ route("get-room") }}',
               type: 'GET',
               data: { date: selectedDate },
               success: function(data) {
                  // Clear current options
                  $('#room').empty().append('<option selected>Select room</option>');
                  // Populate rooms
                  $.each(data.rooms, function(key, room) {
                     $('#room').append('<option value="'+room.id+'">'+room.room_name+'</option>');
                  });
               }
            });
         }
      });
      $('#room').change(function() {
         var selectedRoom = $(this).val();
         if (selectedRoom) {
            $.ajax({
               url: '{{ route("get-time") }}',
               type: 'GET',
               data: { room: selectedRoom },
               success: function(data) {
                  // Clear current options
                  $('#time_id').empty().append('<option selected>Select time</option>');
                  // Populate times
                  $.each(data.times, function(key, time) {
                     $('#time_id').append('<option value="'+time.id+'">'+time.time_events+'</option>');
                  });
               }
            });
         }
      });
   });
</script>
@endsection
