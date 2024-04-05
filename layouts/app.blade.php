<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">

    <meta name="application-name" content="{{ config('app.name') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }} @yield('page-title')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="https://unpkg.com/tippy.js@6/dist/tippy.css" />
    <style>
        [x-cloak] {
            display: none !important
        }

        .spin-dap-logo {
            -moz-animation: spindap 1s ease infinite;
            animation: spindap 1s ease infinite;
        }

        @keyframes spindap {
            0% {
                transform: rotateY(180deg);
            }

            40% {
                transform: translateY(-30px);
            }

            60% {
                transform: translateY(-15px);
            }

            100% {
                transform: rotateY(0deg);
            }
        }

        .spin-clock-logo {
            -moz-animation: spinclock 1s ease infinite;
            animation: spinclock 1s ease infinite;
        }

        @keyframes spinclock {
            0% {
                transform: rotateY(180deg);
            }

            40% {
                transform: translateY(-30px);
            }

            60% {
                transform: translateY(-15px);
            }

            100% {
                transform: rotateY(0deg);
            }
        }
        .dot {
            height: 18px;
            width: 18px;
            background-color: #fff;
            border: 1px solid;
            border-radius: 50%;
            display: inline-block;
        }
        .dot-shaded {
            height: 18px;
            width: 18px;
            background-color: #000;
            border-radius: 50%;
            display: inline-block;
        }
    </style>
    @livewireStyles
    @filamentStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('scripts')
</head>

<body class="antialiased">
    <x-banner />
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        <main>
            <div class="flex w-full min-h-screen overflow-x-clip">
                <div x-data="{}" x-cloak x-show="$store.sidebar.isOpen" x-transition.opacity.500ms
                    x-on:click="$store.sidebar.close()"
                    class="filament-sidebar-close-overlay fixed inset-0 z-20 w-full h-full bg-gray-900/50 lg:hidden">
                </div>

                <x-sidebar />

                <div x-data="{}"
                    x-bind:class="{
                        'lg:pl-[var(--collapsed-sidebar-width)] rtl:lg:pr-[var(--collapsed-sidebar-width)]': !$store
                            .sidebar.isOpen,
                        'filament-main-sidebar-open lg:pl-[var(--sidebar-width)] rtl:lg:pr-[var(--sidebar-width)]': $store
                            .sidebar.isOpen,
                    }"
                    x-bind:style="'display: flex'" class="flex-col gap-y-6 w-screen flex-1 rtl:lg:pl-0">
                    <header class="sticky top-0 z-10 flex h-[5rem] w-full shrink-0 items-center border-b bg-gray-100">
                        <div class="flex items-center w-full px-2 sm:px-4 md:px-6 lg:px-8">
                            <button x-cloak x-data="{}"
                                x-on:click="$store.sidebar.isOpen ? $store.sidebar.close() : $store.sidebar.open()"
                                class="shrink-0 flex items-center justify-center w-10 h-10 text-primary-500 rounded-full hover:bg-gray-500/5 focus:bg-primary-500/10 focus:outline-none lg:hidden">

                                <x-icons.menu class="text-primary" />
                            </button>

                            <div class="flex items-center justify-end  flex-1">
                                {{-- <x-layouts.topbar.breadcrumbs /> --}}
                                <x-topbar.app-user />
                            </div>
                        </div>
                    </header>
                    <div class="flex-1 w-full px-4 mx-auto md:px-6 lg:px-8">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </main>
    </div>

    @stack('modals')

    @livewire('notifications')
    @livewireScriptConfig
    @filamentScripts
</body>

</html>
