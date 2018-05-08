<? session_start();
setlocale(LC_MONETARY, 'es_MX');
 ?>
<script type="text/javascript">
function cambiartipo(t){
	if(t.value=='EFECTIVO'){
		document.getElementById('efectivodiv').style.display = 'block';
		document.getElementById('bancodiv').style.display = 'none';
	}else{
		if(t.value=='BANCO'){
			document.getElementById('efectivodiv').style.display = 'none';
			document.getElementById('bancodiv').style.display = 'block';
		}else{
			document.getElementById('efectivodiv').style.display = 'none';
			document.getElementById('bancodiv').style.display = 'none';
		}	
	}
}

</script>

<? include('config.php'); ?>

<? if(isset($_POST['eli'])){
	
	$conexio = mysql_connect($host,$user,$pass) or die("resultado=".urlencode(mysql_error()));
	mysql_select_db($bbdd,$conexio) or die("resultado=".urlencode(mysql_error()));
	$csql = "delete from ingresosyegresos where id=".$_POST['idmove'];  
	mysql_query($csql)or die("resultado=".urlencode(mysql_error()));
	
}?>

    <? $link=mysql_connect($host,$user,$pass) or die("resultado=".urlencode(mysql_error()));
	mysql_select_db($bbdd,$link) or die("resultado=".urlencode(mysql_error()));
	$result=mysql_query("SELECT * from servicios where id=".$_POST['id'], $link);
	$row=mysql_fetch_row($result);
       ?>
         <fieldset>
<h2>Mudanza</h2>
         </fieldset>

       <table style="font-size:12px; width:800px;">
       <tr>
       <td align="center"><strong>No.</strong></td>
       <td align="center"><strong>Fecha Mudanza</strong></td>
       <td align="center"><strong>Origen</strong></td>
       <td align="center"><strong>Destino</strong></td>
        <td align="center"><strong>Proveedor</strong></td>
       </tr>
       <tr>
       <td align="center"><? echo $row[22]; ?></td>
       <td align="center"><? echo $row[15]; ?></td>
       <td align="center"><? echo $row[1]; ?></td>
       <td align="center"><? echo $row[2]; ?></td>
       <td align="center"><? 
	   $link=mysql_connect($host,$user,$pass) or die("resultado=".urlencode(mysql_error()));
	mysql_select_db($bbdd,$link) or die("resultado=".urlencode(mysql_error()));
	$resultp=mysql_query("SELECT * from proveedores where id=".$row[6], $link);
	$rowp=mysql_fetch_row($resultp);
	   
	   echo $rowp[1]. ' ' .$rowp[2]; ?></td>
       </tr>
      
       <tr>
       <td align="center"><strong>Costo Cliente</strong></td>
        <td align="center"><strong>Costo Proveedor</strong></td>
        <td align="center"><strong>Utilidad Flete</strong></td>
       <td align="center"><strong>Ingresos</strong></td>
       <td align="center"><strong>Egresos</strong></td>
       <td></td>
       </tr>
       <?  $linkm=mysql_connect($host,$user,$pass) or die("resultado=".urlencode(mysql_error()));
	mysql_select_db($bbdd,$linkm) or die("resultado=".urlencode(mysql_error()));
	$resultm=mysql_query("SELECT * from ingresosyegresos where id_mudanza=".$_POST['id'], $linkm);
	$ingresos=0;
	$egresos=0;
	
	while($rowm=mysql_fetch_row($resultm)){ 
	if($rowm[2]==1){
		$ingresos=(float)$ingresos+(float)$rowm[6];
	}else{
		$egresos=(float)$egresos+(float)$rowm[6];
	}
	
	}
	
	?>
       <tr>
       <td align="center"><? echo money_format('%(#10n',$row[16]); ?></td>
       <td align="center"><? echo money_format('%(#10n',$row[17]); ?></td>
       <td align="center"><? echo money_format('%(#10n',$row[18]); ?></td>
       <td align="center"><? echo money_format('%(#10n',$ingresos); ?></td>
       <td align="center"><? echo money_format('%(#10n',$egresos); ?></td>
       <td></td>
       </tr>
       
       </table>
      
       <hr>
       <? if(isset($_POST['idmov'])){
		  ?> <h2>Modificar Movimiento</h2><? 
	   }else{
		  ?> <h2>Agregar Movimiento</h2><? 
	   }?>
      
	        <form method="POST" action="tareas.php" enctype="multipart/form-data">
            <? if(isset($_POST['idmov'])){
				
			$linkmm=mysql_connect($host,$user,$pass) or die("resultado=".urlencode(mysql_error()));
			mysql_select_db($bbdd,$linkmm) or die("resultado=".urlencode(mysql_error()));
			$resultmm=mysql_query("SELECT * from ingresosyegresos where id=".$_POST['idmov'], $linkmm);
			$rowmm=mysql_fetch_row($resultmm);
			?><input type="hidden" name="id_movi" id="id_movi" value="<? echo $rowmm[0]; ?>"/><?
			
			}
			?>
              <input type="hidden" name="id_general" id="id_general" value="<? echo $row[0]; ?>"/>
                      <fieldset>
                      <table>
                      <tr>
                      <td>
                      <label for="field-two">Referencia</label>
                     <select id="referencia" name="referencia" style="width:120px; float:left;">
                     <option value="--">--</option>
                     <option <? if(isset($_POST['idmov'])){ if($rowmm[2]==1){ ?> selected <? } } ?>value="1">Ingreso</option>
                     <option <? if(isset($_POST['idmov'])){ if($rowmm[2]==2){ ?> selected <? } } ?>value="2">Egreso</option>
                    </select>
                    </td>
                    <td>
                      <label for="field-two">Fecha de Pago</label>
                    <div style="width:100%; overflow:hidden;">
                   <select id="anio" name="anio" style="width:70px; float:left;">
                     <option value="--">Año</option>
                     <? for($i=date('Y'); $i>=2015; $i--){ ?>
                     <option <? if(isset($_POST['idmov'])){ if(substr($rowmm[3],0,4)==$i){ ?> selected <? } } ?>  value="<? echo $i; ?>"><? echo $i; ?></option>
                    <? } ?>
                    </select>
                      <select id="mes" name="mes" style="width:70px; float:left;">
                     <option value="--">Mes</option>
                     <? for($i=1; $i<=12; $i++){ ?>
                     <? if($i<=9){ ?>
						<option <? if(isset($_POST['idmov'])){ if(substr($rowmm[3],5,2)=='0'.$i){ ?> selected <? } } ?> value="0<? echo $i; ?>">0<? echo $i; ?></option> 
					 <? }else{ ?>
                     <option <? if(isset($_POST['idmov'])){ if(substr($rowmm[3],5,2)==$i){ ?> selected <? } } ?> value="<? echo $i; ?>"><? echo $i; ?></option>
                    <? }} ?>
                    </select>
                     <select id="dia" name="dia" style="width:70px; float:left;">
                     <option value="--">Dia</option>
                     <? for($i=1; $i<=31; $i++){ ?>
                     <? if($i<=9){ ?>
						<option <? if(isset($_POST['idmov'])){ if(substr($rowmm[3],8,2)=='0'.$i){ ?> selected <? } } ?> value="0<? echo $i; ?>">0<? echo $i; ?></option> 
					 <? }else{ ?>
                     <option <? if(isset($_POST['idmov'])){ if(substr($rowmm[3],8,2)==$i){ ?> selected <? } } ?> value="<? echo $i; ?>"><? echo $i; ?></option>
                    <? }} ?>
                    </select>
                    </div>
                    </td>
                    <td>
                    <label for="field-two">Tipo</label>
                    <select id="tipo" name="tipo" onchange="javascript:cambiartipo(this)">
                     <option value="--">--</option>
                     <option <? if(isset($_POST['idmov'])){ if($rowmm[4]=='BANCO'){ ?> selected <? } } ?> value="BANCO">BANCO</option>
                     <option <? if(isset($_POST['idmov'])){ if($rowmm[4]=='EFECTIVO'){ ?> selected <? } } ?> value="EFECTIVO">EFECTIVO</option>
                    </select>
                    </td>
                    </tr>
                    </table>
                   
                    
                    
                     <div id="bancodiv" <? if(isset($_POST['idmov'])){ if($rowmm[4]=='EFECTIVO'){ ?> style="display:none" <? }}else{ ?> style="display:none" <? }  ?>>
                      <table>
                    <tr>
                      <td>
                         <label for="field-two">Banco</label>
                         <select id="bancob" name="bancob" >
                         <option value="--">--</option>
                         <option <? if(isset($_POST['idmov'])){ if($rowmm[5]=='BANAMEX'){ ?> selected <? } } ?> value="BANAMEX">BANAMEX</option>
                         <option <? if(isset($_POST['idmov'])){ if($rowmm[5]=='INBURSA'){ ?> selected <? } } ?> value="INBURSA">INBURSA</option>
                         <option <? if(isset($_POST['idmov'])){ if($rowmm[5]=='BAJIO JORGE'){ ?> selected <? } } ?> value="BAJIO JORGE">BAJIO JORGE</option>
                         <option <? if(isset($_POST['idmov'])){ if($rowmm[5]=='HSBC'){ ?> selected <? } } ?> value="HSBC">HSBC</option>
                        </select>
                         </td>
                          <td>
                    <label for="field-two">Cantidad</label>
                    <input type="text" name="cantidadb" id="cantidadb" onkeypress="return valida(event)" style="width:100px"  <? if(isset($_POST['idmov'])){ ?> value="<? echo $rowmm[6]; ?>" <? } ?>/>
                    </td>
                    <td>
                    <div class="form-actions">
                   <? if(isset($_POST['idmov'])){
						?><button type="submit" value="Actualizar" name="actualizarmov" id="actualizarmov" >Actualizar</button><?
					}else{
						?><button type="submit" value="Guardar" name="guardarmov" id="guardarmov" >Guardar</button><?
					}
					?>
                </div>
                    </td>
                     </tr>
               </table>
                    </div>
                    <div id="efectivodiv" <? if(isset($_POST['idmov'])){  if($rowmm[4]=='BANCO'){ ?> style="display:none" <? } }else{ ?> style="display:none" <? } ?>>
                     <table>
                    <tr>
                     <td>
                         <label for="field-two">Efectivo</label>
                         <select id="bancoe" name="bancoe" >
                         <option value="--">--</option>
                         <option <? if(isset($_POST['idmov'])){ if($rowmm[5]=='TRANSPORTISTA'){ ?> selected <? } } ?> value="TRANSPORTISTA">TRANSPORTISTA</option>
                         <option <? if(isset($_POST['idmov'])){ if($rowmm[5]=='SALDO A FAVOR'){ ?> selected <? } } ?> value="SALDO A FAVOR">SALDO A FAVOR</option>
                         <option <? if(isset($_POST['idmov'])){ if($rowmm[5]=='CAJA CHICA'){ ?> selected <? } } ?> value="CAJA CHICA">CAJA CHICA</option>
                         <option <? if(isset($_POST['idmov'])){ if($rowmm[5]=='PAGO EN SUCURSAL'){ ?> selected <? } } ?> value="PAGO EN SUCURSAL">PAGO EN SUCURSAL</option>
                        </select>
                         </td>
                         
                          <td>
                    <label for="field-two">Cantidad</label>
                    <input type="text" name="cantidade" id="cantidade" onkeypress="return valida(event)" style="width:100px" <? if(isset($_POST['idmov'])){ ?> value="<? echo $rowmm[6]; ?>" <? } ?>/>
                    </td>
                    <td>
                    <div class="form-actions">
                    <? if(isset($_POST['idmov'])){
						?><button type="submit" value="Actualizar" name="actualizarmov" id="actualizarmov" >Actualizar</button><?
					}else{
						?><button type="submit" value="Guardar" name="guardarmov" id="guardarmov" >Guardar</button><?
					}
					?>
                    
                   
                </div>
                    </td>
                    </tr>
               </table>
                    </div>
      </fieldset>
</form>
        <hr>
         <h2>Movimientos</h2>
       <table style="font-size:11px;">
       <tr>
        <td><strong>Referncia</strong></td>
        <td><strong>Fecha</strong></td>
        <td><strong>Tipo</strong></td>
        <td><strong>Banco/Efectivo</strong></td>
        <td><strong>Cantidad</strong></td>
        <td>&nbsp;</td>
        </tr>
       <?
	   $linkm=mysql_connect($host,$user,$pass) or die("resultado=".urlencode(mysql_error()));
	mysql_select_db($bbdd,$linkm) or die("resultado=".urlencode(mysql_error()));
	$resultm=mysql_query("SELECT * from ingresosyegresos where id_mudanza=".$_POST['id'], $linkm);

	$cn=1;
	while($rowm=mysql_fetch_row($resultm)){
		if($rowm[2]==1){
			$refe="Ingreso";	
			$c='#c8c8c6';
		}else{
			$refe="Egreso";
			$c='#dbdbdb';
		}
		
		?>
		<tr style="background:<? echo $c; ?>; height: 42px; vertical-align:middle; border:#5A5959 solid 1px; ">
        <td  style="vertical-align:middle;"><? echo $refe; ?></td>
        <td style="vertical-align:middle;"><? echo substr($rowm[3], 8, 2).'-'.substr($rowm[3], 5, 2).'-'.substr($rowm[3], 0, 4); ?></td>
        <td style="vertical-align:middle;"><? echo $rowm[4]; ?></td>
        <td style="vertical-align:middle;"><? echo $rowm[5]; ?></td>
        <td style="vertical-align:middle;"><?  echo money_format('%(#10n',$rowm[6]); ?></td>
        <td style="vertical-align:middle;"><a href="#" class="boton" onClick="javascript: movimov(<? echo $_POST['id'].','.$rowm[0]; ?>)" >Modificar</a></td>
         <td style="vertical-align:middle;"><a href="#" class="boton2" onClick="javascript: elimov(<? echo $_POST['id'].','.$rowm[0]; ?>)" >Eliminar</a></td>
        </tr>
        <?
	}
	   ?>
     </table>  