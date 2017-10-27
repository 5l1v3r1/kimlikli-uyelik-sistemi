<?php
//////////////////////////////////////
//KODLAMA HASANATİLAN'A AİTTİR.  ////
//www.hasanatilan.com           ////
///////////////////////////////////

session_start();

if( isset($_SESSION['kullanici']) ){
	header("Location: index.php");
}

require 'ayar.php';

if(!empty($_POST['email']) && !empty($_POST['sifre'])):
	
	$kayit = $veritabani->prepare('SELECT * FROM kullanicilar WHERE email = :email');
	$kayit->bindParam(':email', $_POST['email']);
	$kayit->execute();
	$sonuclar = $kayit->fetch(PDO::FETCH_ASSOC);

	$mesaj = '';

	if(count($sonuclar) > 0 && password_verify($_POST['sifre'], $sonuclar['sifre']) ){

		$_SESSION['kullanici'] = $sonuclar['id'];
		header("Location: index.php");

	} else {
		$mesaj = '<center><h4>Yazdıgınız Bilgiler Malesef Uyuşmuyor!!</center></h4>';
	}

endif;

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
                        <h3 class="panel-title">Giriş Yap</h3>
                    </div>
					
                    <div class="panel-body">
	<?php if(!empty($mesaj)): ?>
	<p><?= $mesaj ?></p>
	<?php endif; ?>
                       					
                            <fieldset>
							<form action="giris.php" method="POST">
		<div class="form-group">
		<input class="form-control" type="text" placeholder="E-posta" name="email" required>
		</div>
        <div class="form-group">		
		<input class="form-control" type="password" placeholder="Şifre" name="sifre" required>
        </div>
		<input class="btn btn-lg btn-success btn-block" type="submit" value="Giriş yap">

		
		</form>
		<br><a ui-sref="register" class="btn btn-lg btn-warning btn-block" href="kayit.php">Kayıt Ol</a>
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