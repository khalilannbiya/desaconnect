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

        .header-section {
            font-weight: 600;
        }

        .table-complaints {
            width: 100%;
        }

        .table-complaints,
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
        <h2 class="header-section">Laporan Data Aduan</h2>
    </section>
    <table class="table-complaints">
        <thead>
            <tr
                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                <th class="px-4 py-3">Judul</th>
                <th class="px-4 py-3">Kategori</th>
                <th class="px-4 py-3">Status</th>
                <th class="px-4 py-3">Tanggal</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
            @foreach ($complaints as $complaint)
            <tr class="text-gray-700 dark:text-gray-400">
                <td>
                    {{ $complaint->title }}
                </td>
                <td>
                    {{ $complaint->category->category }}
                </td>
                <td class="status-text">
                    {{ $complaint->status }}
                </td>
                <td>
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