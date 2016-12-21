<?php include('head.php'); ?>
<body>
<div class="container">
    <?php include('navbar.php');

    if($_SESSION){
        if ($_SESSION['admin'] == 1) {
            echo 'hoşgeldiniz kullanıcı bey';
        }
    }else {
        echo 'giriş yapınız';
        header("Refresh: 2; url=../index.php");
    }

    ?>
</div>
</body>
</html>

