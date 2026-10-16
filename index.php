

<?php
session_start();

require_once __DIR__ . '/menu.php';
require_once __DIR__ . '/function.php';

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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Restoran</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #fff5f7;
            margin: 30px;
        }

        h1 {
            color: #d63384;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background: #f3a6c8;
        }

        button {
            background: #d63384;
            color: white;
            border: none;
            padding: 8px 12px;
            cursor: pointer;
            border-radius: 5px;
        }

        a {
            color: #d63384;
        }
    </style>
</head>
<body>

<h1>Menu Restoran</h1>

<p>
    <a href="keranjang.php">
        Lihat Keranjang (<?= array_sum($keranjang) ?>)
    </a>
</p>

<table>
    <tr>
        <th>Kode</th>
        <th>Nama Menu</th>
        <th>Kategori</th>
        <th>Harga</th>
        <th>Aksi</th>
    </tr>

    <?php foreach ($menu as $item): ?>
    <tr>
        <td><?= htmlspecialchars($item["kode"]) ?></td>
        <td><?= htmlspecialchars($item["nama"]) ?></td>
        <td><?= htmlspecialchars($item["kategori"]) ?></td>
        <td><?= formatRupiah($item["harga"]) ?></td>
        <td>
            <form action="proses.php" method="post">
                <input type="hidden" name="kode"
                    value="<?= htmlspecialchars($item["kode"]) ?>">
                <button type="submit" name="aksi" value="tambah">
                    Tambah
                </button>
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
