@extends('layouts.admin')

@section('title')
<title>Detail Aduan</title>
@endsection

@section('title-page')
<h2 class="my-6 text-lg font-semibold text-gray-700 dark:text-gray-200">
    <a href="{{ auth()->user()->role_id === 2 ? route('staff.complaints.index') : route('admin.complaints.index') }}"
        class="hover:text-gray-600">Detail Aduan</a> > {{ $complaint->title
    }}
</h2>
@endsection

@section('content')
@if ($errors->any())
<div class="relative px-4 py-3 mb-8 font-semibold text-red-800 bg-red-300 border border-red-400 rounded shadow-md">
    <ul>
        @foreach ($errors->all() as $error)
        <li class="block sm:inline">{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
    <label class="block text-sm">
        <span class="text-gray-700 dark:text-gray-400">Name</span>
        <a href="{{ auth()->user()->role_id === 2 ? route('staff.users.show', $complaint->user_id) : route('admin.users.show', $complaint->user_id) }}"
            class="block w-full mt-1 text-sm underline dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">{{
            $complaint->user->name }}</a>
    </label>
    <label class="block mt-4 text-sm ">
        <span class="text-gray-700 dark:text-gray-400">Email</span>
        <input
            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
            value="{{ $complaint->user->email }}" disabled />
    </label>
    <label class="block mt-4 text-sm ">
        <span class="text-gray-700 dark:text-gray-400">Alamat</span>
        <input
            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
            value="{{ $complaint->user->address }}" disabled />
    </label>
    <label class="block mt-4 text-sm ">
        <span class="text-gray-700 dark:text-gray-400">Nomer Telepon</span>
        <input
            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
            value="{{ $complaint->user->phone }}" disabled />
    </label>
    <label class="block mt-4 text-sm ">
        <span class="text-gray-700 dark:text-gray-400">Judul Aduan</span>
        <input
            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
            value="{{ $complaint->title }}" disabled />
    </label>
    <label class="block mt-4 text-sm ">
        <span class="text-gray-700 dark:text-gray-400">Status Aduan</span>
        @if ($complaint->status === 'belum diproses')
        <input
            class="block w-full mt-1 text-sm font-semibold text-red-500 capitalize dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
            value="{{ $complaint->status }}" disabled />
        @elseif ($complaint->status === 'sedang diproses')
        <input
            class="block w-full mt-1 text-sm font-semibold text-yellow-500 capitalize dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
            value="{{ $complaint->status }}" disabled />
        @else
        <input
            class="block w-full mt-1 text-sm font-semibold text-green-500 capitalize dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
            value="{{ $complaint->status }}" disabled />

        @endif

    </label>
    <label class="block mt-4 text-sm ">
        <span class="text-gray-700 dark:text-gray-400">Kategori Aduan</span>
        <input
            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
            value="{{ $complaint->category->category }}" disabled />
    </label>
    <label class="block mt-4 text-sm ">
        <span class="text-gray-700 dark:text-gray-400">Dikirim Pada</span>
        <input
            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
            value="{{ $complaint->created_at->format('H:i, d-m-Y') }}" disabled />
    </label>
</div>
<h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
    Bukti Foto
</h4>
<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
    <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        @if ($complaint->photo_url)
        <img class="w-48" src="{{ Storage::url($complaint->photo_url) }}" alt="Bukti Foto">
        @else
        <p class="text-slate-200">Tidak Ada Bukti Foto</p>
        @endif
    </div>
</div>
<h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
    Isi Pengaduan
</h4>
<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
    <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <p class="text-white">
            {{ $complaint->body }}
        </p>
    </div>
</div>
<h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
    Respon Aparat
</h4>
<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
    <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <p class="text-white">
            {{ $complaint->response ? $complaint->response : 'Belum ada response' }}
        </p>
    </div>
</div>
<div class="flex flex-col flex-wrap mb-8 space-y-4 md:flex-row md:items-end md:space-x-4">
    <button @click="openModal"
        class="flex items-center justify-center gap-2 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
        <i class="ti ti-edit"></i>
        <span>Berikan Response</span>
    </button>
    <button @click="openModalStatus"
        class="flex items-center justify-center gap-2 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
        <i class="ti ti-edit"></i>
        <span>Ubah Status</span>
    </button>
    <a href="{{ auth()->user()->role_id === 2 ? route('staff.complaints.generate-pdf-detail', $complaint->id) : route('admin.complaints.generate-pdf-detail', $complaint->id) }}"
        class="flex items-center justify-center gap-2 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
        <i class="ti ti-printer"></i>
        <span>Cetak Aduan</span>
    </a>
</div>

{{-- Modal for filling out response form --}}
@include('components.admin.modal.modal-response')
@include('components.admin.modal.modal-status')
@endsection

@push('script')
<!-- You need focus-trap.js to make the modal accessible -->
<script src="./assets/js/focus-trap.js" defer></script>
@endpush