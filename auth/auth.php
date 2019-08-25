<?php
ini_set('session.use_cookies', 1);
$Database_Url = 'mysql.zzz.com.ua'; // mysql.zzz.com.ua
$Database_Name = 'economia'; // economia
$Database_Pwd = '0164352Roman'; // !Q164352q

session_start();
// if (isset($_POST['tel'])) {
// 	$connection = new mysqli($Database_Url, $Database_Name, $Database_Pwd, 'economia');
// 	$query = "SELECT id, admin FROM user WHERE pass = '{$_POST[tel]}'";
// 	$row = $connection->query($query);
// 	if ($row) {
// 		$row = $row->fetch_assoc();
// 		$_SESSION['auth'] = 1;
// 		$_SESSION['admin'] = intval($row['admin']);
// 		header('Location: /katalog.php');
// 	} else {
// 		echo '<h3 style="color: red;">Неправильний пароль.</h3>';
// 		die;
// 	}
// }
$dbh = new PDO("mysql: host=127.0.0.1; dbname=economia", $Database_Name, $Database_Pwd);
 
function passVerify($login, $dbh) {
	$sth = $dbh->prepare('SELECT `admin` FROM `user` WHERE `pass`= :login');
    if($sth->execute(array(':login' => $login))){
    	$fetch = $sth->fetchAll(); $fetch = $fetch[0]; $fetch = $fetch['admin'];
        return $fetch;
    } else {
        return false;
    }
}

if (isset($_POST['tel'])) {
	$pwd = passVerify($_POST['tel'], $dbh);
	if ($pwd) {
		$_SESSION['auth'] = 1;
		$_SESSION['admin'] = $pwd;
		header('Location: /katalog.php');
		//echo '<script>alert("Hello!")</script>';
	} else {
		echo '<h3 style="color: red;">Неправильний пароль.</h3>';
 		die;
	}
}
else ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link href='https://fonts.googleapis.com/css?family=Cuprum|Russo+One|PT+Sans&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="../styles/main.css">
	<title>Economia | Авторизація</title>
</head>
<body>
	<?{?>
	<header>
		<div class="wraper">
			<div id="logo">
				<h1><a href="../index.php">ЕКОНОМ . І . Я </a></h1>
			</div>
			<menu>
				<li><a href="../index.php"><i class="fa fa-home"></i>На головну</a></li>
				<li><a href="../infa.php"><i class="fa fa-info-circle"></i>Інформація</a></li>
				<li><a href="../katalog.php"><i class="fa fa-folder-open-o"></i>Каталог</a></li>
				<li><a class="main-item" href="javascript:void(0);"><i class="fa fa-envelope-o"></i>Зв'язок із нами</a>
					<ul class="soc-menu"> 
						<li><a href="#">Ми Вконтакті</a></li> 
						<li><a href="#">Ми у facebook</a></li> 
					</ul>
				</li>
			</menu>
		</div>
	</header>
	<div id="otstyp-a"></div> <!-- height:100px -->

	<div class="wraper">
		<div>
			<h2>Авторизація</h2>
			<div class="auth">
			<form method='POST' action = 'auth.php'>
				<input type='text' name='tel'><Br>
				<input type='submit' value='Підключитись...'>
			</form>
			</div><!-- /auth -->
			
		</div>	
	</div>
	<?}?>
</body>
</html>