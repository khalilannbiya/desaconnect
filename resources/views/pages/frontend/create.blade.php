@extends('layouts.frontend')

@section('title')
@guest
<title>DesaConnect</title>
@endguest
@auth
<title>Buat Aduan | DesaConnect</title>
@endauth
@endsection

@section('content')
<section
    class="px-6 pb-16 overflow-x-hidden bg-white md:px-10 lg:px-24 2xl:px-48 pt-28 md:pt-36 md:pb-28 lg:pt-40 lg:pb-36">
    <h1 class="text-3xl font-bold text-center md:text-4xl lg:text-5xl">Ayo <span
            class="text-vermillion">Laporkan!!</span>
    </h1>
    <h5 class="mt-5 text-xs font-medium text-center md:text-sm lg:text-base md:mt-7 lg:mt-8 text-davys-grey">
        Kirim aduan
        Anda kepada
        Kami
    </h5>
    <div class="lg:px-32 xl:px-40">
        <hr class="mt-5 md:mt-7 lg:mt-8 border-1 border-davys-grey">
    </div>
    <div class="mt-5 md:mt-7">
        <h5 class="text-xs font-semibold leading-relaxed text-center md:text-sm text-davys-grey">Pelajari cara
            mengajukan aduan
            dengan efektif - <span class="underline cursor-pointer open-modal-button text-vermillion">lihat
                panduan kami
                sekarang!</span></h5>
    </div>
    <form action="{{ route('complainant.complaints.store') }}" method="POST"
        class="mt-5 md:mt-7 lg:mt-8 lg:px-32 xl:px-40" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="title" class="font-bold">Judul Aduan <span class="text-vermillion">*</span></label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" placeholder=" Masukan Judul Aduan"
                autofocus maxlength="50"
                class="w-full mt-2 transition duration-500 ease-in-out rounded ring-1 ring-black focus:outline-none focus:ring-2 focus:ring-vermillion focus:border-transparent">
            @error('title')
            <p class="mt-2 text-sm font-medium text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="mt-4">
            <label for="category" class="font-bold">Kategori Aduan <span class="text-vermillion">*</span></label>
            <select name="category" id="category"
                class="w-full mt-2 transition duration-500 ease-in-out rounded ring-1 ring-black focus:outline-none focus:ring-2 focus:ring-vermillion focus:border-transparent">
                <option value="">Pilih Kategori</option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->category }}</option>
                @endforeach
            </select>
            @error('category')
            <p class="mt-2 text-sm font-medium text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="mt-4">
            <label for="body" class="font-bold">Isi Aduan <span class="text-vermillion">*</span></label>
            <textarea name="body" id="body" cols="30" rows="15"
                class="w-full mt-2 transition duration-500 ease-in-out rounded ring-1 ring-black focus:outline-none focus:ring-2 focus:ring-vermillion focus:border-transparent"
                placeholder="Sampaikan aduan Anda disini...">{{ old('body') }}</textarea>
            @error('body')
            <p class="mt-2 text-sm font-medium text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="mt-4">
            <label for="is_private" class="block font-bold">Private</label>
            <input type="checkbox" id="is_private" name="is_private" value="1"
                class="mt-2 transition duration-500 ease-in-out rounded ring-1 ring-black focus:outline-none focus:ring-2 focus:ring-vermillion focus:border-transparent">
            @error('is_private')
            <p class="mt-2 text-sm font-medium text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="mt-4">
            <label for="is_anonymous" class="block font-bold">Anonim</label>
            <input type="checkbox" id="is_anonymous" name="is_anonymous" value="1"
                class="mt-2 transition duration-500 ease-in-out rounded ring-1 ring-black focus:outline-none focus:ring-2 focus:ring-vermillion focus:border-transparent">
            @error('is_anonymous')
            <p class="mt-2 text-sm font-medium text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="mt-4">
            <label for="photo" class="font-bold">Bukti Foto <span class="block text-xs text-vermillion">*File
                    bertipe
                    jpg/jpeg/png</span></label>
            <input type="file" name="photo" id="photo" value="{{ old('photo') }}" class="mt-2 ">
            @error('photo')
            <p class="mt-2 text-sm font-medium text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex justify-center mt-10">
            <button type="submit"
                class="px-5 py-2 font-bold text-white bg-black rounded-md lg:text-lg lg:px-9 lg:py-3 active:bg-vermillion active:shadow-lg lg:hover:bg-vermillion lg:hover:shadow-lg">Laporkan</button>
        </div>
    </form>

    {{-- Modal section for complaint filling guidelines --}}
    @include('components.frontend.modal-guidelines')

</section>
@endsection

@push('script')
<script>
    const modalGuidelines = document.querySelector('.modal');
    const openModalButtons = document.querySelectorAll('.open-modal-button');
    const closeModalButtons = document.querySelectorAll('.modal-close');
    const overlay = document.querySelector('.modal-overlay');

  openModalButtons.forEach(button => {
    button.addEventListener('click', () => {
        modalGuidelines.classList.add('visible');
        modalGuidelines.classList.add('opacity-100');
        modalGuidelines.classList.remove('invisible');
        modalGuidelines.classList.remove('opacity-0');
    })
  })

  closeModalButtons.forEach(button => {
    button.addEventListener('click', () => {
        modalGuidelines.classList.remove('visible');
        modalGuidelines.classList.remove('opacity-100');
        modalGuidelines.classList.add('invisible');
        modalGuidelines.classList.add('opacity-0');
    })
  })

</script>
@endpush