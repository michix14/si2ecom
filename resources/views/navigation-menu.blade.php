<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <script src="https://kit.fontawesome.com/f6d8a61ed8.js" crossorigin="anonymous"></script>
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('shop') }}">
                    <!--    <x-application-mark class="block h-9 w-auto" />-->
                    <img src="/images/logo.jpg" alt="logo"
                    class="max-w-content h-10 object-contain max-w-content " >
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link href="{{ route('shop') }}" :active="request()->routeIs('shop')">
                        {{ __('Shop') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('notaventa.index') }}" :active="request()->routeIs('notaventa.index')">
                        {{ __('Mis Compras') }}
                    </x-nav-link>

                    

                    @role('admin')
                    <x-nav-link href="{{ route('promociones.index') }}" :active="request()->routeIs('promociones.*')">
                        {{ __('Promociones') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('empleado.index') }}" :active="request()->routeIs('empleado.*')">
                        {{ __('Empleados') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('roles.index') }}" :active="request()->routeIs('roles.*')">
                        {{ __('Roles') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('marca.index') }}" :active="request()->routeIs('marca.*')">
                        {{ __('Marcas') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('categoria.index') }}" :active="request()->routeIs('categoria.*')">
                        {{ __('Categorias') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('producto.index') }}" :active="request()->routeIs('producto.*')">
                        {{ __('Productos') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('nota-de-entrada.index') }}"
                        :active="request()->routeIs('nota-de-entrada.*')">
                        {{ __('Notas de Entrada') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('bitacora.index') }}" :active="request()->routeIs('bitacora.*')">
                        {{ __('Bitacora') }}
                    </x-nav-link>

                    @endrole
                </div>



            </div>

            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <!-- Shopping Cart Icon -->
                @role('cliente')
                <div class="mr-6">
                    <a href="{{ route('carrito.index') }}">
                        <i class="fas fa-shopping-cart"></i>
                    </a>
                </div>
                @endrole
                <!-- Teams Dropdown -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                <div class="ml-3 relative">
                    <x-dropdown align="right" width="60">
                        <x-slot name="trigger">
                            <span class="inline-flex rounded-md">
                                <button type="button"
                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                    {{ Auth::user()->currentTeam->name }}

                                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                    </svg>
                                </button>
                            </span>
                        </x-slot>

                        <x-slot name="content">
                            <div class="w-60">
                                <!-- Team Management -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Manage Team') }}
                                </div>

                                <!-- Team Settings -->
                                <x-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                    {{ __('Team Settings') }}
                                </x-dropdown-link>

                                @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                <x-dropdown-link href="{{ route('teams.create') }}">
                                    {{ __('Create New Team') }}
                                </x-dropdown-link>
                                @endcan

                                <!-- Team Switcher -->
                                @if (Auth::user()->allTeams()->count() > 1)
                                <div class="border-t border-gray-200"></div>

                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Switch Teams') }}
                                </div>

                                @foreach (Auth::user()->allTeams() as $team)
                                <x-switchable-team :team="$team" />
                                @endforeach
                                @endif
                            </div>
                        </x-slot>
                    </x-dropdown>
                </div>
                @endif


                <!-- Settings Dropdown -->
                <div class="ml-3 relative">

                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                            <button
                                class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                @if (Auth::user()->profile_photo_path)
                                <img class="h-8 w-8 rounded-full object-cover"
                                    src="/storage/{{Auth::user()->profile_photo_path }}"
                                    alt="{{ Auth::user()->name }}" />
                                @else
                                <img class="h-8 w-8 rounded-full object-cover"
                                    src="{{Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                @endif
                            </button>
                            @else
                            <span class="inline-flex rounded-md">
                                <button type="button"
                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                    {{ Auth::user()->name }}

                                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                    </svg>
                                </button>
                            </span>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Opciones de cuenta') }}
                            </div>

                            <x-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Editar perfil') }}
                            </x-dropdown-link>
                            @role('cliente')
                            <x-dropdown-link href="{{ route('cliente.edit', ['cliente' => auth()->user()->cliente->id]) }}">
                                {{ __('Editar Info') }}
                            </x-dropdown-link>
                            @endrole
                            <x-dropdown-link href="https://wa.me/+59175505559?text=Hola,%20necesito%20soporte">
                                <div class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-900">
                                    <img src="/images/whatsapp.png" alt="WhatsApp" class="block h-6 w-6 mr-3" />
                                    {{ __('Atención al cliente') }}
                                </div>
                            </x-dropdown-link>
                            
                            

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                            <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                {{ __('API Tokens') }}
                            </x-dropdown-link>
                            @endif

                            <div class="border-t border-gray-200"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                    {{ __('Cerrar Sesion') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link href="{{ route('shop') }}" :active="request()->routeIs('shop')">
                {{ __('shop') }}
            </x-responsive-nav-link>
            @role('admin')
            <x-responsive-nav-link href="{{ route('empleado.index') }}" :active="request()->routeIs('empleado.*')">
                {{ __('Empleados') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('roles.index') }}" :active="request()->routeIs('roles.*')">
                {{ __('Roles') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('marca.index') }}" :active="request()->routeIs('marca.*')">
                {{ __('Marcas') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('categoria.index') }}" :active="request()->routeIs('categoria.*')">
                {{ __('Categorias') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('producto.index') }}" :active="request()->routeIs('producto.*')">
                {{ __('Productos') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('nota-de-entrada.index') }}"
                :active="request()->routeIs('nota-de-entrada.*')">
                {{ __('Notas de Entrada') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('bitacora.index') }}" :active="request()->routeIs('bitacora.*')">
                {{ __('Bitacora') }}
            </x-responsive-nav-link>

            @endrole
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                <div class="shrink-0 mr-3">
                    @if (Auth::user()->profile_photo_path)
                    <img class="h-8 w-8 rounded-full object-cover" src="/storage/{{Auth::user()->profile_photo_path }}"
                        alt="{{ Auth::user()->name }}" />
                    @else
                    <img class="h-8 w-8 rounded-full object-cover" src="{{Auth::user()->profile_photo_url }}"
                        alt="{{ Auth::user()->name }}" />
                    @endif
                </div>
                @endif

                <div>
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Account Management -->
                <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                <x-responsive-nav-link href="{{ route('api-tokens.index') }}"
                    :active="request()->routeIs('api-tokens.index')">
                    {{ __('API Tokens') }}
                </x-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf

                    <x-responsive-nav-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>

                <!-- Team Management -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                <div class="border-t border-gray-200"></div>

                <div class="block px-4 py-2 text-xs text-gray-400">
                    {{ __('Manage Team') }}
                </div>

                <!-- Team Settings -->
                <x-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}"
                    :active="request()->routeIs('teams.show')">
                    {{ __('Team Settings') }}
                </x-responsive-nav-link>

                @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                <x-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                    {{ __('Create New Team') }}
                </x-responsive-nav-link>
                @endcan

                <!-- Team Switcher -->
                @if (Auth::user()->allTeams()->count() > 1)
                <div class="border-t border-gray-200"></div>

                <div class="block px-4 py-2 text-xs text-gray-400">
                    {{ __('Switch Teams') }}
                </div>

                @foreach (Auth::user()->allTeams() as $team)
                <x-switchable-team :team="$team" component="responsive-nav-link" />
                @endforeach
                @endif
                @endif
            </div>
        </div>
    </div>
</nav>