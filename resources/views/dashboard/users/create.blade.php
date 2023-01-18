<x-dashboard-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg sm:p-8">  
                <h1 class="text-center text-3xl my-8">
                    Add a User
                </h1>         
                <x-jet-validation-errors class="mb-4" />
     
                <div class="overflow-auto flex flex-col my-4">
                    <form method="post" action="{{ route('users.store')}}">
                        @csrf                        
                        {{-- form sections --}}
                        <div class="flex flex-col text-lg sm:flex-row justify-center justify-items-center">
                            {{-- form secton --}}
                            <div class="flex flex-col space-y-6">
                                <div class="">
                                    <x-jet-label for="name" value="{{ __('Name') }}" />
                                    <x-jet-input id="name" class="block mt-1 w-full p-3" type="text" name="name" :value="old('name')"   required autofocus autocomplete="name" />
                                </div>
                                <div>
                                    <x-jet-label for="email" value="{{ __('Email') }}" />
                                    <x-jet-input id="email" class="block mt-1 w-full p-3" type="email" name="email" :value="old('email')" required autocomplete="email" />
                                </div>
                                <div>
                                    <x-jet-label for="password" value="{{ __('Password') }}" />
                                    <x-jet-input id="password" class="block mt-1 w-full p-3" type="text" name="password" required autocomplete="password" />
                                </div>
                                <div>
                                    <x-jet-label for="confirm_password" value="{{ __('Confirm Password') }}" />
                                    <x-jet-input id="confirm_password" class="block mt-1 w-full p-3" type="text" name="password_confirmation" required />
                                </div>
                                {{-- <div class="flex ">
                                    <x-jet-label for="email_verified_at" value="{{ __('Email Verified') }}" />
                                    <x-jet-input id="email_verified_at" class="block mt-1 ml-3 w-6 p-3" type="checkbox" name="email_verified_at"  />
                                </div> --}}
                                    
                                <input type="hidden" name="isAdmin" value='0'>
                                <div class="flex ">
                                    <x-jet-label for="isAdmin" value="{{ __('Make Admin') }}" />
                                    <x-jet-input id="isAdmin" class="block mt-1 ml-3 w-6 p-3" type="checkbox" name="isAdmin" value="1" />
                                </div>
                                <div class="flex justify-center">
                                    <x-jet-button class="text-center">
                                        Create
                                    </x-jet-button>

                                </div>
                                
                            </div>
                            {{-- form section --}}
                            <div>

                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>