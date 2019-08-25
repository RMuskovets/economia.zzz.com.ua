<?php
session_start();
if (isset($_POST['tel'])) {
	$connection = new mysqli('mysql.zzz.com.ua', 'economia', '!Q164352q', 'economia');
	$query = 'SELECT id, admin FROM USER where pass=' . $_POST['tel'] . ';';
	$row = $connection->query($query);
	if ($row) {
		$row = $row->fetch_assoc();
		$_SESSION['auth'] = 1;
		$_SESSION['admin'] = intval($row['admin']);
		header('Location: /katalog.php');
	} else echo '<h3 style="color: red;">Неправильний пароль.</h3>';
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
			<p>
			Введіть у поле пароль, який ви вказували 
			в повідомленні про оплату, для того, щоб почати користуватись каталогом 
			</p>
			<form method='POST' action = 'auth.php'>
				<input type='text' name='tel'>
				<input type='submit' value='Підключитись...'>
			</form>
			<p>
			В цілях безпеки номер необхідно буде вводити при кожному вході в каталог
			</p>
			</div><!-- /auth -->
			
		</div>	
	</div>
	<?}?>
</body>
</html>