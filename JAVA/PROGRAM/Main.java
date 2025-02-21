/* Saya Nuansa Bening Aura Jelita dengan NIM 2301410 mengerjakan Tugas Praktikum 1
dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahanNya 
maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin. */

// mengimpor library yang digunakan
import java.util.Scanner;
import java.util.ArrayList;

public class Main {
    public static void main(String[] args) {
        // membuat arraylist untuk menyimpan daftar produk
        ArrayList<Petshop> daftarProduk = new ArrayList<>();
        
        // membuat objek scanner untuk input user
        Scanner sc = new Scanner(System.in);

        // variable untuk menyimpan pilihan / opsi / fitur
        int option = 0;

        // program berjalan hingga user memilih keluar (pilihan 6)
        while (option != 6) {
            // tampilkan menu petshop miauwtopia
            /* jika tampilan keluar karakter aneh / tidak sesuai, maka
                perlu aktifkan utf-8 dengan ketik 'chcp 65001' di terminal */
            System.out.println("\n╔══════════════════════════════╗");
            System.out.println("║    ✧ Miauwtopia Pet Shop ✧   ║");
            System.out.println("║     ₊˚⊹♡ ᓚ₍ ^. .^₎ ₊˚⊹♡      ║");
            System.out.println("╠══════════════════════════════╣");
            System.out.println("║ 1. Tambah Data Produk        ║");
            System.out.println("║ 2. Lihat Data Produk         ║");
            System.out.println("║ 3. Ubah Data Produk          ║");
            System.out.println("║ 4. Hapus Data Produk         ║");
            System.out.println("║ 5. Cari Data Produk          ║");
            System.out.println("║ 6. Keluar                    ║");
            System.out.println("╚══════════════════════════════╝");
            System.out.print("> Masukkan Pilihan No : ");
            option = sc.nextInt(); // meminta inputan user untuk memilih opsi / fitur
            
            sc.nextLine();

            if (option == 1) { // opsi satu untuk tambah produk

                // inputan user berupa id
                System.out.print("Masukkan ID : ");
                String id = sc.next(); 

                // pengecekan apa id sudah ada di daftar apa belum
                int i = 0;
                while (i < daftarProduk.size() && daftarProduk.get(i).getIDProduk().compareTo(id) != 0) {
                    i++;
                }
                
                if (i < daftarProduk.size()) { 
                    // jika sudah ada, tampilkan pesan kesalahan
                    System.out.println("[!] ID Sudah Ada, Tidak Boleh Duplikat.");
                } else { 
                    // jika tidak ada atau id unik, maka lanjutkan inputan user
                    System.out.print("Masukkan Nama Produk : ");
                    String nama = sc.next();
                    System.out.print("Masukkan Kategori : ");
                    String kategori = sc.next();
                    System.out.print("Masukkan Harga : ");
                    long harga = sc.nextLong();

                    // menambahkan data produkke daftar dan menampilkan pesan sukses
                    daftarProduk.add(new Petshop(id, nama, kategori, harga));
                    System.out.println("[✓] Data Produk Berhasil Ditambahkan.");
                }
            } else if (option == 2) { // opsi dua untuk menampilkan daftar produk
                System.out.println("\n══════════════════ DAFTAR PRODUK PETSHOP MIAUWTOPIA ══════════════════");

                if (daftarProduk.isEmpty()) { 
                    // jika daftar produk kosong, tampilkan pesan
                    System.out.println("[!] Daftar Produk Kosong.");
                } else {
                    // jika daftar produk ada, maka tampilkan semua produk yang ada
                    int i = 0;
                    while (i < daftarProduk.size()) {
                        Petshop p = daftarProduk.get(i);
                        System.out.println("ID : " + p.getIDProduk() + 
                                        " , Nama Produk : " + p.getNamaProduk() + 
                                        " , Kategori : " + p.getKategori() + 
                                        " , Harga : Rp." + p.getHarga());
                        i++;
                    }
                }
            } else if (option == 3) { // opsi tiga untuk merubah data produk berdasarkan id
                // inputan user beruapa id yang ingin di ubah
                System.out.print("Masukkan ID Produk yang Ingin Diubah : ");
                String ubah = sc.next();

                // pencarian produk berdasarkan id yang ada di daftar produk
                int i = 0;
                while (i < daftarProduk.size() && daftarProduk.get(i).getIDProduk().compareTo(ubah) != 0) {
                    i++;
                }
                
                if (i < daftarProduk.size()) {
                    // jika id ditemukan, inputan user berupa update data nya
                    System.out.print("Masukkan Nama Baru : ");
                    daftarProduk.get(i).setNamaProduk(sc.next());
                    System.out.print("Masukkan Kategori Baru : ");
                    daftarProduk.get(i).setKategori(sc.next());
                    System.out.print("Masukkan Harga Baru : ");
                    daftarProduk.get(i).setHarga(sc.nextLong());
                    
                    // data produk berhasil di ubah dan menampilkan pesan sukses
                    System.out.println("[✓] Data Produk Berhasil Diubah.");
                } else {
                    // jika id tidak ditemukan, tampilkan pesan kesalahan
                    System.out.println("[!] ID Tidak Ditemukan.");
                }
            } else if (option == 4) { // opsi empat untuk menghapus data produk berdasarkan id
                // inputan user berupa id yang ingin di hapus
                System.out.print("Masukkan ID Produk yang Ingin Dihapus: ");
                String hapus = sc.next();

                // pencarian produk berdasarkan id yang ada di daftar produk
                int i = 0;
                while (i < daftarProduk.size() && daftarProduk.get(i).getIDProduk().compareTo(hapus) != 0) {
                    i++;
                }

                if (i < daftarProduk.size()) {
                    // jika id ditemukan, data produk di hapus dan menampilkan pesan sukses
                    daftarProduk.remove(i);
                    System.out.println("[✓] Data Produk Berhasil Dihapus.");
                } else {
                    // jika id tidak ditemukan, tampilkan pesan kesalahan
                    System.out.println("[!] ID Tidak Ditemukan.");
                }
            } else if (option == 5) { // opsi lima untuk mencari produk berdasarkan namanya
                // inputan user berupa nama produk yang akan di cari
                System.out.print("Masukkan Nama Produk yang Dicari : ");
                String cari = sc.next();

                // pencarian produk berdasarkan nama di daftar produk
                int i = 0;
                int found = 0;
                while (i < daftarProduk.size()) {
                    Petshop p = daftarProduk.get(i);
                    // jika nama produk yang di ada dalam daftar produk
                    if (p.getNamaProduk().equalsIgnoreCase(cari)) {
                        // tampilkan data produk dan pesan sukses
                        System.out.println("[✓] Produk Ditemukan.");
                        System.out.println("| ID : " + p.getIDProduk() + 
                        " | Nama Produk : " + p.getNamaProduk() + 
                        " | Kategori : " + p.getKategori() + 
                        " | Harga : Rp." + p.getHarga());
                        found++; // tandai produk ditemukan
                    }
                    i++;
                }

                if (found == 0) {
                    // jika nama tidak ditemukan, tampilkan pesan kesalahan
                    System.out.println("[!] Produk Tidak Ditemukan.");
                }
            } else if (option == 6) { // opsi enam untuk keluar dari program 
                // tampilkan pesan keluar
                System.out.println("\n╔═════════════════════════════════════╗");
                System.out.println("║   Terima Kasih, Miaw Miaw! ฅ^•ﻌ•^ฅ  ║");
                System.out.println("║      Sampai jumpa kembali!          ║");
                System.out.println("╚═════════════════════════════════════╝");
                
            } else {
                // jika opsi selain dari 1 - 6, tampilkan pesan kesalahan
                System.out.println("[!] Fitur Tidak Ada.");
            }
        }
        sc.close(); // menutup scanner 
    }
}                