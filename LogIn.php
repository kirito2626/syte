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
		<div class="block"><center><font style="color: white; font-size: 30px;
		font-family:'ChelseaMarket';"><img src="img/flame.png" style="height: 30px;" alt="" ondragstart="return false" >Bonfire</font></center>
		<div class="poryadok2">
			<form method="post" class="autorization">
				<label>
					<center><font style=" font-size: 18px;">Регистрация</font><br><br><br>
						<input type="text" name="add_login" placeholder="Введите логин" id="" class="bd"><br>
						<br>
						<input type="text" name="add_email" title="Email Должен состоять из одного знака @ знака . и в конце либо ru,net,by,com"  placeholder="Введите Почту" class="bd"><br>
						<br>
						<input type="password" name="add_pass" placeholder="Введите Пароль" id="" class="bd"><br><br>
						<input type="password" name="add_pass_two" placeholder="Подтверждение пароля" id="" class="bd">
						<br>
						<br><input type="submit" value="Регистрация" style="cursor: pointer;" name="but" class="bd"><br>
						<a href="autoriz.php" class="left">Вернуться на авторизацию</a>
					</center>
				</label>
			</form>
		</div>
	</div>
</div>
</body>
</html>
<?php
$add_login = $_POST["add_login"];
$add_email = $_POST["add_email"];
$add_pass = $_POST["add_pass"];
$_SESSION['add_email'] = $add_email;
$query = "SELECT * FROM reg WHERE login='$add_login' ";
$row = mysqli_fetch_assoc(mysqli_query($link, $query));
if (isset($_POST["but"])) {
    if (!empty($add_email) && !empty($add_login) && !empty($add_pass)) 
    {
        if (strlen("$add_login") >= "8" && empty($row["login"])) 
        {
            $query = "SELECT * FROM reg WHERE email='$add_email' ";
            $row = mysqli_fetch_assoc(mysqli_query($link, $query));
            if (strlen("$add_email") >= "10" && empty($row["email"]) && preg_match("/^([0-9a-z]_?){4,50}+@[0-9a-z]{2,50}+\.(ru|com|net|by)$/i", $add_email) == 1) {
                if (strlen("$add_pass") >= "8" && "$add_pass" == $_POST["add_pass_two"]) {
                    $add_pass = md5($add_pass);
                    $query = "INSERT INTO reg SET login='$add_login', email='$add_email' , pass='$add_pass' , boolean=false ";
                    $result = mysqli_query($link, $query) or die(mysqli_error($link));
                    if ($result) {
                        ?>
                        <script type="text/javascript">
                            alert("Успешная Регистрация");
                            location.replace("/");
                        </script>
                        <?php
                    }
                } else {
                    ?>
                    <div class="container">
                        <div class="poryadok2">
                            <div class="error">Не правильный password</div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                if (strlen("$add_email") >= "10") {
                    ?>
                    <div class="container">
                        <div class="poryadok2">
                            <div class="error">Не правильный email</div>
                        </div>
                    </div>
                    <?php
                }else{
                    ?>
                    <div class="container">
                        <div class="poryadok2">
                            <div class="error">Email < 10 Символов</div>
                        </div>
                    </div>
                    <?php
                }
            }
        } else {
            if (strlen("$add_login") >= "8"){
                ?>
                <div class="container">
                    <div class="poryadok2">
                        <div class="error">Логин уже занят</div>
                    </div>
                </div>
                <?php
            }else{
                ?>
                <div class="container">
                    <div class="poryadok2">
                        <div class="error">Login < 8 символов</div>
                    </div>
                </div>
                <?php
            }
        }
    }else{
        ?>
        <div class="container">
            <div class="poryadok2">
                <div class="error">Поля не заполнены</div>
            </div>
        </div>
        <?php
    }
}
?>