<footer class="px-6 md:px-10 lg:px-24 2xl:px-48 pt-16 pb-5 md:pt-28 lg:pt-36 lg:pb-8">
    <section class="flex flex-col md:flex-row md:justify-between gap-6 md:gap-0">
        <div>
            <img class="w-20 md:w-28 lg:w-20 mb-4" src="{{ asset('assets/images/logo.png') }}" alt="Logo LaporDesa">
            <address
                class="text-sm md:text-base lg:text-sm text-davys-grey font-medium leading-6 md:leading-7 lg:leading-7">
                Desa
                Lemahmulya, Kecamatan
                Majalaya, <br>
                Kabupaten
                Karawang 41370
            </address>
        </div>
        <div>
            <ul>
                <li
                    class="text-medium text-base md:text-lg lg:text-sm lg:hover:text-vermillion active:text-vermillion transition-all duration-300 mb-2">
                    <a href="{{ route('index') }}#up">Beranda</a>
                </li>

                @guest
                <li
                    class="text-medium text-base md:text-lg lg:text-sm lg:hover:text-vermillion active:text-vermillion transition-all duration-300 mb-2">
                    <a href="{{ route('index') }}#lacak">Lacak Aduan</a>
                </li>
                <li
                    class="text-medium text-base md:text-lg lg:text-sm lg:hover:text-vermillion active:text-vermillion transition-all duration-300 mb-2">
                    <a href="{{ route('index') }}#cara">Tata Cara</a>
                </li>
                <li
                    class="text-medium text-base md:text-lg lg:text-sm lg:hover:text-vermillion active:text-vermillion transition-all duration-300">
                    <a href="{{ route('index') }}#about">Tentang Kami</a>
                </li>
                @endguest

                @auth
                <li
                    class="text-medium text-base md:text-lg lg:text-sm lg:hover:text-vermillion active:text-vermillion transition-all duration-300 mb-2">
                    <a href="#">Buat Aduan</a>
                </li>
                <li
                    class="text-medium text-base md:text-lg lg:text-sm lg:hover:text-vermillion active:text-vermillion transition-all duration-300 mb-2">
                    <a href="#cara">Riwayat</a>
                </li>
                <li
                    class="text-medium text-base md:text-lg lg:text-sm lg:hover:text-vermillion active:text-vermillion transition-all duration-300">
                    <a href="{{ route('profile.show') }}">Pengaturan</a>
                </li>
                @endauth
            </ul>
        </div>
    </section>
    <h6 class="text-xs md:text-sm lg:text-sm text-medium mt-6 md:mt-8 md:text-center text-davys-grey">©2023. All
        Rights
        Reserved. <span class="text-vermillion">LaporDesa</span></h6>
</footer>