@extends('layouts.frontend')

@section('title')
@guest
<title>DesaConnect</title>
@endguest
@auth
<title>Beranda | DesaConnect</title>
@endauth
@endsection

@section('content')

{{-- Jumbotron --}}
<section id="up"
    class="relative flex flex-col items-center justify-center h-screen px-6 overflow-x-hidden gap-7 md:gap-12 lg:gap-12 md:px-10 lg:px-24 2xl:px-48">
    <h1 id="up" class="text-4xl font-bold md:text-7xl xl:text-7xl">Desa<span class="text-vermillion">Connect</span></h1>
    <p
        class="text-xs font-medium leading-5 text-center md:px-20 lg:px-32 text-davys-grey md:text-base lg:text-sm md:leading-8 lg:leading-7">
        Kami mengundang Anda untuk menjadi bagian dari perubahan positif di desa kita. Dengan bergabung dalam Sistem
        Informasi Pengaduan Masyarakat dan Pengajuan Surat Desa, Anda memiliki kesempatan unik untuk memberikan
        kontribusi nyata dan membentuk masa depan desa kita</p>
    <div class="flex flex-wrap-reverse justify-center gap-4 font-semibold md:gap-7 lg:gap-6">

        @guest
        <a href="{{ route('login') }}"
            class="px-5 py-2 border-2 border-black rounded-md md:px-10 md:py-3 lg:text-lg active:border-vermillion active:shadow-xl active:text-vermillion md:text-xl lg:hover:border-vermillion lg:hover:shadow-xl lg:hover:text-vermillion lg:transition-all lg:duration-500 lg:hover:transition-all lg:hover:duration-500">Pengajuan
            Surat</a>
        @endguest

        @auth
        @if (auth()->user()->role->role === 'complainant')
        <a href="{{ route('complainant.documents.create') }}"
            class="px-5 py-2 border-2 border-black rounded-md md:px-10 md:py-3 lg:text-lg active:border-vermillion active:shadow-xl active:text-vermillion md:text-xl lg:hover:border-vermillion lg:hover:shadow-xl lg:hover:text-vermillion lg:transition-all lg:duration-500 lg:hover:transition-all lg:hover:duration-500">Pengajuan
            Surat</a>
        @endif
        @endauth
        <a href="{{ auth()->user() ? route('complainant.complaints.create') : route('login') }}"
            class="px-5 py-2 text-white bg-black border-2 border-black rounded-md md:px-10 md:py-3 lg:text-lg active:border-vermillion active:bg-vermillion active:shadow-xl md:text-xl lg:hover:bg-vermillion lg:hover:border-vermillion lg:hover:shadow-xl lg:transition-all lg:duration-500 lg:hover:transition-all lg:hover:duration-500">Laporkan!</a>
    </div>
    <img class="absolute w-1/4 md:w-44 xl:w-[10rem] right-[-8%] md:-right-12 bottom-[7%] -z-10"
        src="{{ asset('assets/icons/stars.png') }}" alt="">
</section>

@guest
{{-- Input Unic Code --}}
<section id="lacak" class="px-6 py-16 overflow-x-hidden md:px-10 lg:px-24 2xl:px-48 md:py-28 lg:py-36 md:bg-white">
    <div class="relative border-black md:border-2 md:py-11 md:px-8 lg:px-12 md:rounded-md md:shadow-4xl">
        <h1 class="text-3xl font-semibold text-center md:text-5xl">Lacak aduan Anda!</h1>
        <p
            class="mt-6 text-xs leading-5 text-center xl:px-32 md:text-base lg:text-sm text-davys-grey md:mt-7 md:leading-8 lg:leading-8">
            Gunakan kode unik untuk cek kemajuan tindak lanjut aduan Anda. Kode ini diperoleh saat mengirim
            aduan, cek kembali detail aduan yang dikirim.</p>
        <form class="flex flex-col flex-wrap justify-center mt-6 md:mt-7 md:flex-row gap-7"
            action="{{ route('complaints.track') }}" method="get">
            <div id="otp" class="flex flex-wrap items-center justify-center gap-2 md:gap-4">
                <input class="aspect-square w-[13%] md:w-14 text-center shadow-3xl" required type="text" id="first"
                    name="first" maxlength=" 1" />
                <input class="aspect-square w-[13%] md:w-14 text-center shadow-3xl" required type="text" id="second"
                    name="second" maxlength="1" />
                <input class="aspect-square w-[13%] md:w-14 text-center shadow-3xl" required type="text" id="third"
                    name="third" maxlength=" 1" />
                <span class="font-medium md:text-lg">-</span>
                <input class="aspect-square w-[13%] md:w-14 text-center shadow-3xl" required type="text" id="fourth"
                    name="fourth" maxlength="1" />
                <input class="aspect-square w-[13%] md:w-14 text-center shadow-3xl" required type="text" id="fifth"
                    name="fifth" maxlength=" 1" />
                <input class="aspect-square w-[13%] md:w-14 text-center shadow-3xl" required type="text" id="sixth"
                    name="sixth" maxlength=" 1" />
            </div>
            <button
                class="py-2 font-semibold text-white bg-black rounded-md md:py-4 md:px-8 lg:px-10 active:shadow-lg active:bg-vermillion lg:hover:bg-vermillion lg:hover:shadow-xl lg:transition-all lg:duration-500 lg:hover:transition-all lg:hover:duration-500"
                type="submit">Lacak</button>
        </form>
        <img class="absolute top-0 left-0 w-[5%] md:w-24 lg:w-32 md:-top-7 lg:-top-10 md:-left-6 lg:-left-10"
            src="{{ asset('assets/icons/star.png') }}" alt="Icon Star">
    </div>
</section>
@endguest

{{-- Cards How To Report --}}
<section id="cara"
    class="flex flex-col px-6 py-16 md:px-10 lg:px-24 2xl:px-48 md:py-28 lg:py-36 md:flex-wrap md:flex-row gap-7 md:gap-3 lg:gap-6 md:justify-center">
    <div
        class="flex flex-col gap-2 lg:gap-4 md:w-24 md:flex-wrap md:grow items-center justify-center px-5 md:px-6 py-8 md:py-6 border-2 border-black rounded-md shadow-[6px_6px_0px_#cd4631]">
        <i class="ti ti-ballpen text-vermillion font-medium text-[3rem] md:text-[2rem] lg:text-[3rem]"></i>
        <h3 class="text-lg font-semibold text-center md:text-base lg:text-lg text-davys-grey">Tulis Aduan</h3>
        <p class="text-sm leading-6 text-center md:text-xs lg:text-sm lg:leading-6 text-davys-grey">Silakan
            sampaikan aduan
            Anda secara
            jelas dan
            lengkap</p>
    </div>
    <div
        class="flex flex-col gap-2 lg:gap-4 md:w-24 md:flex-wrap md:grow items-center justify-center px-5 md:px-6 py-8 md:py-6 border-2 border-black rounded-md shadow-[6px_6px_0px_#cd4631]">
        <i class="ti ti-loader text-vermillion font-medium text-[3rem] md:text-[2rem] lg:text-[3rem]"></i>
        <h3 class="text-lg font-semibold text-center md:text-base lg:text-lg text-davys-grey">Tindak Lanjut</h3>
        <p class="text-sm leading-6 text-center md:text-xs lg:text-sm lg:leading-6 text-davys-grey">Aduan Anda
            akan
            langsung
            kami
            tangani setelah
            kami
            menerimanya.</p>
    </div>
    <div
        class="flex flex-col gap-2 lg:gap-4 md:w-24 md:flex-wrap md:grow items-center justify-center px-5 md:px-6 py-8 md:py-6 border-2 border-black rounded-md shadow-[6px_6px_0px_#cd4631]">
        <i class="ti ti-discount-check text-vermillion font-medium text-[3rem] md:text-[2rem] lg:text-[3rem]"></i>
        <h3 class="text-lg font-semibold text-center md:text-base lg:text-lg text-davys-grey">Selesai</h3>
        <p class="text-sm leading-6 text-center md:text-xs lg:text-sm lg:leading-6 text-davys-grey">Kami akan
            menutup aduan
            Anda setelah
            tindak
            lanjut
            selesai.</p>
    </div>
</section>

{{-- About Us --}}
<section id="about"
    class="flex flex-col justify-center px-6 py-16 overflow-x-hidden gap-9 md:gap-14 lg:gap-16 md:px-10 lg:px-24 2xl:px-48 md:py-28 lg:py-36 md:bg-white">
    <div class="relative">
        <h2 class="text-3xl font-semibold text-center md:text-5xl">Tentang Kami</h2>
        <img class="w-[10%] md:w-16 lg:w-14 absolute left-[5%] md:left-[14%] lg:left-[30%] -top-5 md:-top-9"
            src="{{ asset('assets/icons/vector-2.png') }}" alt="Icon">
    </div>
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.4380937278606!2d107.29553927448806!3d-6.337257262004191!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6976244c3e79f7%3A0x4d2eeeae0776b25e!2sKantor%20Desa%20Puseur%20Jaya!5e0!3m2!1sen!2sid!4v1701268659390!5m2!1sen!2sid"
        class="aspect-square md:aspect-video lg:h-96 border-2 border-black rounded-md shadow-[6px_6px_0px_#cd4631] md:shadow-[9px_9px_0px_#cd4631]"
        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    <div class="md:bg-champagne md:px-4 lg:px-6 md:py-8 lg:py-10 md:rounded">
        <p class="font-medium text-center md:text-lg lg:text-base lg:leading-8 text-davys-grey"><i
                class="ti ti-quote text-vermillion"></i> Kami
            adalah tim penuh
            semangat yang
            berkomitmen untuk mewujudkan
            aspirasi Anda
            dan Indonesia yang
            lebih
            maju dan sejahtera. Lewat sistem ini, kami ingin menawarkan peluang untuk Anda berbagi kisah,
            menyampaikan informasi terbaru, dan memberikan masukan terkait harapan Anda. Dengan tim responsif
            yang
            siap merespon Anda, kami ingin memberikan layanan yang dekat dan terpercaya agar Anda bisa
            mengontrol kinerja kami serta memberi saran dan masukan bagi pengembangan kami di masa depan.
            Bersama-sama, mari kita wujudkan impian dan cita-cita bersama untuk kebaikan Indonesia. <i
                class="ti ti-quote text-vermillion"></i></p>
    </div>
</section>

@endsection