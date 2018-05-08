<form id="formn" name="formn" action="tareas.php?p=1" method="post" >
	<table>
    <tr>
    <td>Origen</td>
    <td>Destino</td>
    <td>Tipo Mudanza</td>
    <td>Servicio</td>
    </tr>
    <tr>
    <td><input type="text" name="origen" id="origen"/></td>
    <td><input type="text" name="destino" id="destino"/></td>
    <td><select name="tipo_mudanza" id="tipo_mudanza">
    <option value="--">--</option>
    <option value="Exclusivo">Exclusivo</option>
    <option value="Compartido">Compartido</option>
    </select></td>
    <td><select name="servicio" id="servicio">
    <option value="--">--</option>
    <option value="Basico">Basico</option>
    <option value="Con Empaquetado">Con Empaquetado</option>
    </select></td>
    </tr>
    <tr>
    <td>Incluye</td>
    <td>No Incluye</td>
    <td>Tiempo Entrega</td>
    <td></td>
   
    </tr>
    <tr>
    	<td><input type="text" name="incluye" id="incluye"/></td>
    	<td><input type="text" name="no_incluye" id="no_incluye"/></td>
    <td><input type="text" name="tiempo_entrega" id="tiempo_entrega"/></td>
    
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
                   <select id="anio" name="anio" style="width:60px; float:left;">
                     <option value="--">Año</option>
                     <? for($i=date('Y'); $i>=2015; $i--){ ?>
                     <option value="<? echo $i; ?>"><? echo $i; ?></option>
                    <? } ?>
                    </select>
                      <select id="mes" name="mes" style="width:55px; float:left;">
                     <option value="--">Mes</option>
                     <? for($i=1; $i<=12; $i++){ ?>
                     <? if($i<=9){ ?>
						<option value="0<? echo $i; ?>">0<? echo $i; ?></option> 
					 <? }else{ ?>
                     <option value="<? echo $i; ?>"><? echo $i; ?></option>
                    <? }} ?>
                    </select>
                     <select id="dia" name="dia" style="width:55px; float:left;">
                     <option value="--">Dia</option>
                     <? for($i=1; $i<=31; $i++){ ?>
                     <? if($i<=9){ ?>
						<option value="0<? echo $i; ?>">0<? echo $i; ?></option> 
					 <? }else{ ?>
                     <option value="<? echo $i; ?>"><? echo $i; ?></option>
                    <? }} ?>
                    </select></td>
                    <td><input type="text" name="horario" id="horario"/></td>
    <td><select id="proveedor" name="proveedor">
    <option value="--">--</option>
    <?
  include("config.php");
  		$link=mysql_connect($host,$user,$pass) or die("resultado=".urlencode(mysql_error()));
		mysql_select_db($bbdd,$link) or die("resultado=".urlencode(mysql_error()));
		$result=mysql_query("SELECT * from proveedores", $link);
		while($row=mysql_fetch_row($result)){
			?> <option  value="<? echo $row[0]; ?>"><? echo $row[1].' '.$row[2].' '.$row[3]; ?></option> <?
		}
  ?>
    </select></td>
    <td><input type="text" name="no_mudanza" id="no_mudanza"/></td>
    </tr>
    <tr>
    <td>Direccion donde se recolecta</td>
    <td>Recibe</td>
    <td>Direccion de entrega</td>
    <td>Recibe</td>
    </tr>
    <tr>
    <td><input type="text" name="d_recolecta" id="d_recolecta"/></td>
    <td><input type="text" name="recibe_r" id="recibe_r"/></td>
    <td><input type="text" name="d_entrega" id="d_entrega"/></td>
    <td><input type="text" name="e_recibe" id="e_recibe"/></td>
    </tr>
     <tr>
    <td>Costo Cliente</td>
    <td>Costo Proveedor</td>
    <td>Utilidad Flete</td>
    <td>Factura</td>
    </tr>
    <tr>
    <td><input type="text" name="costocliente" id="costocliente"  onkeypress="return valida(event)" style="width:100px"/></td>
    <td><input type="text" name="costoproveedor" id="costoproveedor" onkeypress="return valida(event)" style="width:100px"/></td>
    <td><input type="text" name="utilidadflete" id="utilidadflete" onkeypress="return valida(event)" style="width:100px"/></td>
    <td><select id="tipo" name="factura">
                     <option value="--">--</option>
                        <option value="No">No</option>
                        <option value="Si">Si</option>
                    </select></td>
    </tr>
    
    </table>
    <table>
    <tr>
    <td>Lista</td>
    <td>Indicaciones</td>
    </tr>
    <tr>
    <td><textarea id="lista" name="lista" rows="3"></textarea>
    <td><textarea id="indicaciones" name="indicaciones" rows="3"></textarea></td>
    </tr>
    <tr>
    <td> </td>
    <td> </td>
    <td><input type="submit" name="guardarnservicio" id="guardarnservicio" value="Guardar" class="boton"></td>
    </tr>
    </table>
    
    </form>