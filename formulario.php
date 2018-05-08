<div title="form-overlay" id="form-overlay" class="hidden" style="border-radius:8px;">
        
            <form method="POST" action="tareas.php" enctype="multipart/form-data">
                <fieldset>
                    <legend>Nueva Mudanza</legend>
                 
                    
                      </fieldset>
                      
                      <fieldset>
                      <table>
                      <tr>
                      <td>
                      <label for="field-two">Número</label>
                    <input type="text" name="no" id="no"  style="width:50px"/>
                    </td>
                    <td>
                      <label for="field-two">Fecha Mudanza</label>
                    <div style="width:100%; overflow:hidden;">
                   <select id="anio" name="anio" style="width:70px; float:left;">
                     <option value="--">Año</option>
                     <? for($i=date('Y'); $i>=2015; $i--){ ?>
                     <option value="<? echo $i; ?>"><? echo $i; ?></option>
                    <? } ?>
                    </select>
                      <select id="mes" name="mes" style="width:70px; float:left;">
                     <option value="--">Mes</option>
                     <? for($i=1; $i<=12; $i++){ ?>
                     <? if($i<=9){ ?>
						<option value="0<? echo $i; ?>">0<? echo $i; ?></option> 
					 <? }else{ ?>
                     <option value="<? echo $i; ?>"><? echo $i; ?></option>
                    <? }} ?>
                    </select>
                     <select id="dia" name="dia" style="width:70px; float:left;">
                     <option value="--">Dia</option>
                     <? for($i=1; $i<=31; $i++){ ?>
                     <? if($i<=9){ ?>
						<option value="0<? echo $i; ?>">0<? echo $i; ?></option> 
					 <? }else{ ?>
                     <option value="<? echo $i; ?>"><? echo $i; ?></option>
                    <? }} ?>
                    </select>
                    </div>
                    </td>
                    <td>
                    <label for="field-two">Origen y Destino</label>
                    <input type="text" name="origenydestino" id="origenydestino" style="width:350px"/>
                    </td>
                   
                    </tr>
                    </table>
                    <table>
                    <tr>
                     <td>
                    <label for="field-two">Costo Cliente</label>
                    <input type="text" name="costocliente" id="costocliente"  onkeypress="return valida(event)" style="width:100px"/>
                    </td>
                    <td>
                    <label for="field-two">Costo Proveedor</label>
                    <input type="text" name="costoproveedor" id="costoproveedor" onkeypress="return valida(event)" style="width:100px"/>
                    </td>
                    <td>
                    <label for="field-two">Utilidad Flete</label>
                    <input type="text" name="utilidadflete" id="utilidadflete" onkeypress="return valida(event)" style="width:100px"/>
                    </td>
                    <td>
                    <label for="field-two">Factura</label>
                    <select id="tipo" name="factura">
                     <option value="--">--</option>
                        <option value="No">No</option>
                        <option value="Si">Si</option>
                    </select>
               </td>
               </tr>
               </table>
               
                </fieldset>
                
               
                <div class="form-actions">
                    <button type="submit" value="Guardar" name="guardar" id="guardar">Guardar</button>
                   <!-- <button type="button">Cancel</button>-->
                </div>
            </form>
        </div>