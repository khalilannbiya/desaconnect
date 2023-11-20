@extends('layouts.frontend')

@section('title')
<title>Detail Aduan | LaporDesa</title>
@endsection

@section('content')
{{-- Jumbotron --}}
<section
    class="relative flex flex-col items-center justify-center h-screen px-6 overflow-x-hidden gap-7 lg:gap-8 md:px-10 lg:px-24 2xl:px-48">

    {{-- Show Status Complaint --}}
    @include('components.frontend.conditional-statement.show-status-detail')

    <h1 class="text-3xl font-bold leading-10 text-center detail-title md:text-5xl xl:text-6xl md:leading-normal">
        {{ $complaint->title }}</h1>
    <h6
        class="px-3 py-1 text-xs font-medium border rounded-sm text-davys-grey border-davys-grey md:text-base lg:text-lg">
        {{ $complaint->category->category }}
    </h6>
    <p class="text-xs font-bold md:text-base lg:text-lg text-davys-grey">{{ $complaint->created_at->format('H:i, d-m-Y')
        }}</p>
    <img class="absolute w-2/3 md:w-96 xl:w-[32rem] left-[-30%] md:-left-32 xl:-left-72 top-[3%] md:top-14 xl:top-2 -z-10"
        src="{{ asset('assets/icons/vector-1.png') }}" alt="Icon">
    <img class="absolute w-1/4 md:w-44 xl:w-[10rem] right-[-8%] md:-right-12 bottom-[7%] -z-10"
        src="{{ asset('assets/icons/stars.png') }}" alt="">
</section>

{{-- Photo Evidence --}}
<section class="bg-white lg:px-24 2xl:px-48">
    <img class="object-cover object-center w-full aspect-video"
        src="{{ $complaint->photo_url ? Storage::url($complaint->photo_url) : 'data:image/gif;base64,R0lGODlhAQABAIAAAMLCwgAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==' }}"
        alt="Bukti Foto">
</section>

{{-- Information Detail Section --}}
<section class="px-6 pt-16 pb-10 bg-white md:px-10 lg:px-24 2xl:px-48 md:pt-28 md:pb-16 lg:pt-36 lg:pb-20">
    <h2 class="text-2xl font-bold text-center md:text-4xl">Detail Informasi</h2>
    <div
        class="xl:flex xl:gap-5 py-8 md:py-12 xl:py-20 px-5 md:px-10 xl:px-14 mt-5 md:mt-11 xl:mt-20 rounded-md border border-davys-grey xl:shadow-[10px_10px_0px_#cd4631]">
        <div class="xl:w-80">
            <div class="mb-5 text-sm md:text-lg">
                <label xl:mb-4 class="block mb-2 font-bold">Nama</label>
                @if ($complaint->is_anonymous === 1)
                <p class="font-medium text-davys-grey">Anonim</p>
                @else
                <p class="font-medium text-davys-grey">{{ $complaint->user->name }}</p>
                @endif
            </div>
            <div class="mb-5 text-sm md:text-lg md:mb-7 xl:mb-4">
                <label class="block mb-2 font-bold">Judul Aduan</label>
                <p class="font-medium text-davys-grey">{{ $complaint->title }}</p>
            </div>
            <div class="mb-5 text-sm md:text-lg md:mb-7 xl:mb-4">
                <label class="block mb-2 font-bold">Status Aduan</label>
                <p class="font-medium capitalize text-davys-grey">{{ $complaint->status }}</p>
            </div>
        </div>
        <div>
            <div class="mb-5 text-sm md:text-lg md:mb-7 xl:mb-4">
                <label class="block mb-2 font-bold">Kategori</label>
                <p class="font-medium text-davys-grey">{{ $complaint->category->category }}</p>
            </div>
            <div class="text-sm md:text-lg">
                <label class="block mb-2 font-bold">Dikirim Pada</label>
                <p class="font-medium text-davys-grey">{{ $complaint->created_at->format('H:i, d-m-Y')
                    }}</p>
            </div>
        </div>
    </div>
</section>

<div class="px-6 md:px-10 lg:px-24 2xl:px-48">
    <hr class="border border-davys-grey opacity-30">
</div>

{{-- Complaint Section --}}
<section class="px-6 py-10 bg-white md:px-10 lg:px-24 2xl:px-48 md:py-16 lg:py-20">
    <h2 class="text-2xl font-bold text-center md:text-4xl">Isi Pengaduan</h2>
    <div class="mt-5 md:mt-11 xl:mt-20">
        <p class="text-sm font-medium leading-normal md:text-base text-davys-grey">{{ $complaint->body }}</p>
    </div>
</section>

<div class="px-6 md:px-10 lg:px-24 2xl:px-48">
    <hr class="border border-davys-grey opacity-30">
</div>

{{-- Feddback Message Section --}}
<section class="px-6 py-10 bg-white md:px-10 lg:px-24 2xl:px-48 md:py-16 lg:py-20">
    <h2 class="text-2xl font-bold text-center md:text-4xl">Pesan Tanggapan</h2>
    <div
        class="flex flex-col items-center gap-2 px-3 mt-5 rounded-md md:gap-3 lg:gap-5 md:px-4 lg:px-6 xl:px-14 py-7 md:py-10 lg:py-16 xl:py-20 md:mt-11 xl:mt-20 bg-champagne">
        <i class="text-3xl font-bold ti ti-quote md:text-4xl text-vermillion"></i>
        <p class="text-sm font-medium leading-normal text-center text-davys-grey md:text-base">{{ $complaint->response ?
            $complaint->response : 'Mohon maaf, belum ada tanggapan'
            }}</p>
    </div>
</section>
@endsection