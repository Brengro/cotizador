<div class="row">
    <div class="col-md-6"> 
 <table>
    <tr style="background-color: #ccc">
    <td align="center"><strong>Nombre</strong></td>
    <td align="center"><strong>A. Paterno</strong></td>
    <td align="center"><strong>A. Materno</strong></td>
    <td align="center"><strong>Telefono</strong></td>
    <td align="center"><strong>Correo</strong></td>
    <td align="center"><strong>RFC</strong></td>
    <td align="center"><strong>Empresa</strong></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
	<?
	
	$linkpr=mysql_connect($host,$user,$pass) or die("resultado=".urlencode(mysql_error()));
	mysql_select_db($bbdd,$linkpr) or die("resultado=".urlencode(mysql_error()));
	$resultpr=mysql_query("SELECT * from proveedores", $linkpr);
    $f=0;
	while($rowpr=mysql_fetch_row($resultpr)){
	  if($f==0){

$f=1;
$c='#dadada;';
  }else{
$f=0;
$c='#ededeb;';
  }

  ?>
       <tr style="background-color: <? echo $c; ?>">
    <td><? echo $rowpr[1]; ?></td>
    <td><? echo $rowpr[2]; ?></td>
    <td><? echo $rowpr[3]; ?></td>
    <td><? echo $rowpr[4]; ?></td>
    <td><? echo $rowpr[5]; ?></td>
    <td><? echo $rowpr[6]; ?></td>
    <td><? echo $rowpr[7]; ?></td>
    <td><a href="tareas.php?p=1&edi=1&id=<? echo $rowpr[0]; ?>" class="btn btn-primary">Editar</a></td>
    <td><a href="tareas.php?p=1&eli=1&id=<? echo $rowpr[0]; ?>" class="btn bg-red">Eliminar</a></td>
    </tr> 
        <?
	}
	?></table>

    </div></div>