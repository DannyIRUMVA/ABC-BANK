<x-app-layout>

    {{-- Alerts --}}
    @if (session('success'))
        <script>
            alert('{{ session('success') }}');
        </script>
    @endif

    @if (session('error'))
        <script>
            alert('{{ session('error') }}');
        </script>
    @endif

    <div class="flex py-12 ml-9">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm w-[29em]" style="font-size: 1em;">
                <div class="flex p-3 text-gray-500 border-b-2 border-gray-200">
                    <h3 class="text-gray-700 ml-5">Transfer Money</h3>
                </div>
                <div class="flex justify-center">
                    <form method="POST" action="{{ route('transfer') }}">
                        @csrf

                        <div class="p-2">
                            <x-input-label for="email" :value="__('Email')" class="mb-2 ml-4"/>
                            <x-text-input id="email" class="ml-4" type="text" name="email" :value="old('email')" required autofocus autocomplete="email" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <div class="p-2 pb-5">
                            <x-input-label for="amount" :value="__('Amount')" class="mb-2 ml-4"/>
                            <x-text-input id="amount" class="ml-4" type="number" name="amount" :value="old('amount')" required autofocus autocomplete="amount" />
                            <x-input-error :messages="$errors->get('amount')" class="mt-2" />
                        </div>

                        <div class="flex justify-center pb-5">
                            <x-primary-button class="ms-4 justify-center">
                                {{ __('Transfer') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
