
<?php include('head.php'); ?>
<body>

<div class="container">
    <?php include('tasarim/turkbayragi.php'); ?>
    <?php include('tasarim/navbar.php'); ?>
<?php

require_once "connection.php";

if(isset($_POST['idToDelete'])){
    $idToDelete = (int)$_POST['idToDelete'];

    // DELETE FROM students WHERE id = $idToDelete
    $deleteQuery = $connection->prepare("DELETE FROM students WHERE id = ?");
    $isDeleted = $deleteQuery->execute([$idToDelete]);
}
echo 'BAŞARIYLA SİLİNDİ';
header("Refresh: 2; url=uyeler.php"); ?>



</div>
</body>
</html>
