<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF</title>

    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            padding: 2rem 3rem;
            font-size: 12pt;
            font-family: sans-serif;
        }

        .kop-surat {
            border-collapse: collapse;
            border: 0px solid black;
            width: 100%;
        }

        .kop-surat img {
            width: 7rem;
        }

        .kop-surat td {
            text-align: center;
        }

        .kop-surat tr td:nth-child(1) {
            /* padding: 0 5rem */
            width: 10rem;
        }

        .kop-surat tr td:nth-child(2) {
            padding: 0 2rem;
            font-size: 12pt;
            line-height: 1.4;
        }

        .line {
            margin-top: 1rem;
            border-top: 2px solid black;
        }

        .header-title {
            text-align: center;
            margin: 3rem 0;
        }

        .header-title h2 {
            font-size: 14pt;
            text-transform: uppercase;
        }

        .head-column {
            width: 9rem;
        }

        .user-data,
        .complaint-data {
            margin: 1rem 0 1rem 1rem;
        }

        .section-body-complaint {
            margin-bottom: 1rem
        }

        .section-photo {
            margin: 1rem 0;
        }

        .bukti-foto {
            width: 10rem;
        }

        .header-section {
            font-weight: 600;
        }
    </style>
</head>

<body>
    <section>
        <table class="kop-surat">
            <tr>
                <td>
                    <img src="{{ asset('assets/images/logo.png') }}">
                </td>
                <td>
                    Jl.Dusun Karangmulya, RT.005/RW .002, Desa Lemahmulya, Kecamatan Majalaya, Kabupaten Karawang 41370
                </td>
            </tr>
        </table>
    </section>
    <hr class="line">
    <section class="header-title">
        <h2 class="header-section">Detail Cetak Data Aduan</h2>
    </section>
    <section>
        <p class="header-section">Data Masyakarat/Pengadu : </p>
        <table class="user-data">
            <tr>
                <td class="head-column">Nama</td>
                <td>:</td>
                <td>{{ $complaint->user->name }}</td>
            </tr>
            <tr>
                <td class="head-column">Email</td>
                <td>:</td>
                <td>{{ $complaint->user->email }}</td>
            </tr>
            <tr>
                <td class="head-column">Nomor Telepon</td>
                <td>:</td>
                <td>{{ $complaint->user->phone }}</td>
            </tr>
            <tr>
                <td class="head-column">Alamat</td>
                <td>:</td>
                <td>{{ $complaint->user->address }}</td>
            </tr>
        </table>
    </section>
    <section>
        <p class="header-section">Data Aduan : </p>
        <table class="complaint-data">
            <tr>
                <td class="head-column">Judul</td>
                <td>:</td>
                <td>{{ $complaint->title }}</td>
            </tr>
            <tr>
                <td class="head-column">Status Aduan</td>
                <td>:</td>
                <td style="text-transform: capitalize">{{ $complaint->status }}</td>
            </tr>
            <tr>
                <td class="head-column">Kategori Aduan</td>
                <td>:</td>
                <td>{{ $complaint->category->category }}</td>
            </tr>
            <tr>
                <td class="head-column">Diadukan Pada</td>
                <td>:</td>
                <td>{{ $complaint->created_at->format('H:i, d-m-Y') }}</td>
            </tr>
        </table>

        <section>
            <p class="section-body-complaint header-section">Dengan isi aduan sebagai berikut : </p>
            <p>{{ $complaint->body }}</p>
        </section>

        <section>
            <p class="section-photo header-section">Tanggapan Petugas : </p>
            @if ($complaint->response)
            <p>{{ $complaint->response }}</p>
            @else
            <p>Petugas Belum Memberikan Tanggapan</p>
            @endif
        </section>

        <section>
            <p class="section-photo header-section">Bukti Foto :</p>
            @if ($complaint->photo_url)
            <img class="bukti-foto" src="{{Storage::url($complaint->photo_url) }}">
            @else
            <p>Tidak ada foto yang dijadikan bukti</p>
            @endif
        </section>
    </section>
    <footer>
        <p style="margin-top: 1rem">Dicetak pada {{ $date }}</p>
    </footer>
</body>

</html>