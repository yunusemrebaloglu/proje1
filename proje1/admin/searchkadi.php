
<?php include('head.php'); ?>
<body>

<div class="container">
    <?php include('navbar.php'); ?>



    <?php
//connection database
require_once "connection.php";
//control that is post empty?
if(!empty($_POST["search"])) {
    $key = $_POST["search"];
    //equal data with post method to variable
    //key variable search database
    $search=$connection->prepare(" SELECT * FROM  uyeler WHERE kadi LIKE ? ");
    $search->execute(array('%'.$key.'%'));
}
?>

<form action="" method="post" name="search">
    <input type="text"  name="search" placeholder="kullanıcı adı arama">
    <input type="submit" value="search">
</form><br>
<!--if search is emtyp ,then we want least one letter from user-->
<?php if (empty($key)) {}
else{ ?> <!--if search isn't empty,display customers or customer -->
    <?php foreach ($search as $data): ?>
        <div class="wall">

            <form>
                <?=$data['kadi']?>
                <br><?=$data['eposta']?><br>
                <?=$data['admin']?><br>
                <?=$data['dikkat']?><br>
            </form>
        </div>
        <br>    <a href="profil.php?id=<?= $data['id'] ?>"> profiline git </a><br>
        <br>    <a href="uye.php?id=<?= $data['id'] ?>"> düzenlemeye git </a><br><hr>
    <?php endforeach; ?>
<?php } ?>

</div>
</body>
</html>
