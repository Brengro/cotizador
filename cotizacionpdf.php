<?php ob_start();
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
	$result=mysql_query("SELECT * from cotizacion2 where clave='".$_GET['c']."'", $link);
	$row=mysql_fetch_row($result);
?>
<div style="width:740px; background-color:#44546a; padding:10px;  font-size: 9px;">
<div style="background-color:#fff;">
<br>
<table><tr><td>
<a style="text-decoration: underline; font-size:11px;">COTIZACION FORMAL DE SERVICIO DE MUDANZA RESIDENCIAL</a><br>
CLIENTE: <? echo $row[1]; ?><br>
<!--EMPRESA: <? echo $row[2]; ?><br>
TEL. <? echo $row[3]; ?><br>-->
</td><td style="padding-left:320px;"><? echo date('d/m/Y'); ?><br>
	<!--FOLIO: <? echo $row[14]; ?>-->
</td></tr>
</table>

<br>
<table style="border:#000000 solid 1px; width:740px; font-size: 8px;" border="1" cellspacing="0" >
<tr style="background-color:#44546a; color:#fff;">
<td style="padding:5px; vertical-align:middle;">ORIGEN</td>
<td style="padding:5px; vertical-align:middle;">DESTINO</td>
<td style="padding:5px; vertical-align:middle;">TIPO DE MUDANZA</td>
<? if($row[4]=='Exclusivo'){  ?>
<td style="padding:5px; vertical-align:middle;">COSTO EXLUSIVO</td>
<? }else{ ?>
<td style="padding:5px; vertical-align:middle;">COSTO COMPARTIDO</td>
<? } ?>
<? if($row[21]!=0){  ?>
<? if($row[13]!=0){  ?><td style="padding:5px; vertical-align:middle;">EMPAQUE CAJAS</td><? } ?>
<? if($row[14]!=0){ ?><td style="padding:5px; vertical-align:middle;">EMPLAYE TOTAL</td><? } ?>
<? if($row[15]!=0){ ?><td style="padding:5px; vertical-align:middle;">CAJA CLOSET VENTA</td><? } ?>
<? if($row[16]!=0){ ?><td style="padding:5px; vertical-align:middle;">CAJA CLOSET RENTA</td><? } ?>
<? if($row[17]!=0){ ?><td style="padding:5px; vertical-align:middle;">DESEMPAQUE A GRANEL</td><? } ?>
<? if($row[18]!=0){ ?><td style="padding:5px; vertical-align:middle;">EMPAQUE DE MUEBLES</td><? } ?>
<? if($row[19]!=0){ ?><td style="padding:5px; vertical-align:middle;">SEGURO DE MERCANCIA</td><? } ?>
<? if($row[20]!=0){ ?><td style="padding:5px; vertical-align:middle;">OTROS</td><? } ?>
<? if($extras!=0){ ?><td style="padding:5px; vertical-align:middle;">TOTAL EXTRAS</td><? } ?>
<? if($row[4]=='Exclusivo'){  ?>
<td style="padding:5px; vertical-align:middle;">COSTO TOTAL</td>
<? }else{ ?>
<td style="padding:5px; vertical-align:middle;">COSTO TOTAL</td>
<? } } ?>
<!--<td style="padding:5px; vertical-align:middle;">INCLUYE</td>
<td style="padding:5px; vertical-align:middle;">VALOR DECLARADO</td>
<td style="padding:5px; vertical-align:middle;">SEGURO</td>
<td style="padding:5px; vertical-align:middle;">TOTAL NETO,<br>SI REQUIERE<br>FACTURA<br>ES MAS IVA.</td>-->
</tr>
<tr>
<td style="padding:5px;"><? echo $row[2]; ?></td>
<td style="padding:5px;"><? echo $row[3]; ?></td>
<td style="padding:5px;"><? echo $row[4]; ?></td>
<? if($row[4]=='Exclusivo'){  ?>
<td style="padding:5px;"><? echo '$'.money_format('%(#10n', $row[5]); ?></td>
<? }else{ ?>
<td style="padding:5px;"><? echo '$'.money_format('%(#10n', $row[6]); ?></td>
<? } ?>
<? if($row[21]!=0){  ?>
<? if($row[13]!=0){  ?><td style="padding:5px;">$<? $ext1=($row[13]*160); $extras=$extras+$ext1; echo money_format('%(#10n', $ext1); ?></td><? } ?>
<? if($row[14]!=0){ ?><td style="padding:5px;">$<? $ext2=($row[14]*400); $extras=$extras+$ext2;  echo money_format('%(#10n', $ext2); ?></td><? } ?>
<? if($row[15]!=0){ ?><td style="padding:5px;">$<? $ext3=($row[15]*300); $extras=$extras+$ext3; echo money_format('%(#10n', $ext3); ?></td><? } ?>
<? if($row[16]!=0){ ?><td style="padding:5px;">$<? $ext4=($row[16]*160); $extras=$extras+$ext4; echo money_format('%(#10n', $ext4); ?></td><? } ?>
<? if($row[17]!=0){ ?><td style="padding:5px;">$<? $ext5=($row[17]*80); $extras=$extras+$ext5; echo money_format('%(#10n', $ext5); ?></td><? } ?>
<? if($row[18]!=0){ ?><td style="padding:5px;">$<? $ext6=($row[18]*75); $extras=$extras+$ext6; echo money_format('%(#10n', $ext6); ?></td><? } ?>
<? if($row[19]!=0){ ?><td style="padding:5px;">$<? $ext7=($row[19] * 0.025); $extras=$extras+$ext7; echo money_format('%(#10n', $ext7); ?></td><? } ?>
<? if($row[20]!=0){ ?><td style="padding:5px;">$<? $ext8=($row[20]*2500); $extras=$extras+$ext8; echo money_format('%(#10n', $ext8);  ?></td><? } ?>
<!--<? if($extras!=0){ ?><td style="padding:5px;"><?  echo money_format('%(#10n', $extras);   ?></td><? } ?>-->
<? if($row[4]=='Exclusivo'){  ?>
<td style="padding:5px;">$<?  echo money_format('%(#10n', ($row[5] + $extras));  ?></td>
<? }else{ ?>
<td style="padding:5px;">$<?  echo money_format('%(#10n', ($row[6] + $extras));  ?></td>
<? } } ?>

<!--<td style="padding:5px;"><? echo $row[9]; ?></td>
<td style="padding:5px;"><? echo $row[15]; ?></td>
<td style="padding:5px;"><? echo $row[10]; ?></td>
<td style="padding:5px;"><? echo $row[11]; ?></td>-->
</tr>
</table>


<div style=" padding: 3px 3px 3px 30px;">
<strong>LISTA DE MUEBLES:</strong><br>
<? echo $row[7]; ?>
</div>
<div style="width:100%;">
<table style="width:740px;">
<td style="width:50%;">
<div style="background-color:#FF0004; padding: 3px 3px 3px 30px; width:70%; color:#fff;">SERVICIO BASICO INCLUYE:</div>
*Emplaye basico de colchones.<br>
*Emplaye de muebles correspondientes con cobijas y colchonetas.<br>
*Acomodo de cajas en las habitaciones de casa destino (no desempaque)<br>
*Maniobras de carga y descarga planta baja, primero y segundo piso.<br>
*Supervision de la carga en Origen.<br>
*Monitoreo de la unidad durante el trayecto.<br>
*Entrega mismo dia o dependiendo el tiempo de traslado.<br>
<br>
<div style="background-color:#FF0004; padding: 3px 3px 3px 30px; width:70%; color:#fff;">NO INCLUYE:</div>
*Desempaque a granel en casa desino<br>
*Des o Instalacion de aparatos electronicos, lamparas, estufas y/o lavadoras, etc<br>
*Volado de Muebles
*Carga y/o descarga en pisos extras<br>
*Acarreos mayores a 10mts, caminando y/o en unidad de carga<br>
<a style="color:#FF0004">*En caso fortuito multas de transito, permisos o algun otro cargo adicional ajeno al transportista.</a><br>
<!--<? if($row[21]!=0){  ?><br><br>EXTRAS:<br>
<? if($row[13]!=0){  ?>* EMPAQUE CAJAS: $<? $ext1=($row[13]*160); $extras=$extras+$ext1; echo money_format('%(#10n', $ext1); ?><br><? } ?>
<? if($row[14]!=0){ ?>* EMPLAYE TOTAL: $<? $ext2=($row[14]*400); $extras=$extras+$ext2;  echo money_format('%(#10n', $ext2); ?><br><? } ?>
<? if($row[15]!=0){ ?>* CAJA CLOSET VENTA: $<? $ext3=($row[15]*300); $extras=$extras+$ext3; echo money_format('%(#10n', $ext3); ?><br><? } ?>
<? if($row[16]!=0){ ?>* CAJA CLOSET RENTA: $<? $ext4=($row[16]*160); $extras=$extras+$ext4; echo money_format('%(#10n', $ext4); ?><br><? } ?>
<? if($row[17]!=0){ ?>* DESEMPAQUE A GRANEL: $<? $ext5=($row[17]*80); $extras=$extras+$ext5; echo money_format('%(#10n', $ext5); ?><br><? } ?>
<? if($row[18]!=0){ ?>* EMPAQUE DE MUEBLES: $<? $ext6=($row[18]*75); $extras=$extras+$ext6; echo money_format('%(#10n', $ext6); ?><br><? } ?>
<? if($row[19]!=0){ ?>* SEGURO DE MERCANCIA: $<? $ext7=($row[19] * 0.025); $extras=$extras+$ext7; echo money_format('%(#10n', $ext7); ?><br><? } ?>
<? if($row[20]!=0){ ?>* OTROS: $<? $ext8=($row[20]*2500); $extras=$extras+$ext8; echo money_format('%(#10n', $ext8);  ?><br><? } ?>
<? if($extras!=0){ ?>TOTAL EXTRAS: <?  echo money_format('%(#10n', $extras);   ?><br><? } ?>
<? if($row[4]=='Exclusivo'){  ?>
COSTO TOTAL: $<?  echo money_format('%(#10n', ($row[5] + $extras));  ?>
<? }else{ ?>
COSTO TOTAL: $<?  echo money_format('%(#10n', ($row[6] + $extras));  ?>
<? } } ?>-->
</td><td style="width:50%;">

<img src="http://applaunion.com/mudanzas/images/envios.jpg" style="width:65%;"/>
</td></table>
</div><br>
<div style="background-color:#FF0004; padding: 3px 30px 3px 30px; width:30%; color:#fff;">IMPORTANTE:</div>
<div style="background-color:#ddebf7; padding: 3px 3px 3px 30px;">***Este costo es considerando que la unidad pueda CARGAR Y DESCARGAR a pie de casa.****</div>
<div style="background-color:#ffc000; padding: 3px 3px 3px 30px; text-align:center;">***En caso que no sea posible por causas ajenas al transportista y se tengan que realizar acarreo,volados, maniobras especiales, etc.,habra un cargo adicional el cual se determinara en en el momento, COSTO SUJETO A CONDICIONES del lugar y dificultad de las maniobras ***</div>
<div style="background-color:#ddebf7; padding: 3px 3px 3px 30px;">***La cotizacion esta basada en la informacion proporcionada previamente por el cliente, en dado caso que este haya omitido datos importantes como: muebles adicionales,cajas extra, empaques especiales, desempaque,volados, acarreos, armado o desarmado de muebles, desinstalacion de aparatos electronicos o de casa, quitar puertas ventas, etc., y se tenga que ocupar una unidad diferente o agregar cargos por maniobras
adicionales a lo acordada se realizara el ajuste correspondiente***</div>
<div style="background-color:#ddebf7; padding: 3px 3px 3px 30px;">*En caso que el cliente requiera acomodo,armado de muebles,empaque o desempaque especial de sus cosas fuera de lo ofertados se tendra que cotizar previamente***</div>
<div style="background-color:#ffc000; padding: 3px 3px 3px 30px; text-align:center; color:#FF0004">***NO TRASLADAMOS ANIMALES O PERSONAS DENTRO DE NUESTRAS UNIDADES****</div>
<div style="background-color:#FF0004; padding: 3px 30px 3px 30px; width:30%; color:#fff;">PAGOS:</div>
<div style="padding: 3px 3px 3px 30px;">*Precios en pesos mexicanos. El servicio Terrestre Nacional genera IVA (16%, si se requiere factura) y Retencion (4%,persona moral)</div>
<div style="background-color:#ffc000; padding: 3px 3px 3px 30px; text-align:center; color:#FF0004;text-decoration: underline;">*SERVICIO SIN FACTURA APARTADO Y RESTANTE 70% A LA CARGA Y 30% ANTES DE LA DESCARGA ( NO SE DESCARGA SINO ESTA LIQUIDADO EL SERVICIO)<br>
*Se puede liquidar por medio de efectivo, deposito bancario, transferencia electronica, tarjeta de Credito o Debito</div>
<div style="background-color:#c9c9c9; padding: 3px 3px 3px 30px; text-align:center; color:#FF0004;text-decoration: underline;">** SI SE SOLICITA FACTURA EL SERVICIO DEBE SER PREPAGADO POR MEDIO DE TRANSFERENCIA ELECTRONICA**<br>
** LA FACTURA SE ENVIA AL MOMENTO DE CONFIRMAR LA TRANSFERENCIA***</div><br>
<div style="width:100%;  ">
<table style="width:100%;">
<tr><td style="width:50%;">
<div style="background-color:#FF0004; padding: 3px 30px 3px 30px; width:70%; color:#fff; text-align:center">CON FACTURA</div>
MARIA EUGENIA CUETO ROSALES<br>
FRAY PEDRO DE GANTE #67<br>
COL, PROVIDENCIA<br>
RFC: CURE540815791<br>
SAN MIGUEL DE ALLENDE, GTO<br>
DATOS DE TRANSFER<br>
BANCO: INBURSA<br>
CTA: 50007306161<br>
CLABE:036240500073061614
</td>
<td  style="width:50%;">
<div style="background-color:#FF0004; padding: 3px 30px 3px 30px; width:70%; color:#fff; text-align:center">SIN FACTURA</div>
AZUCENA MARIANA PEÑA CUETO<br>
BANCO: BANAMEX<br>
CLABE: 002212901929614239<br>
SUC:9019<br>
CTA: 2961423<br>
TARJETA: 5256781887953995
</td></tr></table>
</div>
<div style="background-color:#ffff00; padding: 3px 3px 3px 30px; text-align:center;  color:#1D068E;text-decoration: underline;">** SI SE SOLICITA FACTURA *Si la Mercancia NO SE ASEGURA , la carga se mueve por cuenta y riesgo del cliente.</div>
<div style="background-color:#ffd966; padding: 3px 3px 3px 30px; text-align:center;  color:#1D068E;"><a style="text-decoration: underline;">**Este servicio lleva LLEVA SEGURO DE MERCANCIA, por una cantidad establecida DE OBSEQUIO A CLIENTE si desea aumentarlo, favor de avisarlo con anticipacion.**</a><br>
*El costo del seguro es del 1.5% adicional del valor de la mercancia valor declarado.<br>
EL SEGURO COMPRENDE LO QUE ES: Riesgos ordinarios de transito, volcaduras, accidentes, daños en la piezas durante el viaje <a style="text-decoration: underline;">por riesgos de transito</a>, perdida total...<a style="color:#FF070B">Sólo sera valido si se cuenta con la documentacion del siniestro correspondiente</a><br>
NO CUBRE : MANIOBRAS DE CARGA NI DESCARGA</div>
<div style="background-color:#ffff00; padding: 3px 3px 3px 30px; text-align:center;  color:#1D068E;text-decoration: underline;">** SOBRE MERCANCIA EMPACADA POR EL CLIENTE PREVIAMENTE NO NOS HACEMOS RESPONSABLES***</div>
<div style="background-color:#FF0004; padding: 3px 30px 3px 30px; width:50%; color:#fff;">ACLARACIONES POR PARTE DEL CLIENTE!</div>

<div style="background-color:#ddebf7; padding: 3px 3px 3px 30px;">Después de entregada la mercancía, el cliente sólo tiene 48 horas para una aclaración posterior. Aplica solo en cosas dentro del inventario.<br>
En dado caso de algun daño de muebles o cosas por parte de error nuestro en maniobras,en carga o descarga, se realizara una negociacion por parte del cliente y la empresa para resarcir el daño, en el momento.<br>
<a style="color:#FF0004; ">No se admiten reclamaciones posteriores al servicio.</a><br>
Si el cliente requiere servicio de desempaque, este será sobre superficies planas, y solo se admiten reclamaciones mientras esté el personal de mudanza ahi. Aplica solo en cosas dentro del inventario.</div>
<div style="background-color:#FF0004; padding: 3px 30px 3px 30px; width:50%; color:#fff;">NO SOMOS RESPONSABLES CON EL CLIENTE POR:</div>
<div style="background-color:#ddebf7; padding: 3px 3px 3px 30px;">1.- Daños y/o pérdidas en Mercancía previamente empacada y/o emplayada<br>
2.- En pérdida de cosas no declaradas en el inventario.<br>
3.- Por muebles rotos, vencidos, manchados y/o mojados que contengan cosas dentro y que no hayan sido vaciados para su traslado.<br>
4.- Si las plantas mueren y/o las macetas se rompen a causa de la humedad y el traslado.<br>
5.- Si hay algún problema con la autoridad por traslado de mercancía ilícita.<br>
6.- Por Joyas, dinero en efectivo, celulares, equipo de computo o piezas de valor no declaradas al trasnportista en el momento de la carga.<br>
</div>
<div style="background-color:#FF0004; padding: 3px 30px 3px 30px; width:50%; color:#fff;">CONDICIONES DE TRANSPORTE</div>



<div style="background-color:#ddebf7; padding: 3px 3px 3px 30px;">*No nos hacemos responsables por retrasos, demoras o cambio de ruta.<br>
*El tiempo de transito es aproximado, ya que esto puede variar por cuestiones climatológicas y ajenas a nosotros.<br>
*Solicitar el equipo por lo menos 24 horas de anticipación.<br>
*Tiempo libre de maniobras de carga y descarga 4 hrs.<br>
</div>
<div style="background-color:#ffff00; padding: 3px 3px 3px 30px;">*Una vez que llegue la unidad a Origen, sino es cargada por causas ajenas al transportista cobrara FLETE EN FALSO por el 50% del valor del viaje<br>
*Una vez que llegue la unidad a Destino, sino es descargada por causas ajenas al transportista cobrara FLETE EN FALSO por el 100% del valor del viaje<br>
</div>
<div style="background-color:#FF0004; padding: 3px 3px 3px 30px; color:#FFFFFF;">*En dado caso que el servicio no haya sido liquidado por parte del cliente antes de llegar a Destino, la mercancia no sera descargada hasta que se
haya liquidado y confirmado el mismo.<br>
</div>
<div style="padding: 3px 3px 3px 30px; "><a style=" text-decoration:underline;">*Demoras por dia por unidad despues de 24 hrs de arribo en Origen y/o Destino, $3000.00 m.n.</a><br>
*Otros gastos en origen / destino si los hubiera y que no se encuentren mencionados en la presente cotización.<br>
*Cotizacion sujeta a cambios sin previo aviso<br>
<a style="color:#FF0004;">*ESTA COTIZACION TIENE UNA VIGENCIA DE 30 DIAS NATURALES</a><br>
</div>
<div style="padding: 3px 3px 3px 30px; text-align:center ">Agradeciendo de antemano su solicitud, y en espera de una respuesta favorable a la presente, quedamos pendientes para la informacion adicional de cualquier tipo que se juzgue pertinente.<br><br><br><br>
A T E N T A M E N T E<br>
Lic. Azucena Peña Cueto<br>
La Union Division Mudanzas
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