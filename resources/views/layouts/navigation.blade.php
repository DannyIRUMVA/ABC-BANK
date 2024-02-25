{{-- Heading with logo --}}

<div class="flex bg-white justify-center border-b-2 border-gray-300">
    <div class="ml-[-20em] p-2">
        <a href="{{ route('dashboard') }}">
            <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
        </a>
    </div>
</div>
{{-- End of Heading --}}

{{-- Navigation Section start--}}

<nav x-data="{ open: false }" class="bg-white border-b border-gray-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-center h-14">
            <div class="hidden space-x-4 sm:-my-px sm:ms-10 sm:flex">
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" class="mb-1 ml-1">
                        <path fill="currentColor" d="M6 19h3v-5q0-.425.288-.712T10 13h4q.425 0 .713.288T15 14v5h3v-9l-6-4.5L6 10zm-2 0v-9q0-.475.213-.9t.587-.7l6-4.5q.525-.4 1.2-.4t1.2.4l6 4.5q.375.275.588.7T20 10v9q0 .825-.588 1.413T18 21h-4q-.425 0-.712-.288T13 20v-5h-2v5q0 .425-.288.713T10 21H6q-.825 0-1.412-.587T4 19m8-6.75"/>
                    </svg>
                    {{ __(' Home') }}
                </x-nav-link>
                <x-nav-link :href="route('deposit.index')" :active="request()->routeIs('deposit.index')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
                        <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="1.5">
                        <path d="M6.286 19C3.919 19 2 17.104 2 14.765c0-2.34 1.919-4.236 4.286-4.236c.284 0 .562.028.83.08m7.265-2.582a5.765 5.765 0 0 1 1.905-.321c.654 0 1.283.109 1.87.309m-11.04 2.594a5.577 5.577 0 0 1-.354-1.962C6.762 5.528 9.32 3 12.476 3c2.94 0 5.361 2.194 5.68 5.015m-11.04 2.594a4.29 4.29 0 0 1 1.55.634m9.49-3.228C20.392 8.78 22 10.881 22 13.353c0 2.707-1.927 4.97-4.5 5.52"/>
                        <path stroke-linejoin="round" d="M12 16v6m0-6l2 2m-2-2l-2 2"/></g>
                    </svg>
                    {{ __('Deposit') }}
                </x-nav-link>
                <x-nav-link :href="route('withdraw.index')" :active="request()->routeIs('withdraw.index')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd" d="M12 15.25a.75.75 0 0 1 .75.75v4.19l.72-.72a.75.75 0 1 1 1.06 1.06l-2 2a.75.75 0 0 1-1.06 0l-2-2a.75.75 0 1 1 1.06-1.06l.72.72V16a.75.75 0 0 1 .75-.75" clip-rule="evenodd"/>
                        <path fill="currentColor" d="M12.226 3.5c-2.75 0-4.964 2.2-4.964 4.897c0 .462.065.909.185 1.331c.497.144.963.36 1.383.64a.75.75 0 1 1-.827 1.25a3.54 3.54 0 0 0-1.967-.589c-1.961 0-3.536 1.57-3.536 3.486C2.5 16.43 4.075 18 6.036 18a.75.75 0 0 1 0 1.5C3.263 19.5 1 17.276 1 14.515c0-2.705 2.17-4.893 4.864-4.983a6.366 6.366 0 0 1-.102-1.135C5.762 4.856 8.664 2 12.226 2c3.158 0 5.796 2.244 6.355 5.221c2.3.977 3.919 3.238 3.919 5.882c0 3.074-2.188 5.631-5.093 6.253a.75.75 0 0 1-.314-1.467c2.24-.48 3.907-2.446 3.907-4.786c0-2.137-1.39-3.962-3.338-4.628a5.018 5.018 0 0 0-1.626-.27c-.583 0-1.14.1-1.658.28a.75.75 0 0 1-.494-1.416a6.517 6.517 0 0 1 3.024-.305A4.962 4.962 0 0 0 12.226 3.5"/>
                    </svg>
                    {{ __('Withdraw') }}
                </x-nav-link>
                <x-nav-link :href="route('transfer.index')" :active="request()->routeIs('transfer.index')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 14 14">
                        <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><circle cx="5.5" cy="7" r="2"/><path d="M1.5 7h-1m9 0h4"/></g>
                    </svg>
                    {{ __('Transfer') }}
                </x-nav-link>
                <x-nav-link :href="route('statement')" :active="request()->routeIs('statement')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" class="ml-1">
                        <path fill="currentColor" d="M18 22H6q-.825 0-1.412-.587Q4 20.825 4 20V4q0-.825.588-1.413Q5.175 2 6 2h8l6 6v12q0 .825-.587 1.413Q18.825 22 18 22ZM13 9V4H6v16h12V9ZM6 9V4v16Zm2 4h8v-2H8Zm0 3h8v-2H8Zm0 3h5v-2H8Z"/>
                    </svg>
                    {{ __('Statement') }}
                </x-nav-link>
                <form method="POST" action="{{ route('logout') }}" class="hidden" id="logoutForm">
                    @csrf
                    <button type="submit">Logout</button>
                </form>

                <x-nav-link :href="route('logout')" :active="request()->routeIs('logout')" onclick="event.preventDefault(); document.getElementById('logoutForm').submit();">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M5 21q-.825 0-1.412-.587T3 19V5q0-.825.588-1.412T5 3h7v2H5v14h7v2zm11-4l-1.375-1.45l2.55-2.55H9v-2h8.175l-2.55-2.55L16 7l5 5z"/>
                    </svg>
                    {{ __('Logout') }}
                </x-nav-link>
            </div>
        </div>
    </div>
</nav>

{{-- Navigation Section end --}}
