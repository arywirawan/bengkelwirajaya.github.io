<!DOCTYPE html>
<html>

<head>
    <title>Pesanan Selesai</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <h2 class="text-center">Laporan Pesanan Selesai Bengkel Las Wira Jaya</h2>
    <p class="text-center">Diunduh pada tanggal : {{ date('d-m-Y') }}</p>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Pelanggan</th>
            <th>Produk</th>
            <th>Panjang (mm)</th>
            <th>Lebar (mm)</th>
            <th>Jumlah</th>
            <th>Total Bayar</th>
            <th>Status</th>
            <th>Keterangan</th>
            <th>Waktu Selesai</th>
        </tr>
        <tbody>
            @foreach ($pesanan as $pesanankey => $item)
                <tr>
                    <td>
                        {{ $item->id }}
                    </td>
                    <td>
                        {{ $item->user->name }}
                    </td>
                    <td>
                        <?php
                        foreach ($pesanan[$pesanankey]->listpesanan as $listpesanankey => $value) {
                            echo $value->nama_produk;
                            echo '<hr>';
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        foreach ($pesanan[$pesanankey]->listpesanan as $listpesanankey => $value) {
                            echo $value->panjang;
                            echo '<br>';
                            echo '<br>';
                            echo '<hr>';
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        foreach ($pesanan[$pesanankey]->listpesanan as $listpesanankey => $value) {
                            echo $value->lebar;
                            echo '<br>';
                            echo '<br>';
                            echo '<hr>';
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        foreach ($pesanan[$pesanankey]->listpesanan as $listpesanankey => $value) {
                            echo $value->kuantitas;
                            echo '<br>';
                            echo '<br>';
                            echo '<hr>';
                        }
                        ?>
                    </td>
                    <td>
                        Rp {{ $item->harga_total }}
                    </td>

                    <td>
                        {{ $item->status }}
                    </td>
                    <td>
                        {{ $item->keterangan }}
                    </td>
                    <td>
                        {{ $item->updated_at }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


</body>

</html>
