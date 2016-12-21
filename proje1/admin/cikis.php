<?php include('head.php'); ?>
<body>
<div class="container">
    <?php include('navbar.php'); ?>
    <?php
        session_destroy();
        echo 'çıkış yapıldı.';
        header("Refresh: 2; url=../index.php");  ?>
</div>
</body>
</html>
