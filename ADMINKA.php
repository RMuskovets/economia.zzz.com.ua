<?php
session_start();
if ($_SESSION['admin'] <> 1) header('Location: /katalog.php');
require 'gen.php';
$basedir = './pict/user/';
//require 'functions.php';
if (isset($_POST['ok']) and isset($_POST['mode'])) {
	if ($_POST['mode'] == 'tovar') {
		$filename = tempnam($basedir, 'img');
		$file = fopen($filename, 'w');
		unlink($file);
		move_uploaded_file($_FILES['file']['tmp_name'], $filename);
		
	} elseif($_POST['mode'] == 'rozdil') {

	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Economia | Адмінка</title>
	<link href='https://fonts.googleapis.com/css?family=Cuprum|Russo+One|PT+Sans&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="styles/main.css">
	<link rel="stylesheet" type="text/css" href="styles/modal.css">
</head>
<body>
<?php include 'parts/menu.php' ?>
<div class="modal" id="plusTovar">
	<br><br><br><br><br>
	<div class="modal-content">
		<span id="close-1" class="close">[x]</span>
		<form action="ADMINKA.php" method="post" enctype="multipart/form-data">
			<input type="text" name="name" placeholder="Назва товару" style="width: 30%;"><br>
			<textarea name="infa" wrap="hard" rows="15" cols="40" placeholder="Опис"></textarea><br>
			<input type="text" name="link" placeholder="Лінк на товар" style="width: 50%;"><br>
			<input type="text" name="rozd" placeholder="Номер розділу"><br>
			<input type="text" name="cina" placeholder="Ціна товару"><br>
			<input type="file" name="imag" placeholder="Картинка"><br>
			<input type="submit" name="ok" value="Записати">
			<input type="hidden" name="mode" value="tovar">
		</form>
	</div>
</div>
<div class="modal" id="plusRozdil">
	<br><br><br><br><br>
	<div class="modal-content">
		<span id="close-2" class="close">[x]</span>
		<form action="ADMINKA.php" method="post">

			<input type="submit" name="ok" value="Записати">

			<input type="hidden" name="mode" value="rozdil">
		</form>
	</div>
</div>
<br><br><br><br><br>
<center>
	<button onclick="document.getElementById('plusTovar').style.display = 'block'">
		<img src="pict/btn/add.png">
		Додати товар
	</button>
	<button onclick="document.getElementById('plusRozdil').style.display = 'block'">
		<img src="pict/btn/add.png">
		Додати розділ
	</button>
</center>
<div style="float: center; bottom: 0; position: absolute; width: 100%;">
	<?php include 'parts/footer.php'; ?>
</div>
</body>
<script type="text/javascript">
var pt = document.getElementById('plusTovar');
var pr = document.getElementById('plusRozdil');

var cpt = document.getElementById('close-1');
var cpr = document.getElementById('close-2');

cpt.onclick = function () {
	pt.style.display = 'none';
}
cpr.onclick = function () {
	pr.style.display = 'none';
}

window.onclick = function (evt) {
	if (evt.target == pt) pt.display = 'none';
	if (evt.target == pr) pr.display = 'none';
};
</script>
</html>