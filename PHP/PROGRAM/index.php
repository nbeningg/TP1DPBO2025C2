<?php
/* Saya Nuansa Bening Aura Jelita dengan NIM 2301410 mengerjakan Tugas Praktikum 1
dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahanNya 
maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin. */

// import kelas Petshop dari file Petshop.py
require_once 'Petshop.php';
session_start();

// jika daftar produk belum ada, maka artinya masih kosong
if (!isset($_SESSION['daftarProduk'])) {
    $_SESSION['daftarProduk'] = [];
}

// pengecekan request apakah metode post 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action === 'add') {     // jika fitur atau aksi yang dipilih adalah add
        $sameID = false;

        // pengecekan apakah id produk sudah terdaftar apa belum
        foreach ($_SESSION['daftarProduk'] as $produk) {
            if ($produk->getIDProduk() === $_POST['id']) {
                $sameID = true;
            }
        }
        // jika id belum terdaftar maka data produk bisa ditambah
        if (!$sameID) {
            // buat objek baru dari kelas Petshop
            $produk = new Petshop();
            // set nilai atribut dari input yang user masukkan
            $produk->setIDProduk($_POST['id']);
            $produk->setNamaProduk($_POST['nama']);
            $produk->setKategori($_POST['kategori']);
            $produk->setHarga($_POST['harga']);

            if (isset($_FILES['foto']) && $_FILES['foto']['error'] === 0) {
                $foto = 'photo/' . $_FILES['foto']['name'];
                move_uploaded_file($_FILES['foto']['tmp_name'], $foto);
                $produk->setFotoProduk($foto);
            }
            // menambahkan produk ke dalam daftar dan tampilkan pesan sukses
            $_SESSION['daftarProduk'][] = $produk;
            $_SESSION['pesan'] = "Produk berhasil ditambahkan";
        } else {
            // jika id sudah terdaftar tampilkan pesan error
            $_SESSION['pesan'] = "ID Produk sudah ada!";
        }
    } elseif ($action === 'edit') { // jika fitur atau aksi yang dipilih adalah edit / update
        $foundKey = -1;

        // pengecekan produk dalam daftar berdasarkan id
        foreach ($_SESSION['daftarProduk'] as $key => $produk) {
            if ($produk->getIDProduk() === $_POST['id']) {
                $foundKey = $key;
            }
        }
        // jika ditemukan, bisa melakukan update atau ubah data produk
        if ($foundKey !== -1) {
            // set nilai atribut yang baru dari input yang user masukkan
            $_SESSION['daftarProduk'][$foundKey]->setNamaProduk($_POST['nama']);
            $_SESSION['daftarProduk'][$foundKey]->setKategori($_POST['kategori']);
            $_SESSION['daftarProduk'][$foundKey]->setHarga($_POST['harga']);

            if (isset($_FILES['foto']) && $_FILES['foto']['error'] === 0) {
                $oldFoto = $_SESSION['daftarProduk'][$foundKey]->getFotoProduk();
                if ($oldFoto && file_exists($oldFoto)) {
                    unlink($oldFoto);
                }

                $foto = 'photo/' . $_FILES['foto']['name'];
                move_uploaded_file($_FILES['foto']['tmp_name'], $foto);
                $_SESSION['daftarProduk'][$foundKey]->setFotoProduk($foto);
            }
            // data produk ter-update dan tampilkan pesan sukses
            $_SESSION['pesan'] = "Produk berhasil diubah";
        }
    } elseif ($action === 'delete') { // jika fitur atau aksi yang dipilih adalah delete
        $newDaftarProduk = [];
        // pengcekan daftar produk untuk mencari produk yang akan di hapus
        foreach ($_SESSION['daftarProduk'] as $produk) {
            if ($produk->getIDProduk() === $_POST['id']) {
                $foto = $produk->getFotoProduk();
                if ($foto && file_exists($foto)) {
                    unlink($foto);
                }
            } else {
                // produk yang tidak dihapus disimpan kembali dalam daftar baru
                $newDaftarProduk[] = $produk;
            }
        }
        // perbarui daftar produk yang tidak di hapus dan tampilkan pesan sukses
        $_SESSION['daftarProduk'] = $newDaftarProduk;
        $_SESSION['pesan'] = "Produk berhasil dihapus";
    }

    header('Location: index.php');
    exit();
}

// ini untuk melakukan pencarian atau search
// ambil daftar produk yang telah tersimpan
$daftarProduk = $_SESSION['daftarProduk'];
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $keyword = strtolower($_GET['search']);
    $filtered = [];
    // menyaring produk berdasarkan nama
    foreach ($daftarProduk as $produk) {
        if (str_contains(strtolower($produk->getNamaProduk()), $keyword)) {
            $filtered[] = $produk;
        }
    }
    // tampilkan hanya hasil yang sesuai dengan nama atau pencarian tersebut 
    $daftarProduk = $filtered;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Miauwtopia Pet Shop</title>
    <!-- GAYA TAMPILAN UNTUK HALAMAN -->
    <style>
        body {
            font-family: Arial;
            margin: 20px;
            padding: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background: #f5f5f5;
        }

        img.produk {
            max-width: 100px;
            max-height: 100px;
        }

        .pesan {
            padding: 10px;
            margin: 10px 0;
            background: #e0ffe0;
        }

        .form-group {
            margin: 10px 0;
        }

        input,
        button {
            padding: 5px;
            margin: 2px;
        }

        .edit-form {
            display: none;
        }
    </style>
</head>

<body>
    <h1>Miauwtopia Pet Shop</h1>

    <!-- MENAMPILKAN PESAN SUKSES ATAU ERROR -->
    <?php if (isset($_SESSION['pesan'])): ?>
        <div class="pesan">
            <?php
            echo $_SESSION['pesan'];
            unset($_SESSION['pesan']);
            ?>
        </div>
    <?php endif; ?>

    <!-- FORM UNTUK PENCARIAN PRODUK -->
    <form method="get">
        <div class="form-group">
            <input type="text" name="search" placeholder="Cari produk..."
                value="<?php echo $_GET['search'] ?? ''; ?>">
            <button type="submit">Cari</button>
            <?php if (isset($_GET['search'])): ?>
                <a href="index.php"><button type="button">Reset</button></a>
            <?php endif; ?>
        </div>
    </form>
    
    <!-- FORM UNTUK TAMBAH PRODUK -->
    <h2>Tambah Produk Baru</h2>
    <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="action" value="add"> <!-- TANDA AKSI TAMBAH PRODUK -->
        <div class="form-group">
            <label>ID : </label>
            <input type="text" name="id" required>
        </div>
        <div class="form-group">
            <label>Nama : </label>
            <input type="text" name="nama" required>
        </div>
        <div class="form-group">
            <label>Kategori : </label>
            <input type="text" name="kategori" required>
        </div>
        <div class="form-group">
            <label>Harga : </label>
            <input type="number" name="harga" required>
        </div>
        <div class="form-group">
            <label>Foto : </label>
            <input type="file" name="foto" required>
        </div>
        <button type="submit">Tambah Produk</button>
    </form>

    <!-- MENAMPILKAN DAFTAR PRODUK -->
    <h2>Daftar Produk</h2>
    <?php if (empty($daftarProduk)): ?>
        <p>Tidak ada produk tersedia.</p>
    <?php else: ?>
        <table>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
            <?php foreach ($daftarProduk as $produk): ?>
                <tr>
                    <td><?php echo $produk->getIDProduk(); ?></td>
                    <td><?php echo $produk->getNamaProduk(); ?></td>
                    <td><?php echo $produk->getKategori(); ?></td>
                    <td>Rp <?php echo number_format($produk->getHarga(), 0, ',', '.'); ?></td>
                    <td>
                        <?php if ($produk->getFotoProduk()): ?>
                            <img src="<?php echo $produk->getFotoProduk(); ?>" class="produk">
                        <?php else: ?>
                            Tidak ada foto
                        <?php endif; ?>
                    </td>
                    <td>
                        <!-- BUTTON UNTUK MELAKUKAN EDIT -->
                        <button onclick="showEdit('<?php echo $produk->getIDProduk(); ?>')">Edit</button>
                        
                        <!-- FORM UNTUK MENGHAPUS PRODUK -->
                        <form method="post" style="display: inline;">
                            <input type="hidden" name="action" value="delete"> <!-- TANDA AKSI DELETE PRODUK -->
                            <input type="hidden" name="id" value="<?php echo $produk->getIDProduk(); ?>">
                            <button type="submit" onclick="return confirm('Yakin hapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                <!-- FORM UNTUK EDIT PRODUK -->
                <!-- AKAN TAMPIL JIKA KITA PENCET BUTTON EDITNYA -->
                <tr id="edit_<?php echo $produk->getIDProduk(); ?>" class="edit-form">
                    <td colspan="6">
                        <form method="post" enctype="multipart/form-data">
                            <input type="hidden" name="action" value="edit"> <!-- TANDA AKSI EDIT PRODUK -->
                            <input type="hidden" name="id" value="<?php echo $produk->getIDProduk(); ?>">
                            <div class="form-group">
                                <label>Nama : </label>
                                <input type="text" name="nama" value="<?php echo $produk->getNamaProduk(); ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Kategori : </label>
                                <input type="text" name="kategori" value="<?php echo $produk->getKategori(); ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Harga : </label>
                                <input type="number" name="harga" value="<?php echo $produk->getHarga(); ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Foto : </label>
                                <input type="file" name="foto">
                                <small>(Kosongkan jika tidak ingin mengubah foto)</small>
                            </div>
                            <button type="submit">Simpan</button>
                            <button type="button" onclick="hideEdit('<?php echo $produk->getIDProduk(); ?>')">Batal</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    <!-- FUNGSI UNTUK MENYEMBUNYIKAN DAN MENAMPILKAN FORM EDIT / UPDATE -->
    <script>
        function showEdit(id) {
            document.getElementById('edit_' + id).style.display = 'table-row';
        }

        function hideEdit(id) {
            document.getElementById('edit_' + id).style.display = 'none';
        }
    </script>
</body>
</html>