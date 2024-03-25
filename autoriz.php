<?php
session_start();
include("connect.php");
$Connect = new host;
$link = mysqli_connect($Connect->host , $Connect->user , $Connect->password , $Connect->db_name);
?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <link rel="stylesheet" type="text/css" href="css/auto3.css">
        <link rel="stylesheet" type="text/css" href="css/normalize.css">
        <link rel="stylesheet" type="text/css" href="css/fonts.css">
    </head>
    <body>
    <div class="container">
        <div class="block">
            <a href="/" class="a">
            <center><font style="color: white; font-size: 30px;
		font-family:'ChelseaMarket';"><img src="img/flame.png" style="height: 30px;" alt="" ondragstart="return false">Bonfire</font>
            </center></a>
            <div class="poryadok">
                <form method="post" class="autorization">
                    <label>

                        <center><font style=" font-size: 18px;">Авторизация</font><br><br><br>
                            <input type="text" name="add_login" placeholder="Введите логин" id="" class="bd"><br>
                            <br>
                            <input type="password" name="add_pass" placeholder="Введите пароль" id="" class="bd">
                            <br>
                            <br><input type="submit" value="Вход" name="but" class="bd" id="but">

                        </center>

                    </label>
                </form>

                <a href="LogIn.php"><input type="submit" value="Регистрация" name="" id="room" class="bd"></a></div>

        </div>
    </div>
    </body>
    </html>
<?php

 $add_login = $_POST["add_login"];
 $add_pass = md5($_POST["add_pass"]);
 $add_pass2 = ($_POST["add_pass"]);
 $query = "SELECT * FROM reg WHERE login='$add_login' AND pass='$add_pass'";
 $row = mysqli_fetch_assoc(mysqli_query($link, $query));

if (isset($_POST['but'])){
    if (!empty($row)){
            $time = time();
            $query = "UPDATE reg SET boolean=true WHERE login='$add_login' AND pass='$add_pass' OR email='$email'";
            $row = mysqli_query($link, $query) or die(mysqli_error($link));

            $_SESSION['login'] = $add_login;
            $_SESSION['password'] = $add_pass;
            $_SESSION['boolean'] = true;

            ?>
            <script type="text/javascript">
                location.replace("/");
            </script>
            <?php
    }
    else if (!empty($add_login) && !empty($add_pass2)){
       if ($row["login"] != '$add_login'){
           ?>
           <div class="container">
               <div class="poryadok3">
                   <div class="error2">Не правильно введён логин</div>
               </div>
           </div>
           <?php
       }else{
           ?>
           <div class="container">
               <div class="poryadok3">
                   <div class="error2">Не правильно введён пароль</div>
               </div>
           </div>
           <?php
       }
    }else {
        ?>
        <div class="container">
            <div class="poryadok3">
                <div class="error2">Поля не заполнены</div>
            </div>
        </div>
        <?php
    }
}
