<header>
    {{-- -- Navbar Before Login -- --}}
    <nav id="navbar"
        class="fixed top-0 left-0 z-10 flex items-center justify-between w-full px-6 py-3 md:py-5 lg:py-2 md:px-10 lg:px-24 2xl:px-48">
        <div>
            <a href="{{ route('index') }}#up">
                <img class="w-[2rem] md:w-14 lg:w-14" src="{{ asset('assets/images/logo.png') }}"
                    alt="Logo DesaConnect" />
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

            <li class="flex flex-col lg:block">
                <button type="button" id="dropdownBtnProfile"
                    class="flex flex-row justify-center text-black transition-all duration-500 lg:items-center md:text-lg lg:text-sm hover:text-vermillion {{ in_array(Route::current()->getName(), ['profile', 'government', 'data-penduduk']) ? 'text-vermillion' : '' }}">Profile
                    <img id="caret-dropdown-profile" class="-rotate-90 lg:w-5 transition-all duration-500"
                        src="{{ asset('assets/icons/caret-down.svg') }}"></button>

                <div class="flex-col items-center lg:gap-3 lg:items-start hidden lg:absolute lg:bg-[#E8C6B6] lg:rounded-md lg:px-3 lg:py-3"
                    id="dropdownContentProfile">
                    <a href="{{ route('profile') }}"
                        class="my-4 text-black transition-all duration-500 lg:my-0 md:text-lg lg:text-sm hover:text-vermillion">Sejarah
                        Desa</a>
                    <a href="{{ route('government') }}"
                        class="mb-4 text-black transition-all duration-500 lg:mb-0 md:text-lg lg:text-sm hover:text-vermillion">Pemerintahan</a>
                    <a href="{{ route('data-penduduk') }}"
                        class="text-black transition-all duration-500 md:text-lg lg:text-sm hover:text-vermillion">Data
                        Penduduk</a>
                </div>
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

            <li class="flex flex-col lg:block">
                <button type="button" id="dropdownBtnProfile"
                    class="flex flex-row justify-center text-black transition-all duration-500 lg:items-center md:text-lg lg:text-sm hover:text-vermillion {{ in_array(Route::current()->getName(), ['profile', 'government', 'data-penduduk']) ? 'text-vermillion' : '' }}">Profile
                    <img id="caret-dropdown-profile" class="-rotate-90 lg:w-5 transition-all duration-500"
                        src="{{ asset('assets/icons/caret-down.svg') }}"></button>

                <div class="flex-col items-center lg:gap-3 lg:items-start hidden lg:absolute lg:bg-[#E8C6B6] lg:rounded-md lg:px-3 lg:py-3"
                    id="dropdownContentProfile">
                    <a href="{{ route('profile') }}"
                        class="my-4 text-black transition-all duration-500 lg:my-0 md:text-lg lg:text-sm hover:text-vermillion">Sejarah
                        Desa</a>
                    <a href="{{ route('government') }}"
                        class="mb-4 text-black transition-all duration-500 lg:mb-0 md:text-lg lg:text-sm hover:text-vermillion">Pemerintahan</a>
                    <a href="{{ route('data-penduduk') }}"
                        class="text-black transition-all duration-500 md:text-lg lg:text-sm hover:text-vermillion">Data
                        Penduduk</a>
                </div>
            </li>

            <li class="flex flex-col lg:block">
                <button type="button" id="dropdownBtnLayanan"
                    class="flex flex-row justify-center text-black transition-all duration-500 lg:items-center md:text-lg lg:text-sm hover:text-vermillion {{ in_array(Route::current()->getName(), ['complainant.complaints.create', 'complainant.documents.create' ]) ? 'text-vermillion' : '' }}">Layanan
                    <img id="caret-dropdown" class="-rotate-90 lg:w-5 transition-all duration-500"
                        src="{{ asset('assets/icons/caret-down.svg') }}"></button>

                <div class="flex-col items-center lg:gap-3 lg:items-start hidden lg:absolute lg:bg-[#E8C6B6] lg:rounded-md lg:px-3 lg:py-3"
                    id="dropdownContentLayanan">
                    <a href="{{ route('complainant.documents.create') }}"
                        class="my-4 text-black transition-all duration-500 lg:my-0 md:text-lg lg:text-sm hover:text-vermillion">Pengajuan
                        Surat</a>
                    <a href="{{ route('complainant.complaints.create') }}"
                        class="text-black transition-all duration-500 md:text-lg lg:text-sm hover:text-vermillion">Buat
                        Aduan</a>
                </div>
            </li>

            <li class="flex flex-col lg:block">
                <button type="button" id="dropdownBtnRiwayat"
                    class="flex flex-row justify-center text-black transition-all duration-500 lg:items-center md:text-lg lg:text-sm hover:text-vermillion {{ in_array(Route::current()->getName(), ['complainant.complaints.index', 'complainant.documents.index' ]) ? 'text-vermillion' : '' }}">Riwayat
                    <img id="caret-dropdown-riwayat" class="-rotate-90 lg:w-5 transition-all duration-500"
                        src="{{ asset('assets/icons/caret-down.svg') }}"></button>

                <div class="flex-col items-center lg:gap-3 lg:items-start hidden lg:absolute lg:bg-[#E8C6B6] lg:rounded-md lg:px-3 lg:py-3"
                    id="dropdownContentRiwayat">
                    <a href="{{ route('complainant.documents.index') }}"
                        class="my-4 text-black transition-all duration-500 lg:my-0 md:text-lg lg:text-sm hover:text-vermillion">Pengajuan
                        Surat</a>
                    <a href="{{ route('complainant.complaints.index') }}"
                        class="text-black transition-all duration-500 md:text-lg lg:text-sm hover:text-vermillion">Aduan</a>
                </div>
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

@push("script")
<script>
    const dropdownBtnProfile = document.getElementById("dropdownBtnProfile");
    const dropdownContentProfile = document.getElementById("dropdownContentProfile");
    const caretDropdownProfile = document.getElementById('caret-dropdown-profile');

    const dropdownBtnLayanan = document.getElementById("dropdownBtnLayanan");
    const dropdownContentLayanan = document.getElementById("dropdownContentLayanan");
    const caretDropdownLayanan = document.getElementById('caret-dropdown');

    const dropdownBtnRiwayat = document.getElementById("dropdownBtnRiwayat");
    const dropdownContentRiwayat = document.getElementById("dropdownContentRiwayat");
    const caretDropdownRiwayat = document.getElementById('caret-dropdown-riwayat');


    dropdownBtnProfile.addEventListener('click', () => {
        dropdownContentProfile.classList.toggle('hidden');
        dropdownContentProfile.classList.toggle('flex');
        caretDropdownProfile.classList.toggle('-rotate-90');
    });

    if (dropdownBtnLayanan && dropdownBtnRiwayat) {
        dropdownBtnLayanan.addEventListener('click', () => {
            dropdownContentLayanan.classList.toggle('hidden');
            dropdownContentLayanan.classList.toggle('flex');
            caretDropdownLayanan.classList.toggle('-rotate-90');
        });

        dropdownBtnRiwayat.addEventListener('click', () => {
            dropdownContentRiwayat.classList.toggle('hidden');
            dropdownContentRiwayat.classList.toggle('flex');
            caretDropdownRiwayat.classList.toggle('-rotate-90');
        });
    }

    // Close dropdown content when clicking outside of the dropdown
    window.addEventListener('click', (event) => {

        if (!event.target.matches("#dropdownBtnProfile") && !event.target.matches("#dropdownContentProfile")) {
            dropdownContentProfile.classList.add('hidden');
            dropdownContentProfile.classList.remove('flex');
            caretDropdownProfile.classList.add('-rotate-90');
        }

        if (!event.target.matches("#dropdownBtnLayanan") && !event.target.matches("#dropdownContentLayanan")) {
            dropdownContentLayanan.classList.add('hidden');
            dropdownContentLayanan.classList.remove('flex');
            caretDropdownLayanan.classList.add('-rotate-90');
        }

        if (!event.target.matches("#dropdownBtnRiwayat") && !event.target.matches("#dropdownContentRiwayat")) {
            dropdownContentRiwayat.classList.add('hidden');
            dropdownContentRiwayat.classList.remove('flex');
            caretDropdownRiwayat.classList.add('-rotate-90');
        }
    });
</script>
@endpush