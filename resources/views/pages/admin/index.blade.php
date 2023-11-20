@extends('layouts.admin')

@section('title')
<title>Data Aduan</title>
@endsection

@section('title-page')
<h2 class="my-6 text-lg font-semibold text-gray-700 dark:text-gray-200">
    Data Aduan
</h2>
@endsection

@section('content')
<div class="flex flex-col flex-wrap justify-start gap-4 mb-8 md:flex-row md:items-end">
    <a href="{{ auth()->user()->role_id === 2 ? route('staff.complaints.generate-pdf-all') : route('admin.complaints.generate-pdf-all') }}"
        class="flex items-center justify-center gap-2 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
        <i class="ti ti-printer"></i>
        <span>Cetak Aduan</span>
    </a>
    <button @click="openModalPrintByMonth"
        class="flex items-center justify-center gap-2 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
        <i class="ti ti-printer"></i>
        <span>Cetak Bulanan</span>
    </button>
    <button @click="openModalPrintByYear"
        class="flex items-center justify-center gap-2 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
        <i class="ti ti-printer"></i>
        <span>Cetak Tahunan</span>
    </button>
    <button @click="openModalPrintByDate"
        class="flex items-center justify-center gap-2 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
        <i class="ti ti-printer"></i>
        <span>Cetak berdasarkan tanggal</span>
    </button>
    <button @click="openModalSearchByDate"
        class="flex items-center justify-center gap-2 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
        <i class="ti ti-search"></i>
        <span>Cari Sesuai Tanggal</span>
    </button>
    <button @click="openModalSearchByMonth"
        class="flex items-center justify-center gap-2 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
        <i class="ti ti-search"></i>
        <span>Cari Sesuai Bulan</span>
    </button>
    <button @click="openModalSearchByYear"
        class="flex items-center justify-center gap-2 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
        <i class="ti ti-search"></i>
        <span>Cari Sesuai Tahun</span>
    </button>
</div>
<div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
    <form class="block mb-4 text-sm"
        action="{{ auth()->user()->role_id === 2 ? route('staff.complaints.index') : route('admin.complaints.index') }}"
        method="get">
        <div class="relative text-gray-500 focus-within:text-purple-600">
            <input id="keyword" name="keyword"
                class="block w-full pr-20 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                placeholder="Masukan Kata Kunci seperti Judul, Status, Kategori" />
            <button type="submit"
                class="absolute inset-y-0 right-0 px-4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-r-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                Cari
            </button>
        </div>
    </form>
    <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
            <thead>
                <tr
                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">Judul</th>
                    <th class="px-4 py-3">Kategori</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Tanggal</th>
                    <th class="px-4 py-3">Actions</th>
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
                    <td class="px-4 py-3">
                        <div class="flex items-center space-x-4 text-sm">
                            <a href="{{ auth()->user()->role_id === 2 ? route('staff.complaints.show', $complaint->id) : route('admin.complaints.show', $complaint->id) }}"
                                class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                aria-label="Detail">
                                <i class="ti ti-eye-filled"></i>
                            </a>
                            <form
                                action="{{ auth()->user()->role_id === 2 ? route('staff.complaints.destroy', $complaint->id) : route('admin.complaints.destroy', $complaint->id) }}"
                                method="post">
                                @csrf
                                @method('delete')
                                <button onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"
                                    type="submit"
                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                    aria-label="Delete">
                                    <i class="ti ti-trash-filled"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td class="p-2 text-sm font-semibold text-center text-slate-400" colspan="5">Belum Ada Data</td>
                </tr>
                @endforelse

            </tbody>
        </table>
    </div>
    {{ $complaints->links('components.admin.pagination') }}
</div>

@include('components.admin.modal.modal-print-by-month')
@include('components.admin.modal.modal-print-by-year')
@include('components.admin.modal.modal-search-by-date')
@include('components.admin.modal.modal-search-by-year')
@include('components.admin.modal.modal-search-by-month')
@include('components.admin.modal.modal-print-pdf')
@endsection

@push('script')
<!-- You need focus-trap.js to make the modal accessible -->
<script src="./assets/js/focus-trap.js" defer></script>
@endpush