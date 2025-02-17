<!DOCTYPE html>
<html lang="en">

<head>
    <title>Kumpulan Data PDF Master produk</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        .page-break {
            page-break-after: always;
        }

        table {
            border-collapse: collapse;
            border-spacing: 0;
            width: 100%;
            border: 1px solid #ddd;
        }

        th {
            color: white;
            background-color: rgb(0, 0, 0);
        }

        th,
        td {
            text-align: center;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2
        }
    </style>
</head>

<body>
    <center>
        <h3>Kumpulan Data PDF Master produk</h3>
        <hr style="width:75%">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            </div>
            <div>
                <div style="overflow-x:auto;"">
                <table width=" 100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>Merk</th>
                            <th>Harga Beli</th>
                            <th>Harga Jual</th>
                            <th>Stok</th>
                            <th>Waktu Dibuat</th>
                            <th>Waktu Diupdate</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produk as $item => $key)
                        <tr>
                            <td>{{ $item + 1 }}</td>
                        <td>{{ $key->nama_produk }}</td>
                        <td>{{ $key->id_kategori }}</td>
                        <td>{{ $key->merk }}</td>
                        <td>{{ $key->harga_beli }}</td>
                        <td>{{ $key->harga_jual }}</td>
                        <td>{{ $key->stok }}</td>
                            <td>{{ $key->created_at }}</td>
                            <td>{{ $key->updated_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </center>
</body>

</html>
