<div class="flex justify-between w-full h-full px-2 sm:pr-2 md:pr-3 lg:pr-5">
    <x-dropdown align="right" width="48" class="my-auto">

        <x-slot name="trigger">
            <span class="inline-flex rounded-md">
                <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none focus:bg-gray-50 dark:focus:bg-gray-700 active:bg-gray-50 dark:active:bg-gray-700 transition ease-in-out duration-150">
                    @auth {{ Auth::user()->last_name }} @endauth

                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                    </svg>
                </button>
            </span>
        </x-slot>


        <x-slot name="content">
            <!-- Account Management -->
            <div class="block px-4 py-2 text-xs text-gray-400">
                {{ __('Manage Account') }}
            </div>

            <div class="border-t border-gray-200 dark:border-gray-600"></div>

            <!-- Authentication -->


            {{-- <x-dropdown-link href="{{ route('logout') }}">
                {{ __('Log Out') }}
            </x-dropdown-link> --}}
        </x-slot>
    </x-dropdown>
</div>
