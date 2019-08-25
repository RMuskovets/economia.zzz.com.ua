<?php
interface SqlSaveable {
	// public function Html();
	// public function ToString();
	public static function LoadSQL($connection): array;
	public function SaveSQL($connection);
}

interface HtmlSaveable {
	public function Html(): string;
}

interface StringSaveable {
	public function ToString(): string;
}

interface Saveable extends SqlSaveable, HtmlSaveable, StringSaveable {

}

class Item implements Saveable
{
	private static $nomer = 1;
	private $name, $info, $url, $price, $file, $num, $html, $rozdil;
	public function __construct($name, $info, $url, $price, $file, $rozdil)
	{
		$this->name  = $name;
		$this->info  = $info;
		$this->url   = $url;
		$this->price = $price;
		$this->file  = $file;
		$this->num   = $nomer++;
		$this->html = $this->Html();
		$this->rozdil = $rozdil;
	}
	public function Html() {
		return '<div class="tovar">
			<div class="nomer">' . strval($this->num) . '</div>
			<div class="nazva"><a href="' . $this->url . '">' . $this->name . '</a></div>
			<div class="pict-section">
				<img src="' . $this->file . '" alt="">
				<div class="cina"' . strval($this->price) . '</div>
			</div>
			<div class="info">
				' . $this->info . '
			</div>
		</div>';
	}

	public function ToString() {
		return $this->html;
	}
	//    Table: TOVAR
	// id int     | rozdil int
	// name text  | cina float
	// opys text  | img text
	// href text  | 
	public static function LoadSQL($connection) {
		$query = 'SELECT * FROM TOVAR;';
		$res   = $connection->query($query);
		$a = array();
		while ($row = $res->fetch_assoc()) {
			$id = intval($row['id']);
			$rozdil = intval($row['rozdil']);
			$cina = floatval($row['cina']);
			$link = $row['href'];
			$name = $row['name'];
			$desc = $row['opys'];
			$img = $row['img'];
			$a[] = new Item($id, $name, $desc, $link, $cina, $img, $rozdil);
		}
		return $a;
	}
	public function SaveSQL($connection) {
		$name = $this->name; $opys = $this->info; $href = $this->url; $img = $this->file;
		$query = 'INSERT into TOVAR (name, opys, href, rozdil, cina, img) VALUES (' .
		implode(', ', array("'$name'", "'$href'", strval($this->rozdil)
			, strval($this->cina), "'$img'")) . ');';
		$connection->query($query);
	}
}
class KatalogRozdil implements Saveable
{
	private static $nomer = 8;
	private $name, $id, $html, $tovary;
	public function __construct($name)
	{
		$this->name = $name;
		$this->id = $nomer++;
		$this->tovary = array();
	}
	public function AddTovar($tovar) {
		$this->tovary[] = $tovar;
	}
	public function DelTovar() {
		return array_pop($this->tovary);
	}
	public function Html() {
		$head = '<div class="shop">
			<div class="rozdil">';
		$end = '</div>';
		$body = '';
		foreach ($this->tovary as $t) {
			$body .= $t->ToString();
		}
	}

	public function ToString() {
		return $this->Html();
	}

	public static function LoadSQL($connection) {
		$query = 'SELECT * FROM ROZDIL;';
		$a = array();
		$res = $connection->query($query);
		while ($row = $res->fetch_assoc()) {
			$name = $row['name'];
			$a[] = new KatalogRozdil($name);
		}
		return $a;
	}
	public function SaveSQL($connection) {
		$name = $this->name;
		$id = strval($this->id);
		$query = "INSERT INTO ROZDIL (id, name) VALUES ($id, '$name')";
		$connection->query($query);
	}
}

// $nomer = 1;
// function NewItem($name, $info, $url, $price=135, $file='/pict/boots.jpg') {
// 	return '<div class="tovar">
// 	<div class="nomer">' . strval($nomer++) . '</div>
// 	<div class="nazva"><a href="' . $url . '">' . $name . '</a></div>
// 	<div class="pict-section">
// 		<img src="' . $file . '" alt="">
// 		<div class="cina"' . strval($price) . '</div>
// 	</div>
// 	<div class="info">
// 		' . $info . '
// 	</div>
// </div>';
// }
// function NewRozdilKatalog($name, $tovary) {
// 	return '<div class="shop">
// 	<div class="rozdil"> ' . $name . '</div>' . $tovary . '</div>';
// }
// $pynkt_nomer = 8;
// function NewShemaPynkt($info) {
// 	return '<div class="pynkt">
// 	<div class="pict">'
// }
// // 164352123456rom