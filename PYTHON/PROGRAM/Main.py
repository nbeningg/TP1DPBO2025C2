# Saya Nuansa Bening Aura Jelita dengan NIM 2301410 mengerjakan Tugas Praktikum 1
# dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahanNya 
# maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

# import kelas Petshop dari file Petshop.py
from Petshop import Petshop

daftarProduk = [] # daftar produk untuk menyimpan data produk 
run = True  # variable untuk mengontrol program (true artinya jalan, false artinya selesai)
    
while run:
    # tampilkan menu petshop miauwtopia
    # jika tampilan keluar karakter aneh / tidak sesuai, maka
    # perlu aktifkan utf-8 dengan ketik 'chcp 65001' di terminal
    print("\n╔══════════════════════════════╗")
    print("║    ✧ Miauwtopia Pet Shop ✧   ║")
    print("║     ₊˚⊹♡ ᓚ₍ ^. .^₎ ₊˚⊹♡      ║")
    print("╠══════════════════════════════╣")
    print("║ 1. Tambah Data Produk        ║")
    print("║ 2. Lihat Data Produk         ║")
    print("║ 3. Ubah Data Produk          ║")
    print("║ 4. Hapus Data Produk         ║")
    print("║ 5. Cari Data Produk          ║")
    print("║ 6. Keluar                    ║")
    print("╚══════════════════════════════╝")
    # meminta inputan user untuk memilih opsi / fitur
    option = input("> Masukkan Pilihan No : ")

    if option == "1": # opsi satu untuk tambah data produk 
        # inputan user untuk memasukkan id data produk
        idProduk = input("Masukkan ID : ")

        # pengecekan apakah id sudah terdaftar di daftar produk apa belum
        if any(p.getIDProduk() == idProduk for p in daftarProduk):
            # jika sudah ada maka tampilkan pesan kesalahan (id tidak boleh sama)
            print("[!] ID Sudah Ada, Tidak Boleh Duplikat.")
        else:
            # jika belum tedaftar, maka akan meminta inputan user beruapa data produk baru
            namaProduk = input("Masukkan Nama Produk : ")
            kategori = input("Masukkan Kategori : ")
            harga = int(input("Masukkan Harga : "))

            # menambah data produk baru ke daftar produk dan tampilkan pesan sukses
            daftarProduk.append(Petshop(idProduk, namaProduk, kategori, harga))
            print("[✓] Data Produk Berhasil Ditambahkan.")

    elif option == "2": # opsi kedua untuk menampilkan daftar produk
        print("\n══════════════════ DAFTAR PRODUK PETSHOP MIAUWTOPIA ══════════════════")
        if not daftarProduk:
            # jika daftar kosong maka tampilkan pesan 
            print("[!] Daftar Produk Kosong.")
        else:
            # jika daftar ada, maka tampilkan semua data produk yang ada
            for p in daftarProduk:
                print("ID: " + p.getIDProduk() + " , Nama Produk: " + p.getNamaProduk() + 
                " , Kategori: " + p.getKategori() + " , Harga: Rp." + str(p.getHarga()))

    elif option == "3":  # opsi tiga untuk mengubah data produk berdasarkan id
        # inputan user untuk memasukkan id data produk yang ingin di ubah
        idProduk = input("Masukkan ID Produk yang Ingin Diubah : ") 

        # pengcekan apakah id terdaftar atau tidak 
        found = False  # penanda untuk menandai apakah produk ditemukan
        for p in daftarProduk: 
            if p.getIDProduk() == idProduk:
                # jika id ditemukan, akan meminta inputan user berupa updatean data produk
                found = True  # set penanda menjadi true
                p.setNamaProduk(input("Masukkan Nama Baru : "))  
                p.setKategori(input("Masukkan Kategori Baru : "))  
                p.setHarga(int(input("Masukkan Harga Baru : ")))  

                # data produk akan di ubah atau di update, dan menampilkan pesan sukses
                print("[✓] Data Produk Berhasil Diubah.") 

        if not found:
            # jika id tidak ditemukan akan menampilkan pesan kesalahan
            print("[!] ID Tidak Ditemukan.")


    elif option == "4": # opsi empat untuk menghapus data produk berdasarkan id
        # inputan user untuk memasukkan id data produk yang ingin di hapus
        idProduk = input("Masukkan ID Produk yang Ingin Dihapus : ")
        
        # pengcekan apakah id terdaftar atau tidak 
        if any(p.getIDProduk() == idProduk for p in daftarProduk):
            # jika id ditemukan data produk akan di hapus dari daftar produk
            # dan akan menampilkan pesan sukses 
            daftarProduk = [p for p in daftarProduk if p.getIDProduk() != idProduk]
            print("[✓] Data Produk Berhasil Dihapus.")
        else:
            # jika id tidak ditemukan akan menampilkan pesan kesalahan
            print("[!] ID Tidak Ditemukan.")


    elif option == "5": # opsi lima untuk mencari produk berdasarkan nama
        # inputan user untuk memasukkan nama produk yang ingin di cari
        namaProduk = input("Masukkan Nama Produk yang Dicari : ")

        # pengecekan apakah nama produk terdaftar atau tidak 
        found = [p for p in daftarProduk if p.getNamaProduk().lower() == namaProduk.lower()]
        if found:
            # jika nama produk ada, maka akan menampilkan data produknya
            # dan menampilkan pesan sukses
            print("[✓] Produk Ditemukan.")
            for p in found:
                print("| ID: " + p.getIDProduk() + " | Nama Produk: " + p.getNamaProduk() + 
                " | Kategori: " + p.getKategori() + " | Harga: Rp." + str(p.getHarga()))

        else:
            # jika nama produk tidak ada, maka akan menampilkan pesan kesalahan
            print("[!] Produk Tidak Ditemukan.")

    elif option == "6": # opsi enam untuk keluar dari program
        # akan menampilkan pesan selesai
        print("\n╔═════════════════════════════════════╗")
        print("║   Terima Kasih, Miaw Miaw! ฅ^•ﻌ•^ฅ  ║")
        print("║      Sampai jumpa kembali!          ║")
        print("╚═════════════════════════════════════╝")
        run = False  # run menjadi false sehingga loop akan berhenti

    else:
        # jika opsi selain dari 1 - 6, tampilkan pesan kesalahan
        print("[!] Fitur Tidak Ada.")