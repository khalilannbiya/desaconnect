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
            margin-left: 3cm;
            margin-right: 2cm;
            margin-top: 2cm;
            margin-bottom: 2cm;
            font-family: sans-serif;
            font-size: 12pt;
        }

        td {
            vertical-align: top;
            padding-bottom: 20px;
        }
    </style>
</head>

<body>
    <header>
        <img style="width: 2cm; float: left;" src="{{ asset('assets/images/logo.png') }}">
        <div style="text-align: center;">
            <h1 style="font-size: 12pt; text-transform: uppercase;">Pemerintah Kabupaten Karawang</h1>
            <h1 style="font-size: 12pt; text-transform: uppercase;">Kecamatan Telukjambe Timur</h1>
            <h1 style="font-size: 16pt; text-transform: uppercase;">Desa Puseurjaya</h1>
            <h1 style="line-height: 1.5; font-size: 12pt; font-weight: 400;">Jl Menati 1 No. 25 Desa
                Puseurjaya, Kec.
                Telukjambe Timur, Kabupaten Karawang,
                Jawa Barat 41361</h1>
        </div>
    </header>

    <div>
        <div style="width: 100%; height: 5px; background-color: black; margin-top: 15px;"></div>
    </div>

    <div style="text-align: center;">
        <h1
            style="display: inline-block; text-align: center; font-size: 14pt; margin-top: 36pt; border-bottom: 2px solid black;">
            DETAIL CETAK DATA ADUAN
        </h1>
    </div>

    <p style="margin-top: 40px;">Data Masyarakat : </p>
    <table style="margin-top: 15px; padding-left: 40px; width: 100%">
        <tr>
            <td style="width: 30%;">Nama</td>
            <td>:</td>
            <td style="width: 67%;">{{ $complaint->user->name }}</td>
        </tr>
        <tr>
            <td style="width: 30%;">Email</td>
            <td>:</td>
            <td style="width: 67%;">{{ $complaint->user->email }}</td>
        </tr>
        <tr>
            <td style="width: 30%;">NIK</td>
            <td>:</td>
            <td style="width: 67%;">{{ $complaint->user->nik }}</td>
        </tr>
        <tr>
            <td style="width: 30%;">Nomor Telepon</td>
            <td>:</td>
            <td style="width: 67%;">{{ $complaint->user->phone }}</td>
        </tr>
        <tr>
            <td style="width: 30%;">Alamat</td>
            <td>:</td>
            <td style="width: 67%; line-height: 1.5;">{{ $complaint->user->address }}</td>
        </tr>
    </table>

    <p style="margin-top: 15px;">Data Aduan : </p>
    <table style="margin-top: 15px; padding-left: 40px; width: 100%">
        <tr>
            <td style="width: 30%;">Judul</td>
            <td>:</td>
            <td style="width: 67%;">{{ $complaint->title }}</td>
        </tr>
        <tr>
            <td style="width: 30%;">Status Aduan</td>
            <td>:</td>
            <td style="width: 67%; text-transform: capitalize">{{ $complaint->status }}</td>
        </tr>
        <tr>
            <td style="width: 30%;">Kategori Aduan</td>
            <td>:</td>
            <td style="width: 67%; text-transform: capitalize">{{ $complaint->category->category }}</td>
        </tr>
        <tr>
            <td style="width: 30%;">Diadukan Pada</td>
            <td>:</td>
            <td style="width: 67%;">{{ $complaint->created_at->format('H:i, d-m-Y') }}</td>
        </tr>
    </table>

    <p style="margin-top: 20px; font-weight: 700;">Dengan isi aduan sebagai berikut : </p>
    <p style="margin-top: 10px">{{ $complaint->body }}</p>

    <p style="margin-top: 15px; font-weight: 700;">Tanggapan Petugas : </p>
    <p style="margin-top: 10px">{{ $complaint->response ? $complaint->response : "Belum ada response dari petugas" }}
    </p>

    <p style="margin-top: 15px; font-weight: 700;">Bukti Foto : </p>
    @if ($complaint->photo_url)
    <img style="margin-top: 10px; width: 50%;" src="{{ public_path('storage/' . $complaint->photo_url) }}">
    @else
    <p style="margin-top: 10px;">Tidak ada bukti foto</p>
    @endif
    <footer>
        <p style="margin-top: 1rem">Dicetak pada {{ $date }}</p>
    </footer>
</body>

</html>