<?php include('head.php'); ?>
<body>

<div class="container">
    <?php include('navbar.php'); ?>


    <?php

    require_once "connection.php";

    if(isset($_POST['verisil'])){
        $verisil = (int)$_POST['verisil'];
        // DELETE FROM students WHERE id = $idToDelete
        $deleteQuery = $connection->prepare("DELETE FROM paylasilan WHERE kullanici = ?  ");
        $isDeleted = $deleteQuery->execute([$verisil]);

        echo 'BAŞARIYLA SİLİNDİ';
        header("Refresh: 2; url=uyeler.php");
    }
    ?>
</div>
</body>
</html>
