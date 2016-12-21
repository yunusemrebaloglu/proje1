
<?php include('head.php'); ?>
<body>

<div class="container">
    <?php include('navbar.php'); ?>



    <?php
    require_once "connection.php";

    if ($_SESSION) {

        if ($_SESSION['admin'] == 3) {
            include 'update.php';
        } elseif ($_SESSION['admin'] == 2) {
            echo 'buraya girmeye hakkınız katiyen bulunmamaktadır.';
        }
    }
    ?>


</div>
</body>
</html>
