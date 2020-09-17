<?php
// contoh class
class produk{
    // property
  public $namaBarang,
         $merk;
         protected $diskon;// visibility
         private $harga;

         // method
  public function getCetak(){
    return "$this->merk, (Rp $this->harga)";
  }
  // construct
  public function __construct($namaBarang="nama barang", $merk="merk", $harga=2000000, $ukuranLayar="ukuran layar", $kapasitas="kapasitas"){
    $this->namaBarang = $namaBarang;
    $this->merk=$merk;
    $this->harga=$harga;
    $this->ukuranLayar=$ukuranLayar;
    $this->kapasitas=$kapasitas;
  }

    public function cetakInfo(){
        $str="{$this->namaBarang}, {$this->getCetak()}";
        return $str;
    }
    // method visibility
    public function setDiskon($diskon){
        $this->diskon=$diskon;
    }
    public function getHarga(){
        return $this->harga - ($this->harga * $this->diskon / 100);
    }
}
// inheritance
class televisi extends produk{
    public $ukuranLayar;

    public function _construct($namaBarang, $merk, $harga, $ukuranLayar){
        parent::_construct($namaBarang,$merk,$harga);
        $this->kapasitas = $kapasitas;
    }
    public function cetakInfo(){
        $str="televisi: ".parent::getCetak()." | Ukuran Layar: {$this->ukuranLayar}";
        return $str;
    }
}

class antene extends produk{
    public $ukuranLayar;

    public function _construct($namaBarang="nama barang", $merk="merk", $harga=25000, $ukuranLayar="ukuran panjang", $kapasitas="kapasitas"){
        parent::_construct($namaBarang,$merk,$harga);
        $this->kapasitas = $kapasitas;
    }
    public function cetakInfo(){
        $str="Nama Barang: {$this->namaBarang}, {$this->getCetak()} | Kapasitas: {$this->kapasitas}";
        return $str;
    }
}

$produk1 = new antene("televisi 40","televisi",2000000,"8 inci", "-");
$produk2 = new televisi("tectar","televisi",100000,"-");


echo $produk1->cetakInfo();
echo "<br>";
echo $produk2->cetakInfo();
echo "<br>";
echo "<hr>";
$produk1->setDiskon(50);// visibility
echo $produk1->getHarga();
?>