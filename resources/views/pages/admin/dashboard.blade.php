@extends('layouts.admin')

@section('title')
@if (auth()->user()->role_id === 1 )
<title>Dashboard Admin</title>
@else
<title>Dashboard Staff</title>
@endif
@endsection

@section('title-page')
<h2 class="my-6 text-lg font-semibold text-gray-700 dark:text-gray-200">
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
    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div class="px-3 py-2 mr-4 text-red-500 bg-red-100 rounded-full p- dark:text-red-100 dark:bg-red-500">
            <i class="text-xl ti ti-book-upload"></i>
        </div>
        <div>
            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                Belum Diproses
            </p>
            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                {{ $cards['unprocessedCount'] }}
            </p>
        </div>
    </div>

    {{-- Card --}}
    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div
            class="px-3 py-2 mr-4 text-yellow-500 bg-yellow-100 rounded-full p- dark:text-yellow-100 dark:bg-yellow-500">
            <i class="text-xl ti ti-loader"></i>
        </div>
        <div>
            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                Aduan Diproses
            </p>
            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                {{ $cards['processingCount'] }}
            </p>
        </div>
    </div>

    {{-- Card --}}
    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div class="px-3 py-2 mr-4 text-green-500 bg-green-100 rounded-full p- dark:text-green-100 dark:bg-green-500">
            <i class="text-xl ti ti-circle-check"></i>
        </div>
        <div>
            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                Aduan Selesai
            </p>
            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                {{ $cards['completedCount'] }}
            </p>
        </div>
    </div>

    {{-- Card --}}
    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div
            class="px-3 py-2 mr-4 text-orange-500 bg-orange-100 rounded-full p- dark:text-orange-100 dark:bg-orange-500">
            <i class="text-xl ti ti-books"></i>
        </div>
        <div>
            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                Total Aduan
            </p>
            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                {{ $cards['totalCount'] }}
            </p>
        </div>
    </div>

    {{-- Card --}}
    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div
            class="px-3 py-2 mr-4 text-purple-500 bg-purple-100 rounded-full p- dark:text-purple-100 dark:bg-purple-500">
            <i class="text-xl ti ti-category"></i>
        </div>
        <div>
            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                Jumlah Kategori
            </p>
            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                {{ $cards['totalCategory'] }}
            </p>
        </div>
    </div>

    {{-- Card --}}
    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div class="px-3 py-2 mr-4 rounded-full text-sky-500 bg-sky-100 p- dark:text-sky-100 dark:bg-sky-500">
            <i class="text-xl ti ti-users"></i>
        </div>
        <div>
            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                Jumlah Masyarakat
            </p>
            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                {{ $cards['totalComplainant'] }}
            </p>
        </div>
    </div>

    {{-- Card --}}
    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div class="px-3 py-2 mr-4 text-red-500 bg-red-100 rounded-full p- dark:text-red-100 dark:bg-red-500">
            <i class="text-xl ti ti-book-upload"></i>
        </div>
        <div>
            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                Pengajuan Tidak Valid
            </p>
            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                {{ $cards['invalidSubmission'] }}
            </p>
        </div>
    </div>

    {{-- Card --}}
    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div
            class="px-3 py-2 mr-4 text-yellow-500 bg-yellow-100 rounded-full p- dark:text-yellow-100 dark:bg-yellow-500">
            <i class="text-xl ti ti-loader"></i>
        </div>
        <div>
            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                Pengajuan Proses Validasi
            </p>
            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                {{ $cards['validationProcess'] }}
            </p>
        </div>
    </div>

    {{-- Card --}}
    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div
            class="px-3 py-2 mr-4 text-yellow-500 bg-yellow-100 rounded-full p- dark:text-yellow-100 dark:bg-yellow-500">
            <i class="text-xl ti ti-loader"></i>
        </div>
        <div>
            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                Pengajuan Diproses
            </p>
            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                {{ $cards['onProccess'] }}
            </p>
        </div>
    </div>

    {{-- Card --}}
    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div class="px-3 py-2 mr-4 text-green-500 bg-green-100 rounded-full p- dark:text-green-100 dark:bg-green-500">
            <i class="text-xl ti ti-circle-check"></i>
        </div>
        <div>
            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                Surat Siap Diambil
            </p>
            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                {{ $cards['readyToPickup'] }}
            </p>
        </div>
    </div>

    {{-- Card --}}
    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div class="px-3 py-2 mr-4 text-green-500 bg-green-100 rounded-full p- dark:text-green-100 dark:bg-green-500">
            <i class="text-xl ti ti-circle-check"></i>
        </div>
        <div>
            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                Pengajuan Selesai
            </p>
            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                {{ $cards['submissionCompleted'] }}
            </p>
        </div>
    </div>

    {{-- Card --}}
    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div
            class="px-3 py-2 mr-4 text-orange-500 bg-orange-100 rounded-full p- dark:text-orange-100 dark:bg-orange-500">
            <i class="text-xl ti ti-books"></i>
        </div>
        <div>
            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                Total Pengajuan
            </p>
            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                {{ $cards['totalSubmission'] }}
            </p>
        </div>
    </div>

    @if (auth()->user()->role_id === 1)
    {{-- Card --}}
    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div class="px-3 py-2 mr-4 text-pink-500 bg-pink-100 rounded-full p- dark:text-pink-100 dark:bg-pink-500">
            <i class="text-xl ti ti-users"></i>
        </div>
        <div>
            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                Jumlah User
            </p>
            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                {{ $cards['totalUser'] }}
            </p>
        </div>
    </div>

    {{-- Card --}}
    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div class="px-3 py-2 mr-4 rounded-full text-slate-500 bg-slate-100 p- dark:text-slate-100 dark:bg-slate-500">
            <i class="text-xl ti ti-users"></i>
        </div>
        <div>
            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                Jumlah Staff
            </p>
            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                {{ $cards['totalStaff'] }}
            </p>
        </div>
    </div>

    {{-- Card --}}
    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div class="px-3 py-2 mr-4 rounded-full text-lime-500 bg-lime-100 p- dark:text-lime-100 dark:bg-lime-500">
            <i class="text-xl ti ti-users"></i>
        </div>
        <div>
            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                Jumlah Admin
            </p>
            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
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
        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            Data Aduan Terbaru
        </h4>
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">Judul</th>
                        <th class="px-4 py-3">Kategori</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Tanggal</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @forelse ($complaints as $complaint)
                    <tr class="text-gray-700 dark:text-gray-400">
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
        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            Data User Terbaru
        </h4>
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">Nama</th>
                        <th class="px-4 py-3">Email</th>
                        <th class="px-4 py-3">Role</th>
                        <th class="px-4 py-3">No.HP</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @forelse ($users as $user)
                    <tr class="text-gray-700 dark:text-gray-400">
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