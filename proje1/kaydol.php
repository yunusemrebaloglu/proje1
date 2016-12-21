<?php include('head.php'); ?>
<body>

<div class="container">

		<?php include('navbar.php');?>


	<form action="" method="post">
		KULLANICI ADI: <br> <input type="text" name="kadi" placeholder="kullanıcıadı" ><br>
		MAİL:          <br><input type="email" name="eposta" placeholder="eposta" ><br>
		ŞİFRE:          <br><input type="password" name="sifre" placeholder="şifre" ><br>
		ŞİFRE tekrar:       <br>   <input type="password" name="sifre2" placeholder="şifretekrar" ><br>
		<input type="submit" value="Kaydet!" >
	</form>

	<?php
	require_once "connection.php";
	if($_POST) {
		// Post üstünden gelen verileri değişkenlere alalım
		$kadi = $_POST['kadi'];
		$eposta = $_POST['eposta'];
		$sifre = $_POST['sifre'];
		$sifre2 = $_POST['sifre2'];
		if (!$kadi || !$sifre  || !$eposta) {
			echo "lütfen eksik alanları bırakmayınız";
		} else {
			if ($sifre!=$sifre2){
				echo'sifreler uyuşmuyor';
			}
			else {
				if (!filter_var($eposta)) {
					echo "lütfen geçerli bir mail adresi girin";
				} else {

					// bir ekleme sorgusu içine, bu değişkenlerle veritabanı sunucusuna talepte bulunalım

					 $addQuery = $connection->prepare("INSERT INTO uyeler (kadi, sifre, eposta) VALUES (?, ?, ?)");

					$isAdded = $addQuery->execute(array($kadi, $sifre, $eposta));

					if ($isAdded) {
						echo "kayıt olundu";
						header('Refresh: 2; url=index.php');
					} else {

//burdan sonrası hata mesajı almak için yapıldı
						$cek1 = $connection->prepare("select * from uyeler WHERE kadi =? and sifre =? ");
						@$cek1->execute(array($akadi,$asifre));
						$cek = $cek1->fetch();

						if($cek){
							$_SESSION["login"]   = true;
							$_SESSION["kadi"]    = $cek["akadi"];
							$_SESSION["sifre"]   = $cek["asifre"];

						}else{
							echo 'LÜTFEN FARKLI BİR KULLANICI ADI VE EPOSTA GİRİNİZ';
							header("Refresh: 2; url=kaydol.php");



						}




					}

					session_destroy();}
			}
		}
	}









	?>



</div>
</body>
</html>

