
<?php

function formatRupiah($harga)
{
    return "Rp" . number_format($harga, 0, ",", ".");
}

function hitungTotal($keranjang, $menu)
{
    $total = 0;

    foreach ($keranjang as $kode => $jumlah) {
        if (isset($menu[$kode])) {
            $total += $menu[$kode]["harga"] * $jumlah;
        }
    }

    return $total;
}
