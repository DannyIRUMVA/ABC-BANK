<x-app-layout>
    <div class="flex py-12 ml-9">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm w-[34em]" style="font-size: 1em;">
                <div class="p-3 text-gray-500 border-b-2 border-gray-200">
                    Welcome {{ $name }}
                </div>
                <div class="p-3 text-1xl text-gray-500 border-b-2 border-gray-200">
                    YOUR ID
                    <span class="ml-[6em]">
                        {{ $email }}
                    </span>
                </div>
                <div class="p-3 text-gray-500 border-b-2 border-gray-200">
                    YOUR BALANCE
                    <span class="ml-10">
                        $ {{ $balance }}
                    </span>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
