<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Peminjaman Buku</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            line-height: 1.6;
        }
        .report-container {
            max-width: 800px;
            margin: 0 auto;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .header p {
            margin: 0;
            color: #555;
        }
        .details {
            margin-bottom: 20px;
        }
        .details p {
            margin: 5px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        .btn-print {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
        }
        .btn-print:hover {
            background-color: #0056b3;
        }

        @media print{
            .btn-print{
                display: none;
            }
            
            .report-container {
                width:100%;
                margin:0;
                border:none;
                box-shadow:none;
            }
        }
    </style>
</head>
<body>
    <div class="report-container">
        <a href="#" class="btn-print" onclick="window.print()">Print Laporan</a>

        <div class="header">
            <h1>Laporan Peminjaman Buku</h1>
        </div>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Pinjam</th>
                    <th>Nama Siswa</th>
                    <th>Jumlah Buku</th>
                    <th>Daftar Buku</th>
                    <th>Status Pinjam</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item['code'] }}</td>
                        <td>{{ $item['student_name'] }}</td>
                        <td>{{ $item['books']->count() }}</td>
                        <td>
                            <ol type="disc">
                                @foreach ($item['books'] as $book)
                                    <li>{{ $book['title'] }}</li>
                                @endforeach
                            </ol>
                        </td>
                        <td> {{ $item['status'] == 0 ? "Belum Kembali" : "Sudah Kembali" }} </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
