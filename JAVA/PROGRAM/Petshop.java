/* Saya Nuansa Bening Aura Jelita dengan NIM 2301410 mengerjakan Tugas Praktikum 1
dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahanNya 
maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin. */

// kelas Petshop untuk merepresentasikan data produk yang dijual di Petshop Miauwtopia
public class Petshop {

    // private atribut 
    private String idProduk; // id untuk setiap produk (unik/tidak sama)
    private String namaProduk; // nama produk
    private String kategori; // kategori produk
    private long harga; // harga produk

    // konstruktor default (tanpa parameter)
    public Petshop() {
        this.idProduk = ""; // id produk kosong
        this.namaProduk = ""; // nama produk kosong
        this.kategori = ""; // kategori kosong
        this.harga = 0; // harga masih 0
    }

    // konstruktor dengan parameter (untuk membuat objek Petshop)
    public Petshop(String id, String nama, String kat, long hrg) {
        this.idProduk = id; // tetapkan id produk
        this.namaProduk = nama; // tetapkan nama produk
        this.kategori = kat; // tetapkan kategori
        this.harga = hrg; // tetapkan harga 
    }

    // SETTER : mengubah nilai atribut objek
    // mengubah id produk
    public void setIDProduk(String id) {
        this.idProduk = id;
    }

    // mengubah nama produk
    public void setNamaProduk(String nama) {
        this.namaProduk = nama;
    }

    // mengubah kategori produk
    public void setKategori(String kat) {
        this.kategori = kat;
    }

    // mengubah harga produk
    public void setHarga(long hrg) {
        this.harga = hrg;
    }

    // GETTER : mendapatkan/mengambil nilai atribut objek

    // mengambil id produk
    public String getIDProduk() {
        return this.idProduk;
    }

    // mengambil nama produk
    public String getNamaProduk() {
        return this.namaProduk;
    }

    // mengambil kategori produk
    public String getKategori() {
        return this.kategori;
    }

    // mengambil harga produk
    public long getHarga() {
        return this.harga;
    }
}
