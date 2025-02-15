/* Saya Nuansa Bening Aura Jelita dengan NIM 2301410 mengerjakan Latihan Modul
dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahanNya 
maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin. */

// library yang digunakan
#include <iostream>
#include <string>

// gunakan namespace std
using namespace std;

// deklarasi kelas untuk mengimplementasikan sebuah Petshop
class Petshop {

    // atribut private
    private:
        string idProduk; // menyimpan id produk
        string namaProduk; // menyimpan nama produk
        string kategori; // menyimpan kategori produk
        long long int harga; // menyimpan harga produk

    // metode publik
    public:

        // konstruktor default tanpa parameter
        Petshop() {
        }
        
        // konstruktor dengan parameter untuk inisialisasi objek Petshop
        Petshop(string id, string nama, string kat, long long int hrg) {
            this->idProduk = id; // mentapkan id produk
            this->namaProduk = nama; // menetapkan nama produk
            this->kategori = kat; // menetapkan kategori produk
            this->harga = hrg; // menetapkan harga produk
        }

        // SETTER UNTUK MENGUBAH NILAI ATRIBUT
        void setIDProduk(string id) {
            idProduk = id; 
        }

        void setNamaProduk(string nama) {
            namaProduk = nama; 
        }

        void setKategori(string kat) { 
            kategori = kat; 
        }

        void setHarga(long long int hrg) { 
            harga = hrg; 
        }

        // GETTER UNTUK MENDAPATKAN NILAI ATRIBUT
        string getIDProduk() { 
            return idProduk; 
        }

        string getNamaProduk() { 
            return namaProduk; 
        }

        string getKategori() { 
            return kategori; 
        }

        long long int getHarga() { 
            return harga; 
        }

        // destruktor
        ~Petshop() {
        }
};
