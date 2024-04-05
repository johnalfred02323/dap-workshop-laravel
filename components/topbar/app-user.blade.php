<div class="flex justify-between w-full h-full px-2 sm:pr-2 md:pr-3 lg:pr-5">

    <div>
        <a href="{{ route('home') }}"><img class=" w-56" src="{{ asset('image/banner-hrcp.png') }}" draggable="false" /></a>
    </div>
    {{-- <x-dropdown>
        <x-slot name="trigger">
            <button class="rounded-full">
                <x-icons.user-circle class="w-10" />
            </button>
        </x-slot>
        <x-slot name="content">
            <x-dropdown-link href="{{ route('qr-code.index') }}">QR Code</x-dropdown-link>
            <x-dropdown-link href="{{ route('home.upload-photo') }}">Upload Photo</x-dropdown-link>
            @livewire('sign-in.signout')


        </x-slot>
    </x-dropdown> --}}
    <x-dropdown align="right" width="48" class="my-auto">

        @if(auth()->guard('web')->check())
        <x-slot name="trigger">
            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                    <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->last_name }}" />
                </button>
            @else
                <span class="inline-flex rounded-md">
                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none focus:bg-gray-50 dark:focus:bg-gray-700 active:bg-gray-50 dark:active:bg-gray-700 transition ease-in-out duration-150">
                        {{ Auth::user()->last_name }}

                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </button>
                </span>
            @endif
        </x-slot>
        @elseif(Auth::guard('auth0-session')->check())
        <x-slot name="trigger">
            <span class="inline-flex rounded-md">
                <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none focus:bg-gray-50 dark:focus:bg-gray-700 active:bg-gray-50 dark:active:bg-gray-700 transition ease-in-out duration-150">
                    {{ Auth::user()->hris_number }}

                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                    </svg>
                </button>
            </span>
        </x-slot>
        @endif

        <x-slot name="content">
            <!-- Account Management -->
            <div class="block px-4 py-2 text-xs text-gray-400">
                {{ __('Manage Account') }}
            </div>

            <x-dropdown-link href="{{ route('profile.show') }}">
                {{ __('Profile') }}
            </x-dropdown-link>

            @if(auth()->guard('web')->check())
                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-dropdown-link href="{{ route('api-tokens.index') }}">
                        {{ __('API Tokens') }}
                    </x-dropdown-link>
                @endif
            @endif

            <div class="border-t border-gray-200 dark:border-gray-600"></div>

            <!-- Authentication -->

            @if(auth()->guard('web')->check())
                <form method="POST" action="{{ route('user-logout') }}" x-data>
                    @csrf

                    <x-dropdown-link href="{{ route('user-logout') }}"
                            @click.prevent="$root.submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
            @else

            <x-dropdown-link href="{{ route('logout') }}">
                {{ __('Log Out') }}
            </x-dropdown-link>
            @endif
        </x-slot>
    </x-dropdown>
</div>