<!DOCTYPE html>
<html lang="en">

<head>
    <title>Print Data Lengkap pengeluaran</title>
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
            <h4>Print Data Lengkap pengeluaran</h4>
            <h4 class="card-text"><b>ID pengeluaran</b> : {{ $pengeluaran->id }}</h4>
            <h4 class="card-text"><b>Deskripsi</b> : {{ $pengeluaran->deskripsi }}</h4>
            <h4 class="card-text"><b>Nonimal</b> : {{ $pengeluaran->nominal }}</h4>
        </div>
        <script>
            window.print()
        </script>
</body>

</html>