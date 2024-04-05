<aside x-data="{}" x-cloak
    x-bind:class="$store.sidebar.isOpen ? 'translate-x-0 max-w-[20em] lg:max-w-[var(--sidebar-width)]' :
        '-translate-x-full lg:translate-x-0 lg:max-w-[var(--collapsed-sidebar-width)] rtl:lg:-translate-x-0 rtl:translate-x-full'"
    class="fixed inset-y-0 left-0 rtl:left-auto rtl:right-0 z-20 flex flex-col h-screen overflow-hidden shadow-2xl transition-all bg-gray-100  rtl:lg:border-r-0 rtl:lg:border-l w-[var(--sidebar-width)] lg:z-0 lg:translate-x-0 rtl:lg:-translate-x-0 rtl:translate-x-full">
    <header class="h-[5rem] shrink-0 flex items-center justify-center">
        <div x-show="$store.sidebar.isOpen ? 'hidden' : ''" class="flex items-center jusify-center px-8 w-full">
            <button x-data="{}"
                x-on:click.stop="$store.sidebar.isOpen ? $store.sidebar.close() : $store.sidebar.open()"
                class=" flex items-center">
                <img class="w-11 h-11 rotate-back" src="{{ asset('image/applogo.png') }}" />
                <img class="h-8 ml-2" src="{{ asset('image/dap-label.png') }}" />
            </button>
        </div>
        <button x-data="{}" x-show="$store.sidebar.isOpen ? '' : 'hidden'"
            x-on:click.stop="$store.sidebar.isOpen ? $store.sidebar.close() : $store.sidebar.open()"
            class="rounded-full">
            <img class="w-11 h-11 rotate" src="{{ asset('image/applogo.png') }}" />
        </button>

    </header>
    @if(auth()->guard('web')->check())
    <nav class="flex-1 py-6 overflow-y-auto">
        <ul class="px-6 space-y-6">
            <x-sidebar.group>
                <x-sidebar.item tooltip="Dashboard" :url="route('dashboard')" :active="request()->routeIs('dashboard')">
                    <x-icons.home class="h-6 w-6 shrink-0" />
                    <div class="flex flex-1" x-data="{}" x-show="$store.sidebar.isOpen">
                        Dashboard
                    </div>
                </x-sidebar.item>
            </x-sidebar.group>
            <li>
                <div @class(['border-t -mr-6 rtl:-mr-auto rtl:-ml-6'])></div>
            </li>
            <x-sidebar.group label="Careers">
                <x-sidebar.item tooltip="Careers" :url="route('careers.authenticated')" :active="request()->routeIs('careers.authenticated')">
                    <x-icons.document-search class="h-6 w-6 shrink-0" />
                    <div class="flex flex-1" x-data="{}" x-show="$store.sidebar.isOpen">
                        Career Vacancies
                    </div>
                </x-sidebar.item>
                <x-sidebar.item tooltip="Application History" :url="route('careers.history')" :active="request()->routeIs('careers.history')">
                    <x-icons.document-text class="h-6 w-6 shrink-0" />
                    <div class="flex flex-1" x-data="{}" x-show="$store.sidebar.isOpen">
                        Application History
                    </div>
                </x-sidebar.item>
            </x-sidebar.group>
            <li>
                <div @class(['border-t -mr-6 rtl:-mr-auto rtl:-ml-6'])></div>
            </li>
            <x-sidebar.group label="Personal Data Sheet">
                <x-sidebar.item tooltip="Personal Information" :url="route('pds.personal-info')" :active="request()->routeIs('pds.personal-info')">
                    <x-icons.user class="h-4 w-4 shrink-0" />
                    <div class="flex flex-1" x-data="{}" x-show="$store.sidebar.isOpen">
                        Personal Information
                    </div>
                </x-sidebar.item>
                <x-sidebar.item tooltip="Family Background" :url="route('pds.family-background')" :active="request()->routeIs('pds.family-background')">
                    <x-icons.user-group class="h-4 w-4 shrink-0" />
                    <div class="flex flex-1"
                        x-data="{}"
                        x-show="$store.sidebar.isOpen">
                        Family Background
                    </div>
                </x-sidebar.item>


                <x-sidebar.item tooltip="Educational Background" :url="route('pds.educational-background')" :active="request()->routeIs('pds.educational-background')">
                    <x-icons.academic-cap class="h-4 w-4 shrink-0" />
                    <div class="flex flex-1"
                        x-data="{}"
                        x-show="$store.sidebar.isOpen">
                        Educational Background
                    </div>
                </x-sidebar.item>

                <x-sidebar.item tooltip="Work Experince" :url="route('pds.work-experience')" :active="request()->routeIs('pds.work-experience')">
                    <x-icons.briefcase class="h-4 w-4 shrink-0" />
                    <div class="flex flex-1"
                        x-data="{}"
                        x-show="$store.sidebar.isOpen">
                        Work Experince
                    </div>
                </x-sidebar.item>

                <x-sidebar.item tooltip="Training and Certificates" :url="route('pds.training-certificate-record')" :active="request()->routeIs('pds.training-certificate-record')">
                    <x-icons.star class="h-4 w-4 shrink-0" />
                    <div class="flex flex-1"
                        x-data="{}"
                        x-show="$store.sidebar.isOpen">
                        Training and Certificates
                    </div>
                </x-sidebar.item>
            </x-sidebar.group>
        </ul>
    </nav>
    @elseif(Auth::guard('auth0-session')->check())
    <nav class="flex-1 py-6 overflow-y-auto">
        <ul class="px-6 space-y-6">
            <x-sidebar.group>
                <x-sidebar.item tooltip="Home" :url="route('home')" :active="request()->routeIs('home')">
                    <x-icons.home class="h-6 w-6 shrink-0" />
                    <div class="flex flex-1" x-data="{}" x-show="$store.sidebar.isOpen">
                        Home
                    </div>
                </x-sidebar.item>
            </x-sidebar.group>
            <li>
                <div @class(['border-t -mr-6 rtl:-mr-auto rtl:-ml-6'])></div>
            </li>
            @if(auth()->user()->isAdmin() || auth()->user()->isAdminCoord())
                <x-sidebar.group>
                    <x-sidebar.item tooltip="Personnel Requisition Form" :url="route('pr.index')" :active="request()->routeIs('pr.index')">
                        <x-icons.document-text class="h-4 w-4 shrink-0" />
                        <div class="flex flex-1"
                            x-data="{}"
                            x-show="$store.sidebar.isOpen">
                            Personnel Requisition Form
                        </div>
                    </x-sidebar.item>
                </x-sidebar.group>
                <li>
                    <div @class(['border-t -mr-6 rtl:-mr-auto rtl:-ml-6'])></div>
                </li>
            @endif
            @if(auth()->user()->isAdmin())
                <x-sidebar.group>
                    <x-sidebar.item tooltip="Job Applicants" :url="route('applicant.index')" :active="request()->routeIs('applicant.index')">
                        <x-icons.document-add class="h-4 w-4 shrink-0" />
                        <div class="flex flex-1"
                            x-data="{}"
                            x-show="$store.sidebar.isOpen">
                            Job Applicants
                        </div>
                    </x-sidebar.item>
                </x-sidebar.group>
                <li>
                    <div @class(['border-t -mr-6 rtl:-mr-auto rtl:-ml-6'])></div>
                </li>
            @endif

            <x-sidebar.group label="Personal Data Sheet">
                <x-sidebar.item tooltip="Personal Information" :url="route('employee.pds.personal-info')" :active="request()->routeIs('employee.pds.personal-info')">
                    <x-icons.user class="h-4 w-4 shrink-0" />
                    <div class="flex flex-1" x-data="{}" x-show="$store.sidebar.isOpen">
                        Personal Information
                    </div>
                </x-sidebar.item>
                <x-sidebar.item tooltip="Family Background" :url="route('employee.pds.family-background')" :active="request()->routeIs('employee.pds.family-background')">
                    <x-icons.user-group class="h-4 w-4 shrink-0" />
                    <div class="flex flex-1"
                        x-data="{}"
                        x-show="$store.sidebar.isOpen">
                        Family Background
                    </div>
                </x-sidebar.item>


                <x-sidebar.item tooltip="Educational Background" :url="route('employee.pds.educational-background')" :active="request()->routeIs('employee.pds.educational-background')">
                    <x-icons.academic-cap class="h-4 w-4 shrink-0" />
                    <div class="flex flex-1"
                        x-data="{}"
                        x-show="$store.sidebar.isOpen">
                        Educational Background
                    </div>
                </x-sidebar.item>

                <x-sidebar.item tooltip="Work Experince" :url="route('employee.pds.work-experience')" :active="request()->routeIs('employee.pds.work-experience')">
                    <x-icons.briefcase class="h-4 w-4 shrink-0" />
                    <div class="flex flex-1"
                        x-data="{}"
                        x-show="$store.sidebar.isOpen">
                        Work Experince
                    </div>
                </x-sidebar.item>

                <x-sidebar.item tooltip="Civil Service Eligibility" :url="route('employee.pds.civil-service-eligibility')" :active="request()->routeIs('employee.pds.civil-service-eligibility')">
                    <x-icons.book-open class="h-4 w-4 shrink-0" />
                    <div class="flex flex-1"
                        x-data="{}"
                        x-show="$store.sidebar.isOpen">
                        Civil Service Eligibility
                    </div>
                </x-sidebar.item>

                <x-sidebar.item tooltip="Training and Certificates" :url="route('employee.pds.training-certificate-record')" :active="request()->routeIs('employee.pds.training-certificate-record')">
                    <x-icons.star class="h-4 w-4 shrink-0" />
                    <div class="flex flex-1"
                        x-data="{}"
                        x-show="$store.sidebar.isOpen">
                        Training and Certificates
                    </div>
                </x-sidebar.item>
            </x-sidebar.group>

        </ul>
    </nav>
    @endif
</aside>
