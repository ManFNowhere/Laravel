

    <div class="py-12" id="body-section">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 lg:mt-20 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="flex flex-col sm:flex-row items-center">
                    <h2 class="text-white text-xl">Your plan</h2>
                    <div class="flex flex-row items-center my-4 mx-10">
                       <div class="flex flex-col sm:flex-row items-center">
                            <div class="flex lex-row">
                                <div class="bg-gray-900 p-2 rounded-l border-2 border-gray-900 content-center ">
                                    <img src="/storage/logo.png" class="w-10 mx-auto" alt="logo">
                                </div>
                                <div class="p-2 w-60 rounded-r border-2 border-gray-700">
                                    <h2 class="text-white font-bold text-xl">{{($product!=null)?$product->nickname:'Free'}}</h2>
                                    <p class="text-white">
                                        {{ $product != null ?  ($subscription->ends_at != null ? 'Canceled until ' : 'Renew on ')  . $date :''}}
                                    </p>
                                </div>
                            </div>
                        @if ($user->role==0 )
                            <a href="/subscription" class="text-white text-sm mx-4 my-4 sm:my-0 lg:mx-20 bg-purple-500 p-2 rounded hover:bg-purple-400 h-fit">Upgrade plan</a>
                        @elseif ($subscription->ends_at!=null)
                            <a href="/subscription" class="text-white text-sm mx-4 my-4 sm:my-0 lg:mx-20 bg-purple-500 p-2 rounded hover:bg-purple-400 h-fit">Manage plan</a>
                        @else
                            <a href="{{route('cancel.subscription', ['id'=>$subscription->stripe_id])}}" class="mx-4 my-4 sm:my-0 lg:mx-2 text-white text-sm bg-red-500 p-2 rounded hover:bg-red-400 h-fit">Cancel subscription</a>
                        @endif
                    </div>
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>


            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>


 <section>
    <div id="confirm-delete-body" class="hidden bg-gray-800 p-5 rounded w-3/4 mx-auto mt-30">
            <div class="flex flex-row justify-evenly">
                <h2 class="text-white text-xl font-bold">Are you sure you want to delete your account?</h2>
                <i id="cancel-modal-remove" class="fa-solid fa-circle-xmark text-white hover:text-red-500 text-xl"></i>
            </div>
            <h2 class="text-white">Once your account is deleted, all of its resources and subscription will be permanently deleted and canceled.</h2>
            <form class="flex flex-row items-center my-4" action="{{ route('profile.destroy') }}" method="post">
                @csrf
                <input type="password" name="delete_password" id="delete_password" placeholder="Your password"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500" required />
                <button id="delete-user" class="bg-red-700 text-white p-2 rounded hover:bg-red-500 mx-2">Confirm</button>
            </form>
        </div>
 </section>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const deleteButton =document.getElementById('delete-user');
            const deleteModal = document.getElementById('confirm-delete-body');
            const deleteCancel =document.getElementById('cancel-modal-remove')
            const navbar =document.getElementById('navbar');
            const bodySection =document.getElementById('profile-body');
            deleteButton.addEventListener('click', function (event){
                deleteModal.classList.toggle('hidden');
                bodySection.classList.add('hidden');
                navbar.classList.add('relative');
            });

            deleteCancel.addEventListener('click', function(){
                deleteModal.classList.toggle('hidden');
                bodySection.classList.toggle('hidden');
                navbar.classList.add('relative');
            });
        });

    </script>