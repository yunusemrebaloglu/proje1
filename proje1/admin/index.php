<?php include('head.php'); ?>
<body>
<div class="container">
    <?php include('navbar.php');

    if($_SESSION){

        //__

include 'pay.php';
        //__

        if ($_SESSION['admin'] == 3) {
            echo 'hoşgeldiniz admin bey';
        }
    }else {
        echo 'giriş yapınız';
        header("Refresh: 2; url=../index.php");
    }

    ?>
</div>
</body>
</html>












