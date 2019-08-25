<?php
session_start();
if ($_SESSION['auth']<>1) 
{
	header("Location: /auth/auth.php");
	//exit;
}
if (!isset($_GET['page']))
	{
		$page = 'akcia'; 
	} 
else
	{
		$page = addslashes(strip_tags(trim($_GET['page']))); 
	} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link href='https://fonts.googleapis.com/css?family=Cuprum|Russo+One|PT+Sans&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="styles/main.css">
	<meta name="keywords" content="Економія, СП, Вигідно, Якість" />
	<meta name="author" content="hobbyart" />
	<meta name="description" content="Сайт вигідних пропозицій" />
	<title>
		Economia | Каталог	
	</title>
</head>
<body>
<!-- <header>
	
	<div class="wraper">
		<div id="logo">
			<h1><a href="index.php">ЕКОНОМ . І . Я </a></h1>
		</div>
		<menu>
			<li><a href="index.php"><i class="fa fa-home"></i>На головну</a></li>
			<li><a href="infa.php"><i class="fa fa-info-circle"></i>Інформація</a></li>
			<li><a href="katalog.php"><i class="fa fa-folder-open-o"></i>Каталог</a></li>
			<li><a class="main-item" href="javascript:void(0);"><i class="fa fa-envelope-o"></i>Зв'язок із нами</a>
				<ul class="soc-menu"> 
					<li><a href="#">Ми Вконтакті</a></li> 
					<li><a href="#">Ми у facebook</a></li> 
				</ul>
			</li>
		</menu>
	</div>
</header> -->
<?php include 'parts/menu.php'; ?>
<div class="katalog-menu">
	<div class="wraper">
		<li><a href="/katalog.php?page=akcia"><i class="fa fa-gift" aria-hidden="true"></i> Акції</a><div class="alt">Календар знижок, акції</div></li>
		<li><a href="/katalog.php?page=4ol_odag">Чоловічий розділ</a><div class="alt">Чоловічий одяг та взуття</div></li>
		<li><a href="/katalog.php?page=wom_odag">Жіночий розділ</a><div class="alt">Жіночий одяг та взуття</div></li>
		<li><a href="/katalog.php?page=child_odag">Дитячий розділ</a><div class="alt">Дитячий одяг та взуття</div></li>
		<li>|</li>
		<li><a href="/katalog.php?page=kanctovaru">Канцтовари</a><div class="alt">Канцтовари, шкільне приладдя</div></li>
		<li><a href="/katalog.php?page=bags_belts">Аксесуари</a><div class="alt">Сумки, годинники, пояси, біжутерія</div></li>
		<li><a href="/katalog.php?page=kosmetic">Косметика</a><div class="alt">Косметика, парфуми</div></li>
		<li><a href="/katalog.php?page=underwear">Білизна</a><div class="alt">Спідня білизна</div></li>
			
	</div>
</div>
	<div id="otstyp-a"></div> <!-- height:100px -->
	<div class="wraper">
		
		<?php include ('katalog/'.$page.'.php');?>
		<div class="clearfix"></div><!-- /clearfix -->
	</div>	
		<?php include ('parts/footer.php');?>

		
</body>
</html>