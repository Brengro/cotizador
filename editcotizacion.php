<div class="row">
    <div class="col-md-6">
<form id="formn" name="formn" action="tareas.php?edit=1&nc=1&c=<? echo $_GET['c']; ?>" method="post" >
<?
$link=mysql_connect($host,$user,$pass) or die("resultado=".urlencode(mysql_error()));
	mysql_select_db($bbdd,$link) or die("resultado=".urlencode(mysql_error()));
	$result=mysql_query("SELECT * from cotizacion2 where clave='".$_GET['c']."'", $link);
	$row=mysql_fetch_row($result);
?>
<input type="hidden" name="cla" id="cla" value="<? echo $_GET['c']; ?>">


   <div class="form-group" >
            <label>Cliente</label>
               <input name="cliente" id="cliente" autocomplete="off"  style="text-transform: uppercase;" class="form-control" type="text" <? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['cliente']; ?>"  <?  }else{ ?>  value="<? echo $row[1]; ?>" <? } ?>>
              </div>

              <div class="form-group" >
            <label>Origen</label>
               <input  name="origen" id="origen"  style="text-transform: uppercase;" class="form-control" type="text"  autocomplete="off" <? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['origen']; ?>"  <?  }else{ ?>  value="<? echo $row[2]; ?>" <? } ?> >
              </div>

              <div class="form-group">
            <label>Destino</label>
               <input name="destino" id="destino" style="text-transform: uppercase;" class="form-control" type="text" autocomplete="off" <? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['destino']; ?>"  <?  }else{ ?>  value="<? echo $row[3]; ?>"  <? } ?> onChange="javascript: buscarkm();"  >
              </div>
<div class="form-group" style="width: 100px;">
            <label>KM</label>
               <input name="km" id="km"  style="text-transform: uppercase;" class="form-control" type="text" onkeypress="return valida(event)" <? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['km']; ?>"  <?  }else{ ?>  value="<? echo $row[10]; ?>" <? } ?>onkeypress="return valida(event)" >
              </div>

              <div class="form-group" style="width: 100px;">
            <label>M3</label>
               <input name="m3" id="m3"  style="text-transform: uppercase;" class="form-control" type="text" onkeypress="return valida(event)" <? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['m3']; ?>"  <?  }else{ ?>  value="<? echo $row[11]; ?>" <? } ?> onkeypress="return valida(event)" >
              </div>

               <div class="form-group">
            <label>Tipo Mudanza</label>
              <select class="form-control select2" style="width: 100%; text-transform: uppercase;"  name="tipo_mudanza" id="tipo_mudanza">
                  <option value="--">--</option>
    <option <? if($_POST['tipo_mudanza']=='Exclusivo'){ ?> selected <? } ?> <? if($row[4]=='Exclusivo'){ ?> selected <? } ?> value="Exclusivo">Exclusivo</option>
    <option <? if($_POST['tipo_mudanza']=='Compartido'){ ?> selected <? } ?> value="Compartido">Compartido</option>
                </select>
              </div>

 <div class="form-group" style="width: 25%">
                  <label>Lista de muebles:</label>
                  <textarea  id="muebles" name="muebles" class="form-control" rows="3" placeholder="muebles ..." style="text-transform: uppercase;" ><? if(isset($_POST['borrador'])){  echo str_replace('<br />','',$_POST['muebles']);  }else{  echo str_replace('<br />','',$row[7]); } ?></textarea>
                </div>
              
    
 <div class="form-group" style="width: 50%; margin-right: auto; margin-left: auto; align-content: center;">
  <label style="margin-right: auto; margin-left: auto;" >Extras</label>
<table style="width: 300px; margin-right: auto; margin-left: auto;" align="center">
<tr>
  <td style="padding: 1px;"> <label style="margin-bottom: 0px;">KM Extra</label></td>
  <td style="padding: 1px;"></td>
  <td style="padding: 1px;"><input name="km_extra" id="km_extra"  placeholder="0"  style="text-transform: uppercase; width: 70px; height: 26px; margin-bottom: 0px;" class="form-control" type="text" onkeypress="return valida(event)" <? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['km_extra']; ?>"  <?  }else{ ?>  value="<? echo $row[12]; ?>" <? } ?> onkeypress="return valida(event)"  ></td>
</tr>
<tr>
  <td style="padding: 1px;"><label style="margin-bottom: 0px;">Empaque Cajas</label></td>
  <td style="padding: 1px;"></td>
  <td style="padding: 1px;"><input  name="empaquec" id="empaquec"  style="text-transform: uppercase; width: 70px; height: 26px; margin-bottom: 0px;" class="form-control" type="text"  autocomplete="off"<? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['empaquec']; ?>" <?  }else{ ?> value="<? echo $row[13]; ?>" <? } ?> onkeypress="return valida(event)"  placeholder="0"  ></td>
</tr>
<tr>
  <td style="padding: 1px;"><label style="margin-bottom: 0px;">Emplaye Total</label></td>
  <td style="padding: 1px;"></td>
  <td style="padding: 1px;"><input  name="emplayet" id="emplayet"  style="text-transform: uppercase; width: 70px; height: 26px; margin-bottom: 0px;" class="form-control" type="text"  autocomplete="off"<? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['emplayet']; ?>" <?  }else{ ?> value="<? echo $row[14]; ?>"<? } ?> onkeypress="return valida(event)"  placeholder="0"  ></td>
</tr>
<tr>
  <td style="padding: 1px;"><label style="margin-bottom: 0px;">Caja Closet Venta</label></td>
  <td style="padding: 1px;"></td>
  <td style="padding: 1px;"><input  name="cajacv" id="cajacv"  style="text-transform: uppercase; width: 70px; height: 26px; margin-bottom: 0px;" class="form-control" type="text"  autocomplete="off"<? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['cajacv']; ?>"  <?  }else{ ?> value="<? echo $row[15]; ?>"<? } ?> onkeypress="return valida(event)"   placeholder="0" ></td>
</tr>
<tr>
  <td style="padding: 1px;"><label style="margin-bottom: 0px;">Caja Closet Renta</label></td>
  <td style="padding: 1px;"></td>
  <td style="padding: 1px;"> <input  name="cajacr" id="cajacr"  style="text-transform: uppercase; width: 70px; height: 26px; margin-bottom: 0px;" class="form-control" type="text"  autocomplete="off" <? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['cajacr']; ?>" <?  }else{ ?> value="<? echo $row[16]; ?>" <? } ?> onkeypress="return valida(event)"  placeholder="0"  ></td>
</tr>
<tr>
  <td style="padding: 1px;"><label style="margin-bottom: 0px;">Desempaque a Granel</label></td>
  <td style="padding: 1px;"></td>
  <td style="padding: 1px;"><input  name="desempaqueg" id="desempaqueg"  style="text-transform: uppercase; width: 70px; height: 26px; margin-bottom: 0px;" class="form-control" type="text"  autocomplete="off"<? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['desempaqueg']; ?>"  <?  }else{ ?>  value="<? echo $row[17]; ?>"  <? } ?> onkeypress="return valida(event)"  placeholder="0"  ></td>
</tr>
<tr>
  <td style="padding: 1px;"><label style="margin-bottom: 0px;">Empaque de Muebles</label></td>
  <td style="padding: 1px;"></td>
  <td style="padding: 1px;"><input  name="empaquem" id="empaquem"  style="text-transform: uppercase; width: 70px; height: 26px; margin-bottom: 0px;" class="form-control" type="text"  autocomplete="off"<? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['empaquem']; ?>"  <?  }else{ ?> value="<? echo $row[18]; ?>" <? } ?> onkeypress="return valida(event)"  placeholder="0"   ></td>
</tr>
<tr>
  <td style="padding: 1px;"><label style="margin-bottom: 0px;">Seguro</label></td>
  <td style="padding: 1px;"></td>
  <td style="padding: 1px;"><input  name="seguro" id="seguro"  style="text-transform: uppercase; width: 70px; height: 26px; margin-bottom: 0px;" class="form-control" type="text"  autocomplete="off" <? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['seguro']; ?>"  <?  }else{ ?> value="<? echo $row[19]; ?>"  <? } ?> onkeypress="return valida(event)"  placeholder="0.0"   ></td>
</tr>
<tr>
  <td style="padding: 1px;"><label style="margin-bottom: 0px;">Otros</label></td>
  <td style="padding: 1px;"></td>
  <td style="padding: 1px;"><input  name="otros" id="otros"  style="text-transform: uppercase; width: 70px; height: 26px; margin-bottom: 0px;" class="form-control" type="text"  autocomplete="off" <? if(isset($_POST['borrador'])){ ?> value="<? echo $_POST['otros']; ?>" <?  }else{ ?> value="<? echo $row[20]; ?>"  <? } ?> onkeypress="return valida(event)" placeholder="0" ></td>
</tr>
</table>


                </div>

 
   <div class="box-footer">
                <button type="submit" class="btn btn-primary"  name="borrador" id="borrador">Generar Borrador</button>
              </div>
   

    </div>
</div>

<? if(isset($_POST['borrador'])){
$km=$_POST['km'];
$m3=$_POST['m3'];



       $c13=$_POST['empaquec'];
       $c14=$_POST['emplayet'];
       $c15=$_POST['cajacv'];
       $c16=$_POST['cajacr'];
       $c17=$_POST['desempaqueg'];
       $c18=$_POST['empaquem'];
       $c19=$_POST['seguro'];
       $c20=$_POST['otros'];
       $c21=($c13*160)+($c14*400)+($c15*300)+($c16*160)+($c17*80)+($c18*75)+($c19 * .025)+($c20*2500);

if($km>1000){
  if($m3<=13){
    $cm3=($km*5)/1000;
  }else{
    if($m3<=23){
    $cm3=($km*7)/1000;
  }else{
    if($m3<=30){
    $cm3=($km*8)/1000;
   }else{
    $cm3=($km*10)/1000;
    }
   }
  }
} else{

if($km>500){
  if($m3<=13){
    $cm3=($km*9)/1000;
  }else{
    if($m3<=23){
    $cm3=($km*13)/1000;
  }else{
    if($m3<=30){
    $cm3=($km*16)/1000;
   }else{
    $cm3=($km*20)/1000;
    }
   }
  }
} else{

if($m3<=13){
    $cm3=5500/210;
  }else{
    if($m3<=23){
    $cm3=6500/210;
  }else{
    if($m3<=30){
    $cm3=7000/210;
   }else{
    $cm3=9000/210;
    }
   }
  }

}

$kmext=0;
if($_POST['km_extra']!=''){
if($m3<=13){
    $cm3ex=5500/210;
  }else{
    if($m3<=23){
    $cm3ex=6500/210;
  }else{
    if($m3<=30){
    $cm3ex=7000/210;
   }else{
    $cm3ex=9000/210;
    }
   }
  }

$kmext=$cm3ex*$_POST['km_extra'];

}

$costosin=($km*$cm3)+$kmext;
$costocon=($costosin*.4)+$costosin;
$comsin=$costosin-($costosin*.3);
$comcon=$comsin+($comsin*.3);

$costocon=round($costocon,2);

$comcon=round($comcon,2);
?>
<input name="costo" id="costo" type="hidden" value="<? echo $costocon; ?>" >
<input name="costo2" id="costo2" type="hidden" value="<? echo $comcon; ?>" >
<?
}

?>
<script type="text/javascript">
  //alert('<? echo $cm3; ?>');

</script>

  
 <div class="box">
            <div class="box-header">
              <h3 class="box-title">Borrador
              </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
                <textarea class="textarea" placeholder="Place some text here"
                          style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><? setlocale(LC_MONETARY, 'en_US'); ?>Hola muy buenas tardes nos llego su solicitud por medio de MUDANZA.MX  y esta es su cotizacion.               
El Costo es aproximado y basado en la información previa, por parte del cliente.                
Puede variar sin previo aviso, hasta no corroborar la información.                
Esta es una cotización informativa, en caso de requerir la formal, favor de solicitarlo.                
                
<? echo $_POST['origen']; ?>-<? echo $_POST['destino']; ?>     
<? if($_POST['tipo_mudanza']=='Exclusivo'){  ?>
COSTO DEL SERVICIO     <? echo money_format('%(#10n', $costocon); ?>    PESOS         
Este servicio es el día y la hora que deseen.               
Tiempo de entrega es tiempo en ruta.                
Servicio Puerta a Puerta                
SERVICIO BASICO  CUALQUIER DIA DE LA SEMANA <? }else{ ?>
SERVICIO COMPARTIDO: <? echo money_format('%(#10n', $comcon); ?>      PESOS          
TIEMPO DE ENTREGA :DE 3-15  DIAS DEPENDIENDO RUTA               
2 o mas clientes misma unidad                 
Servicio puerta a puerta.               
SERVICIO BASICO  CUALQUIER DIA DE LA SEMANA   <? } ?>
                
*NO LLEVAMOS MASCOTAS NI PERSONAS , EL SEGURO NO LOS CUBRE*               
                
SERVICIO BASICO INCLUYE:                
*Emplaye de colchones y muebles necesarios (1 Rollo de playo)               
*Maniobra de carga y descarga de planta baja y primer piso                
*Acomodo de cajas en las habitaciones de casa destino (no desempaque)               
* Monitoreo de la unidad durante el trayecto.               
* Entrega mismo día o dependiendo el tiempo de traslado.                
                
NO INCLUYE                
*Empaque de cosas a granel                
*Desempaque en casa desino                
*Desinstalación de aparatos electrónicos, lámparas, estufas y/o lavadoras, etc                
*Volado de Muebles                
*Desarmado y Armado de Muebles                
*Carga y/o descarga en pisos extras $300 piso adicional por escalera o elevador               
*Acarreo en origen                
*En caso fortuito multas de tránsito, permisos o algún otro cargo adicional ajeno al transportista.     

Extras:
<? $extras=0; ?>
<? if($_POST['empaquec']!=0){  ?>* EMPAQUE CAJAS: <? $ext1=($_POST['empaquec']*160); $extras=$extras+$ext1; echo money_format('%(#10n', $ext1); ?>

<? } ?>
<? if($_POST['emplayet']!=0){ ?>* EMPLAYE TOTAL: <? $ext2=($_POST['emplayet']*400); $extras=$extras+$ext2;  echo money_format('%(#10n', $ext2); ?>

<? } ?>
<? if($_POST['cajacv']!=0){ ?>* CAJA CLOSET VENTA: <? $ext3=($_POST['cajacv']*300); $extras=$extras+$ext3; echo money_format('%(#10n', $ext3); ?>

<? } ?>
<? if($_POST['cajacr']!=0){ ?>* CAJA CLOSET RENTA: <? $ext4=($_POST['cajacr']*160); $extras=$extras+$ext4; echo money_format('%(#10n', $ext4); ?>

<? } ?>
<? if($_POST['desempaqueg']!=0){ ?>* DESEMPAQUE A GRANEL: <? $ext5=($_POST['desempaqueg']*80); $extras=$extras+$ext5; echo money_format('%(#10n', $ext5); ?>

<? } ?>
<? if($_POST['empaquem']!=0){ ?>* EMPAQUE DE MUEBLES: <? $ext6=($_POST['empaquem']*75); $extras=$extras+$ext6; echo money_format('%(#10n', $ext6); ?>

<? } ?>
<? if($_POST['seguro']!=0){ ?>* SEGURO DE MERCANCIA: <? $ext7=($_POST['seguro'] * 0.025); $extras=$extras+$ext7; echo money_format('%(#10n', ($ext7 * 0.025)); ?>

<? } ?>
<? if($_POST['otro']!=0){ ?>* OTROS: <? $ext8=($_POST['otros']*2500); $extras=$extras+$ext8; echo money_format('%(#10n', $ext8);  ?>

<? } ?>
<? if($extras!=0){ ?>TOTAL EXTRAS: <?  echo money_format('%(#10n', $extras);   ?>

<? } ?>
<? if($extras>=1){ if($_POST['tipo_mudanza']=='Exclusivo'){  ?>
COSTO TOTAL: <?  echo money_format('%(#10n', ($costocon + $extras));  ?>
<? }else{ ?>
COSTO TOTAL: <?  echo money_format('%(#10n', ($comcon + $extras));  ?>
<? } } ?>


Nuestras unidades, son especiales para mudanza:               
 Cuentan con:               
-Cobijas                
-Colchonetas                
-Plástico stretch (playo)               
-Cuerdas para amarre                
-Personal de maniobras                
                
Si somos aceptados, le pedimos por favor nos avise con antelación para poder programar su mudanza.                
                
ACEPTAMOS               
Efectivo // Deposito OXXO               
TC o Debito               
Transferencia               
                
Esperemos sea de su agrado nuestra cotización. Quedamos pendientes de sus amables comentarios.                
Saludos                 
                
La Unión División Mudanzas                
Lic. Azucena Peña               
Whatsapp: 4421270514                
                
Visita-Go to: www.launionsanmiguel.com                
www.mudanzasforaneaslaunion.com               
La Union Packing & Shipping Services                
¡Empacamos y Enviamos a todo el Mundo!                
Ph/Tel: Store/Tienda: 4151525694                
Zacateros #26 A, Centro               
Salida a Celaya # 83-B                
Ph./Tel 4151859200                
San Miguel Allende, Gto. 37700                
México                

                          </textarea>



                           <div class="box-footer">
 
            <div class="form-group" style="width: 33%; align-content: center;">
                <button type="submit" class="btn btn-primary"  name="editarcotizacion" id="editarcotizacion">Guardar Cotización</button>
             </div>
            <!-- <div class="form-group" style="width: 33%; align-content: center;">
                <button type="submit" class="btn btn-primary"  name="guardarservicio" id="guardarservicio">Generar Servicio</button>
              </div>-->
              </div>

              <?

}?>
              </form>
            </div>
          </div>
        </div>

          </div>

<script type="text/javascript">

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
  

function buscarkm(){



var d1=document.getElementById("origen").value;
var d2=document.getElementById("destino").value;


var kms = new Array(3);
kms[0] = new Array(300);
kms[1] = new Array(300);
kms[2] = new Array(300);
kms[3] = new Array(300);
var cuenta=0;

 <?

  $link = mysql_connect($host,$user,$pass) or die("resultado=".urlencode(mysql_error()));
  mysql_select_db($bbdd,$link) or die("resultado=".urlencode(mysql_error()));
  $result = mysql_query("SELECT origen, destino, km, kmextra FROM cotizacion2 group by origen, destino", $link);
  $r=0;
while($row = mysql_fetch_row($result)){

?>

kms[0][<? echo $r; ?>]="<? echo $row[0]; ?>";
kms[1][<? echo $r; ?>]="<? echo $row[1]; ?>";
kms[2][<? echo $r; ?>]="<? echo $row[2]; ?>";
kms[3][<? echo $r; ?>]="<? echo $row[3]; ?>";

cuenta=<? echo $r; ?>;

<? 
$r++;
} ?>


  

//alert('aqui '+d1+' '+d2+' '+cuenta);
for(var i=0; i<=cuenta; i++){

if(kms[0][i]==d1 && kms[1][i]==d2){

  document.getElementById("km").value=kms[2][i];
  document.getElementById("m3").value=kms[3][i];
}


}




}

</script>
