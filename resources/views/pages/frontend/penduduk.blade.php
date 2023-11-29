@extends('layouts.frontend')

@section('title')
@guest
<title>DesaConnect</title>
@endguest
@auth
<title>Data Penduduk | DesaConnect</title>
@endauth
@endsection

@section('content')
<section id="up" class="px-6 py-16 bg-white md:px-10 lg:px-24 2xl:px-48">
    <h1 class="mt-3 text-base font-medium leading-relaxed md:text-lg md:text-xl md:mt-16">Jumlah Penduduk Desa
        Puseurjaya Kecamatan
        Telukjambe Timur
        Berdasarkan Data Agregat
        Kependudukan Semester 1
        Tahun 2023</h1>

    <div class="overflow-x-auto">
        <table class="w-full mt-3 bg-white border border-collapse border-gray-300 md:mt-6 lg:mt-10">
            <tr>
                <th class="px-4 py-2 text-xs border md:text-sm lg:text-base">Laki-laki</th>
                <td class="px-4 py-2 text-xs text-center border md:text-sm lg:text-base">6,375</td>
            </tr>
            <tr>
                <th class="px-4 py-2 text-xs border md:text-sm lg:text-base">Perempuan</th>
                <td class="px-4 py-2 text-xs text-center border md:text-sm lg:text-base">6,253</td>
            </tr>
            <tr>
                <th class="px-4 py-2 text-xs border md:text-sm lg:text-base">Jumlah</th>
                <td class="px-4 py-2 text-xs font-semibold text-center border md:text-sm lg:text-base">12,628</td>
            </tr>
        </table>
    </div>

    <h1 class="mt-3 text-base font-medium leading-relaxed md:text-lg md:text-xl md:mt-16">Jumlah Kepala Keluarga Desa
        Puseurjaya Kecamatan
        Telukjambe Timur
        Berdasarkan Data Agregat
        Kependudukan Semester 1
        Tahun 2023</h1>

    <div class="overflow-x-auto">
        <table class="w-full mt-3 bg-white border border-collapse border-gray-300 md:mt-6 lg:mt-10">
            <tr>
                <th class="px-4 py-2 text-xs border md:text-sm lg:text-base">Kepala Keluarga Laki-laki</th>
                <td class="px-4 py-2 text-xs text-center border md:text-sm lg:text-base">3,468</td>
            </tr>
            <tr>
                <th class="px-4 py-2 text-xs border md:text-sm lg:text-base">Kepala Keluarga Perempuan</th>
                <td class="px-4 py-2 text-xs text-center border md:text-sm lg:text-base">743</td>
            </tr>
            <tr>
                <th class="px-4 py-2 text-xs border md:text-sm lg:text-base">Jumlah</th>
                <td class="px-4 py-2 text-xs font-semibold text-center border md:text-sm lg:text-base">4,211</td>
            </tr>
        </table>
    </div>
</section>
@endsection