<?php
session_start(); // Connection SESSION

// CONNECT BASE_DATA
include("connect.php");

$Connect = new host;
$link = mysqli_connect($Connect->host , $Connect->user , $Connect->password , $Connect->db_name);


// CONNECTION SESSION FROM AUTORIZ.PHP
$add_login = $_SESSION['login'];
$add_pass = $_SESSION['password'];
$query = "SELECT * FROM reg WHERE login='$add_login' AND pass='$add_pass'";
$row = mysqli_fetch_assoc(mysqli_query($link, $query));

// CONNECTION BOOLEAN
$query = "SELECT * FROM reg WHERE boolean AND login='$add_login'";
$row = mysqli_fetch_assoc(mysqli_query($link, $query));

// CHECK IF THE BOOLEAN IS CONNECTION
if ($row['boolean'] == true && $row['login'] == $add_login && !empty($row['login']) || $_SESSION['boolean'] == true){
    $name = 'Выход';
}else{
    $name = 'Вход';
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<!-- <meta name="google" content="notranslate"> -->
	<title>Densetsu</title>
	<link rel="shortcut icon" href="img/bonfireico.png" type="image/png">
	<link rel="stylesheet" type="text/css" href="css/fonts.css">
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" type="text/css" href="css/style1.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>
<body > <!-- class="notranslate" -->
	<header class="orange">
		<div class="container">
			<div class="top">
				<a href="" >
					<img src="img/flame.png" alt="" ondragstart="return false" >
					<p class="Bonfire">Bonfire</p>
				</a>

			</div>
                        <div class="control">
                <div class="poryadok">
                	<p class="unselectable" id="light" onclick="return Data_phone()">Свет включён</p>
            <form method="post">
			<input type="submit" name="enter"   value="<?php echo $name; ?>" class="<?php

            if ($name == 'login' || $_SESSION['boolean'] != true){
                echo 'login';
            }else{
                echo 'exit';
            }

            ?>" >
            </form>
                </div>
                            <?php
                            if (isset($_POST['enter'])){
                                    $query = "UPDATE reg SET boolean=false WHERE login='$add_login'";
                                    $result = mysqli_query($link, $query) or die(mysqli_error($link));
                                    $_SESSION['boolean'] = false;
                                ?>
                                <script type="text/javascript">
                                    location.replace("autoriz.php");
                                </script>
                                <?php
                            }

                            ?>

                        </div>
            <?php
//            HIDDEN MY ACCOUNT IF HE DONT REGISTER USER
             if ($row['boolean'] == true || $_SESSION['boolean'] != true) {
                ?>

            <div class="shop"><a href="MyAccount.php">Личный кабинет</a></div></div>

            <?php
             }
                ?>
			</div>
			<div class="glow">
				<img src="img/tglow.png" alt="" class="tex_glow">
				<div class="container">
                    <div class="poryadok">
					<img src="img/home.png" alt="" class="home">
					<nav class="nav">
						<ul class="ul">
							<li class="li"><a class="a" href="#Sliders">Акции</a></li>
							<li class="li"><a class="a" href="#Featured">Одежда</a></li>
							<li class="li"><a class="a" href="#Brands">Бренды</a></li>
							<li class="li"><a class="a" href="#latest">Обувь</a></li>
							<li class="li"><a class="a" href="#Contacts">Контакты</a></li>
						</ul>
					</nav>
</div>
				</div>
				<div class="flow">
					<div class="container">
						<div class="welcome"> <?php if ($row['boolean'] == true || $_SESSION['boolean'] != true) {
							echo 'Добро пожаловать, '.$row['login']; 
						}else{
							echo "Добро пожаловать, чтобы зайти в профиль просим войти/зарегистрироваться.";
						}?>
                            <a href="https://vk.com/feed"><img src="img/vk.png" alt="" class="vk"></a>
                            <a href="https://twitter.com/explore"><img src="img/twitter2.png" alt="" class="twitter"></a>
                                <a href="https://www.skype.com/ru/"><img src="img/skype3.png" alt="" class="skype"></a>
                            <a href="https://www.facebook.com/"><img src="img/facebook2.png" alt="" class="facebook"></a>
                        </div>
					</div>
				</div>
			</header>


			<main>
				<!-- Начала слайда -->
				<div class="wrapper" id="Sliders">
					<input type="radio" name="point" id="slide1" checked>
					<input type="radio" name="point" id="slide2">
					<input type="radio" name="point" id="slide3">
					<input type="radio" name="point" id="slide4">
					<input type="radio" name="point" id="slide5">
					<div class="slider">
						<img class="slides slide1" src="img/childish.png" alt="" style="height: 355px;width: 940px;" ondragstart="return false">
						<img class="slides slide2" src="img/futbolki.png" alt="" style="height: 355px;width: 940px;" ondragstart="return false">
						<img class="slides slide3" src="img/iloveyou.png" alt="" style="height: 355px;width: 940px;" ondragstart="return false">
						<img class="slides slide4" src="img/brelki.png" alt="" style="height: 355px;width: 940px;" ondragstart="return false">
						<img class="slides slide5" src="img/shapka.png" alt="" style="height: 355px;width: 940px;" ondragstart="return false">
					</div>	
					<div class="controls">
						<label for="slide1"></label>
						<label for="slide2"></label>
						<label for="slide3"></label>
						<label for="slide4"></label>
						<label for="slide5"></label>
					</div>
					<!-- Конец слайда -->
					<div class="blueline">
						<div class="ruler"></div>
						<p class="gambino">Комплект походной одежды для лагеря $9.99</p>
					</div>
				</div>
				<div class="container">
					
					<p class="featured" id="Featured">Одежда<img src="img/linef.png" alt="" class="linef"></p>
					<!-- Начало блока Featured -->
					<div class="block">
						<div class="double">
							<img src="img/cat.png" alt="" class="cat">
						</div>
						<p class="mascot">Летний комплект №1</p>
						<div class="blockcat01"><p class="catCenter">$</p></div>
						<div class="blockcat02"><p class="catCenter">2</p></div>
						<div class="blockcat03"><p class="catCenter">0</p></div>
					</div>

					<div class="block2">
						<div class="double">
							<img src="img/BiteMe.png" alt="" class="cat">
						</div>
						<p class="mascot">Летний комплект №2</p>
						<div class="blockcat01"><p class="catCenter">$</p></div>
						<div class="blockcat02"><p class="catCenter">3</p></div>
						<div class="blockcat03"><p class="catCenter">0</p></div>
					</div>

					<div class="block3">
						<div class="double">
							<img src="img/fella.png" alt="" class="cat">
						</div>
						<p class="mascot">Служебный комплект №1</p>
						<div class="blockcat01"><p class="catCenter">$</p></div>
						<div class="blockcat02"><p class="catCenter">4</p></div>
						<div class="blockcat03"><p class="catCenter">5</p></div>
					</div>

					<div class="block4">
						<div class="double">
							<img src="img/astral.png" alt="" class="cat">
						</div>
						<p class="mascot">Служебный комплект №2</p>
						<div class="blockcat01"><p class="catCenter">$</p></div>
						<div class="blockcat02"><p class="catCenter">4</p></div>
						<div class="blockcat03"><p class="catCenter">5</p></div>
					</div>
					<!-- Конец блока featured -->
					
					<!-- Brands -->
					<p class="BRANDS" id="Brands">Бренды<img src="img/linef.png" alt="" class="linef"></p>
					<div class="znachki">
						<img src="img/apple.png" alt="" class="apple" id="image" ondragstart="return false">
						<img src="img/palm.png" alt="" class="palm" ondragstart="return false">
						<img src="img/adidas.png" alt="" class="adidas" ondragstart="return false">
						<img src="img/HugoBoss.png" alt="" class="HugoBoss" ondragstart="return false">

					</div>
					<!-- Конец Brands -->
					<p class="LATEST" id="latest">Обувь<img src="img/linef.png" alt="" class="linef"></p>
					<!-- Начало LATEST -->

					<div class="latest_block">
						<div class="double">
							<img src="img/symbol.png" alt="" class="cat">
						</div>
						<p class="mascot">Летняя обувь №1</p>
						<div class="blockcat01"><p class="catCenter">$</p></div>
						<div class="blockcat02"><p class="catCenter">2</p></div>
						<div class="blockcat03"><p class="catCenter">0</p></div>
					</div>

					<div class="latest_block2">
						<div class="double">
							<img src="img/Read.png" alt="" class="cat">
						</div>
						<p class="mascot">Летняя обувь №2</p>
						<div class="blockcat01"><p class="catCenter">$</p></div>
						<div class="blockcat02"><p class="catCenter">3</p></div>
						<div class="blockcat03"><p class="catCenter">0</p></div>
					</div>
					
					<div class="latest_block3">
						<div class="double">
							<img src="img/Carter.png" alt="" class="cat">
						</div>
						<p class="mascot">Летняя обувь №3</p>
						<div class="blockcat01"><p class="catCenter">$</p></div>
						<div class="blockcat02"><p class="catCenter">4</p></div>
						<div class="blockcat03"><p class="catCenter">5</p></div>
					</div>

					<div class="latest_block4">
						<div class="double">
							<img src="img/Onesie.png" alt="" class="cat">
						</div>
						<p class="mascot">Летняя обувь №4</p>
						<div class="blockcat01"><p class="catCenter">$</p></div>
						<div class="blockcat02"><p class="catCenter">4</p></div>
						<div class="blockcat03"><p class="catCenter">5</p></div>
					</div>
					<!-- Конец Latest -->
				</div>
				<div class="poryadok">
					<div class="bottomline"><img src="img/bottomtexture.png" alt="" class="bottomtexture">
						<div class="container">
							<img src="img/lightbulb.png" class="lightbulb" alt="">
							<div class="poryadok">
								<p class="Suspendisse">Люби шопинг, а плати позже</p>
								<p class="Aliquam">Нет платежей или процентов на срок до 3 месяцев, каждый раз, когда вы тратите $ 50 или более в одной транзакции. </p>
								<img src="img/zevs.png" class="zevs" alt="">
								<p class="Suspendisse2">Загрузите наше приложение</p>
								<p class="Aliquam2">Будьте в курсе наших последних поступлений, наслаждайтесь нашим новым инструментом поиска стиля и многое другое...</p>
								<img src="img/power.png" class="power" alt="">
								<p class="Suspendisse3">Подарочные карты на все случаи жизни</p>
								<p class="Aliquam3">В поисках идеального подарка? Пусть они выберут то, что им понравится, с подарочной картой "новый облик". </p>

							</div>
						</div>
						<div class="bottomline2">
							<img src="img/textureblack.png" class="textureblack" alt="">
							<div id="Contacts"  class="container">
								<div  class="poryadok">
									<p class="about">О нас</p>
									<p class="sed"> Благотворительность<br>
                                        Прием на работу<br>
                                        Контакты для прессы<br>
                                        Карта лояльности<br>
                                        Подарочные карты<br>
                                        Магазин Локатор<br>
                                       Руководства по размеру<br>
									<p class="information">Информация</p>
									<p class="Delivery">Акции<br>
										Информация о доставке
										Политика конфиденциальности<br>
										Условия использования
									</p>
									<p class="Customer" >Обслуживание клиентов</p>
									<p class="Contact">Связаться с нами<br>
										Возврат товара<br>
									Карта сайта</p>
									<p class="Account">Мой счет</p>
									<p class="Order">Мои скидки<br>
										История заказов<br>
										Список желаний<br>
									Новостная рассылка</p>
									<p class="extras">Дополнительные услуги</p>
									<p class="Brands">Бренды<br>
										Подарочные сертификаты<br>
										Филиалы<br>
									Специальные предложения</p>
								</div>
							</div>
							<div class="lastline">
								<div class="container" >
									<div class="poryadok">
										<p class="copyright">Авторские права на <span style="color:#9a9a9a;">bonfire </span>2020 все права защищены.</p>
										<p class="powered">Работает на <span style="color:#9a9a9a;">opencart</span
										></p>
										<p onclick="alert('Телефон: +7(999) 353 42 12 \nПочта: info@gmail.com');" class="set12">Связаться с нами</p>
									</div>
								</div><!--container-->
							</div> <!--lastline-->
						</div><!--bottomline2-->
					</div> <!--bottomline-->
				</div> <!--Порядок-->
			</main>
			<script src="js/script.js"></script>
		</body>
		</html>
