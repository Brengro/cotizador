<div class="row">
    <div class="col-md-6">
<table style="font-size:12px;">
    <tr>
    <td align="center"><strong>Cliente</strong></td>
    <td align="center"><strong>Origen</strong></td>
    <td align="center"><strong>Destino</strong></td>
    <td align="center"><strong>Fecha</strong></td>
    <td></td>
    <td></td>
     <td></td>
    </tr>
    <?
  include("config.php");
  		$link=mysql_connect($host,$user,$pass) or die("resultado=".urlencode(mysql_error()));
		mysql_select_db($bbdd,$link) or die("resultado=".urlencode(mysql_error()));
		$result=mysql_query("SELECT * from cotizacion2", $link);
		$r=1;
	while($row=mysql_fetch_row($result)){
		if($r==1){
			$r=2;
			$c='#c8c8c6';
		}else{
			$r=1;
			$c='#dbdbdb';
		}
		?>
         <tr style="background:<? echo $c; ?>; height: 48px; vertical-align:middle; border:#5A5959 solid 1px; ">
    <td style="vertical-align:middle;"><? echo $row[1]; ?></td>
    <td style="vertical-align:middle;"><? echo $row[2]; ?></td>
    <td style="vertical-align:middle;"><? echo $row[3]; ?></td>
    <td style="vertical-align:middle;"><? echo substr($row[8],8,2).'-'.substr($row[8],5,2).'-'.substr($row[8],0,4); ?></td>
     <td style="vertical-align:middle;"><a class="btn btn-primary" href="whatscotizacionpdf.php?c=<? echo $row[9]; ?>" target="_blank" class="boton2">whatsapp</a></td>
    <td style="vertical-align:middle;"><a class="btn btn-primary" href="cotizacionpdf.php?c=<? echo $row[9]; ?>" target="_blank">Cotizacion</a></td>
    <td style="vertical-align:middle;"><a class="btn bg-yellow" href="tareas.php?edit=1&c=<? echo $row[9]; ?>&nc=1">Editar</a></td>
    <td style="vertical-align:middle;"><a class="btn bg-red" href="tareas.php?c=<? echo $row[9]; ?>&elic=1" >Eliminar</a></td>
    <td style="vertical-align:middle;"><a class="btn bg-green" href="tareas.php?c=<? echo $row[9]; ?>&newsevicio=1">Generar Servicio</a></td>
    </tr> <?
		}
  ?>
    
    </table>
</div>
</div>