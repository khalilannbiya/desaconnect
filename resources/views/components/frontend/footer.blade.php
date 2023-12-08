<footer class="px-6 pt-16 pb-5 md:px-10 lg:px-24 2xl:px-48 md:pt-28 lg:pt-36 lg:pb-8">
    <section class="flex flex-col gap-6 md:flex-row md:justify-between md:gap-0">
        <div>
            <img class="w-20 mb-4 md:w-28 lg:w-20" src="{{ asset('assets/images/logo.png') }}" alt="Logo LaporDesa">
            <address
                class="text-sm font-medium leading-6 md:text-base lg:text-sm text-davys-grey md:leading-7 lg:leading-7">
                Jl Menati 1 No. 25 Desa
                Puseurjaya, <br> Kec.
                Telukjambe Timur, Kabupaten Karawang, <br>
                Jawa Barat 41361
            </address>
        </div>
        <div>
            <ul>
                <li
                    class="mb-2 text-base transition-all duration-300 text-medium md:text-lg lg:text-sm lg:hover:text-vermillion active:text-vermillion">
                    <a href="{{ route('index') }}#up">Beranda</a>
                </li>

                @guest
                <li
                    class="mb-2 text-base transition-all duration-300 text-medium md:text-lg lg:text-sm lg:hover:text-vermillion active:text-vermillion">
                    <a href="{{ route('index') }}#lacak">Lacak Aduan</a>
                </li>
                <li
                    class="mb-2 text-base transition-all duration-300 text-medium md:text-lg lg:text-sm lg:hover:text-vermillion active:text-vermillion">
                    <a href="{{ route('government') }}">Pemerintahan</a>
                </li>
                <li
                    class="text-base transition-all duration-300 text-medium md:text-lg lg:text-sm lg:hover:text-vermillion active:text-vermillion">
                    <a href="{{ route('complaints.public') }}">Aduan Public</a>
                </li>
                @endguest

                @auth
                <li
                    class="mb-2 text-base transition-all duration-300 text-medium md:text-lg lg:text-sm lg:hover:text-vermillion active:text-vermillion">
                    <a href="{{ route('complainant.complaints.create') }}">Buat Aduan</a>
                </li>
                <li
                    class="mb-2 text-base transition-all duration-300 text-medium md:text-lg lg:text-sm lg:hover:text-vermillion active:text-vermillion">
                    <a href="{{ route('complainant.documents.create') }}">Pengajuan Surat</a>
                </li>
                <li
                    class="text-base transition-all duration-300 text-medium md:text-lg lg:text-sm lg:hover:text-vermillion active:text-vermillion">
                    <a href="{{ route('profile.show') }}">Pengaturan</a>
                </li>
                @endauth
            </ul>
        </div>
    </section>
    <h6 class="mt-6 text-xs md:text-sm lg:text-sm text-medium md:mt-8 md:text-center text-davys-grey">©2023. All
        Rights
        Reserved. <span class="text-vermillion">Desa Puseurjaya</span></h6>
</footer>