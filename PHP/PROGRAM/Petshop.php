<?php
/* Saya Nuansa Bening Aura Jelita dengan NIM 2301410 mengerjakan Tugas Praktikum 1
dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahanNya 
maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin. */

// kelas Petshop untuk merepresentasikan data produk yang dijual di Petshop Miauwtopia
class Petshop {

    // atribut / properti private 
    private $idProduk = ''; // id untuk setiap produk (unik/tidak sama)
    private $namaProduk = ''; // nama produk
    private $kategori = ''; // kategori produk
    private $harga = 0; // harga produk
    private $fotoProduk = ''; // foto produk

     // konstruktor untuk menginisialisasi objek
    public function __construct($id = '', $nama = '', $kat = '', $hrg = 0, $foto = '') {
        $this->idProduk = $id; // tetapkan id produk
        $this->namaProduk = $nama; // tetapkan nama produk
        $this->kategori = $kat; // tetapkan gambar produk
        $this->harga = $hrg; // tetapkan harga produk
        $this->fotoProduk = $foto; // tetapkan foto produk
    }

    // SETTER : mengubah nilai atribut objek

    // mengatur id produk
    public function setIDProduk($id) {
        $this->idProduk = $id;
    }

    // mengatur nama produk
    public function setNamaProduk($nama) {
        $this->namaProduk = $nama;
    }

    // mengatur kategori produk
    public function setKategori($kat) {
        $this->kategori = $kat;
    }

    // mengatur harga produk
    public function setHarga($hrg) {
        $this->harga = $hrg;
    }

    // mengatur foto produk
    public function setFotoProduk($foto) {
        $this->fotoProduk = $foto;
    }

    // GETTER : mendapatkan/mengambil nilai atribut objek

    // mengembalikan id produk
    public function getIDProduk() {
        return $this->idProduk;
    }

    // mengembalikan nama produk
    public function getNamaProduk() {
        return $this->namaProduk;
    }

    // mengembalikan kategori produk
    public function getKategori() {
        return $this->kategori;
    }

    // mengembalikan harga produk
    public function getHarga() {
        return $this->harga;
    }

    // mengembalikan foto produk
    public function getFotoProduk() {
        return $this->fotoProduk;
    }
}
?>
