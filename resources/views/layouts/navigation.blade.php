<nav class="relative flex flex-wrap items-center justify-between px-2 py-3 bg-sky-500 mb-3">
    <div class="container px-4 mx-auto flex flex-wrap items-center justify-between">
        <div class="w-full relative flex justify-between lg:w-auto  px-4 lg:static lg:block lg:justify-start">
            <!-- Logo -->
            <div class="shrink-0 flex items-center">
                <a href="{{ route('dashboard') }}">
                    <x-application-logo class="block h-10 w-auto fill-current text-white" />
                </a>
            </div>
            <button
                class="text-white cursor-pointer text-xl leading-none px-3 py-1 border border-solid border-transparent rounded bg-transparent block lg:hidden outline-none focus:outline-none"
                type="button" onclick="toggleNavbar('example-collapse-navbar')">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <div class="lg:flex flex-grow items-center hidden" id="example-collapse-navbar">
            <ul class="flex flex-col lg:flex-row list-none lg:ml-auto">
                <li class="nav-item">
                    <a class="px-3 py-2 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75"
                        href="{{ route('dashboard') }}">
                        <i class="fab fa-facebook-square text-lg leading-lg text-white opacity-75"></i><span
                            class="ml-2">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="px-3 py-2 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75"
                        href="{{ route('customers') }}">
                        <i class="fab fa-twitter text-lg leading-lg text-white opacity-75"></i><span
                            class="ml-2">Customer</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="px-3 py-2 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75"
                        href="{{ route('products') }}">
                        <i class="fab fa-pinterest text-lg leading-lg text-white opacity-75"></i><span
                            class="ml-2">Products</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="px-3 py-2 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75"
                        href="{{ route('sales') }}">
                        <i class="fab fa-pinterest text-lg leading-lg text-white opacity-75"></i><span
                            class="ml-2">Sales</span>
                    </a>
                </li>
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ Auth::user()->name }} (Click to Logout)
                        </x-dropdown-link>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
