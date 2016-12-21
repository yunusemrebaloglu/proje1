
<?php include('head.php'); ?>
<body>

<div class="container">
    <?php include('navbar.php'); ?>



    <?php
    require_once "connection.php";

    if ($_SESSION) {

        if ($_SESSION['admin'] != 1) {
            include 'paylasilan_update.php';
        }
    }
    ?>


</div>
</body>
</html>
