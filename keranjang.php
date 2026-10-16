
<?php
session_start();

require_once "menu.php";
require_once "function.php";

if (isset($_SESSION["keranjang"])) {
    $keranjang = $_SESSION["keranjang"];
} else {
    $keranjang = array();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Keranjang Belanja</title>
</head>
<body>

<h1>Keranjang Belanja</h1>

<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>Nama Menu</th>
        <th>Harga</th>
        <th>Jumlah</th>
        <th>Subtotal</th>
    </tr>

    <?php if (empty($keranjang)): ?>
        <tr>
            <td colspan="4">Keranjang masih kosong.</td>
        </tr>
    <?php else: ?>
        <?php foreach ($keranjang as $kode => $jumlah): ?>
            <?php if (isset($menu[$kode]) && $jumlah > 0): ?>
            <tr>
                <td><?= htmlspecialchars($menu[$kode]["nama"]) ?></td>
                <td><?= formatRupiah($menu[$kode]["harga"]) ?></td>
                <td><?= $jumlah ?></td>
                <td>
                    <?= formatRupiah($menu[$kode]["harga"] * $jumlah) ?>
                </td>
            </tr>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?>

    <tr>
        <th colspan="3">Total Belanja</th>
        <th><?= formatRupiah(hitungTotal($keranjang, $menu)) ?></th>
    </tr>
</table>

<br>
<a href="index.php">Kembali ke Menu</a>

<form action="proses.php" method="post">
    <button type="submit" name="aksi" value="kosongkan">
        Kosongkan Keranjang
    </button>
</form>

</body>
</html>
