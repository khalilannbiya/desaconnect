@extends('layouts.frontend')

@section('title')
@guest
<title>Desa Puseurjaya</title>
@endguest
@auth
<title>Pengajuan Surat | Desa Puseurjaya</title>
@endauth
@endsection

@section('content')
<section
    class="px-6 pb-16 overflow-x-hidden bg-white md:px-10 lg:px-24 2xl:px-48 pt-28 md:pt-36 md:pb-28 lg:pt-40 lg:pb-36">
    <h1 class="text-3xl font-bold text-center md:text-4xl lg:text-5xl">Form Pengajuan <span
            class="text-vermillion">Surat</span>
    </h1>
    <h5 class="mt-5 text-xs font-medium text-center md:text-sm lg:text-base md:mt-7 lg:mt-8 text-davys-grey">
        Izinkan kami menjadi jembatan untuk mewujudkannya
    </h5>
    <div class="lg:px-32 xl:px-40">
        <hr class="mt-5 md:mt-7 lg:mt-8 border-1 border-davys-grey">
    </div>
    <form action="{{ route('complainant.documents.store') }}" method="POST"
        class="mt-5 md:mt-7 lg:mt-8 lg:px-32 xl:px-40" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="document_type" class="font-bold">Jenis Surat<span class="text-vermillion"> *</span></label>
            <select name="document_type" id="document_type"
                class="w-full mt-2 transition duration-500 ease-in-out rounded ring-1 ring-black focus:outline-none focus:ring-2 focus:ring-vermillion focus:border-transparent">
                <option value="">Pilih Jenis Surat</option>
                <option value="surat keterangan usaha">Surat Keterangan Usaha(SKU)</option>
                <option value="surat keterangan domisili">Surat Keterangan Domisili(SKD)</option>
            </select>
            @error('document_type')
            <p class="mt-2 text-sm font-medium text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div>
            {{-- SKU --}}
            <div class="mt-4">
                <label for="cover-letter" class="font-bold">Surat Pengantar Ketua RT<span class="text-vermillion">
                        *</span><span class="block text-xs text-vermillion">*File
                        bertipe
                        jpg/jpeg/png</span></label>
                <input type="file" name="document_requirements[]" id="cover-letter" class="mt-2" required>
                <input type="hidden" name="names[]" value="Surat Pengantar Ketua RT">
                @error("document_requirements.0")
                <p class="mt-2 text-sm font-medium text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-4">
                <label for="e-ktp" class="font-bold">E-KTP<span class="text-vermillion"> *</span><span
                        class="block text-xs text-vermillion">*File
                        bertipe
                        jpg/jpeg/png</span></label>
                <input type="file" name="document_requirements[]" id="e-ktp" class="mt-2" required>
                <input type="hidden" name="names[]" value="E-KTP">
                @error("document_requirements.1")
                <p class="mt-2 text-sm font-medium text-red-500">{{ $message }}</p>
                @enderror
            </div>
            {{-- SKD --}}
            <div id="skd">
                <div class="mt-4">
                    <label for="kk" class="font-bold">Kartu Keluarga<span class="text-vermillion"> *</span><span
                            class="block text-xs text-vermillion">*File
                            bertipe
                            jpg/jpeg/png</span></label>
                    <input type="file" name="document_requirements[]" id="kk" class="mt-2 not-sku" required>
                    <input type="hidden" name="names[]" value="Kartu Keluarga" class="not-sku">
                    @error("document_requirements.2")
                    <p class="mt-2 text-sm font-medium text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mt-4">
                    <label for="pas-photo" class="font-bold">Pas Foto ukuran 3x4/4x6<span class="text-vermillion">
                            *</span><span class="block text-xs text-vermillion">*File
                            bertipe
                            jpg/jpeg/png</span></label>
                    <input type="file" name="document_requirements[]" id="pas-photo" class="mt-2 not-sku" required>
                    <input type="hidden" name="names[]" value="Pas Photo" class="not-sku">
                    @error("document_requirements.3")
                    <p class="mt-2 text-sm font-medium text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>
        <div class="flex justify-center mt-10">
            <button type="submit"
                class="px-5 py-2 font-bold text-white bg-black rounded-md lg:text-lg lg:px-9 lg:py-3 active:bg-vermillion active:shadow-lg lg:hover:bg-vermillion lg:hover:shadow-lg">Ajukan</button>
        </div>
    </form>

    {{-- Modal section for complaint filling guidelines --}}
    @include('components.frontend.modal-guidelines')

</section>
@endsection

@push('script')
<script>
    const documentType = document.getElementById("document_type");
    const sku = document.getElementById("sku");
    const skd = document.getElementById("skd");
    const notSku = document.querySelectorAll(".not-sku");

    documentType.addEventListener('change', ()=>{
        const selectedValue = documentType.value;
        if (selectedValue == "surat keterangan usaha"){
            skd.style.display = "none";
            notSku.forEach(input=> {
                input.setAttribute('disabled', 'true');
            })
        } else{
            skd.style.display = "block";
            notSku.forEach(input=> {
                input.removeAttribute('disabled');
            })
        }
    })
</script>
@endpush