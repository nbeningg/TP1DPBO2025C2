# Saya Nuansa Bening Aura Jelita dengan NIM 2301410 mengerjakan Tugas Praktikum 1
# dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahanNya 
# maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

# kelas Petshop untuk merepresentasikan data produk yang dijual di Petshop Miauwtopia
class Petshop:
    # atribut private menggunakan double underscore (__)
    __idProduk = ""; # id untuk setiap produk (unik / tidak sama)
    __namaProduk = ""; # nama produk
    __kategori = ""; # kategori produk
    __harga = 0; # harga produk

    # konstruktor untuk menginisialisasi objek Petshop
    def __init__(self, idProduk="", namaProduk="", kategori="", harga=0):
        self.__idProduk = idProduk # inisialisasi id produk
        self.__namaProduk = namaProduk # inisialisasi nama produk
        self.__kategori = kategori # inisialisasi kategori
        self.__harga = harga # inisialisasi harga

    # SETTER : mengubah nilai atribut objek
    # mengatur nilai id produk dengan id baru 
    def setIDProduk(self, idProduk):
        self.__idProduk = idProduk

    # mengatur nilai nama produk dengan nama baru
    def setNamaProduk(self, namaProduk):
        self.__namaProduk = namaProduk

    # mengatur nilai kategori produk dengan kategori baru 
    def setKategori(self, kategori):
        self.__kategori = kategori

    # mengatur nilai harga produk dengan harga baru
    def setHarga(self, harga):
        self.__harga = harga


    # GETTER : mendapatkan/mengambil nilai atribut objek
    # mengembalikan id produk
    def getIDProduk(self):
        return self.__idProduk

    # mengembalikan nama produk
    def getNamaProduk(self):
        return self.__namaProduk

    # mengembalikan kategori produk
    def getKategori(self): 
        return self.__kategori

    # mengembalikan harga produk
    def getHarga(self):
        return self.__harga