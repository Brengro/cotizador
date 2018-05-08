<?php
function mes($m){
switch($m){
	case '01':
	return 'Enero';
	break;
	case '02':
	return 'Febrero';
	break;
	case '03':
	return 'Marzo';
	break;
	case '04':
	return 'Abril';
	break;
	case '05':
	return 'Mayo';
	break;
	case '06':
	return 'Junio';
	break;
	case '07':
	return 'Julio';
	break;
	case '08':
	return 'Agosto';
	break;
	case '09':
	return 'Septimbre';
	break;
	case '10':
	return 'Octubre';
	break;
	case '11':
	return 'Noviembre';
	break;
	case '12':
	return 'Diciembre';
	break;
}

}
 ob_start();

?>
<style type="text/css">
body {
	font-size: 9px;
}
p {
	font-size: 9px;
}
</style>

<page>
<?
 include('config.php');
$link=mysql_connect($host,$user,$pass) or die("resultado=".urlencode(mysql_error()));
	mysql_select_db($bbdd,$link) or die("resultado=".urlencode(mysql_error()));
	$result=mysql_query("SELECT * from servicio where clave='".$_GET['c']."'", $link);
	$row=mysql_fetch_row($result);
?>
<div style="width:735px; background-color:#44546a; padding:10px;  font-size: 9px;">
<div style="background-color:#fff;">
<br>
<table style="width:735px;">
	<tr>
<td style="width:580px;">
<div style=" background-color: #44536a; padding-top: 5px; padding-bottom: 5px;  width:580px;  font-size: 9px; color:#fff; text-align: center;">ORDEN DE SERVICIO PARA CLIENTE</div><br>
<table style="border:#000000 solid 1px;  width:580px; font-size: 8px;" border="1" cellspacing="0" >
<tr>
	<td style=" background-color: #44536a; color: #fff;" align="center">PARA:</td>
	<td><? echo $row[1]; ?></td>
	<td style=" background-color: #ed2024; color: #fff;" align="center">PAGOS</td>
	<td style=" background-color: #ed2024; color: #fff;" align="center"></td>
</tr>
<tr>
	<td style=" background-color: #44536a; color: #fff;" align="center">RESPONSABLE DE LA MUDANZA:</td>
	<td>AZUCENA PEÑA</td>
	<td style=" background-color: #44536a; color: #fff;" align="center">TOTAL DE LA MUDANZA:</td>
	<td>$ <?
if($row[4]=='Exclusivo'){
$total=$row[5]+$row[21];

}else{
$total=$row[6]+$row[21];
}
echo money_format('%(#10n',$total);
	?></td>
</tr>
<tr>
	<td style=" background-color: #44536a; color: #fff;" align="center">TEL:</td>
	<td>4421270514</td>
	<td style=" background-color: #44536a; color: #fff;" align="center">ANTICIPO:</td>
	<td>$ <? echo money_format('%(#10n',$row[34]); ?></td>
</tr>
<tr>
	<td style=" background-color: #44536a; color: #fff;" align="center">EMPRESA:</td>
	<td>LA UNION MUDANZAS</td>
	<td style=" background-color: #44536a; color: #fff;" align="center">A LA CARGA:</td>
	<td>$ <? echo money_format('%(#10n',$row[35]); ?></td>
</tr>
<tr>
	<td style=" background-color: #44536a; color: #fff;" align="center">FECHA DEL SERVICIO:</td>
	<td><? echo substr($row[22],8,2).'/'.substr($row[22],5,2).'/'.substr($row[22],0,4); ?></td>
	<td style=" background-color: #44536a; color: #fff;" align="center">ANTES DE LA DESCARGA</td>
	<td>$ <? echo money_format('%(#10n',$row[36]); ?></td>
</tr>
<tr>
	<td style=" background-color: #44536a; color: #fff;" align="center">HORA DEL SERVICIO:</td>
	<td><? echo $row[23]; ?></td>
	<td style=" background-color: #44536a; color: #fff;" align="center">FORMA DE PAGO</td>
	<td><? echo $row[37]; ?></td>
</tr>
</table><br>
<div style=" background-color: #ed2024;  padding-top: 5px; padding-bottom: 5px;  width:580px;   font-size: 9px; color:#fff; text-align: center;">DATOS GENERALES DEL SERVICIO</div>
<table style="border:#000000 solid 1px; width:100%; font-size: 8px;" border="1" cellspacing="0" >
<tr>
	<td style=" background-color: #44536a; color: #fff;" align="center">ORIGEN</td>
	<td style=" background-color: #44536a; color: #fff;" align="center">DESTINO</td>
	<td style=" background-color: #44536a; color: #fff;" align="center">M3</td>
	<td style=" background-color: #44536a; color: #fff;" align="center">TIPO DE MUDANZA</td>
	<!--<td style=" background-color: #44536a; color: #fff;" align="center">SERVICIO</td>-->
	<td style=" background-color: #44536a; color: #fff;" align="center">TIEMPO APROX. DE ENTREGA</td>
</tr>
<tr>
	<td align="center"><? echo $row[2]; ?></td>
	<td align="center"><? echo $row[3]; ?></td>
	<td align="center"><? echo $row[11]; ?></td>
	<td align="center"><? echo $row[4]; ?></td>
	<!--<td align="center"><? echo $row[37]; ?></td>-->
	<td align="center"><? echo $row[38]; ?></td>
</tr>
</table>
<br>
<table style="border:#000000 solid 1px; width:580px; font-size: 8px;" border="1" cellspacing="0" >
<tr>
	<td style="  background-color: #ed2024; color: #fff;" align="center">DATOS DE LA MUDANZA</td>
	<td style="  background-color: #ed2024; color: #fff;" align="center">SE SOLICITA EXTRA</td>
	</tr>
<tr>
	<td >
		<div style=" background-color: #44536a;  padding-top: 5px; padding-bottom: 5px; width:290px;  font-size: 9px; color:#fff; text-align: center;">DIRECCION DE CARGA</div>
<table style="border:#000000 solid 1px; width:290px;; font-size: 8px;" border="1" cellspacing="0">
<tr>
	<td>CALLE Y NUMERO</td>
	<td><? echo $row[24]; ?></td>
</tr>
<tr>
	<td>COLONIA</td>
	<td><? echo $row[25]; ?></td>
</tr>
<tr>
	<td>REFERENCIA PARA LLEGAR</td>
	<td><? echo $row[26]; ?></td>
</tr>
<tr>
	<td>NOM. Y TEL. ENTREGA</td>
	<td><? echo $row[27].' '.$row[28]; ?></td>
</tr>
</table>
<div style=" background-color: #44536a;  padding-top: 5px; padding-bottom: 5px; width:290px;  font-size: 9px; color:#fff; text-align: center;">DIRECCION DE DESCARGA</div>
<table style="border:#000000 solid 1px; width:290px; font-size: 8px;" border="1" cellspacing="0">
<tr>
	<td>CALLE Y NUMERO</td>
	<td><? echo $row[29]; ?></td>
</tr>
<tr>
	<td>COLONIA</td>
	<td><? echo $row[30]; ?></td>
</tr>
<tr>
	<td>REFERENCIA PARA LLEGAR</td>
	<td><? echo $row[31]; ?></td>
</tr>
<tr>
	<td>NOM. Y TEL. ENTREGA</td>
	<td><? echo $row[32].' '.$row[33]; ?></td>
</tr>
</table>


	</td>
	<td valign="top">

<table style="border:#000000 solid 1px;  width:290px; font-size: 8px;" border="1" cellspacing="0">
	<? if($row[12]!=''){ ?>
<tr>
	<td style=" background-color: #44536a; color:#fff; ">KM EXTRA</td>
	<td width="100"><? echo $row[12]; ?></td>
</tr>
<? } ?>
<? if($row[13]!=''){ ?>
<tr>
	<td style=" background-color: #44536a; color:#fff; ">EMPAQUE CAJAS</td>
	<td width="100"><? echo $row[13]; ?></td>
</tr>
<? } ?>
<? if($row[14]!=''){ ?>
<tr>
	<td style=" background-color: #44536a; color:#fff; ">EMPLAYE TOTAL</td>
	<td width="100"><? echo $row[14]; ?></td>
</tr>
<? } ?>
<? if($row[15]!=''){ ?>
<tr>
	<td style=" background-color: #44536a; color:#fff; ">CAJA CLOSET VENTA</td>
	<td width="100"><? echo $row[15]; ?></td>
</tr>
<? } ?>
<? if($row[16]!=''){ ?>
<tr>
	<td style=" background-color: #44536a; color:#fff; ">CAJA CLOSET RENTA</td>
	<td width="100"><? echo $row[16]; ?></td>
</tr>
<? } ?>
<? if($row[17]!=''){ ?>
<tr>
	<td style=" background-color: #44536a; color:#fff; ">DESEMPAQUE A GRANEL</td>
	<td width="100"><? echo $row[17]; ?></td>
</tr>
<? } ?>
<? if($row[18]!=''){ ?>
<tr>
	<td style=" background-color: #44536a; color:#fff; ">EMPAQUE DE MUEBLES</td>
	<td width="100"><? echo $row[18]; ?></td>
</tr>
<? } ?>
<? if($row[19]!=''){ ?>
<tr>
	<td style=" background-color: #44536a; color:#fff; ">REGURO</td>
	<td width="100">$ <? echo money_format('%(#10n',$row[19]); ?></td>
</tr>
<? } ?>
<? if($row[20]!=''){ ?>
<tr>
	<td style=" background-color: #44536a; color:#fff; ">OTROS</td>
	<td width="100"><? echo $row[20]; ?></td>
</tr>
<? } ?>

</table>
<BR>
<div style=" background-color: #44536a; padding-top: 5px; padding-bottom: 5px; width:290px;  font-size: 9px; color:#fff; text-align: center;">OBSERVACIONES</div>
<br>
<div style="  padding-top: 5px; padding-bottom: 5px;   width:290px;  font-size: 9px; color:#ed2024; text-align: center;"><? echo $row[39]; ?></div>

	</td>
	
</tr>
</table><br>
<table style="border:#000000 solid 1px; width:100%; font-size: 8px;" border="1" cellspacing="0" >
<tr>
	<td style=" background-color: #ed2024; color: #fff;" align="center">LISTA DE MUEBLES PROPORCIONADOS POR EL CLIENTE</td>
</tr>
<tr>
	<td style="padding: 5px;"><? echo $row[7]; ?></td>
</tr>
</table>

</td><td style="width:145px;" valign="top" >
	<div style="margin-left: auto; padding:10px; margin-left: 20px;  font-size: 9px;"><? echo date('d').' de '.mes(date('m')).' del '.date('Y'); ?></div>
<img src="images/imgpdf.jpg" style="width:145px;"/>
<br><br>
<div style=" padding-top: 5px; padding-bottom: 5px;   font-size: 9px; color:#ed2024; text-align: center;">“NO TRASLADAMOS ANIMALES O PERSONAS AJENAS A LA EMPRESA DENTRO DE NUESTRAS UNIDADES”</div>
</td>
</tr>
</table>

<div style="padding: 3px 3px 3px 30px; background-color: #44536a; color:#fff; ">
<a style="margin-right: auto; margin-left: auto; font-size: 16px; color:#fff; text-align: center;">TERMINOS Y CONDICIONES DE LA MUDANZA</a><br><br>
	
	<? 
	$resultt=mysql_query("SELECT * from terminos", $link);
	$rowt=mysql_fetch_row($resultt);
	if($row[4]=='Exclusivo'){
echo $rowt[1];
	}else{
echo $rowt[2];
	}
	?>

	<br><br>
</div>
<div style="padding: 3px 3px 3px 30px; text-align:center ">Agradeciendo de antemano su solicitud, y en espera de una respuesta favorable a la presente, quedamos pendientes para la informacion adicional de cualquier tipo que se juzgue pertinente.<br><br><br><br>
A T E N T A M E N T E<br>
LA UNION MUDANZAS
</div>

</div>
<div style="width:100%; ">
<table style="width:100%; ">
<td style="width:50%;">
<div style="  color:#FFFFFF; float:left; font-size: 10px;"><br>
www.launionsanmiguel.com<br>
www.mudanzasforaneaslaunion.com<br>
La Union Packing & Shipping Services<br>
¡Empacamos y Enviamos a todo el Mundo!<br>
Whastapp : 4421270514<br>
</div>
</td>
<td style="width:50%;">
<div style=" color: #FFFFFF; float: left; text-align: right; font-size: 10px;"><br>
Zacateros 26-A, Centro<br>
Y ahora en nuestra nueva dirección<br>
Salida a Celaya # 83-B<br>
Ph./Tel 4151859200<br>
San Miguel Allende, Gto. 37700<br>
</div>
</td></table>
</div>

</div>
</page>

<?

$content=ob_get_clean();
    require_once(dirname(__FILE__).'/html2pdf/html2pdf.class.php');

    $html2pdf = new HTML2PDF('P','Legal','fr');
	//$html2pdf->Image('tutorial/logo.png',10,12,30,0,'','http://www.fpdf.org');
	$html2pdf->setDefaultFont('Arial');
    $html2pdf->WriteHTML($content);
    $html2pdf->Output('Cotizacion'.date('YmdHis').'.pdf');
    
?>