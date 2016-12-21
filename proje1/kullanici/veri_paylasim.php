
<?php include('head.php'); ?>
<body>

<div class="container">
    <?php include('navbar.php'); ?>



    <?php
    require_once "connection.php";

    if ($_SESSION) {

            include 'paylasilan_update.php';

    }
    ?>


</div>
</body>
</html>
