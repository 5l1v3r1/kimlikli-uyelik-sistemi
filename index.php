
<?php
//////////////////////////////////////
//KODLAMA HASANATİLAN'A AİTTİR.  ////
//www.hasanatilan.com           ////
///////////////////////////////////


	
session_start();
ob_start();
require 'ayar.php';

if( isset($_SESSION['kullanici']) && !empty($_SESSION['kullanici']) ){

	$kayit = $veritabani->prepare('SELECT * FROM kullanicilar WHERE id = :id');
	$kayit->bindParam(':id', $_SESSION['kullanici']);
	$kayit->execute();
	$sonuclar = $kayit->fetch(PDO::FETCH_ASSOC);

	$kullanici = NULL;

	if( count($sonuclar) > 0){
		$kullanici = $sonuclar;
	}

}
else
{
	header("Location: giris.php");
	die();
}





?>



<!DOCTYPE html>
<html>
<head>
<TITLE>HASAN ATİLAN - PHP PDO TC KİMLİK DOĞRULAMALİ KAYİT SİSTEMİ</TITLE>
<meta charset="utf-8">
<link rel="icon" type="image/png" href="icon.png">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="theme-color" content="#2c3e50">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
    <link href="tasarim/bootstrap.min.css" rel="stylesheet">
    <link href="tasarim/metisMenu.min.css" rel="stylesheet">
    <link href="tasarim/sb-admin-2.css" rel="stylesheet">
    <link href="tasarim/morris.css" rel="stylesheet">
	<link href="tasarim/ha.css" rel="stylesheet">	
    <link href="tasarim/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Bilgileriniz</h3>
                    </div>
					
                    <div class="panel-body">

                       					
                            <fieldset>
							<form action="giris.php" method="POST">
		<div class="form-group">
		<input class="form-control" type="text" value="<?=$sonuclar['isim']; ?>" name="text" required>
		</div>
		<div class="form-group">
		<input class="form-control" type="text" value="<?=$sonuclar['soyisim']; ?>" name="text" required>
		</div>
		<div class="form-group">
		<input class="form-control" type="text" value="<?=$sonuclar['tckimlik']; ?>" name="text" required>
		</div>
		<div class="form-group">
		<input class="form-control" type="text" value="<?=$sonuclar['yil']; ?>" name="text" required>
		</div>
		<div class="form-group">
		<input class="form-control" type="text" value="<?=$sonuclar['email']; ?>" name="text" required>
		</div>

		

		
		</form>
		<br><a ui-sref="register" class="btn btn-lg btn-warning btn-block" href="Cikis.php">Çıkış Yap</a>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="tasarim/jquery.min.js"></script>
    <script src="tasarim/bootstrap.min.js"></script>
    <script src="tasarim/metisMenu.min.js"></script>
    <script src="tasarim/sb-admin-2.js"></script>

</body>
</html>