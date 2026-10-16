
<?php
session_start();

require_once __DIR__ . '/menu.php';

if (!isset($_SESSION["keranjang"])) {
    $_SESSION["keranjang"] = array();
}

if (isset($_POST["aksi"])) {
    $aksi = $_POST["aksi"];

    if ($aksi == "tambah") {
        if (isset($_POST["kode"])) {
            $kode = $_POST["kode"];

            if (isset($menu[$kode])) {
                if (isset($_SESSION["keranjang"][$kode])) {
                    $_SESSION["keranjang"][$kode]++;
                } else {
                    $_SESSION["keranjang"][$kode] = 1;
                }
            }
        }
    }

    if ($aksi == "kosongkan") {
        $_SESSION["keranjang"] = array();
    }
}

if (isset($_POST["aksi"]) && $_POST["aksi"] == "kosongkan") {
    header("Location: keranjang.php");
} else {
    header("Location: index.php");
}

exit;
?>
