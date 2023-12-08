@extends('layouts.frontend')

@section('title')
@guest
<title>Desa Puseurjaya</title>
@endguest
@auth
<title>Riwayat Aduan | Desa Puseurjaya</title>
@endauth
@endsection

@section('content')
{{-- Histories Report --}}
<section
    class="px-6 md:px-10 lg:px-24 2xl:px-48 pt-28 pb-16 md:pt-36 md:pb-28 lg:pt-40 lg:pb-36 overflow-x-hidden bg-white">
    <h1 class="text-center text-3xl md:text-4xl lg:text-5xl font-bold">Riwayat <span
            class="text-vermillion">Laporan</span>
    </h1>
    <h5 class="font-medium text-center text-xs md:text-sm lg:text-base mt-5 md:mt-7 lg:mt-8 text-davys-grey leading-6">
        Lihat riwayat aduan Anda dan status penyelesaiannya di sini
    </h5>
    <div>
        <hr class="mt-5 md:mt-7 lg:mt-8 border-1 border-davys-grey">
    </div>

    <form class="mt-5 md:flex md:justify-center md:flex-col md:items-center"
        action="{{ route('complainant.complaints.index') }}" method="GET">
        <input
            class="block mt-2 w-full md:w-1/2 rounded transition duration-500 ease-in-out ring-1 ring-black focus:outline-none focus:ring-2 focus:ring-vermillion focus:border-transparent"
            type="text" name="keyword" placeholder="Masukkan keyword/kode unik">
        <div class="mt-5 lg:mt-9 flex justify-center">
            <button type="submit" class="font-bold lg:text-base px-5 lg:px-9 py-2 lg:py-3 rounded-md bg-black text-white active:bg-vermillion active:shadow-lg lg:hover:bg-vermillion lg:hover:shadow-lg
                ">Cari Aduan</button>
        </div>
    </form>

    <div
        class="flex flex-col md:flex-row md:flex-wrap gap-7 md:gap-0 lg:gap-5 md:justify-around lg:justify-center mt-7 md:mt-8 lg:mt-10">

        {{-- Cards History of Reported --}}
        @forelse ($complaints as $complaint)
        <article
            class="group border-2 border-black rounded-lg transition-all duration-500 hover:shadow-[7px_7px_0px_#81ADC8] lg:hover:shadow-[10px_10px_0px_#81ADC8] md:mt-7 lg:mt-0 cursor-pointer md:basis-80 lg:basis-[48%] lg:p-4">
            <a href="{{ route('complainant.complaints.show', $complaint->id) }}">
                <div class="flex flex-col lg:flex-row lg:items-center gap-2 md:gap-5 lg:gap-4">
                    <img class="w-full lg:w-40 h-40 lg:h-auto object-cover object-center lg:rounded-lg lg:aspect-square"
                        src="{{ $complaint->photo_url ? Storage::url($complaint->photo_url) : 'data:image/gif;base64,R0lGODlhAQABAIAAAMLCwgAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==' }}"
                        alt="Bukti Foto">
                    <div class="px-4 lg:px-0 flex flex-col gap-2">
                        <h6 class="font-bold text-vermillion text-sm lg:text-[1rem] mt-2 md:mt-0">{{
                            $complaint->created_at->format('H:i, d-m-Y')
                            }}</h6>
                        <h2
                            class="report-title capitalize text-xl lg:text-2xl text-black group-active:text-vermillion group-hover:text-vermillion group-hover:transition-all group-hover:duration-500  font-bold">
                            {{ $complaint->title }}
                        </h2>
                        <hr class="border-1 border-davys-grey">
                        <p class="report-body text-xs lg:text-sm text-davys-grey leading-5 font-medium">{{
                            $complaint->body }}
                        </p>
                    </div>
                </div>
                <div class="mt-4 mb-4 md:my-5 lg:mb-0 px-4 lg:px-0 flex justify-between items-center">
                    <h6 class="px-3 py-1 text-davys-grey border border-davys-grey rounded-sm text-xs font-medium">
                        {{ $complaint->category->category }}
                    </h6>
                    {{-- Show Status Complaint --}}
                    @include('components.frontend.conditional-statement.show-status-card')
                </div>
            </a>
        </article>
        @empty
        <h3 class="mt-4 text-sm lg:text-base text-center leading-normal text-medium text-davys-grey">Sayang sekali anda
            belum
            mempunyai
            aduan, <a href="{{ route('complainant.complaints.create') }}"><strong>Ayo
                    Kirim Aduan!</strong></a></h3>
        @endforelse

    </div>
    <div class="mt-5 md:mt-10">
        {{ $complaints->links() }}
    </div>
</section>
@endsection