@extends('layouts.frontend')

@section('title')
@guest
<title>DesaConnect</title>
@endguest
@auth
<title>Pemerintahan | DesaConnect</title>
@endauth
@endsection

@section('content')
<section id="up" class="px-6 py-16 bg-white md:px-10 lg:px-24 2xl:px-48">
    <h1 class="mt-5 text-xl font-semibold text-center md:text-2xl md:mt-16 xl:text-4xl">Visi dan Misi</h1>
    <h2 class="mt-5 text-base font-medium md:mt-8 md:text-xl">Visi</h2>
    <p class="mt-3 text-sm leading-relaxed text-center capitalize md:text-base text-davys-grey">"Membangun
        desa
        secara
        bersama menuju
        masyarakat
        sejahtera dan
        beriman"</p>
    <h2 class="mt-5 text-base font-medium md:text-xl">Misi</h2>
    <ul class="mt-3 text-sm capitalize list-disc list-inside md:text-base text-davys-grey">
        <li>Perbaikan pelayanan kepada masyarakat</li>
        <li>Menggerakan perekonomian masyarakat</li>
        <li>Peningkatan sumber daya manusia terampil</li>
        <li>Perbaikan sanitasi lingkungan</li>
        <li>Perbaikan sarana peribadatan</li>
    </ul>

    <h1 class="mt-5 text-xl font-semibold text-center md:mt-10 md:text-2xl ">Struktur Organisasi</h1>
    <img class="mt-5" src="{{ asset('assets/images/struktur.jpg') }}" alt="Struktur Organisasi">

    <h1 class="mt-6 text-xl font-semibold text-center md:text-2xl md:mt-10">Kepala Desa dan Sekretaris Desa
        Dari Masa ke
        Masa
    </h1>
    <h2 class="mt-5 text-base font-medium md:mt-6 md:text-xl">Daftar Nama Kepala Desa : </h2>
    <div class="overflow-x-auto">
        <table class="w-full mt-3 bg-white border border-gray-300">
            <thead>
                <tr>
                    <th class="px-4 py-2 text-xs border-b md:text-base xl:text-xl">Tahun</th>
                    <th class="px-4 py-2 text-xs border-b md:text-base xl:text-xl">Kepala Desa</th>
                    <th class="px-4 py-2 text-xs border-b md:text-base xl:text-xl">Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="px-4 py-2 text-xs border-b md:text-base xl:text-xl">1979 - 1984</td>
                    <td class="px-4 py-2 text-xs capitalize border-b md:text-base xl:text-xl">Anda</td>
                    <td class="px-4 py-2 text-xs border-b md:text-base xl:text-xl">Pjs. Kepala Desa</td>
                </tr>
                <tr>
                    <td class="px-4 py-2 text-xs border-b md:text-base xl:text-xl">1986 - 1994</td>
                    <td class="px-4 py-2 text-xs capitalize border-b md:text-base xl:text-xl">H. Mohamad Lecin</td>
                    <td class="px-4 py-2 text-xs border-b md:text-base xl:text-xl">Definitif</td>
                </tr>
                <tr>
                    <td class="px-4 py-2 text-xs border-b md:text-base xl:text-xl">1994 - 2002</td>
                    <td class="px-4 py-2 text-xs capitalize border-b md:text-base xl:text-xl">H. Homi Sobirin</td>
                    <td class="px-4 py-2 text-xs border-b md:text-base xl:text-xl">Definitif</td>
                </tr>
                <tr>
                    <td class="px-4 py-2 text-xs border-b md:text-base xl:text-xl">2002 - 2008</td>
                    <td class="px-4 py-2 text-xs capitalize border-b md:text-base xl:text-xl">H. Dadih Sastrawijaya</td>
                    <td class="px-4 py-2 text-xs border-b md:text-base xl:text-xl">Definitif</td>
                </tr>
                <tr>
                    <td class="px-4 py-2 text-xs border-b md:text-base xl:text-xl">2008 - 2014</td>
                    <td class="px-4 py-2 text-xs capitalize border-b md:text-base xl:text-xl">H. Dadih Sastrawijaya</td>
                    <td class="px-4 py-2 text-xs border-b md:text-base xl:text-xl">Definitif</td>
                </tr>
                <tr>
                    <td class="px-4 py-2 text-xs border-b md:text-base xl:text-xl">2015 - 2021</td>
                    <td class="px-4 py-2 text-xs capitalize border-b md:text-base xl:text-xl">H. Mohamad Tolib, S.Ag
                    </td>
                    <td class="px-4 py-2 text-xs border-b md:text-base xl:text-xl">Definitif</td>
                </tr>
                <tr>
                    <td class="px-4 py-2 text-xs border-b md:text-base xl:text-xl">2021 - sekarang</td>
                    <td class="px-4 py-2 text-xs capitalize border-b md:text-base xl:text-xl">H. Dadih Sastrawijaya</td>
                    <td class="px-4 py-2 text-xs border-b md:text-base xl:text-xl">Definitif</td>
                </tr>
            </tbody>
        </table>
    </div>

    <h2 class="mt-5 text-base font-medium md:mt-6 md:text-xl">Daftar Nama Sekretaris Desa : </h2>
    <div class="overflow-x-auto">
        <table class="w-full mt-3 bg-white border border-gray-300">
            <thead>
                <tr>
                    <th class="px-4 py-2 text-xs md:text-base xl:text-xl border-b w-[25%]">Tahun</th>
                    <th class="px-4 py-2 text-xs border-b md:text-base xl:text-xl">Sekretaris Desa</th>
                    <th class="px-4 py-2 text-xs border-b md:text-base xl:text-xl">Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="px-4 py-2 text-xs border-b md:text-base xl:text-xl">1986 - 1994</td>
                    <td class="px-4 py-2 text-xs capitalize border-b md:text-base xl:text-xl">Anda Suhanda</td>
                    <td class="px-4 py-2 text-xs border-b md:text-base xl:text-xl">Definitif</td>
                </tr>
                <tr>
                    <td class="px-4 py-2 text-xs border-b md:text-base xl:text-xl">1994 - 2002</td>
                    <td class="px-4 py-2 text-xs capitalize border-b md:text-base xl:text-xl">Jamaludin</td>
                    <td class="px-4 py-2 text-xs border-b md:text-base xl:text-xl">Definitif</td>
                </tr>
                <tr>
                    <td class="px-4 py-2 text-xs border-b md:text-base xl:text-xl">2002 - 2008</td>
                    <td class="px-4 py-2 text-xs capitalize border-b md:text-base xl:text-xl">Jumhur</td>
                    <td class="px-4 py-2 text-xs border-b md:text-base xl:text-xl">Definitif</td>
                </tr>
                <tr>
                    <td class="px-4 py-2 text-xs border-b md:text-base xl:text-xl"></td>
                    <td class="px-4 py-2 text-xs capitalize border-b md:text-base xl:text-xl">Ading</td>
                    <td class="px-4 py-2 text-xs border-b md:text-base xl:text-xl">Definitif</td>
                </tr>
                <tr>
                    <td class="px-4 py-2 text-xs border-b md:text-base xl:text-xl"></td>
                    <td class="px-4 py-2 text-xs capitalize border-b md:text-base xl:text-xl">Ade Domon</td>
                    <td class="px-4 py-2 text-xs border-b md:text-base xl:text-xl">PNS</td>
                </tr>
                <tr>
                    <td class="px-4 py-2 text-xs border-b md:text-base xl:text-xl">2008 - 2014</td>
                    <td class="px-4 py-2 text-xs capitalize border-b md:text-base xl:text-xl">Iis Iskandar Guna</td>
                    <td class="px-4 py-2 text-xs border-b md:text-base xl:text-xl">PNS</td>
                </tr>
                <tr>
                    <td class="px-4 py-2 text-xs border-b md:text-base xl:text-xl">2015 - 2021</td>
                    <td class="px-4 py-2 text-xs capitalize border-b md:text-base xl:text-xl">Iis Iskandar Guna</td>
                    <td class="px-4 py-2 text-xs border-b md:text-base xl:text-xl">PNS</td>
                </tr>
                <tr>
                    <td class="px-4 py-2 text-xs border-b md:text-base xl:text-xl"></td>
                    <td class="px-4 py-2 text-xs capitalize border-b md:text-base xl:text-xl">Yogiana</td>
                    <td class="px-4 py-2 text-xs border-b md:text-base xl:text-xl">Definitif</td>
                </tr>
                <tr>
                    <td class="px-4 py-2 text-xs border-b md:text-base xl:text-xl"></td>
                    <td class="px-4 py-2 text-xs capitalize border-b md:text-base xl:text-xl">Hendra Purnawan</td>
                    <td class="px-4 py-2 text-xs border-b md:text-base xl:text-xl">Definitif</td>
                </tr>
                <tr>
                    <td class="px-4 py-2 text-xs border-b md:text-base xl:text-xl">2021 - Sekarang</td>
                    <td class="px-4 py-2 text-xs capitalize border-b md:text-base xl:text-xl">Abdul Rohman, S.Pd</td>
                    <td class="px-4 py-2 text-xs border-b md:text-base xl:text-xl">Definitif</td>
                </tr>
            </tbody>
        </table>
    </div>
</section>
@endsection