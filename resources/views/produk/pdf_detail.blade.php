<!DOCTYPE html>
<html lang="en">

<head>
    <title>PDF Data Lengkap produk</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        /* Float four columns side by side */
        .column {
            float: left;
            width: 25%;
            padding: 0 10px;
        }

        /* Remove extra left and right margins, due to padding in columns */
        .row {
            margin: 0 -5px;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        /* Style the counter cards */
        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            /* this adds the "card" effect */
            padding: 16px;
            text-align: center;
            background-color: #f1f1f1;
        }

        /* Responsive columns - one column layout (vertical) on small screens */
        @media screen and (max-width: 600px) {
            .column {
                width: 100%;
                display: block;
                margin-bottom: 20px;
            }
        }
    </style>
</head>

<body>

    <div class="card">
        <h2>Bengkel "Sinar Terang Motor"</h2>
        <hr style="width:75%">
        <div class="card-body">
            <h4>PDF Data Lengkap produk</h4>
            <h4 class="card-text"><b>ID produk</b> : {{ $produk->id }}</h4>
            <h4 class="card-text"><b>Id kategori</b> : {{ $produk->id_kategori }}</h4>
            <h4 class="card-text"><b>Nama produk</b> : {{ $produk->nama_produk }}</h4>
            <h4 class="card-text"><b>Merk</b> : {{ $produk->merk }}</h4>
            <h4 class="card-text"><b>Harga jual</b> : {{ $produk->harga_beli }}</h4>
            <h4 class="card-text"><b>Harga beli</b> : {{ $produk->harga_jual }}</h4>
            <h4 class="card-text"><b>Stok</b> : {{ $produk->stok }}</h4>
        </div>
</body>

</html>