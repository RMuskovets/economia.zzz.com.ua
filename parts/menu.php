<header>
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
			<li></li>
			<li><a href="ADMINKA.php" style="<?= isset($_SESSION['admin']) && $_SESSION['admin'] == 1 ? '' : 'display: none'; ?>">Адмінка</a></li>
		</menu>
	</div>
</header>