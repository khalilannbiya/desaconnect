@extends('layouts.admin')

@section('title')
<title>Data Petugas</title>
@endsection

@section('title-page')
<h2 class="my-6 text-lg font-semibold text-gray-700 dark:text-gray-200">
    Data Petugas
</h2>
@endsection

@section('content')
<div class="flex flex-col flex-wrap justify-start gap-4 mb-8 md:flex-row md:items-end">
    <a href="{{ route('admin.users.create') }}"
        class="flex items-center justify-center gap-2 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
        <i class="ti ti-user-plus"></i>
        <span>Tambah Petugas</span>
    </a>
</div>
<div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
    <form class="block mb-4 text-sm" action="{{ route('admin.users.get-officer') }}" method="get">
        <div class="relative text-gray-500 focus-within:text-purple-600">
            <input id="keyword" name="keyword"
                class="block w-full pr-20 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                placeholder="Masukan Kata Kunci seperti Nama, Email, Nomor Telp" />
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
                    <th class="px-4 py-3">Nama</th>
                    <th class="px-4 py-3">Email</th>
                    <th class="px-4 py-3">Role</th>
                    <th class="px-4 py-3">Actions</th>
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
                    <td class="px-4 py-3 text-sm capitalize">
                        {{ $user->role->role }}
                    </td>
                    <td class="px-4 py-3">
                        <div class="flex items-center space-x-4 text-sm">
                            <a href="{{ auth()->user()->role_id === 2 ? route('staff.users.show', $user->id) : route('admin.users.show', $user->id) }}"
                                class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                aria-label="Detail">
                                <i class="ti ti-eye-filled"></i>
                            </a>
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="post">
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
                    <td class="p-2 text-sm font-semibold text-center text-slate-400" colspan="4">Belum Ada Data</td>
                </tr>
                @endforelse

            </tbody>
        </table>
    </div>
    {{ $users->links('components.admin.pagination') }}
</div>
@endsection