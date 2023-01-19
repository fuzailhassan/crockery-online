<x-app-layout>
    <x-slot:header>
        Add feedback
    </x-slot:header>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-3 overflow-hidden shadow-xl sm:rounded-lg">
                <div>
                    
                    <form action="{{ route('feedbacks.store') }}" method="post">
                        @csrf
                        <div class="flex flex-col justify-center items-center space-y-3">
                            <div class="justify-center w-full md:w-2/3">
                                <x-jet-label for="title" value="{{ __('Title') }}" />
                                <x-jet-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus autocomplete="name" />
                            </div>
                            <div class="justify-center w-full md:w-2/3">
                                <x-jet-label for="description" value="{{ __('Description') }}" />
                                <textarea id="description" name="description" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" id="discription" cols="30" rows="8">{{ old('description') }}</textarea> 
                            </div>
                            <div class="mt-4 text-center">
                                <x-jet-button class="">
                                    Submit
                                </x-jet-button>
                            </div>
    
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>