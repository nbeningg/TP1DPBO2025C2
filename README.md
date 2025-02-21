# TP1DPBO2025C2

# Janji
Saya Nuansa Bening Aura Jelita dengan NIM 2301410 mengerjakan Tugas Praktikum 1 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

## Desain Program
Program ini memiliki kelas bernama Petshop. Kelas ini merepresentasikan sebuah produk dalam petshop dengan atribut sebagai berikut:
- **ID Produk** : string unik (tidak boleh sama) untuk setiap produk
- **Nama Produk** : nama untuk setiap produk
- **Kategori** : kategori pada setiap produk
- **Harga** : harga pada setiap produk
- **Foto** : foto pada setiap produk (khusus untuk implementasi PHP)
Selain itu, di dalam kelas Petshop, terdapat metode **getter dan setter** untuk setiap atributnya

## Alur Program
Program ini berbasis menu, dimana user dapat memilih fitur atau pilihan yang tersedia. Berikut adalah fitur-fitur yang dapat dipilih:

1. **Tambah Data Produk**  
   - User dapat menambahkan produk baru dengan ID unik
   - Jika ID yang dimasukkan sudah ada, maka akan muncul pesan error

2. **Lihat Data Produk**  
   - User dapat meilihat daftar produk yang tersimpan 
   - Jika daftar masih kosong, akan muncul pesan bahwa tidak ada data produk

3. **Ubah Data Produk**  
   - User dapat mengubah data produk berdasarkan ID
   - Jika ID tidak ditemukan, akan muncul pesan error

4. **Hapus Data Produk**  
   - User dapat menghapus data produk berdasarkan ID
   - Jika ID tidak ditemukan, akan muncul pesan error

5. **Cari Data Produk**  
   - User dapat mencari suatu produk berdasarkan nama produk
   - Jika produk tidak ditemukan, akan muncul pesan error

6. **Keluar**  
   - Program akan berhenti dan user keluar dari sistem
