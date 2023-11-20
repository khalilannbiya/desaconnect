<header>
    {{-- -- Navbar Before Login -- --}}
    <nav id="navbar"
        class="fixed top-0 left-0 z-10 flex items-center justify-between w-full px-6 py-3 md:py-5 lg:py-2 md:px-10 lg:px-24 2xl:px-48">
        <div>
            <a href="{{ route('index') }}#up">
                <img class="w-[2.5rem] md:w-16 lg:w-16" src="{{ asset('assets/images/logo.png') }}"
                    alt="Logo LaporDesa" />
            </a>
        </div>
        <ul id="navList"
            class="fixed lg:static flex flex-col lg:flex-row justify-center lg:justify-end items-center gap-5 md:gap-9 lg:gap-7 top-0 right-[-600px] md:right-[-1000px] h-screen lg:h-auto w-3/4 z-20 lg:z-0 bg-pewter-blue lg:bg-transparent lg:text-secondary font-semibold transition-all duration-1000">

            {{-- Before Login --}}
            @guest
            <li>
                <a href="{{ route('index') }}#up"
                    class="transition-all duration-500 md:text-lg lg:text-sm hover:text-vermillion active {{ in_array(Route::current()->getName(), ['index' ]) ? 'text-vermillion' : '' }}">Beranda</a>
            </li>
            <li>
                <a href="{{ route('index') }}#about"
                    class="transition-all duration-500 md:text-lg lg:text-sm hover:text-vermillion">Tentang
                    Kami</a>
            </li>
            <li>
                <a href="{{ route('complaints.public') }}"
                    class="transition-all duration-500 md:text-lg lg:text-sm hover:text-vermillion {{ in_array(Route::current()->getName(), ['complaints.public' ]) ? 'text-vermillion' : '' }}">Aduan
                    Public</a>
            </li>
            <li>
                <a href="{{ route('register') }}"
                    class="flex items-center justify-center w-32 border-2 border-black rounded-md md:w-40 lg:w-28 h-11 lg:h-9 md:text-lg lg:text-sm active:border-vermillion active:shadow-xl lg:hover:shadow-xl lg:hover:border-vermillion lg:transition-all lg:duration-500 lg:hover:transition-all lg:hover:duration-500 active:text-vermillion lg:hover:text-vermillion ">Daftar</a>
            </li>
            <li>
                <a href="{{ route('login') }}"
                    class="flex items-center justify-center w-32 text-white bg-black border-2 border-black rounded-md md:w-40 lg:w-28 h-11 lg:h-9 md:text-lg lg:text-sm active:border-vermillion active:shadow-xl active:bg-vermillion lg:hover:shadow-xl lg:hover:border-vermillion lg:transition-all lg:duration-500 lg:hover:transition-all lg:hover:duration-500 lg:hover:bg-vermillion lg:hover:text-white">Login</a>
            </li>
            @endguest


            @auth
            @if (auth()->user()->role->role === 'complainant')
            <li>
                <a href="{{ route('index') }}"
                    class="{{ Route::current()->getName() == 'index' ? 'text-vermillion' : 'text-black' }} md:text-lg lg:text-sm hover:text-vermillion transition-all duration-500 active">Beranda</a>
            </li>

            <li>
                <a href="{{ route('complainant.complaints.create') }}"
                    class="{{ Route::current()->getName() == 'complainant.complaints.create' ? 'text-vermillion' : 'text-black' }} md:text-lg lg:text-sm hover:text-vermillion transition-all duration-500">Buat
                    Aduan</a>
            </li>

            <li>
                <a href="{{ route('complainant.complaints.index') }}"
                    class="{{ Route::current()->getName() == 'complainant.complaints.index' ? 'text-vermillion' : 'text-black' }} md:text-lg lg:text-sm hover:text-vermillion transition-all duration-500">Riwayat</a>
            </li>

            <li>
                <a href="{{ route('profile.show') }}"
                    class="{{ Route::current()->getName() == 'profile.show' ? 'text-vermillion' : 'text-black' }} md:text-lg lg:text-sm hover:text-vermillion transition-all duration-500">Pengaturan</a>
            </li>


            @else
            <li>
                <a href="{{ auth()->user()->role_id === 2 ? route('staff.dashboard.index') : route('admin.dashboard.index') }}"
                    class="{{ Route::current()->getName() == 'index' ? 'text-vermillion' : 'text-black' }} md:text-lg lg:text-sm hover:text-vermillion transition-all duration-500 active">Dashboard</a>
            </li>
            @endif

            {{-- Logout Button --}}
            <li>
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf
                    <button type="submit"
                        class="flex items-center justify-center w-32 text-white bg-black border-2 border-black rounded-md md:w-40 lg:w-28 h-11 lg:h-9 md:text-lg lg:text-sm active:border-vermillion active:shadow-xl active:bg-vermillion lg:hover:shadow-xl lg:hover:border-vermillion lg:transition-all lg:duration-500 lg:hover:transition-all lg:hover:duration-500 lg:hover:bg-vermillion lg:hover:text-white">Logout</button>
                </form>
            </li>
            @endauth
        </ul>
        <div class="absolute z-30 right-6 md:right-9 lg:hidden" id="toggle">
            <svg xmlns="http://www.w3.org/2000/svg" id="iconToggle" class="icon icon-tabler icon-tabler-align-justified"
                width="27" height="27" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" fill="none"
                stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M4 6l16 0"></path>
                <path d="M4 12l16 0"></path>
                <path d="M4 18l12 0"></path>
            </svg>
        </div>
    </nav>
</header>