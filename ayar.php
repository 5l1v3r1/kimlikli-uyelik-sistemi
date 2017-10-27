
<?php
//////////////////////////////////////
//KODLAMA HASANATİLAN'A AİTTİR.  ////
//www.hasanatilan.com           ////
///////////////////////////////////

$sunucu = 'localhost';
$kullanici = 'root';
$sifre = '123456';
$veritabani = 'eer';

try{
	$veritabani = new PDO("mysql:host=$sunucu;dbname=$veritabani;", $kullanici, $sifre);
} catch(PDOException $hata){
	die( "Bağlantı sağlanamadı: " . $hata->getMessage());
}
