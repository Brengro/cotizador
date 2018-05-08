
<? session_start();
if(isset($_SESSION['tipo_usuario'])){
	
}else{
	?>
    <script language="JavaScript" type="text/javascript">
location.href='index.php';
</script>
    <?
}
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Mudanzas - La Unión</title>
  <!-- Tell the browser to be responsive to screen width -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- daterange picker -->
 <!-- <link rel="stylesheet" href="../../bower_components/bootstrap-daterangepicker/daterangepicker.css">-->
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <!--<link rel="stylesheet" href="../../plugins/iCheck/all.css">-->
  <!-- Bootstrap Color Picker -->
  <!--<link rel="stylesheet" href="../../bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="../../plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">



  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<!--<script src="http://momentjs.com/downloads/moment.min.js"></script>-->
<script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

<meta charset="UTF-8">

<style type="text/css">


.form-group{
width: 25%;
float: left;
padding: 5px; 

}

</style>
<link href="css/responsive.min.css" rel="stylesheet" />
<script type="text/javascript">
function cambiarconsejo(v){
	if(v.value!='--'){
		document.getElementById('tipoc').style.display = 'block';
	}else{
		document.getElementById('tipoc').style.display = 'none';
		document.getElementById('directorio').style.display = 'none';
		document.getElementById('archivos').style.display = 'none';
	}
}

function cambiar(v){
	
	switch(v.value){
	case '1':
	document.getElementById('directorio').style.display = 'block';
	document.getElementById('archivos').style.display = 'none';
	document.getElementById('archivos2').style.display = 'none';
	break;	
	case '4':
	document.getElementById('archivos2').style.display = 'block';
	document.getElementById('directorio').style.display = 'none';
	document.getElementById('archivos').style.display = 'none';
	break;	
	case '--':
	document.getElementById('directorio').style.display = 'none';
	document.getElementById('archivos').style.display = 'none';
	document.getElementById('archivos2').style.display = 'none';
	break;	
	default:
	document.getElementById('directorio').style.display = 'none';
	document.getElementById('archivos').style.display = 'block';
	document.getElementById('archivos2').style.display = 'none';
	
	}
}
</script>
<script>
function valida(e){
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla==8){
        return true;
    }
	if (tecla==46){
        return '.';
    }
        
    // Patron de entrada, en este caso solo acepta numeros
    patron =/[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}
</script>
<script type="text/javascript">
function movi(v){
$.ajax({
        url: 'formulariomovimientos.php',
        data: {id: v},
        type: 'POST',
        success: function(response) {
            $('#form-overlaymovimientos').html(response); // assuming the markup html is already done in PHP
        }
		 });
}


function movimov(v,y){
$.ajax({
        url: 'formulariomovimientos.php',
        data: ({id: v, idmov: y}),
        type: 'POST',
        success: function(response) {
            $('#form-overlaymovimientos').html(response); // assuming the markup html is already done in PHP
        }
		 });
}

function elimov(v,y){
$.ajax({
        url: 'formulariomovimientos.php',
        data: ({id: v, idmove: y, eli: 1}),
        type: 'POST',
        success: function(response) {
            $('#form-overlaymovimientos').html(response); // assuming the markup html is already done in PHP
        }
		 });
}
function cargadenuvo(v){
$.ajax({
        url: 'formulariomovimientos.php',
        data: ({id: v,}),
        type: 'POST',
        success: function(response) {
            $('#form-overlaymovimientos').html(response); // assuming the markup html is already done in PHP
        }
		 });
}


/*movi(<? echo $campo1; ?>);
		       $('#form-overlaymovimientos').lightbox("show");
			   
			   */
</script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<?	
	function clientes(){
	
	  $texto = '';

	include('config.php');
	$link=mysql_connect($host,$user,$pass) or die("resultado=".urlencode(mysql_error()));
	mysql_select_db($bbdd,$link) or die("resultado=".urlencode(mysql_error()));
	$result=mysql_query("SELECT distinct(cliente) from cotizacion2", $link);
	$r=1;
	while($row=mysql_fetch_row($result)){
              $texto .= '"' . $row[0] . '",';
	}
	  
	  return $texto;
}
$clientes = clientes();


function origen(){
	
	  $texto = '';

	include('config.php');
	$link=mysql_connect($host,$user,$pass) or die("resultado=".urlencode(mysql_error()));
	mysql_select_db($bbdd,$link) or die("resultado=".urlencode(mysql_error()));
	$result=mysql_query("SELECT distinct(origen) from cotizacion2", $link);
	$r=1;
	while($row=mysql_fetch_row($result)){
              $texto .= '"' . $row[0] . '",';
	}
	  
	  return $texto;
}
$origen = origen();


function destino(){
	
	  $texto = '';

	include('config.php');
	$link=mysql_connect($host,$user,$pass) or die("resultado=".urlencode(mysql_error()));
	mysql_select_db($bbdd,$link) or die("resultado=".urlencode(mysql_error()));
	$result=mysql_query("SELECT distinct(destino) from cotizacion2", $link);
	$r=1;
	while($row=mysql_fetch_row($result)){
              $texto .= '"' . $row[0] . '",';
	}
	  
	  return $texto;
}
$destino = destino();


?>

<script type="text/javascript">
$( function() {

// Variable que recoge el resultado de la consulta sobre la tabla Provincias, Jquery trabajará sobre este resultado para dinamizar el funcionamiento.
var availableTags = [<?php echo $clientes ?>];

    $( "#cliente" ).autocomplete({
      source: availableTags
    });


 var availableTags2 = [<?php echo $origen ?>];

    $( "#origen" ).autocomplete({
      source: availableTags2
    });
    
 var availableTags3 = [<?php echo $destino ?>];

    $( "#destino" ).autocomplete({
      source: availableTags3
    });
    

  } );
</script>
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="tareas.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>MUDANZAS</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>MUDANZAS</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      
    </nav>
  </header>
  <? include('sidebar-home.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Panel de Control - 
      
<? if(isset($_GET['verserv'])){ ?>
Servicio	<? } ?>

<? if(isset($_GET['verservp'])){ ?>
Pendientes	<? } ?>

<? if(isset($_GET['ter'])){ ?>
Terminos y Condiciones
	<? } ?>
	<? if(isset($_GET['p'])){ ?>
Proveedor
	<? } ?>
      </h1>
      <!--<ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>-->
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
     <div class="box-body">
          <div class="row">

  <? /* date_default_timezone_set('America/Mexico_City');  
				
			 require_once('calendar/tc_calendar.php');*/
			 ?>
       <? include('config.php'); ?>
       <? 

 if(isset($_GET['newsevicio'])){
	   	   $conexio = mysql_connect($host,$user,$pass) or die("resultado=".urlencode(mysql_error()));
			mysql_select_db($bbdd,$conexio) or die("resultado=".urlencode(mysql_error()));
		 	 $csql = "INSERT INTO servicio (cliente,origen,destino,tipo_mudanza,costo,costo2,muebles,fecha,clave,km,m3,kmextra,empaquec,emplayet,cajacv,cajacr,desempaqueg,empaquem,seguro,otros,extras) select cliente,origen,destino,tipo_mudanza,costo,costo2,muebles,'".date('Y-m-d H:i:s')."',clave,km,m3,kmextra,empaquec,emplayet,cajacv,cajacr,desempaqueg,empaquem,seguro,otros,extras from cotizacion2 where clave='".$_GET['c']."'";   
		 	
			mysql_query($csql)or die("resultado=".urlencode(mysql_error()));

			 $csql = "delete  from cotizacion2 where clave='".$_GET['c']."'";    
			mysql_query($csql)or die("resultado=".urlencode(mysql_error()));
		?>
<script type="text/javascript">
location.href='tareas.php?verserv=1&c=<? echo $_GET['c']; ?>';
</script>
		<? 
	   }

if(isset($_GET['elim'])){
	
		  $conexio = mysql_connect($host,$user,$pass) or die("resultado=".urlencode(mysql_error()));
		mysql_select_db($bbdd,$conexio) or die("resultado=".urlencode(mysql_error()));
		  $csql = "delete from servicios where id=".$_GET['id'];  
			mysql_query($csql)or die("resultado=".urlencode(mysql_error()));

			$conexio = mysql_connect($host,$user,$pass) or die("resultado=".urlencode(mysql_error()));
		mysql_select_db($bbdd,$conexio) or die("resultado=".urlencode(mysql_error()));
		  $csql = "delete from ingresosyegresos where id_mudanza=".$_GET['id'];  
			mysql_query($csql)or die("resultado=".urlencode(mysql_error()));


		   ?>
<script language="JavaScript" type="text/javascript">
location.href='tareas.php';
</script>

<?
	}

	   if(isset($_GET['abrir'])){
	   	switch($_GET['abrir']){
	   		case 2:
?><a id="pdfc" href="whatscotizacionpdf.php?c=<? echo $_GET['c']; ?>" target="_blank"></a>
        <script type="text/javascript">
		document.getElementById("pdfc").click();
		document.getElementById("pdfc").style.display='none';
		</script>
        <? 
	   		break;
	   		case 3:
	   		?><a id="pdfc" href="serviciopdf.php?c=<? echo $_GET['c']; ?>" target="_blank"></a>
        <script type="text/javascript">
		document.getElementById("pdfc").click();
		document.getElementById("pdfc").style.display='none';
		</script>
        <? 
	   		break;

	   	}
		  
	   }


	   
	   if(isset($_POST['guardarcotizacion'])){
	
			$c1=$_POST['cliente'];
		   $c2=$_POST['origen'];
		   $c3=$_POST['destino'];
		   $c4=$_POST['tipo_mudanza'];
		   $c5=$_POST['costo'];
		   $c6=$_POST['costo2'];
		   $c7=nl2br($_POST['muebles']);
		   $c8=date('Y-m-d H:i:s');
		   $c9=md5(date('Y-m-d H:i:s').$c1.$c2.$c3);
		   $c10=$_POST['km'];
		   $c11=$_POST['m3'];
		   $c12=$_POST['kmextra'];
		   $c13=$_POST['empaquec'];
		   $c14=$_POST['emplayet'];
		   $c15=$_POST['cajacv'];
		   $c16=$_POST['cajacr'];
		   $c17=$_POST['desempaqueg'];
		   $c18=$_POST['empaquem'];
		   $c19=$_POST['seguro'];
		   $c20=$_POST['otros'];
		   $c21=($c13*160)+($c14*400)+($c15*300)+($c16*160)+($c17*80)+($c18*75)+($c19 * .025)+($c20*2500);
		   
		  
		   
		    $conexio = mysql_connect($host,$user,$pass) or die("resultado=".urlencode(mysql_error()));
	mysql_select_db($bbdd,$conexio) or die("resultado=".urlencode(mysql_error()));
		  $csql = "INSERT INTO cotizacion2(cliente,origen,destino,tipo_mudanza,costo,costo2,muebles,fecha,clave,km,m3,kmextra,empaquec,emplayet,cajacv,cajacr,desempaqueg,empaquem,seguro,otros,extras) VALUES ('".$c1."','".$c2."','".$c3."','".$c4."','".$c5."','".$c6."','".$c7."','".$c8."','".$c9."','".$c10."','".$c11."','".$c12."','".$c13."','".$c14."','".$c15."','".$c16."','".$c17."','".$c18."','".$c19."','".$c20."','".$c21."')";  
		   
			mysql_query($csql)or die("resultado=".urlencode(mysql_error()));

		   ?>
<script language="JavaScript" type="text/javascript">
	
location.href='tareas.php?cs=1&c=<? echo $c9; ?>"&abrir=2';
</script>

<?
		   
	   }

	   if(isset($_POST['editarcotizacion'])){
		  
$c1=$_POST['cliente'];
		   $c2=$_POST['origen'];
		   $c3=$_POST['destino'];
		   $c4=$_POST['tipo_mudanza'];
		   $c5=$_POST['costo'];
		   $c6=$_POST['costo2'];
		   $c7=nl2br($_POST['muebles']);
		  
		   $c10=$_POST['km'];
		   $c11=$_POST['m3'];
		   $c12=$_POST['kmextra'];
		   $c13=$_POST['empaquec'];
		   $c14=$_POST['emplayet'];
		   $c15=$_POST['cajacv'];
		   $c16=$_POST['cajacr'];
		   $c17=$_POST['desempaqueg'];
		   $c18=$_POST['empaquem'];
		   $c19=$_POST['seguro'];
		   $c20=$_POST['otros'];
		   $c21=($c13*160)+($c14*400)+($c15*300)+($c16*160)+($c17*80)+($c18*75)+($c19 * .025)+($c20*2500);
		   
		 
			
		    $conexio = mysql_connect($host,$user,$pass) or die("resultado=".urlencode(mysql_error()));
	mysql_select_db($bbdd,$conexio) or die("resultado=".urlencode(mysql_error()));
	
		  $csql = "update cotizacion2 set cliente='".$c1."',origen='".$c2."',destino='".$c3."',tipo_mudanza='".$c4."',costo='".$c5."',costo2='".$c6."',muebles='".$c7."',km='".$c10."',m3='".$c11."',kmextra='".$c12."',empaquec='".$c13."',emplayet='".$c14."',cajacv='".$c15."',cajacr='".$c16."',desempaqueg='".$c17."',empaquem='".$c18."',seguro='".$c19."',otros='".$c20."',extras='".$c21."' where clave='".$_GET['c']."'";  
		   
			mysql_query($csql)or die("resultado=".urlencode(mysql_error()));

		   ?>
<script language="JavaScript" type="text/javascript">
location.href='tareas.php?cs=1&c=<? echo $_POST['cla']; ?>"&abrir=2';
</script>
<?		   
	   }
	   
	   if(isset($_POST['guardarnservicio'])){
		   $c1=$_POST['origen'];
		   $c2=$_POST['destino'];
		   $c3=$_POST['tipo_mudanza'];
		   $c4=$_POST['servicio'];
		   $c5=$_POST['tiempo_entrega'];
		   $c6=$_POST['proveedor'];
		   $c7=$_POST['d_recolecta'];
		   $c8=$_POST['recibe_r'];
		   $c9=$_POST['d_entrega'];
		   $c10=$_POST['e_recibe'];
		   $c11=$_POST['horario'];
		   $c12=nl2br($_POST['lista']);
		   $c13=nl2br($_POST['indicaciones']);
		   $c14=date('Y-m-d H:i:s');
		   $c15=$_POST['anio'].'-'.$_POST['mes'].'-'.$_POST['dia'];
		   $c16=$_POST['costocliente'];
		   $c17=$_POST['costoproveedor'];
		   $c18=$_POST['utilidadflete'];
		   $c19=$_POST['factura'];
		   $c20=$_POST['no_mudanza'];
		   $c21=md5($_POST['origen'].$_POST['destino'].$_POST['tipo_mudanza'].$_POST['servicio'].date('Y-m-d H:i:s'));
		   $c22=$_POST['incluye'];
		   $c23=$_POST['no_incluye'];
		    $conexio = mysql_connect($host,$user,$pass) or die("resultado=".urlencode(mysql_error()));
	mysql_select_db($bbdd,$conexio) or die("resultado=".urlencode(mysql_error()));
		  $csql = "INSERT INTO servicios(origen,destino,tipo_mudanza,servicio,tiempo_entrega,proveedor,donde_recolecta,r_recibe,donde_entrega,e_recibe,horario,lista,indicaciones,fecha,fecha_m,costo_cliente,costo_proveedor,utilidad_flete,factura,no_mudanza,clave,incluye,no_incluye) VALUES ('".$c1."','".$c2."','".$c3."','".$c4."','".$c5."','".$c6."','".$c7."','".$c8."','".$c9."','".$c10."','".$c11."','".$c12."','".$c13."','".$c14."','".$c15."','".$c16."','".$c17."','".$c18."','".$c19."','".$c20."','".$c21."','".$c22."','".$c23."')";  
			mysql_query($csql)or die("resultado=".urlencode(mysql_error()));
		   ?>
<script language="JavaScript" type="text/javascript">
	
location.href='tareas.php?c=<? echo $c21; ?>"&abrir=3';
</script>
<?   
	   }

	   if(isset($_POST['editarservicio'])){
		   $c1=$_POST['origen'];
		   $c2=$_POST['destino'];
		   $c3=$_POST['tipo_mudanza'];
		   $c4=$_POST['servicio'];
		   $c5=$_POST['tiempo_entrega'];
		   $c6=$_POST['proveedor'];
		   $c7=$_POST['d_recolecta'];
		   $c8=$_POST['recibe_r'];
		   $c9=$_POST['d_entrega'];
		   $c10=$_POST['e_recibe'];
		   $c11=$_POST['horario'];
		   $c12=nl2br($_POST['lista']);
		   $c13=nl2br($_POST['indicaciones']);
		   $c14=date('Y-m-d H:i:s');
		   $c15=$_POST['anio'].'-'.$_POST['mes'].'-'.$_POST['dia'];
		   $c16=$_POST['costocliente'];
		   $c17=$_POST['costoproveedor'];
		   $c18=$_POST['utilidadflete'];
		   $c19=$_POST['factura'];
		   $c20=$_POST['no_mudanza'];
		   $c21=md5($_POST['origen'].$_POST['destino'].$_POST['tipo_mudanza'].$_POST['servicio'].date('Y-m-d H:i:s'));
		   $c22=$_POST['incluye'];
		   $c23=$_POST['no_incluye'];
		   $clave=$_POST['c'];
		    $conexio = mysql_connect($host,$user,$pass) or die("resultado=".urlencode(mysql_error()));
	mysql_select_db($bbdd,$conexio) or die("resultado=".urlencode(mysql_error()));
		  $csql = "update servicios set origen='".$c1."',destino='".$c2."',tipo_mudanza='".$c3."',servicio='".$c4."',tiempo_entrega='".$c5."',proveedor='".$c6."',donde_recolecta='".$c7."',r_recibe='".$c8."',donde_entrega='".$c9."',e_recibe='".$c10."',horario='".$c11."',lista='".$c12."',indicaciones='".$c13."',fecha='".$c14."',fecha_m='".$c15."',costo_cliente='".$c16."',costo_proveedor='".$c17."',utilidad_flete='".$c18."',factura='".$c19."',no_mudanza='".$c20."',incluye='".$c21."',no_incluye='".$c22."' where clave='".$clave."'";  
			mysql_query($csql)or die("resultado=".urlencode(mysql_error()));
		   ?>
<script language="JavaScript" type="text/javascript">
location.href='tareas.php';
</script>
<?   
	   }
	   
	   if(isset($_GET['elim'])){
		   $conexio = mysql_connect($host,$user,$pass) or die("resultado=".urlencode(mysql_error()));
		mysql_select_db($bbdd,$conexio) or die("resultado=".urlencode(mysql_error()));
		  $csql = "delete from generales where id=".$_GET['id'];  
		   mysql_query($csql)or die("resultado=".urlencode(mysql_error()));
		   $conexio = mysql_connect($host,$user,$pass) or die("resultado=".urlencode(mysql_error()));
		mysql_select_db($bbdd,$conexio) or die("resultado=".urlencode(mysql_error()));
		  $csql = "delete from ingresosyegresos where id_mudanza=".$_GET['id'];  
		   mysql_query($csql)or die("resultado=".urlencode(mysql_error()));
		   ?>
<script language="JavaScript" type="text/javascript">
location.href='tareas.php';
</script>
<?
	   }
	   
	   if(isset($_POST['guardar'])){
		    
		   if($_POST['no']!='' and $_POST['origenydestino']!=''){
	
		  $conexio = mysql_connect($host,$user,$pass) or die("resultado=".urlencode(mysql_error()));
	mysql_select_db($bbdd,$conexio) or die("resultado=".urlencode(mysql_error()));
		  
			$campo1=$_POST['no'];
			$campo2=$_POST['anio'].'-'.$_POST['mes'].'-'.$_POST['dia'];
			$campo3=$_POST['origenydestino'];
			$campo4=$_POST['costocliente'];
			$campo5=$_POST['costoproveedor'];
			$campo6=$_POST['utilidadflete'];
			$campo7=$_POST['factura'];
			
			$csql = "INSERT INTO generales(no,fecha_mud,origen_y_destino,costo_cliente,costo_proveedor,utilidad_flete,facturado) VALUES ('".$campo1."','".$campo2."','".$campo3."','".$campo4."','".$campo5."','".$campo6."','".$campo7."')";  
		   
			mysql_query($csql)or die("resultado=".urlencode(mysql_error()));
		   ?>
<script language="JavaScript" type="text/javascript">
location.href='tareas.php';
</script>

<?
		   }
	   }
	   
	   
	   ?>
       
        <? include('formulario.php'); ?>
        
        <div id="form-overlaymovimientos" class="hidden" style="border-radius:8px;">
        
        </div>




	<a id="movim" href="#"  data-lightbox-target="#form-overlaymovimientos" data-lightbox-fit-viewport="false"></a>
<? if(isset($_GET['p']) || isset($_GET['n']) || isset($_GET['nc']) || isset($_GET['cs'])){ }else{ ?>
<? //include('tablainicio.php'); ?>
<? } ?>



<? 

if(isset($_GET['elic'])){
	
		  $conexio = mysql_connect($host,$user,$pass) or die("resultado=".urlencode(mysql_error()));
		mysql_select_db($bbdd,$conexio) or die("resultado=".urlencode(mysql_error()));
		  $csql = "delete from cotizacion where clave='".$_GET['c']."'";  
			mysql_query($csql)or die("resultado=".urlencode(mysql_error()));
		   ?>
<script language="JavaScript" type="text/javascript">
location.href='tareas.php?nc=1';
</script>

<?
	}


if(isset($_GET['p'])){
	
	if(isset($_POST['guardar'])){
	
		$campo1=$_POST['nombre'];
		$campo2=$_POST['paterno'];
		$campo3=$_POST['materno'];
		$campo4=$_POST['telefono'];
		$campo5=$_POST['correo'];
		$campo6=$_POST['rfc'];
		$campo7=$_POST['empresa'];
	
		  $conexio = mysql_connect($host,$user,$pass) or die("resultado=".urlencode(mysql_error()));
		mysql_select_db($bbdd,$conexio) or die("resultado=".urlencode(mysql_error()));
		  $csql = "INSERT INTO proveedores(nombre,paterno,materno,telefono,correo,rfc,empresa) VALUES ('".$campo1."','".$campo2."','".$campo3."','".$campo4."','".$campo5."','".$campo6."','".$campo7."')";  
			mysql_query($csql)or die("resultado=".urlencode(mysql_error()));
		   ?>
<script language="JavaScript" type="text/javascript">
location.href='tareas.php?p=1';
</script>

<?
	}
	
	if(isset($_POST['editar'])){
	
		$campo1=$_POST['nombre'];
		$campo2=$_POST['paterno'];
		$campo3=$_POST['materno'];
		$campo4=$_POST['telefono'];
		$campo5=$_POST['correo'];
		$campo6=$_POST['rfc'];
		$campo7=$_POST['empresa'];
	
		  $conexio = mysql_connect($host,$user,$pass) or die("resultado=".urlencode(mysql_error()));
		mysql_select_db($bbdd,$conexio) or die("resultado=".urlencode(mysql_error()));
		  $csql = "update proveedores set nombre='".$campo1."',paterno='".$campo2."',materno='".$campo3."',telefono='".$campo4."',correo='".$campo5."',rfc='".$campo6."',empresa='".$campo7."' where id=".$_POST['id'];  
			mysql_query($csql)or die("resultado=".urlencode(mysql_error()));
		   ?>
<script language="JavaScript" type="text/javascript">
location.href='tareas.php?p=1';
</script>

<?
	}
	
	if(isset($_GET['eli'])){
	
		  $conexio = mysql_connect($host,$user,$pass) or die("resultado=".urlencode(mysql_error()));
		mysql_select_db($bbdd,$conexio) or die("resultado=".urlencode(mysql_error()));
		  $csql = "delete from proveedores where id=".$_GET['id'];  
			mysql_query($csql)or die("resultado=".urlencode(mysql_error()));
		   ?>
<script language="JavaScript" type="text/javascript">
location.href='tareas.php?p=1';
</script>

<?
	}
	$ini=0;
	
	
	if(isset($_GET['edi'])){
		$ini=1;
		include('edi1.php');
	}else{
		$ini=1;
		include('edi2.php');
	}
	?>
    <br><br>
   <?
   $ini=1;
	include('tablaproveedores.php'); 
} ?>


<? if(isset($_GET['n'])){ 
	if(isset($_GET['edit'])){ 
		$ini=1;
include('editservicio.php');
		?>


	<? }else{
		$ini=1;
		include('nuevoservicio.php');
	?>

<?	} } ?>
<? if(isset($_GET['cs'])){ 
$ini=1;
	?>
  <? include('tablacotizacion.php'); ?>
<? }else{ ?>
<? if(isset($_GET['nc'])){ ?>
<? if(isset($_GET['edit'])){ ?>

<? 
$ini=1;
include('editcotizacion.php'); ?>

<? } else{ ?>

<?
$ini=1;
 include('nc.php'); ?>

    <? } ?>
    
    <? } ?>

<?	} ?>



<? if(isset($_GET['verserv'])){ ?>
<?
$ini=1;
 include('verservicio.php'); ?>
	<? } ?>

	<? if(isset($_GET['verservp'])){ ?>
<?
$ini=1;
if(isset($_GET['eli'])){
$ini=0;
$conexio = mysql_connect($host,$user,$pass) or die("resultado=".urlencode(mysql_error()));
		mysql_select_db($bbdd,$conexio) or die("resultado=".urlencode(mysql_error()));
		  $csql = "delete from viaweb where id=".$_GET['c'];  
			mysql_query($csql)or die("resultado=".urlencode(mysql_error()));

}else{
	include('verserviciop.php'); 
}
 ?>
	<? } ?>

<? if(isset($_GET['ter'])){ ?>
<? 
$ini=1;
include('terminos.php'); ?>
	<? } ?>

<? if(isset($_GET['ser'])){ ?>
  <? 
$ini=1;
  include('tablaservicios.php'); ?>
<? } ?>

<? if($ini==0){ ?>
  <? 
$ini=0;
  include('tablapeticiones.php'); ?>
<? } ?>

<script type="text/javascript">
document.getElementById('tipoc').style.display = 'none';
document.getElementById('directorio').style.display = 'none';
document.getElementById('archivos').style.display = 'none';
document.getElementById('archivos2').style.display = 'none';
</script>
<!--
<script
			  src="https://code.jquery.com/jquery-2.1.0.js"
			  integrity="sha256-D6d1KSapXjq2tfZ6Ie9AYozkRHyB3fT2ys9mO2+4Wvc="
			  crossorigin="anonymous"></script>

<script src="js/responsive.min.js"></script>

-->
<? 

if(isset($_POST['actualizarmov'])){
	$conexio = mysql_connect($host,$user,$pass) or die("resultado=".urlencode(mysql_error()));
	mysql_select_db($bbdd,$conexio) or die("resultado=".urlencode(mysql_error()));
		  
			$campo1=$_POST['id_movi'];
			$campo2=$_POST['referencia'];
			$campo3=$_POST['anio'].'-'.$_POST['mes'].'-'.$_POST['dia'];
			$campo4=$_POST['tipo'];
			if($campo4=='BANCO'){
				$campo5=$_POST['bancob'];
			$campo6=$_POST['cantidadb'];
			}else{
				$campo5=$_POST['bancoe'];
			$campo6=$_POST['cantidade'];
			}
			
			$campo7=$_SESSION['id_user'];
			
			$csql = "update ingresosyegresos set referencia=".$campo2.",fecha='".$campo3."',tipo='".$campo4."',banco='".$campo5."',cantidad='".$campo6."',usuario='".$campo7."' where id=".$campo1;  
			mysql_query($csql)or die("resultado=".urlencode(mysql_error()));
		   ?>
<script language="JavaScript" type="text/javascript">
movi(<? echo $_POST['id_general']; ?>);
document.getElementById('movim').click();
</script>
<?
}

if(isset($_POST['guardarmov'])){
		  
		  $conexio = mysql_connect($host,$user,$pass) or die("resultado=".urlencode(mysql_error()));
	mysql_select_db($bbdd,$conexio) or die("resultado=".urlencode(mysql_error()));
		  
			$campo1=$_POST['id_general'];
			$campo2=$_POST['referencia'];
			$campo3=$_POST['anio'].'-'.$_POST['mes'].'-'.$_POST['dia'];
			$campo4=$_POST['tipo'];
			if($campo4=='BANCO'){
				$campo5=$_POST['bancob'];
			$campo6=$_POST['cantidadb'];
			}else{
				$campo5=$_POST['bancoe'];
			$campo6=$_POST['cantidade'];
			}
			
			$campo7=$_SESSION['id_user'];
			
			$csql = "INSERT INTO ingresosyegresos(id_mudanza,referencia,fecha,tipo,banco,cantidad,usuario) VALUES (".$campo1.",".$campo2.",'".$campo3."','".$campo4."','".$campo5."','".$campo6."','".$campo7."')";  
		   
			mysql_query($csql)or die("resultado=".urlencode(mysql_error()));
		   ?>
<script language="JavaScript" type="text/javascript">
movi(<? echo $campo1; ?>);
document.getElementById('movim').click();
</script>
<?
	   }
	   ?>
 </div>
            <!-- /.box-body -->
           
          </div>
          <!-- /.box -->

        

      </div>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      
    </div>
    <strong>Copyright &copy; </strong>Mudanzas La Union
  </footer>

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<script type="text/javascript">
	
	$(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

$('#datepicker').datepicker({
		autoclose: true,
    format: 'dd/mm/yyyy'
	} )
	
    $('#ffactura1').datepicker({
		autoclose: true
	} )

    $('#ffactura2').datepicker({
    autoclose: true
  } )
  
  
    $('#fcomprobante').datepicker({
    autoclose: true
  } )
  

$('.timepicker').timepicker({
      showInputs: false
    })
  })

	function valida(e){
    tecla = (document.all) ? e.keyCode : e.which;
  
    //Tecla de retroceso para borrar, siempre la permite
    if (tecla==8){
        return true;
    }
  if (tecla==46){
        return '.';
    }
  if (tecla==58){
        return ':';
    }
  
     if (tecla==0){
       
    }   
    // Patron de entrada, en este caso solo acepta numeros
    patron =/[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}
</script>


<!-- ./wrapper -->


<!--<script src="bower_components/jquery/dist/jquery.min.js"></script>-->

<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<script src="bower_components/select2/dist/js/select2.full.min.js"></script>

<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>

<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>

<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<script src="bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>

<script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>

<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>

<script src="plugins/iCheck/icheck.min.js"></script>

<script src="bower_components/fastclick/lib/fastclick.js"></script>

<script src="dist/js/adminlte.min.js"></script>


<script src="dist/js/demo.js"></script>


<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- CK Editor -->
<script src="bower_components/ckeditor/ckeditor.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>
</body>
</html>
