@extends('layouts.admin')

@section('title')
@if (auth()->user()->role_id === 1 )
<title>Dashboard Admin</title>
@else
<title>Dashboard Staff</title>
@endif
@endsection

@section('title-page')
<h2 class="my-6 text-lg font-semibold text-gray-200">
    @if (auth()->user()->role_id === 1 )
    Dashboard Admin
    @else
    Dashboard Staff
    @endif
</h2>
@endsection

@section('content')
<div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">

    {{-- Card --}}
    <div class="flex items-center p-4 bg-gray-800 rounded-lg shadow-xs">
        <div class="px-3 py-2 mr-4 text-red-100 bg-red-500 rounded-full p-">
            <i class="text-xl ti ti-book-upload"></i>
        </div>
        <div>
            <p class="mb-2 text-sm font-medium text-gray-400 ">
                Belum Diproses
            </p>
            <p class="text-lg font-semibold text-gray-200">
                {{ $cards['unprocessedCount'] }}
            </p>
        </div>
    </div>

    {{-- Card --}}
    <div class="flex items-center p-4 bg-gray-800 rounded-lg shadow-xs">
        <div class="px-3 py-2 mr-4 bg-yellow-500 rounded-full text-yellow-50">
            <i class="text-xl ti ti-loader"></i>
        </div>
        <div>
            <p class="mb-2 text-sm font-medium text-gray-400 ">
                Aduan Diproses
            </p>
            <p class="text-lg font-semibold text-gray-200">
                {{ $cards['processingCount'] }}
            </p>
        </div>
    </div>

    {{-- Card --}}
    <div class="flex items-center p-4 bg-gray-800 rounded-lg shadow-xs">
        <div class="px-3 py-2 mr-4 text-green-100 bg-green-500 rounded-full">
            <i class="text-xl ti ti-circle-check"></i>
        </div>
        <div>
            <p class="mb-2 text-sm font-medium text-gray-400 ">
                Aduan Selesai
            </p>
            <p class="text-lg font-semibold text-gray-200">
                {{ $cards['completedCount'] }}
            </p>
        </div>
    </div>

    {{-- Card --}}
    <div class="flex items-center p-4 bg-gray-800 rounded-lg shadow-xs">
        <div class="px-3 py-2 mr-4 text-orange-100 bg-orange-500 rounded-full">
            <i class="text-xl ti ti-books"></i>
        </div>
        <div>
            <p class="mb-2 text-sm font-medium text-gray-400 ">
                Total Aduan
            </p>
            <p class="text-lg font-semibold text-gray-200">
                {{ $cards['totalCount'] }}
            </p>
        </div>
    </div>

    {{-- Card --}}
    <div class="flex items-center p-4 bg-gray-800 rounded-lg shadow-xs">
        <div class="px-3 py-2 mr-4 text-purple-100 bg-purple-500 rounded-full">
            <i class="text-xl ti ti-category"></i>
        </div>
        <div>
            <p class="mb-2 text-sm font-medium text-gray-400 ">
                Jumlah Kategori
            </p>
            <p class="text-lg font-semibold text-gray-200">
                {{ $cards['totalCategory'] }}
            </p>
        </div>
    </div>

    {{-- Card --}}
    <div class="flex items-center p-4 bg-gray-800 rounded-lg shadow-xs">
        <div class="px-3 py-2 mr-4 rounded-full text-sky-100 bg-sky-500">
            <i class="text-xl ti ti-users"></i>
        </div>
        <div>
            <p class="mb-2 text-sm font-medium text-gray-400 ">
                Jumlah Masyarakat
            </p>
            <p class="text-lg font-semibold text-gray-200">
                {{ $cards['totalComplainant'] }}
            </p>
        </div>
    </div>

    {{-- Card --}}
    <div class="flex items-center p-4 bg-gray-800 rounded-lg shadow-xs">
        <div class="px-3 py-2 mr-4 text-red-100 bg-red-500 rounded-full p-">
            <i class="text-xl ti ti-book-upload"></i>
        </div>
        <div>
            <p class="mb-2 text-sm font-medium text-gray-400 ">
                Pengajuan Tidak Valid
            </p>
            <p class="text-lg font-semibold text-gray-200">
                {{ $cards['invalidSubmission'] }}
            </p>
        </div>
    </div>

    {{-- Card --}}
    <div class="flex items-center p-4 bg-gray-800 rounded-lg shadow-xs">
        <div class="px-3 py-2 mr-4 text-yellow-100 bg-yellow-500 rounded-full">
            <i class="text-xl ti ti-loader"></i>
        </div>
        <div>
            <p class="mb-2 text-sm font-medium text-gray-400 ">
                Pengajuan Proses Validasi
            </p>
            <p class="text-lg font-semibold text-gray-200">
                {{ $cards['validationProcess'] }}
            </p>
        </div>
    </div>

    {{-- Card --}}
    <div class="flex items-center p-4 bg-gray-800 rounded-lg shadow-xs">
        <div class="px-3 py-2 mr-4 text-yellow-100 bg-yellow-500 rounded-full">
            <i class="text-xl ti ti-loader"></i>
        </div>
        <div>
            <p class="mb-2 text-sm font-medium text-gray-400 ">
                Pengajuan Diproses
            </p>
            <p class="text-lg font-semibold text-gray-200">
                {{ $cards['onProccess'] }}
            </p>
        </div>
    </div>

    {{-- Card --}}
    <div class="flex items-center p-4 bg-gray-800 rounded-lg shadow-xs">
        <div class="px-3 py-2 mr-4 text-green-100 bg-green-500 rounded-full">
            <i class="text-xl ti ti-circle-check"></i>
        </div>
        <div>
            <p class="mb-2 text-sm font-medium text-gray-400 ">
                Surat Siap Diambil
            </p>
            <p class="text-lg font-semibold text-gray-200">
                {{ $cards['readyToPickup'] }}
            </p>
        </div>
    </div>

    {{-- Card --}}
    <div class="flex items-center p-4 bg-gray-800 rounded-lg shadow-xs">
        <div class="px-3 py-2 mr-4 text-green-100 bg-green-500 rounded-full">
            <i class="text-xl ti ti-circle-check"></i>
        </div>
        <div>
            <p class="mb-2 text-sm font-medium text-gray-400 ">
                Pengajuan Selesai
            </p>
            <p class="text-lg font-semibold text-gray-200">
                {{ $cards['submissionCompleted'] }}
            </p>
        </div>
    </div>

    {{-- Card --}}
    <div class="flex items-center p-4 bg-gray-800 rounded-lg shadow-xs">
        <div class="px-3 py-2 mr-4 text-orange-100 bg-orange-500 rounded-full">
            <i class="text-xl ti ti-books"></i>
        </div>
        <div>
            <p class="mb-2 text-sm font-medium text-gray-400 ">
                Total Pengajuan
            </p>
            <p class="text-lg font-semibold text-gray-200">
                {{ $cards['totalSubmission'] }}
            </p>
        </div>
    </div>

    @if (auth()->user()->role_id === 1)
    {{-- Card --}}
    <div class="flex items-center p-4 bg-gray-800 rounded-lg shadow-xs">
        <div class="px-3 py-2 mr-4 text-pink-100 bg-pink-500 rounded-full">
            <i class="text-xl ti ti-users"></i>
        </div>
        <div>
            <p class="mb-2 text-sm font-medium text-gray-400 ">
                Jumlah User
            </p>
            <p class="text-lg font-semibold text-gray-200">
                {{ $cards['totalUser'] }}
            </p>
        </div>
    </div>

    {{-- Card --}}
    <div class="flex items-center p-4 bg-gray-800 rounded-lg shadow-xs">
        <div class="px-3 py-2 mr-4 rounded-full text-slate-100 bg-slate-500">
            <i class="text-xl ti ti-users"></i>
        </div>
        <div>
            <p class="mb-2 text-sm font-medium text-gray-400 ">
                Jumlah Staff
            </p>
            <p class="text-lg font-semibold text-gray-200">
                {{ $cards['totalStaff'] }}
            </p>
        </div>
    </div>

    {{-- Card --}}
    <div class="flex items-center p-4 bg-gray-800 rounded-lg shadow-xs">
        <div class="px-3 py-2 mr-4 rounded-full text-lime-100 bg-lime-500">
            <i class="text-xl ti ti-users"></i>
        </div>
        <div>
            <p class="mb-2 text-sm font-medium text-gray-400 ">
                Jumlah Admin
            </p>
            <p class="text-lg font-semibold text-gray-200">
                {{ $cards['totalAdmin'] }}
            </p>
        </div>
    </div>
    @endif
</div>

{{-- Table --}}
@if (auth()->user()->role_id === 1)
<div class="grid gap-6 mb-8 md:grid-cols-2">
    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
        <h4 class="mb-4 text-lg font-semibold text-gray-300">
            Data Aduan Terbaru
        </h4>
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase bg-gray-800 border-b border-gray-700 ">
                        <th class="px-4 py-3">Judul</th>
                        <th class="px-4 py-3">Kategori</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Tanggal</th>
                    </tr>
                </thead>
                <tbody class="bg-gray-800 divide-y divide-gray-700">
                    @forelse ($complaints as $complaint)
                    <tr class="text-gray-400">
                        <td class="px-4 py-3 text-sm">
                            {{ $complaint->title }}
                        </td>
                        <td class="px-4 py-3 text-sm">
                            {{ $complaint->category->category }}
                        </td>
                        <td class="px-4 py-3 text-sm">
                            @if ($complaint->status === 'belum diproses')
                            <p class="text-red-500 capitalize">{{ $complaint->status }}</p>
                            @elseif ($complaint->status === 'sedang diproses')
                            <p class="text-yellow-500 capitalize">{{ $complaint->status }}</p>
                            @else
                            <p class="text-green-500 capitalize">{{ $complaint->status }}</p>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-sm">
                            {{ $complaint->created_at->format('d/m/Y') }}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td class="p-2 text-sm font-semibold text-center text-slate-400" colspan="4">Belum Ada Data</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
        <h4 class="mb-4 text-lg font-semibold text-gray-300">
            Data User Terbaru
        </h4>
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-400 uppercase bg-gray-800 border-b border-gray-700">
                        <th class="px-4 py-3">Nama</th>
                        <th class="px-4 py-3">Email</th>
                        <th class="px-4 py-3">Role</th>
                        <th class="px-4 py-3">No.HP</th>
                    </tr>
                </thead>
                <tbody class="bg-gray-800 divide-y divide-gray-700">
                    @forelse ($users as $user)
                    <tr class="text-gray-400">
                        <td class="px-4 py-3 text-sm">
                            {{ $user->name }}
                        </td>
                        <td class="px-4 py-3 text-sm">
                            {{ $user->email }}
                        </td>
                        <td class="px-4 py-3 text-sm">
                            {{ $user->role->role }}
                        </td>
                        <td class="px-4 py-3 text-sm">
                            {{ $user->phone }}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td class="p-2 text-sm font-semibold text-center text-slate-400" colspan="4">Belum Ada Data</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endif
@endsection