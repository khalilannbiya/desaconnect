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

        td,
        th {
            border: 1px solid black;
        }

        td {
            vertical-align: top;
            padding-bottom: 20px;
        }

        .table-complaints {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid black;
            margin-top: 10px;
        }

        .table-complaints th,
        .table-complaints td {
            border-collapse: collapse;
            border: 1px solid black;
            padding: 10px;
        }

        .status-text {
            text-transform: capitalize;
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
            LAPORAN DATA ADUAN
        </h1>
    </div>

    <p style="margin-top: 60px;">Total aduan : {{ $total }} aduan</p>
    <table class="table-complaints">
        <thead>
            <tr
                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                <th style="width: 30%;" class="px-4 py-3">Judul</th>
                <th style="width: 23%;" class="px-4 py-3">Kategori</th>
                <th style="width: 23%;" class="px-4 py-3">Status</th>
                <th style="width: 23%;" class="px-4 py-3">Tanggal</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
            @foreach ($complaints as $complaint)
            <tr class="text-gray-700 dark:text-gray-400">
                <td>
                    {{ $complaint->title }}
                </td>
                <td style="text-align: center;">
                    {{ $complaint->category->category }}
                </td>
                <td style="text-align: center;" class="status-text">
                    {{ $complaint->status }}
                </td>
                <td style="text-align: center;">
                    {{ $complaint->created_at->format('d/m/Y') }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <footer>
        <p style="margin-top: 1rem">Dicetak pada {{ $date }}</p>
    </footer>
</body>

</html>