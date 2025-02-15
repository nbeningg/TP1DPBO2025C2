/* Saya Nuansa Bening Aura Jelita dengan NIM 2301410 mengerjakan Latihan Modul
dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahanNya 
maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin. */

// library yang digunakan
#include <bits/stdc++.h>
#include "Petshop.cpp"

// gunakan namespace std
using namespace std;

int main() {
    list<Petshop> daftarProduk; // list untuk menyimpan objek produk dari kelas Petshop
    int option; // untuk memilih opsi tehadadap data produk
    int next = 1; // untuk kontrol menjalakan looping utama (menu)

    while (next == 1) {
        // tampilkan kepada user daftar yang bisa dilakukan
        cout << "\n==== PETSHOP SIGMA ====\n";
        cout << "1: Tambah Data Produk\n";
        cout << "2: Lihat Data Produk\n";
        cout << "3: Ubah Data Produk\n";
        cout << "4: Hapus Data Produk\n";
        cout << "5: Cari Data Produk\n";
        cout << "6: Keluar\n";
        cout << "=======================\n";
        cout << "Silahkan Pilih Fitur: ";
        cin >> option; // meminta masukkan user untuk memilih opsi/fitur

        if (option == 1) { // 1 untuk tambah produk
            string id, nama, kategori;
            long long int harga;
            int found = 0; 

            do {
                cout << "Masukkan ID: ";
                cin >> id; // meminta inputan user berupa id
                found = 0;

                // pengcekan apakah id sudah ada dalam daftar (tidak boleh duplikat)
                list<Petshop>::iterator it;
                for (it = daftarProduk.begin(); it != daftarProduk.end(); it++) {
                    if (it->getIDProduk() == id) {
                        found = 1; 
                        cout << "[!] ID Sudah Ada, Tidak Boleh Duplikat!\n";
                    }
                }
            } while (found == 1); // jika iya ada dalam daftar, minta ulang masukkan id baru

            cout << "Masukkan Nama Produk: ";
            cin >> nama; // meminta inputan user beruapa nama produk
            cout << "Masukkan Kategori: ";
            cin >> kategori; // meminta inputan user beruapa kategori
            cout << "Masukkan Harga: ";
            cin >> harga; // meminta inputan user beruapa harga 

            // tambahkan produk ke dalam daftar
            daftarProduk.push_back(Petshop(id, nama, kategori, harga));
            cout << "[✓] Data Produk Berhasil Ditambahkan!\n";
        } 
        else if (option == 2) { // 2 untuk menampilkan data produk
            if (daftarProduk.empty()) {
                cout << "\n[!] Data Produk Kosong\n"; // jika daftar produk kosong
            } else {  // jika tidak kosong
                cout << "\n============= DAFTAR PRODUK PETSHOP SIGMA =============\n";
                cout << "=======================================================\n";
                cout << "ID    | Nama Produk      | Kategori        | Harga  \n";
                cout << "=======================================================\n";
                
                // tampilkan semua daftar produk yang ada
                list<Petshop>::iterator it;
                for (it = daftarProduk.begin(); it != daftarProduk.end(); it++) {
                    // Format setiap kolom dengan lebar tetap
                    cout << left << setw(6) << it->getIDProduk() << "| "
                        << left << setw(17) << it->getNamaProduk() << "| "
                        << left << setw(16) << it->getKategori() << "| "
                        << right << setw(1) << it->getHarga() << endl;
                }
                cout << "=======================================================\n";
            }
        }
        else if (option == 3) { // 3 untuk mengubah data produk berdasarkan id
            string target;
            cout << "Masukkan ID Produk yang Ingin Diubah: ";
            cin >> target; // meminta inputan user berupa id

            int found = 0;
            // pengecakan apakah id ada atau tidak di daftar
            list<Petshop>::iterator it;
            for (it = daftarProduk.begin(); it != daftarProduk.end(); it++) {
                if (it->getIDProduk() == target) { // jika id ada, maka bisa diubah
                    string nama, kategori;
                    long long int harga;
                    cout << "Masukkan Nama Baru: ";
                    cin >> nama; // meminta inputan user berupa nama baru
                    cout << "Masukkan Kategori Baru: ";
                    cin >> kategori; // meminta inputan user berupa kategori baru
                    cout << "Masukkan Harga Baru: ";
                    cin >> harga; // meminta inputan user berupa harga baru

                    // mengubah data produk dari yang telah diinput tadi
                    it->setNamaProduk(nama);
                    it->setKategori(kategori);
                    it->setHarga(harga);

                    cout << "[✓] Data Produk Berhasil Diubah!\n";
                    found = 1;
                }
            }
            if (found == 0) { // jika id tidak ditemukan
                cout << "[!] ID Tidak Ditemukan!\n";
            }
        } 
        else if (option == 4) { // 4 untuk menghapus data produk berdasarkan id
            string target;
            cout << "Masukkan ID Produk yang Ingin Dihapus: ";
            cin >> target; // meminta inputan user berupa id

            int found = 0;
            // pengecakan apakah id ada atau tidak di daftar
            list<Petshop>::iterator it;
            for (it = daftarProduk.begin(); it != daftarProduk.end(); it++) {
                if (it->getIDProduk() == target) { // jika id ada, maka bisa dihapus
                    it = daftarProduk.erase(it); // menghapus produk dari daftar
                    cout << "[✓] Data Produk Berhasil Dihapus!\n";
                    found = 1;
                } else { 
                    ++it; // lanjut ke elemen berikutnya
                }
            }
            if (found == 0) { // jika id tidak ditemukan
                cout << "[!] ID Tidak Ditemukan!\n";
            }
        } 
        else if (option == 5) { // 5 untuk mencari produk berdasarkan nama
            string target;
            cout << "Masukkan Nama Produk yang Dicari: ";
            cin >> target; // meminta inputan user berupa nama produk yang di cari

            int found = 0;
            // pengecekan apakah nama produk ada atau tidak di daftar
            list<Petshop>::iterator it;
            for (it = daftarProduk.begin(); it != daftarProduk.end(); it++) {
                if (it->getNamaProduk() == target) { // jika ada namanya, maka tampilkan
                    cout << "[✓] Produk Ditemukan:\n| ID : " << it->getIDProduk() << " | Nama Produk : " 
                        << it->getNamaProduk() << " | Kategori : " << it->getKategori() 
                        << " | Harga : " << it->getHarga() << endl;
                    found = 1;
                }
            }

            if (found == 0) { // jika tidak ditemukan
                cout << "[!] Produk Tidak Ditemukan.\n";
            }
        } 
        else if (option == 6) { // 6 untuk keluar dari program
            cout << "Terima Kasih Miaw Miaw ฅ^•ﻌ•^ฅ\n";
            next = 0;
        } 
        else { // jika opsi atau fitur selain 1-6
            cout << "[!] Fitur Tidak Ada!\n";
        }
    }

    return 0;
}
