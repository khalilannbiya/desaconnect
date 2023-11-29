@extends('layouts.frontend')

@section('title')
@guest
<title>DesaConnect</title>
@endguest
@auth
<title>Detail Pengajuan | DesaConnect</title>
@endauth
@endsection

@section('content')
{{-- Information Detail Section --}}
<section class="px-6 pt-16 pb-10 bg-white md:px-10 lg:px-24 2xl:px-48 md:pt-28 md:pb-16 lg:pt-36 lg:pb-20">
    <h2 class="text-2xl font-bold text-center md:text-4xl">Detail Informasi</h2>

    {{-- Alert --}}
    @if ($document->status === "tidak valid")
    <div class="lg:flex lg:justify-center" id="wrapper-alert">
        <div class="p-4 mt-5 text-center bg-red-200 rounded-md md:px-5 md:py-6 lg:px-6 lg:py-5 lg:w-2/3">
            <div class="flex justify-between">
                <div class="w-5 h-5 bg-red-900 rounded-full md:w-6 md:h-6 blinking-text"></div>
                <img class="w-6 cursor-pointer md:w-7" id="close-alert-btn" src="{{ asset('assets/icons/x.svg') }}"
                    alt="close button">
            </div>
            <p
                class="mt-3 text-sm font-semibold text-red-900 md:mt-4 md:text-base md:leading-7 lg:leading-8 lg:text-sm">
                Maaf, data
                yang Anda masukkan tidak memenuhi persyaratan validasi. Mohon periksa pesan dari staff kami yang ada di
                halaman ini dan
                pastikan semua data sesuai dengan ketentuan yang berlaku. Jika terdapat kesalahan, harap perbaiki.
                Terima kasih atas kerjasama Anda</p>
        </div>
    </div>
    @elseif($document->status === "siap diambil")
    <div class="lg:flex lg:justify-center" id="wrapper-alert">
        <div class="p-4 mt-5 text-center bg-green-200 rounded-md md:px-5 md:py-6 lg:px-6 lg:py-5 lg:w-2/3">
            <div class="flex justify-between">
                <div class="w-5 h-5 bg-green-900 rounded-full md:w-6 md:h-6 blinking-text"></div>
                <img class="w-6 cursor-pointer md:w-7" id="close-alert-btn" src="{{ asset('assets/icons/x.svg') }}"
                    alt="close button">
            </div>
            <p
                class="mt-3 text-sm font-semibold text-green-900 md:mt-4 md:text-base md:leading-7 lg:leading-8 lg:text-sm">
                Selamat! Pengajuan surat Anda telah selesai diproses dan berhasil dibuat. Anda dapat mengambil surat
                tersebut di kantor desa dengan membawa bukti pengajuan yang sebelumnya ada download telebih dahulu
                dibawah halaman ini. Terima kasih atas kerja sama Anda!</p>
        </div>
    </div>
    @endif

    <div
        class="xl:flex xl:gap-5 py-8 md:py-12 xl:py-20 px-5 md:px-10 xl:px-14 mt-5 md:mt-11 xl:mt-20 rounded-md border border-davys-grey xl:shadow-[10px_10px_0px_#cd4631]">
        <div class="xl:w-80">
            <div class="mb-5 text-sm md:text-lg">
                <label xl:mb-4 class="block mb-2 font-bold">Nama</label>
                <p class="font-medium text-davys-grey">{{ $document->user->name }}</p>
            </div>
            <div class="mb-5 text-sm md:text-lg md:mb-7 xl:mb-4">
                <label class="block mb-2 font-bold">Email</label>
                <p class="font-medium text-davys-grey">{{ $document->user->email }}</p>
            </div>
            <div class="mb-5 text-sm md:text-lg md:mb-7 xl:mb-4">
                <label class="block mb-2 font-bold">NIK</label>
                <p class="font-medium text-davys-grey">{{ $document->user->nik }}</p>
            </div>
            <div class="mb-5 text-sm md:text-lg md:mb-7 xl:mb-4">
                <label class="block mb-2 font-bold">Alamat</label>
                <p class="font-medium text-davys-grey">{{ $document->user->address }}</p>
            </div>
            <div class="mb-5 text-sm md:text-lg md:mb-7 xl:mb-4">
                <label class="block mb-2 font-bold">Nomer Telepon</label>
                <p class="font-medium text-davys-grey">{{ $document->user->phone }}</p>
            </div>
            <div class="mb-5 text-sm md:text-lg md:mb-7 xl:mb-4">
                <label class="block mb-2 font-bold">Jenis Surat</label>
                <p class="font-medium capitalize text-davys-grey">{{ $document->document_type }}</p>
            </div>
        </div>
        <div>
            <div class="mb-5 text-sm md:text-lg md:mb-7 xl:mb-4">
                <label class="block mb-2 font-bold">Status Pengajuan</label>
                <p class="font-medium capitalize text-davys-grey">{{ $document->status }}</p>
            </div>
            <div class="mb-5 text-sm md:text-lg md:mb-7 xl:mb-4">
                <label class="block mb-2 font-bold">Nomor Pengajuan</label>
                <p class="font-medium text-davys-grey">{{ $document->request_number }}</p>
            </div>
            <div class="text-sm md:text-lg">
                <label class="block mb-2 font-bold">Dikirim Pada</label>
                <p class="font-medium text-davys-grey">{{ $document->created_at->format('H:i, d-m-Y')
                    }}</p>
            </div>
        </div>
    </div>
</section>

<div class="px-6 md:px-10 lg:px-24 2xl:px-48">
    <hr class="border border-davys-grey opacity-30">
</div>

<section class="px-6 py-10 bg-white md:px-10 lg:px-24 2xl:px-48 md:py-16 lg:py-20">

    @if ($document->status === "tidak valid")
    <form action="{{ route('complainant.documents.update', $document->id) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @method("PUT")

        @foreach ($document->documentRequirement as $item)
        <div class="mb-10">
            <h3 class="font-semibold md:text-lg">{{ $item->name }}</h3>
            <div class="flex flex-row items-center justify-between w-full gap-2 mt-5" id="wrapper-edit">
                <div class="basis-1/2 lg:basis-1/3 2xl:basis-80">
                    <img onclick="openModalPreview() class=" w-auto" src="{{ Storage::url($item->url) }}"
                        alt="Gambar {{ $item->name }}">
                </div>
                <label for="{{ str_replace(' ', '-', strtolower($item->name)) }}"
                    id="{{ str_replace(' ', '-', strtolower($item->name)) }}wrapper"
                    class="flex items-center h-auto gap-2 px-4 py-3 text-xs font-medium border border-black rounded-md cursor-pointer lg:border-2 md:px-5 md:py-4 md:text-base active:bg-slate-700">
                    <img class="w-5" src="{{ asset('assets/icons/cloud-upload.svg') }}">
                    Update File
                </label>
                <input type="file" name="document_requirements[]"
                    id="{{ str_replace(' ', '-', strtolower($item->name)) }}" style="display:none;"
                    data-name="{{ $item->name }}" onchange="updateHiddenValue(this)" />
            </div>
        </div>
        @endforeach
        <div class="flex justify-center">
            <button type="submit"
                class="px-5 py-2 font-bold text-white bg-black rounded-md lg:text-lg lg:px-9 lg:py-3 active:bg-vermillion active:shadow-lg lg:hover:bg-vermillion lg:hover:shadow-lg">Update</button>
        </div>
    </form>
    @else
    @foreach ($document->documentRequirement as $item)
    <div class="mb-10">
        <h3 class="font-semibold md:text-lg">{{ $item->name }}</h3>
        <div class="flex flex-row items-center justify-between w-full gap-2 mt-5" id="wrapper-edit">
            <div class="basis-1/2 lg:basis-1/3 2xl:basis-80">
                <img onclick="openModalPreview()" class="w-auto" src="{{ Storage::url($item->url) }}"
                    alt="Gambar {{ $item->name }}">
            </div>
        </div>
    </div>
    @endforeach
    @endif
</section>

@if ($document->status === "siap diambil")
<section class="px-6 pt-5 pb-10 bg-white md:px-10 lg:px-20 2xl:px-48 md:py-16 lg:py-20">
    <div class="flex justify-center">
        <a href="{{ route('complainant.documents.generate-pdf-detail', $document->id) }}"
            class="px-4 py-2 text-sm text-white bg-black border-2 border-black rounded-md md:px-9 md:py-3 md:text-xl lg:text-lg active:border-vermillion active:bg-vermillion active:shadow-xl lg:hover:bg-vermillion lg:hover:border-vermillion lg:hover:shadow-xl lg:transition-all lg:duration-500 lg:hover:transition-all lg:hover:duration-500">Cetak
            Bukti Pengajuan</a>
    </div>
</section>
@endif

@if ($document->status === "tidak valid")
<div class="px-6 md:px-10 lg:px-24 2xl:px-48">
    <hr class="border border-davys-grey opacity-30">
</div>

{{-- Feddback Message Section --}}
<section class="px-6 py-10 bg-white md:px-10 lg:px-24 2xl:px-48 md:py-16 lg:py-20">
    <h2 class="text-2xl font-bold text-center md:text-4xl">Pesan Kesalahan <span
            class="inline-block w-4 h-4 bg-red-800 rounded-full md:w-5 md:h-5 blinking-text"></span></h2>
    <div
        class="flex flex-col items-center gap-2 px-3 mt-5 rounded-md md:gap-3 lg:gap-5 md:px-4 lg:px-6 xl:px-14 py-7 md:py-10 lg:py-16 xl:py-20 md:mt-11 xl:mt-20 bg-champagne">
        <i class="text-3xl font-bold ti ti-quote md:text-4xl text-vermillion"></i>
        <p class="text-sm font-medium leading-normal text-center text-davys-grey md:text-base">{{ $document->response }}
        </p>
    </div>
</section>
@endif

@include('components.preview-image.preview-image')

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

    function updateHiddenValue(fileInput) {
        const wrapper = document.getElementById(`${fileInput.id}wrapper`);
        const hasBeenCreatedElement = wrapper.querySelector(`#${fileInput.id}-input-name`);
        const dataName = fileInput.getAttribute("data-name")


        if (hasBeenCreatedElement === null) {
            const hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'names[]');
            hiddenInput.setAttribute('value', dataName);
            hiddenInput.setAttribute('id', `${fileInput.id}-input-name`);
            wrapper.insertBefore(hiddenInput, wrapper.children[0]);
        }
    }
</script>
@endpush