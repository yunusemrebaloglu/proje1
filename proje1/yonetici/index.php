<?php include('head.php'); ?>
<body>
<div class="container">
    <?php include('navbar.php');

    if($_SESSION){
        if ($_SESSION['admin'] == 2) {
            echo 'hoşgeldiniz yönetici bey';
        }
    }else echo 'giriş yapınız';


    ?>
</div>
</body>
</html>

