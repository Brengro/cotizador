<form id="formn" name="formn" action="tareas.php?p=1" method="post" >
	<?
$link=mysql_connect($host,$user,$pass) or die("resultado=".urlencode(mysql_error()));
	mysql_select_db($bbdd,$link) or die("resultado=".urlencode(mysql_error()));
	$result=mysql_query("SELECT * from servicios where clave='".$_GET['c']."'", $link);
	$row=mysql_fetch_row($result);
?>
<input type="hidden" name="c" id="c" value="<? echo $row[22]; ?>">
	<table>
    <tr>
    <td>Origen</td>
    <td>Destino</td>
    <td>Tipo Mudanza</td>
    <td>Servicio</td>
    </tr>
    <tr>
    <td><input type="text" name="origen" id="origen" value="<? echo $row[1]; ?>"/></td>
    <td><input type="text" name="destino" id="destino" value="<? echo $row[2]; ?>"/></td>
    <td><select name="tipo_mudanza" id="tipo_mudanza">
    <option value="--">--</option>
    <option  <? if($row[3]=="Exclusivo"){  ?> selected <? } ?> value="Exclusivo">Exclusivo</option>
    <option <? if($row[3]=="Compartido"){ ?> selected <? } ?> value="Compartido">Compartido</option>
    </select></td>
    <td><select name="servicio" id="servicio">
    <option value="--">--</option>
    <option <? if($row[4]=="Basico"){ ?> selected <? } ?> value="Basico">Basico</option>
    <option <? if($row[4]=="Con Empaquetado"){ ?> selected <? } ?> value="Con Empaquetado">Con Empaquetado</option>
    </select></td>
    </tr>
    <tr>
    <td>Incluye</td>
    <td>No Incluye</td>
    <td>Tiempo Entrega</td>
    <td></td>
   
    </tr>
    <tr>
    	<td><input type="text" name="incluye" id="incluye" value="<? echo $row[23]; ?>"/></td>
    	<td><input type="text" name="no_incluye" id="no_incluye" value="<? echo $row[24]; ?>"/></td>
    <td><input type="text" name="tiempo_entrega" id="tiempo_entrega" value="<? echo $row[5]; ?>"/></td>
    
    <td></td>
    </tr>
    <tr>
    <td>Fecha Mudanza</td>
    <td>Horario</td>
    <td>Proveedor</td>
    <td>No. Mudanza</td>
    </tr>
    <tr>
   
    <td><div style="width:100%; overflow:hidden;">
    	<? $a= substr($row[15],0,4);
$m= substr($row[15],5,2);
$d= substr($row[15],8,2);
?>
                   <select id="anio" name="anio" style="width:60px; float:left;">
                     <option value="--">Año</option>
                     <? for($i=date('Y'); $i>=2015; $i--){ ?>
                     <option <? if($a==$i){ ?> selected <? } ?> value="<? echo $i; ?>"><? echo $i; ?></option>
                    <? } ?>
                    </select>
                      <select id="mes" name="mes" style="width:55px; float:left;">
                     <option value="--">Mes</option>
                     <? for($i=1; $i<=12; $i++){ ?>
                     <? if($i<=9){ ?>
						<option  <? if($m==$i){ ?> selected <? } ?> value="0<? echo $i; ?>">0<? echo $i; ?></option> 
					 <? }else{ ?>
                     <option  <? if($m==$i){ ?> selected <? } ?> value="<? echo $i; ?>"><? echo $i; ?></option>
                    <? }} ?>
                    </select>
                     <select id="dia" name="dia" style="width:55px; float:left;">
                     <option value="--">Dia</option>
                     <? for($i=1; $i<=31; $i++){ ?>
                     <? if($i<=9){ ?>
						<option <? if($d==$i){ ?> selected <? } ?> value="0<? echo $i; ?>">0<? echo $i; ?></option> 
					 <? }else{ ?>
                     <option <? if($d==$i){ ?> selected <? } ?> value="<? echo $i; ?>"><? echo $i; ?></option>
                    <? }} ?>
                    </select></td>
                    <td><input type="text" name="horario" id="horario" value="<? echo $row[11]; ?>"/></td>
    <td><select id="proveedor" name="proveedor">
    <option value="--">--</option>
    <?
  include("config.php");
  		$link=mysql_connect($host,$user,$pass) or die("resultado=".urlencode(mysql_error()));
		mysql_select_db($bbdd,$link) or die("resultado=".urlencode(mysql_error()));
		$resultp=mysql_query("SELECT * from proveedores", $link);
		while($rowp=mysql_fetch_row($resultp)){
			?> <option <? if($row[6]==$rowp[0]){ ?> selected <? } ?>  value="<? echo $rowp[0]; ?>"><? echo $rowp[1].' '.$rowp[2].' '.$rowp[3]; ?></option> <?
		}
  ?>
    </select></td>
    <td><input type="text" name="no_mudanza" id="no_mudanza"  value="<? echo $row[20]; ?>"/></td>
    </tr>
    <tr>
    <td>Direccion donde se recolecta</td>
    <td>Recibe</td>
    <td>Direccion de entrega</td>
    <td>Recibe</td>
    </tr>
    <tr>
    <td><input type="text" name="d_recolecta" id="d_recolecta"  value="<? echo $row[7]; ?>"/></td>
    <td><input type="text" name="recibe_r" id="recibe_r"  value="<? echo $row[8]; ?>"/></td>
    <td><input type="text" name="d_entrega" id="d_entrega" value="<? echo $row[9]; ?>"/></td>
    <td><input type="text" name="e_recibe" id="e_recibe" value="<? echo $row[10]; ?>"/></td>
    </tr>
     <tr>
    <td>Costo Cliente</td>
    <td>Costo Proveedor</td>
    <td>Utilidad Flete</td>
    <td>Factura</td>
    </tr>
    <tr>
    <td><input type="text" name="costocliente" id="costocliente"  onkeypress="return valida(event)" style="width:100px" value="<? echo $row[16]; ?>"/></td>
    <td><input type="text" name="costoproveedor" id="costoproveedor" onkeypress="return valida(event)" style="width:100px" value="<? echo $row[17]; ?>"/></td>
    <td><input type="text" name="utilidadflete" id="utilidadflete" onkeypress="return valida(event)" style="width:100px" value="<? echo $row[18]; ?>"/></td>
    <td><select id="tipo" name="factura">
                     <option value="--">--</option>
                        <option <? if($row[19]=="No"){ ?> selected <? } ?> value="No">No</option>
                        <option <? if($row[19]=="Si"){ ?> selected <? } ?> value="Si">Si</option>
                    </select></td>
    </tr>
    
    </table>
    <table>
    <tr>
    <td>Lista</td>
    <td>Indicaciones</td>
    </tr>
    <tr>
    <td><textarea id="lista" name="lista" rows="3"><? echo str_replace('<br />','',$row[12]); ?></textarea>
    <td><textarea id="indicaciones" name="indicaciones" rows="3"><? echo str_replace('<br />','',$row[13]); ?></textarea></td>
    </tr>
    <tr>
    <td> </td>
    <td> </td>
    <td><input type="submit" name="editarservicio" id="editarservicio" value="Guardar" class="boton"></td>
    </tr>
    </table>
    
    </form>