<?php include('head.php'); ?>
<body>

<div class="container">
    <?php include('navbar.php'); ?>


    <?php

    require_once "connection.php";

    if(isset($_POST['idToDelete'])){
        $idToDelete = (int)$_POST['idToDelete'];

        // DELETE FROM students WHERE id = $idToDelete
        $deleteQuery = $connection->prepare("DELETE FROM yorum WHERE id = ?");
        $isDeleted = $deleteQuery->execute([$idToDelete]);

        echo 'BAŞARIYLA SİLİNDİ';
        header("Refresh: 2; url=index.php");
    }
    ?>
</div>
</body>
</html>
