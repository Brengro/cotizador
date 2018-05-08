
<? session_start(); ?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Mudanzas - La Unión</title>
<style type="text/css">
body {
	font-family:"Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", "DejaVu Sans", Verdana, sans-serif;
	background-color: #000;
}

#bg {
	position: fixed;
	z-index: -1;
	top: 0;
	left: 0;
	width: 100%;
}

.div {
	background:url(images/fondito.png);
	width:300px;
	margin:7% auto;
	border-radius: 15px;
	padding: 10px;
	text-align:center;
	align-content:center;
}

.div h2{
	
	align-content:center;
	margin-left:auto;
	margin-right:auto;
	text-align:center;	
}

.boton{
	
	border: none;
 background: #3a7999;
 color: #f2f2f2;
 padding: 10px;
 font-size: 18px;
 border-radius: 5px;
 position: relative;
 box-sizing: border-box;
 transition: all 500ms ease;

		
}

.boton:hover {
 background: rgba(0,0,0,0);
 color: #3a7999;
 box-shadow: inset 0 0 0 3px #3a7999;
}



.titulo{
	font-size:18px;
	text-align:center;	
}

</style>
</head>
<? 
if(isset($_GET['c'])){
	session_destroy();
}
if(isset($_POST['entrar'])){
	$_SESSION['us']=0;

		if($_SESSION['us']==2){
		}else{
		include('config.php');
	$link=mysql_connect($host,$user,$pass) or die("resultado=".urlencode(mysql_error()));
	mysql_select_db($bbdd,$link) or die("resultado=".urlencode(mysql_error()));
	$result=mysql_query("SELECT count(id) from usuarios where  pwd='".md5($_POST['password'])."'", $link);

	$row=mysql_fetch_row($result);
	if($row[0]==1){
		$_SESSION['us']=1;
		$link2=mysql_connect($host,$user,$pass) or die("resultado=".urlencode(mysql_error()));
		mysql_select_db($bbdd,$link2) or die("resultado=".urlencode(mysql_error()));
		$result2=mysql_query("SELECT * from usuarios where  pwd='".md5($_POST['password'])."'", $link2);
		$row2=mysql_fetch_row($result2);
		$_SESSION['nombre_usuario']=$row2[3];
		$_SESSION['tipo_usuario']=$row2[4];
		$_SESSION['id_user']=$row2[0];
		
		?>
	
	<?
		
	}
	}
	
}
?>
<body>
<img src="images/fondo.jpg" alt="Fondo" id="bg">
<form id="form" name="form" action="" method="post">
<div class="div">
<img src="images/logo_png.png" style="width:250px; padding:10px;"/>
<!--<h2>Entrar</h2>-->
<hr>

<strong>Password:</strong>&nbsp;<input type="password" name="password" id="password"/>
<br><br>
<div class="g-recaptcha" data-sitekey="6Lfpm1UUAAAAAHe7FbbuAd3fcZUaFZ0JMIUiK6c0"></div>
<br>
<input class="boton" type="submit" value="Entrar" id="entrar" name="entrar"/>
</div>
</form>
</body>
</html>