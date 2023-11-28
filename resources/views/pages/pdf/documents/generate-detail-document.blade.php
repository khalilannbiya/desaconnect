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
            BUKTI PENGAJUAN
        </h1>
    </div>

    <p style="margin-top: 40px;">Data Masyarakat : </p>
    <table style="margin-top: 15px; padding-left: 40px; width: 100%">
        <tr>
            <td style="width: 30%;">Nama</td>
            <td>:</td>
            <td style="width: 67%;">{{ $document->user->name }}</td>
        </tr>
        <tr>
            <td style="width: 30%;">Email</td>
            <td>:</td>
            <td style="width: 67%;">{{ $document->user->email }}</td>
        </tr>
        <tr>
            <td style="width: 30%;">NIK</td>
            <td>:</td>
            <td style="width: 67%;">{{ $document->user->nik }}</td>
        </tr>
        <tr>
            <td style="width: 30%;">Nomor Telepon</td>
            <td>:</td>
            <td style="width: 67%;">{{ $document->user->phone }}</td>
        </tr>
        <tr>
            <td style="width: 30%;">Alamat</td>
            <td>:</td>
            <td style="width: 67%; line-height: 1.5;">{{ $document->user->address }}</td>
        </tr>
    </table>

    <p style="margin-top: 15px;">Data Pengajuan Surat : </p>
    <table style="margin-top: 15px; padding-left: 40px; width: 100%">
        <tr>
            <td style="width: 30%;">Nomor Pengajuan</td>
            <td>:</td>
            <td style="width: 67%;">{{ $document->request_number }}</td>
        </tr>
        <tr>
            <td style="width: 30%;">Jenis Surat</td>
            <td>:</td>
            <td style="width: 67%; text-transform: capitalize">{{ $document->document_type }}</td>
        </tr>
        <tr>
            <td style="width: 30%;">Status</td>
            <td>:</td>
            <td style="width: 67%; text-transform: capitalize">{{ $document->status }}</td>
        </tr>
        <tr>
            <td style="width: 30%;">Diajukan Pada</td>
            <td>:</td>
            <td style="width: 67%;">{{ $document->created_at->format('H:i, d-m-Y') }}</td>
        </tr>
    </table>
    <footer>
        <p style="margin-top: 1rem">Dicetak pada {{ $date }}</p>
    </footer>
</body>

</html>