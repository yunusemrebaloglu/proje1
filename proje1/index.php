<?php include('head.php'); ?>
<body>
<div class="container">
	<?php include('navbar.php');

	if($_SESSION){
        if ($_SESSION['admin'] == 3){
            header('Refresh:0; url=admin/index.php');
        }elseif ($_SESSION['admin']==2){
            header('Refresh: 0; url=yonetici/index.php');
        }elseif ($_SESSION['admin']==1){
            header('Refresh: 0; url=kullanici/index.php');
        }
	}else echo 'giriş yapınız';


	?>
</div>
</body>
</html>

