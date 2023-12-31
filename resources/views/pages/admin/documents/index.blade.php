@extends('layouts.admin')

@section('title')
<title>Data Pengajuan Surat</title>
@endsection

@section('title-page')
<h2 class="my-6 text-lg font-semibold text-gray-200">
    Data Pengajuan Surat
</h2>
@endsection

@section('content')
<div class="flex flex-col flex-wrap justify-start gap-4 mb-8 md:flex-row md:items-end">
    <a href="{{ auth()->user()->role_id === 2 ? route('staff.documents.generate-pdf-all') : route('admin.documents.generate-pdf-all') }}"
        class="flex items-center justify-center gap-2 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
        <i class="ti ti-printer"></i>
        <span>Cetak Pengajuan</span>
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
        action="{{ auth()->user()->role_id === 2 ? route('staff.documents.index') : route('admin.documents.index') }}"
        method="get">
        <div class="relative text-gray-500 focus-within:text-purple-600">
            <input id="keyword" name="keyword"
                class="block w-full pr-20 mt-1 text-sm text-gray-300 bg-gray-700 border-gray-600 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple focus:shadow-outline-gray form-input"
                placeholder="Masukan Kata Kunci seperti Nama Pengaju, Status, Jenis Surat" />
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
                    class="text-xs font-semibold tracking-wide text-left text-gray-400 uppercase bg-gray-800 border-b border-gray-700">
                    <th class="px-4 py-3">Nama Pengaju</th>
                    <th class="px-4 py-3">Jenis Surat</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Tanggal</th>
                    <th class="px-4 py-3">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-gray-800 divide-y divide-gray-700">
                @forelse ($documents as $document)
                <tr class="text-gray-400 ">
                    <td class="px-4 py-3 text-sm">
                        {{ $document->user->name }}
                    </td>
                    <td class="px-4 py-3 text-sm capitalize">
                        {{ $document->document_type }}
                    </td>
                    <td class="px-4 py-3 text-sm">
                        @if ($document->status === 'tidak valid')
                        <p class="text-red-500 capitalize">{{ $document->status }}</p>
                        @elseif ($document->status === 'proses validasi')
                        <p class="text-yellow-500 capitalize">{{ $document->status }}</p>
                        @elseif ($document->status === 'diproses')
                        <p class="text-yellow-500 capitalize">{{ $document->status }}</p>
                        @else
                        <p class="text-green-500 capitalize">{{ $document->status }}</p>
                        @endif
                    </td>
                    <td class="px-4 py-3 text-sm">
                        {{ $document->created_at->format('d/m/Y') }}
                    </td>
                    <td class="px-4 py-3">
                        <div class="flex items-center space-x-4 text-sm">
                            <a href="{{ auth()->user()->role_id === 2 ? route('staff.documents.show', $document->id) : route('admin.documents.show', $document->id) }}"
                                class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg focus:outline-none focus:shadow-outline-gray"
                                aria-label="Detail">
                                <i class="ti ti-eye-filled"></i>
                            </a>
                            <form
                                action="{{ auth()->user()->role_id === 2 ? route('staff.documents.destroy', $document->id) : route('admin.documents.destroy', $document->id) }}"
                                method="post">
                                @csrf
                                @method('delete')
                                <button onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"
                                    type="submit"
                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg focus:outline-none focus:shadow-outline-gray"
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
    {{ $documents->links('components.admin.pagination') }}
</div>

@include('components.admin.modal.documents.modal-print-by-month')
@include('components.admin.modal.documents.modal-print-by-year')
@include('components.admin.modal.documents.modal-search-by-date')
@include('components.admin.modal.documents.modal-search-by-month')
@include('components.admin.modal.documents.modal-search-by-year')
@include('components.admin.modal.documents.modal-print-pdf')
@endsection

@push('script')
<!-- You need focus-trap.js to make the modal accessible -->
<script src="./assets/js/focus-trap.js" defer></script>
@endpush