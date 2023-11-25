@extends('layouts.frontend')

@section('title')
@guest
<title>DesaConnect</title>
@endguest
@auth
<title>Riwayat Pengajuan Surat | DesaConnect</title>
@endauth
@endsection

@section('content')
{{-- Histories Report --}}
<section
    class="px-6 pb-16 overflow-x-hidden bg-white md:px-10 lg:px-24 2xl:px-48 pt-28 md:pt-36 md:pb-28 lg:pt-40 lg:pb-36">
    <h1 class="text-3xl font-bold text-center md:text-4xl lg:text-5xl">Riwayat Pengajuan<span class="text-vermillion">
            Surat</span>
    </h1>
    <h5 class="mt-5 text-xs font-medium leading-6 text-center md:text-sm lg:text-base md:mt-7 lg:mt-8 text-davys-grey">
        Lihat riwayat pengajuan surat Anda dan status penyelesaiannya di sini
    </h5>

    {{-- Alert --}}
    @if ($isDataNotValid)
    <div class="lg:flex lg:justify-center" id="wrapper-alert">
        <div class="p-4 mt-5 text-center bg-red-200 rounded-md md:px-5 md:py-6 lg:px-6 lg:py-5 lg:w-1/2">
            <div class="flex justify-between">
                <div class="w-5 h-5 bg-red-900 rounded-full md:w-6 md:h-6 blinking-text"></div>
                <img class="w-6 cursor-pointer md:w-7" id="close-alert-btn" src="{{ asset('assets/icons/x.svg') }}"
                    alt="close button">
            </div>
            <p class="mt-3 text-sm font-semibold text-red-900 md:mt-4 md:text-base md:leading-7 lg:text-sm">Tampaknya
                masih ada surat yang data-nya tidak valid.
                Yuk, cek
                kembali dan
                perbaiki agar
                semuanya
                lancar!</p>
        </div>
    </div>
    @endif

    <div>
        <hr class="mt-5 md:mt-7 lg:mt-8 border-1 border-davys-grey">
    </div>

    <form class="mt-5 md:flex md:justify-center md:flex-col md:items-center"
        action="{{ route('complainant.documents.index') }}" method="GET">
        <input
            class="block w-full mt-2 transition duration-500 ease-in-out rounded md:w-1/2 ring-1 ring-black focus:outline-none focus:ring-2 focus:ring-vermillion focus:border-transparent"
            type="text" name="keyword" placeholder="Masukkan Nomor pengajuan">
        <div class="flex justify-center mt-5 lg:mt-9">
            <button type="submit"
                class="px-5 py-2 font-bold text-white bg-black rounded-md lg:text-base lg:px-9 lg:py-3 active:bg-vermillion active:shadow-lg lg:hover:bg-vermillion lg:hover:shadow-lg ">Cari
                Pengajuan</button>
        </div>
    </form>

    <div
        class="flex flex-col md:flex-row md:flex-wrap gap-7 md:gap-0 lg:gap-5 md:justify-around lg:justify-center mt-7 md:mt-8 lg:mt-10">

        {{-- Cards History of Reported --}}
        @forelse ($documents as $document)
        <article
            class="group border-2 border-black rounded-lg transition-all duration-500 hover:shadow-[7px_7px_0px_#81ADC8] lg:hover:shadow-[10px_10px_0px_#81ADC8] md:mt-7 lg:mt-0 cursor-pointer md:basis-80 lg:basis-[48%] lg:p-4">
            <a href="{{ route('complainant.documents.show', $document->id) }}">
                <div class="flex flex-col gap-2 lg:flex-row lg:items-center md:gap-5 lg:gap-4">
                    <div class="flex flex-col gap-2 px-4 lg:px-0">
                        <h6 class="font-bold text-vermillion text-sm lg:text-[1rem] mt-2 md:mt-0">{{
                            $document->created_at->format('H:i, d-m-Y')
                            }}</h6>
                        <h2
                            class="text-xl font-bold text-black capitalize lg:text-2xl group-active:text-vermillion group-hover:text-vermillion group-hover:transition-all group-hover:duration-500">
                            {{ $document->document_type }}
                        </h2>
                        <hr class="border-1 border-davys-grey">
                        <p class="text-xs font-medium leading-5 lg:text-sm text-davys-grey">{{
                            $document->request_number }}
                        </p>
                    </div>
                </div>
                <div class="flex items-center justify-between px-4 mt-4 mb-4 md:my-5 lg:mb-0 lg:px-0">
                    {{-- Show Status Document --}}
                    @include('components.frontend.conditional-statement.show-status-card-document')
                </div>
            </a>
        </article>
        @empty
        <h3 class="mt-4 text-sm leading-normal text-center lg:text-base text-medium text-davys-grey">Sayang sekali anda
            belum
            mempunyai
            pengajuan surat, <a href="{{ route('complainant.documents.create') }}"><strong>Ayo
                    Kirim Pengajuan Surat!</strong></a></h3>
        @endforelse

    </div>
    <div class="mt-5 md:mt-10">
        {{ $documents->links() }}
    </div>
</section>
@endsection

@push('script')
<script>
    const closeAlertBtn = document.getElementById("close-alert-btn");
    const wrapperAlert = document.getElementById("wrapper-alert");

    closeAlertBtn.addEventListener("click", () => {
        console.log("click");
        wrapperAlert.classList.toggle('hidden');
        wrapperAlert.classList.toggle('lg:flex');
    });
</script>
@endpush