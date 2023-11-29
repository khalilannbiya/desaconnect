@extends('layouts.frontend')

@section('title')
@guest
<title>DesaConnect</title>
@endguest
@auth
<title>Sejarah Desa | DesaConnect</title>
@endauth
@endsection

@section('content')
{{-- Jumbotron --}}
<section id="up" class="px-6 py-16 bg-white md:px-10 lg:px-24 2xl:px-48">
    <h1 class="mt-3 text-lg font-medium leading-5 md:mt-16 md:text-2xl xl:text-4xl">
        Menyusuri Jalan Kenangan, Sebuah Perjalanan Menyelami Akar Sejarah Desa Puseurjaya
    </h1>
    <img class="mt-5 rounded" src="{{ asset('assets/images/legenda.jpg') }}" alt="Peta Sejarah">
    <p class="mt-5 text-sm leading-relaxed text-justify md:text-base indent-8 text-davys-grey">Puseurjaya, sebuah desa
        yang
        berada di kecamatan
        Telukjambe
        Timur, Kabupaten
        Karawang, Jawa
        Barat,
        Indonesia,
        dengan wilayahnya seluas 3,09 km2 dan ketinggian 25 mdpl. Desa ini dikenal sebagai salah satu desa dengan
        tingkat urbanisasi yang tinggi di Kabupaten Karawang.</p>

    <img class="mt-5 rounded" src="{{ asset('assets/images/gedung-desa.jpg') }}" alt="Gedung Desa">

    <p class="mt-5 text-sm leading-relaxed text-justify md:text-base indent-8 text-davys-grey">Puseurjaya berasal dari
        Bahasa
        Sunda terdiri atas
        dua suku
        kata “Puser” dan
        “Jaya” yang mempunyai arti “Pusat”
        dan “Kemakmuran”. Jadi Desa Puseurjaya mempunyai arti Pusat Kemakmuran.</p>
    <p class="mt-3 text-sm leading-relaxed text-justify md:text-base indent-8 text-davys-grey">Maka Desa Puseurjaya
        berarti
        Pusat Kemakmuran
        masyarakat
        dalam kebersamaan
        untuk mencapai kemajuan desa sesuai
        dengan keinginan masyarakatnya. Secara geografis, Desa Puseurjaya letaknya sangat strategis yaitu berada didekat
        pintu Tol Karawang Barat dan termasuk dalam Kawasan Karawang International City ( KIIC ). Desa Puseurjaya
        termasuk sebagai penyangga ibukota Kabupaten Karawang yang merupakan daerah perkotaan yang ditandai dengan
        hadirnya pengembang Perumahan, rumah sakit, dan pusat niaga yang mempunyai potensi yang sangat besar baik dalam
        bidang pertanian, perekonomian masyarakat, usaha limbah, perdagangan usaha kecil maupun mengangkat nilai
        pertanian masyarakat sekitar.</p>
    <p class="mt-3 text-sm leading-relaxed text-justify md:text-base indent-8 text-davys-grey">Desa Puseurjaya merupakan
        pemekaran dari Desa
        Sirnabaya pada
        tahun 1979 yang
        dirintis oleh para tokoh
        masyarakat,tokoh agama, dan seluruh lapisan masyarakat. Pada awal pembentukan Desa Puseurjaya
        tahun 1979 sampai dengan tahun 1984 dipimpin oleh Pjs Kepala Desa yang bernama Bapak ANDA, beliau adalah
        pemimpin yang sangat bersahaja yang mampu berdekatan dengan masyarakatnya.</p>
    <p class="mt-3 text-sm leading-relaxed text-justify md:text-base indent-8 text-davys-grey">Pada Era kepemimpinannya,
        Desa
        Puseurjaya terbagi
        menjadi
        4(empat) wilayah
        keterwakilan wilayah dan kedusunan yang
        meliputi: </p>
    <ol class="mt-3 text-sm list-decimal list-inside md:text-base text-davys-grey">
        <li>Dusun I Babakan;</li>
        <li>Dusun II Babakan Tengah;</li>
        <li>Dusun III Kaumjaya;</li>
        <li>Dusun IV Kalijaya;</li>
    </ol>
    <p class="mt-3 text-sm leading-relaxed text-justify md:text-base indent-8 text-davys-grey">Dengan batas wilayah
        sebelah utara
        sungai Citarum, sebelah timur Desa Sirnabaya, sebelah selatan Perhutani, dan
        sebelah barat Desa Sukaluyu.</p>
    <p class="mt-3 text-sm leading-relaxed text-justify md:text-base indent-8 text-davys-grey">Pada tahun 1986 diadakan
        pemilihan
        Kepala Desa untuk pertama kalinya. Bapak H. Mohamad Lecin terpilih sebagai
        pemenang dalam pemilihan kepala desa tersebut, dengan masa bhakti kepemimpinan mulai tahun 1986 sampai dengan
        tahun 1994. Pada masa itu, Desa Puseurjaya dipimpin oleh seorang Kepala Desa yang mempunyai kewibawaan dan mampu
        mengayomi seluruh kalangan masyarakat.</p>
    <p class="mt-3 text-sm leading-relaxed text-justify md:text-base indent-8 text-davys-grey">Pada tahun 1994 Desa
        Puseurjaya
        mengadakan pemilihan kepala desa. Pemilihan tersebut, dimenangkan oleh Bapak H.
        Homi Sobirin. Bapak H.Homi Sobirin menjabat dengan masa bhakti 1994 sampai dengan 2002. Beliau adalah seorang
        pemimpin yang penuh semangat dan tegas.</p>
</section>
@endsection