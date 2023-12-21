@extends('layouts.admin')

@section('title')
<title>Detail Pengguna</title>
@endsection

@section('title-page')
<h2 class="my-6 text-lg font-semibold text-gray-200">
    <a href="{{ url()->previous()  }}" class="hover:text-gray-600">Detail Pengguna</a> > {{
    $user->name
    }}
</h2>
@endsection

@section('content')
<div class="px-4 py-3 mb-8 rounded-lg shadow-md bg-gray-800">
    <label class="block text-sm">
        <span class="text-gray-400">Nama</span>
        <input
            class="block w-full mt-1 text-sm border-gray-600 bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple text-gray-300 focus:shadow-outline-gray form-input"
            value="{{ $user->name }}" disabled />
    </label>
    <label class="block mt-4 text-sm">
        <span class="text-gray-400">Email</span>
        <input
            class="block w-full mt-1 text-sm border-gray-600 bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple text-gray-300 focus:shadow-outline-gray form-input"
            value="{{ $user->email }}" disabled />
    </label>
    <label class="block mt-4 text-sm">
        <span class="text-gray-400">NIK</span>
        <input
            class="block w-full mt-1 text-sm border-gray-600 bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple text-gray-300 focus:shadow-outline-gray form-input"
            value="{{ $user->nik }}" disabled />
    </label>
    <label class="block mt-4 text-sm">
        <span class="text-gray-400">Alamat</span>
        <textarea disabled
            class="block w-full mt-1 text-sm text-gray-300 border-gray-600 bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple focus:shadow-outline-gray"
            rows="5">{{ $user->address }}</textarea>
    </label>
    <label class="block mt-4 text-sm ">
        <span class="text-gray-400">Nomer Telepon</span>
        <input
            class="block w-full mt-1 text-sm border-gray-600 bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple text-gray-300 focus:shadow-outline-gray form-input"
            value="{{ $user->phone }}" disabled />
    </label>
    <label class="block mt-4 text-sm ">
        <span class="text-gray-400">Terdaftar Pada</span>
        <input
            class="block w-full mt-1 text-sm border-gray-600 bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple text-gray-300 focus:shadow-outline-gray form-input"
            value="{{ $user->created_at->format('H:i, d-m-Y') }}" disabled />
    </label>
</div>
@endsection