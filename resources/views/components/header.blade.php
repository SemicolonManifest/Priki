<!-- This example requires Tailwind CSS v2.0+ -->
<nav class="bg-gray-800 mb-3">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                <!-- Mobile menu button-->
                <button type="button"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                        aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <!--
                      Icon when menu is closed.

                      Heroicon name: outline/menu

                      Menu open: "hidden", Menu closed: "block"
                    -->
                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <!--
                      Icon when menu is open.

                      Heroicon name: outline/x

                      Menu open: "block", Menu closed: "hidden"
                    -->
                    <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">

                <div class="flex-shrink-0 flex items-center">
                    <a href="/">
                    <img class="block lg:hidden h-8 w-auto"
                         src="https://tailwindui.com/img/logos/workflow-mark-indigo-500.svg" alt="Workflow">
                    <img class="hidden lg:block h-8 w-auto"
                         src="https://tailwindui.com/img/logos/workflow-logo-indigo-500-mark-white-text.svg"
                         alt="Workflow">
                </a>
                </div>
                <div class="hidden sm:block sm:ml-6 is-flex is-raw">
                    <div class="flex space-x-4 mr-2">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->

                        <div
                            class="navbar-item navbar-link has-dropdown is-hoverable bg-gray-900 text-white pr-6 px-3 py-2  rounded-md text-sm font-medium hover:bg-gray-700">
                            <a class=" text-white">
                                Domaines
                            </a>


                            <div class="navbar-dropdown text-white bg-gray-900 text-gray-300">
                                @foreach(\App\Models\Domain::all() as $domain)
                                    <a class="navbar-item hover:bg-gray-800 text-white"
                                       href="/domain/{{$domain->slug}}/practices">
                                        {{$domain->name}} ({{$domain->practices("PUB")->count()}})
                                    </a>
                                @endforeach
                            </div>
                        </div>


                        <!-- <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Team</a>

                         <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Projects</a>

                         <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Calendar</a>-->
                    </div>
                    <div class="flex space-x-4">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->

                        <a href="/references/" class="navbar-item is-hoverable bg-gray-900 text-white px-3 py-2  rounded-md text-sm font-medium hover:bg-gray-700">
                            <div class=" text-white">
                                References
                            </div>
                        </a>


                        <!-- <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Team</a>

                         <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Projects</a>

                         <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Calendar</a>-->
                    </div>
                </div>
            </div>
            <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">

                <!-- Profile dropdown -->
                <div class="ml-3 relative">
                    <div class="is-flex is-flex-direction-row">
                        <div class="navbar-item bg-gray-800 flex is-align-items-center text-sm rounded-full pl-3 bg-gray-900 mr-5"
                                 id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                <div class="mr-3 text-white">Théo Gautier - Exem début</div>


                            </div>
                        @if(\Illuminate\Support\Facades\Auth::check())

                            <div class="navbar-item has-dropdown is-hoverable bg-gray-800 flex is-align-items-center text-sm rounded-full pl-3 hover:bg-gray-800 bg-gray-900"
                                 id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                <div class="mr-3 text-white">{{ Auth::user()->fullname }}</div>
                                <img class="h-8 w-8 rounded-full"
                                     src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                     alt="">
                                <div class="navbar-dropdown text-white bg-gray-900 text-gray-300">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-dropdown-link class="navbar-item text-white" :href="route('logout')"
                                                         onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                            {{ __('auth.Log out') }}
                                        </x-dropdown-link>
                                    </form>
                                </div>
                            </div>
                        @else
                            <a class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium hover:bg-gray-800 bg-gray-900" href="/login">{{ __('auth.Log in') }}</a>
                            <a class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium hover:bg-gray-800 bg-gray-900" href="/register">{{ __('auth.Register') }}</a>
                        @endif
                    </div>

                    <!--
                      Dropdown menu, show/hide based on menu state.

                      Entering: "transition ease-out duration-100"
                        From: "transform opacity-0 scale-95"
                        To: "transform opacity-100 scale-100"
                      Leaving: "transition ease-in duration-75"
                        From: "transform opacity-100 scale-100"
                        To: "transform opacity-0 scale-95"

                    <div class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                        <! -- Active: "bg-gray-100", Not Active: "" -- >
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>
                    </div>
                -->
                </div>
            </div>
        </div>
    </div>
    </div>
</nav>
