<?php
session_start();
include("connect.php");
$Connect = new host;
$link = mysqli_connect($Connect->host , $Connect->user , $Connect->password , $Connect->db_name);

$login = $_SESSION['login'];
$query = "SELECT * FROM reg WHERE login='$login'";
$row = mysqli_fetch_assoc(mysqli_query($link, $query));
// CONTROL BASE_DATA FOR AVATAR ;
if (isset($_POST['but'])) {
    if (!empty($row['login'])){
        $path = 'uploads/'.time(). $_FILES['avatar']['name'];
        move_uploaded_file($_FILES['avatar']['tmp_name'] , $path);
        if ($_FILES['avatar']['name'] != null){
            $query = "UPDATE reg SET avatar='$path' WHERE login='$login'";
            $row = mysqli_query($link, $query);
        }
        $query = "SELECT * FROM reg WHERE login='$login'";
        $row = mysqli_fetch_assoc(mysqli_query($link, $query));
        ?>
        <script>
            location.replace("MyAccount.php");
        </script>
        <?php
    }else{
        echo "Error invalid image";
    }
}



// CONTROL_NAME_BASE_DATA
if (isset($_POST['but_name'])){
    $name_user = $_POST['name_user'];
    if (strlen($name_user) > 4) {
        $query = "UPDATE reg SET name='$name_user' WHERE login='$login' ";
        $row = mysqli_query($link, $query);
    }
    $query = "SELECT * FROM reg WHERE login='$login'";
    $row = mysqli_fetch_assoc(mysqli_query($link, $query));
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/fonts.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" type="text/css" href="css/myaccount2.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>
<!--HTML STYLE-->
<header class="orange">
    <div class="container">
<div class="top">
    <a href="/" >
        <img src="img/flame.png" ondragstart="return false" >
        <p class="Bonfire">Bonfire</p>
    </a>
    <form method="post">
        <p class="light" id="light" onclick="return Data_phone(this)">Свет включён</p></form>
</div>
</div>
</header>
<div class="container">
<!--form for accepting data-->
    <center> <form method="post" enctype="multipart/form-data">
                <div class="poryadok">
<!--                    AVATAR_FILE_UPLOAD-->
                 <img src="<?php echo $row['avatar']; ?>" class="image">
                 <input type="file" name="avatar" class="file_upload">
                 <input type="submit" name="but" class="send_up_img" value="Добавить">


                    <!--END_FILE_UPLOAD-->
                    <p class="tel"><?php echo $row['name']; ?>
                        <input type="text" name="name_user">
                        <button type="submit" name="but_name">Отправить</button>
                    </p>
                </div>
            </form></center>
</div>

<script type="text/javascript" src="js/script.js"></script>
</body>
</html>