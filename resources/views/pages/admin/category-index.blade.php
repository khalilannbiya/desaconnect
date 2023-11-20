@extends('layouts.admin')

@section('title')
<title>Data Kategori</title>
@endsection

@section('title-page')
<h2 class="my-6 text-lg font-semibold text-gray-700 dark:text-gray-200">
    Data Kategori
</h2>
@endsection

@section('content')
@if (auth()->user()->role_id !== 2)
<div class="flex flex-col flex-wrap justify-start gap-4 mb-8 md:flex-row md:items-end">
    <button type="button" @click="openModalAddCategory"
        class="flex items-center justify-center gap-2 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
        <i class="ti ti-plus"></i>
        <span>Tambah Kategori</span>
    </button>
</div>
@endif

@if ($errors->any())
<div class="relative px-4 py-3 mb-8 font-semibold text-red-800 bg-red-300 border border-red-400 rounded shadow-md">
    <ul>
        @foreach ($errors->all() as $error)
        <li class="block sm:inline">{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
    <form class="block mb-4 text-sm"
        action="{{ auth()->user()->role_id === 2 ? route('staff.categories.index') : route('admin.categories.index') }}"
        method="get">
        <div class="relative text-gray-500 focus-within:text-purple-600">
            <input id="keyword" name="keyword"
                class="block w-full pr-20 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                placeholder="Masukan Kata Kunci Kategori" />
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
                    <th class="px-4 py-3">No</th>
                    <th class="px-4 py-3">Category</th>
                    @if (auth()->user()->role_id !== 2)
                    <th class="px-4 py-3">Actions</th>
                    @endif
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                @forelse ($categories as $category)
                <tr class="text-gray-700 dark:text-gray-400">
                    <td class="px-4 py-3 text-sm">
                        {{ $loop->iteration }}
                    </td>
                    <td class="px-4 py-3 text-sm capitalize">
                        {{ $category->category }}
                    </td>
                    @if (auth()->user()->role_id !== 2)
                    <td class="px-4 py-3">
                        <div class="flex items-center space-x-4 text-sm">
                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button
                                    onclick="return confirm('Jika Anda menghapus kategori ini, maka semua aduan yang memiliki kategori ini akan terhapus. Apakah Anda yakin?')"
                                    type="submit"
                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                    aria-label="Delete">
                                    <i class="ti ti-trash-filled"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                    @endif
                </tr>
                @empty
                <tr>
                    <td class="p-2 text-sm font-semibold text-center text-slate-400" colspan="3">Belum Ada Data</td>
                </tr>
                @endforelse

            </tbody>
        </table>
    </div>
    {{ $categories->links('components.admin.pagination') }}
</div>

@if (auth()->user()->role_id !== 2)
@include('components.admin.modal.modal-add-category')
@endif

@endsection