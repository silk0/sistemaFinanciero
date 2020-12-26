
<?php
//Codigo que muestra solo los errores exceptuando los notice.
error_reporting(E_ALL & ~E_NOTICE);
session_start();
if($_SESSION["logueado"] == TRUE) {
$usuario=$_SESSION["usuario"];
$nombre = $_SESSION["nombre"];
$tipo  = $_REQUEST["tipo"];
$id  = $_REQUEST["id"];
}else {
    header("Location:index.php");
  }
?>
<?php
$id = $_REQUEST["id"];
include "config/conexion.php";
$result = $conexion->query("SELECT
tventas.codigo,
tventas.id_venta,
templeados.nombre as nomv,
templeados.apellido as apev,
tclientes.nombre as nomc,
tclientes.apellido as apec,
tplan_pago.nombre as plan
FROM
tventas
INNER JOIN templeados ON tventas.id_empleado = templeados.id_empleado
INNER JOIN tclientes ON tventas.id_cliente = tclientes.id_cliente
INNER JOIN tplan_pago ON tventas.id_plan = tplan_pago.id_plan where id_venta=" . $id);
if ($result) {
    while ($fila = $result->fetch_object()) {
        $idR               = $fila->id_venta;
        $codigoR           = $fila->codigo;
        $nombrevR         = $fila->nomv;
        $apellidovR         = $fila->apev;
        $nombrecR         = $fila->nomc;
        $apellidocR         = $fila->apec;
        $planR        = $fila->plan;
   
       }
}

?>
<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Detalle ventas | SISFIN</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <!-- datapicker CSS
		============================================ -->
        <link rel="stylesheet" href="css/datapicker/datepicker3.css">
    <!-- bootstrap select CSS
		============================================ -->
        <link rel="stylesheet" href="css/bootstrap-select/bootstrap-select.css">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- font awesome CSS
		============================================ -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/owl.transitions.css">
    <!-- meanmenu CSS
		============================================ -->
    <link rel="stylesheet" href="css/meanmenu/meanmenu.min.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- Notika icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/notika-custom-icon.css">
    <!-- wave CSS
		============================================ -->
    <link rel="stylesheet" href="css/wave/waves.min.css">
    <link rel="stylesheet" href="css/wave/button.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="css/main.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="style.css">
     <!-- notification CSS
        ============================================ -->
        <link rel="stylesheet" href="css/notification/notification.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>
<script  language=JavaScript> 
function recuperarPlanes(){ 
    if(document.getElementById("cliente").value=="Seleccione"){
        notify('Error:','Debe seleccionar un cliente.','top', 'right', 'any', 'warning');
    }else{
        $.ajax({
        data:{"id":document.getElementById("cliente").value},
        url: 'scriptsphp/recuperarPlanesDePagoContado.php',
        type: 'post',
        beforeSend: function(){
        //   notify('Exito','Correlativo Generado','top', 'right', 'any', 'success');
        },
        success: function(response){
     
            // alert(response);
            $("#selectpp").html(response);
            $('.selectpicker').selectpicker({
               
            });
           
        }
    });
    }
    
}
function go(){

    //Validaciones
   if(document.getElementById('cliente').value=="Seleccione"){
     notify(' Advertencia:','El campo Cliente es obligatorio.','top', 'right', 'any', 'warning');
       document.getElementById("cliente").focus();
   }else if(document.getElementById('pp').value=="Seleccione"){
        notify(' Advertencia:','El campo Plan de Pago es obligatorio,','top', 'right', 'any', 'warning');
       document.getElementById("pp").focus();
   }else{
      document.form.submit();  
   }   
} 
function tabla(){
    document.location.href="mostrarVentas.php"; 
}
function enviar(){
        var idt=document.getElementById("tipo").value;
        var idd=document.getElementById("dpto").value;
       
        if(idt=="Seleccione" || idd=="Seleccione"){
            notify(' Advertencia:','Seleccione el tipo de activo y el departamento al que pertenece para generar correlativo','top', 'right', 'any', 'warning');
        }else{
            $.ajax({
        data:{"id":5,"idd":idd,"idt":idt,},
        url: 'scriptsphp/recuperarCorrelativo.php',
        type: 'post',
        beforeSend: function(){
          notify('Exito','Codigo Generado','top', 'right', 'any', 'success');
        },
        success: function(response){
            document.getElementById("correlativo").value=response;
        }
        });
        }
}
function kardex(bandera,id,fechaR,descripcionR,accion,cantidadR,vunitarioR,subtotalR){
          // alert(bandera);
          // alert(id);
          // alert(fechaR);
          // alert(descripcionR);
          // alert(accion);
          // alert(cantidadR);
          // alert(vunitarioR);
          // alert(subtotalR);
          var parametros={
            "bandera":bandera,
            "id" :id,
            "fechaR" :fechaR,
            "descripcionR" :descripcionR,
            "accion" :accion,
            "cantidadR" :cantidadR,
            "vunitarioR" :vunitarioR,
            "subtotalR" :subtotalR
          };
          $.ajax({
            data: parametros,
            url: "addKardex.php",
            type:"post",
            success: function(response){
              alert(response);
              document.location.href="Kardex.php?id="+id;
            }
          });
        }
        function vaciar(){
            $.ajax({
        data:{"id":0,"cantidadDeseada":0,"op":3},
        url: 'scriptsphp/ajaxCarrito.php',
        type: 'post',
        beforeSend: function(){
            // alert("Por favor espere...");
        },
        success: function(response){
                // alert(response);
                $("#cantidadCarrito").html(response);            
        }
    });
        }

function notify(titulo,texto,from, align, icon, type, animIn, animOut){
        $.growl({
            icon: icon,
            title: titulo+" ",
            message: texto,
            url: ''
        },{
                element: 'body',
                type: type,
                allow_dismiss: true,
                placement: {
                        from: from,
                        align: align
                },
                offset: {
                    x: 20,
                    y: 85
                },
                spacing: 10,
                z_index: 1031,
                delay: 2500,
                timer: 1000,
                url_target: '_blank',
                mouse_over: false,
                animate: {
                        enter: animIn,
                        exit: animOut
                },
                icon_type: 'class',
                template: '<div data-growl="container" class="alert" role="alert">' +
                                '<button type="button" class="close" data-growl="dismiss">' +
                                    '<span aria-hidden="true">&times;</span>' +
                                    '<span class="sr-only">Close</span>' +
                                '</button>' +
                                '<span data-growl="icon"></span>' +
                                '<span data-growl="title"></span>' +
                                '<span data-growl="message"></span>' +
                                '<a href="#" data-growl="url"></a>' +
                            '</div>'
        });
    }

 

   


</script> 

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    
      <!-- Start Header Top Area -->
    <?php include "header.php"; ?>
        <!-- End Header Top Area -->

    <!-- Mobile Menu start -->
    <?php include "menumobil.php"; ?>
    <!-- Mobile Menu end -->

    <!-- Main Menu area start-->
    <?php include "menuprincipal.php"; ?>
    <!-- Main Menu area End-->
	<!-- Breadcomb area Start-->
	<div class="breadcomb-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="breadcomb-list">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<div class="breadcomb-wp">
									<div class="breadcomb-icon">
										<i class="notika-icon notika-form"></i>
									</div>
									<div class="breadcomb-ctn">
										<h2>Detalle de Venta.</h2>
										<p> Detalle de la venta &nbsp;&nbsp; <span class="bread-ntd">.</span></p>
									</div>
								</div>
							</div>
							<!-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
								<div class="breadcomb-report">
									<button data-toggle="tooltip" data-placement="left" title="Download Report" class="btn"><i class="notika-icon notika-sent"></i></button>
								</div>
							</div> -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Breadcomb area End-->
    <!-- Form Examples area start-->
    <div class="form-example-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-example-wrap">
                        <div class="cmp-tb-hd">
                            <h2>Datos de la Venta</h2>
                            
                        </div>
                        <form name="form" method="post" action="">
                        <input type="hidden" name="bandera" id="bandera" value="1">
                                <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 mg-t-20">
                                <div class="form-example-int">
                                    <div class="form-group">
                                        <label>Codigo Venta:</label>
                                        <div class="nk-int-st">
                                      
                                        <input readonly type="text" class="form-control input-sm" placeholder="Codigo" id="codigo" name="codigo" value="<?php echo $codigoR;?>">
                                        
                                    </div>
                                        
                                    </div>
                                    
                                </div>
                               
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 mg-t-20">
                                <div class="form-example-int">
                                    <div class="form-group">
                                        <label>Vendedor:</label>
                                        <div class="nk-int-st">
                                        <input readonly type="text" class="form-control input-sm" placeholder="" id="vendedor" name="vendedor" value="<?php echo $nombrevR." ".$apellidovR; ?>"> 
                                    <!-- Consulta para recuperar el id del vendedor -->
                                      
                                    <input type="hidden" id="idVendedor" name="idVendedor" value="<?php echo $nombrevR." ".$apellidovR; ?>">   
                                    </div>
                                        
                                    </div>
                                    
                                </div>
                               
                            </div>
                             
                          
             
                           
                            </div>
                              <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Cliente</label>
                            <div class="nk-int-st">
                                        <input readonly type="text" class="form-control input-sm" placeholder="" id="vendedor" name="vendedor" value="<?php echo $nombrecR." ".$apellidocR; ?>"> 
                                    <!-- Consulta para recuperar el id del vendedor -->
                                      
                                   </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><label>Plan de Pago</label>
                                <div class="nk-int-st">
                                        <input readonly type="text" class="form-control input-sm" placeholder="" id="vendedor" name="vendedor" value="<?php echo $planR; ?>"> 
                                    <!-- Consulta para recuperar el id del vendedor -->
                                      
                                   </div>
                               </div>
                            
                                
                          
                                </div>
                                <div class="row">
                                         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="normal-table-list mg-t-30">
                        <div class="basic-tb-hd">
                            <h2>Listado de productos.</h2>
                            <!-- <p>Use contextual classes (<code>.info, .warning, .success, .danger</code>) to color table rows or individual cells.</p> -->
                        </div>
                        <div class="bsc-tbl-cls">
                            <table class="table table-hover table-striped ">
                                <thead>
                                    <tr>
                                    
                                    <th class="active">Codigo</th>
                                    <th class="active">Nombre</th>
                                    <th class="warning">Cantidad</th>
                                    <th class="danger">Precio</th>
                                    <th class="info">Subtotal</th>
                                    
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                     <?php
                      include 'config/conexion.php';
                      $result = $conexion->query("SELECT
                      tproducto.nombre,
                      tdetalle_venta.cantidad,
                      tventas.codigo,
                      tdetalle_venta.preciovendido,
                      tdetalle_venta.id_venta,
                      tproducto.codigo as cod
                      FROM
                      tdetalle_venta
                      INNER JOIN tproducto ON tdetalle_venta.id_producto = tproducto.id_producto
                      INNER JOIN tventas ON tdetalle_venta.id_venta = tventas.id_venta
                      where tdetalle_venta.id_venta=".$id);
                      if ($result) {
                          $total=0;
                        while ($fila = $result->fetch_object()) {
                          echo "<tr>";
                          echo "<td >".$fila->cod."</td>";
                          echo "<td>".$fila->nombre."</td>";
                          echo "<td class='warning'>".$fila->cantidad."</td>";
                          echo "<td class='warning'>".$fila->preciovendido."</td>";
                          $subtotal=$fila->preciovendido*$fila->cantidad;
                           $nuevoPrecio=number_format($subtotal, 2, ".", "");
                                             
                           echo '<td class="info">'.$nuevoPrecio.'<div class="breadcomb-report">
									
						 		</div></td>';
                          
                           $total=$total+$nuevoPrecio;
                          echo "</tr>";
                           }
                          echo "<tr>";
                           echo "<th colspan='4' class='danger'>Total+Iva+Intereses:</td>";
                        //   Variables a usar, al ser contado no tomamos en cuenta el interes.
                         $cero=0;
                            $intereses=$total*$cero;
                            $valorIVA=0.13;
                            $iva=$total*$valorIVA;
                            $nuevoTotal=number_format(($total+$iva), 2, ".", "");
                           echo "<th class='danger'>".$nuevoTotal."</td>";                         
                         
                          echo "</tr>";
                      }
                       ?>
                                </tbody>
                            </table><br>
                        
                        
                        </div>
                    </div>
                </div>
                                </div>
                           <div class="form-example-int mg-t-15">
                          
                            <button type="button" class="btn btn-success notika-btn-success" onclick="tabla();">Regresar</button>
                        </div>
                        </form>
                    
                </div>
            </div>
            
            
    </div>
    <!-- Form Examples area End-->
    <!-- Start Footer area-->
    <?php include "footer.php";?>
    <!-- End Footer area-->
    <!-- jquery
		============================================ -->
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="js/jquery-price-slider.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="js/meanmenu/jquery.meanmenu.js"></script>
    <!-- counterup JS
		============================================ -->
    <script src="js/counterup/jquery.counterup.min.js"></script>
    <script src="js/counterup/waypoints.min.js"></script>
    <script src="js/counterup/counterup-active.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- sparkline JS
		============================================ -->
    <script src="js/sparkline/jquery.sparkline.min.js"></script>
    <script src="js/sparkline/sparkline-active.js"></script>
    <!-- flot JS
		============================================ -->
    <script src="js/flot/jquery.flot.js"></script>
    <script src="js/flot/jquery.flot.resize.js"></script>
    <script src="js/flot/flot-active.js"></script>
    <!-- knob JS
		============================================ -->
    <script src="js/knob/jquery.knob.js"></script>
    <script src="js/knob/jquery.appear.js"></script>
    <script src="js/knob/knob-active.js"></script>
    <!-- icheck JS
		============================================ -->
    <script src="js/icheck/icheck.min.js"></script>
    <script src="js/icheck/icheck-active.js"></script>
    <!--  wave JS
		============================================ -->
    <script src="js/wave/waves.min.js"></script>
    <script src="js/wave/wave-active.js"></script>
    <!--  Chat JS
		============================================ -->
    <script src="js/chat/jquery.chat.js"></script>
    <!--  todo JS
		============================================ -->
    <script src="js/todo/jquery.todo.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="js/plugins.js"></script>
        <!-- Input Mask JS
		============================================ -->
    <script src="js/jasny-bootstrap.min.js"></script>
     <!-- bootstrap select JS
		============================================ -->
        <script src="js/bootstrap-select/bootstrap-select.js"></script>

    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>
	<!-- tawk chat JS
		============================================ -->
    <!-- <script src="js/tawk-chat.js"></script> -->
       <!-- datapicker JS
		============================================ -->
        <script src="js/datapicker/bootstrap-datepicker.js"></script>
    <script src="js/datapicker/datepicker-active.js"></script>
      <!--  notification JS
        ============================================ -->
        <script src="js/notification/bootstrap-growl.min.js"></script>
        <script src="js/notification/notification-active.js"></script>
</body>

</html>
<?php
include "config/conexion.php";
$bandera  = $_REQUEST["bandera"];

if($bandera==1){
    $codigo    = $_REQUEST["codigo"];
    $vendedor     = $idVendedor;
    $cliente     = $_REQUEST["cliente"];
    $pp    = $_REQUEST["pp"];

$consulta  = "INSERT INTO tventas VALUES('null','" .$cliente. "','" .$codigo. "','" .$pp. "','" .$vendedor. "','" .$nuevoTotal. "','0','0','0','Cancelada',now(),now())";
// msg($consulta);    

$resultado = $conexion->query($consulta);
      if($resultado){
          msgI("Se agregaron los datos a tabla venta.");
          
          //Para eso obtenemos el id de la ultima venta ingresada:
          include 'config/conexion.php';
                                     $resultIdVenta = $conexion->query("select id_venta as idv from tventas");
                                     if ($resultIdVenta) {
                                         while ($fila = $resultIdVenta->fetch_object()) {
                                             $idVenta=$fila->idv;
                                         }
                                        }
//Una vez se han agregado los datos a la tabla se va a guardar el pago.
$consulta  = "INSERT INTO tpago VALUES('null','" .$idVenta. "','" .$nuevoTotal. "',now())";
// msg($consulta);    
$resultado = $conexion->query($consulta);
// 

if($resultado){
     msgI("Se agregaron los datos a tabla tpago.");
    //  Una vez se registro el pago, se va a insertar a la tabla detalle venta
                      $result = $conexion->query("select p.id_producto as id,p.codigo as codigo, p.nombre as nombre, p.precio_venta as preciov, c.cantidad as cantidad,p.precio_venta * c.cantidad as subtotal from tcarrito as c, tproducto as p where c.id_producto=p.id_producto");
                      if ($result) {
                          
                        while ($fila = $result->fetch_object()) {                                                                                        
                        //  Insertamos a la tabla tdetalle_ventas
$consulta  = "INSERT INTO tdetalle_venta VALUES('null','" .$idVenta. "','" .$fila->id."','" .$fila->cantidad."','" .$fila->preciov."')";
// msg($consulta);    
$resultado = $conexion->query($consulta);
if($resultado){
    
}else{
    //  msgE("Error:".$consulta);
    echo $consulta;
}

        // Ahora se va a modificar la exstencia del producto
        // Obtenemos la cantidad anterior del precio del producto
        $resultProdStock = $conexion->query("select * from tproducto where id_producto=" . $fila->id);
        if ($resultProdStock) {
            while ($filaProdStock = $resultProdStock->fetch_object()) {
              $cantidadAnterior=$filaProdStock->stock;
              echo $cantidadAnterior;
            }
        }else{
        //    msgI('Error consulta cantidad anterior.');
        echo "error en prodstock";
        }
        
        $nstock=$cantidadAnterior-$fila->cantidad;
        echo "Nuevo stock:".$nstock;
        $consulta2  = "UPDATE tproducto set stock='" . $nstock . "' where id_producto='" .$fila->id. "'";
        $resultado2 = $conexion->query($consulta2);
        if($resultado2){
            // si viene aqui es porque ya solo falta guardar en kardex

             msgk($fila->id,$fila->cantidad,$fila->preciov);
        }else{
        //    msgI('Error actualizando datos');
           echo $consulta2;
        }
        
        




                           } //fin de while que recorre todos los productos del carrito                     
                      }//fin de result de consulta para pdoructos del carrito
                      vaciarCarrito();




}else{
     msgE("Error al insertar los datos en tpago");
}
      } else {
          msgE("Error al insertar los datos en tventas");
      }
}
function vaciarCarrito(){
    echo "<script type='text/javascript'>";
    // echo "alert('Hola msgk');";
    echo "vaciar();";
    echo "</script>";
}
function msgK($idR,$cantidad,$precio)
{
     $subtotal=$cantidad*$precio;
    $fecha2=strftime( "%Y-%m-%d", time());
    echo "<script type='text/javascript'>";
    // echo "alert('Hola msgk');";
    echo "kardex('add','".$idR."','".$fecha2."','Venta de producto.','2','".$cantidad."','".$precio."','".$subtotal."');";
    echo "</script>";
}
function msgI($texto)
{
    echo "<script type='text/javascript'>";
    echo "notify('Exito','$texto','top', 'right', 'any', 'success');";
    echo "</script>";
}
function msg($texto)
{
    echo "<script type='text/javascript'>";
    echo "alert(".$texto.")";
    echo "</script>";
}
function msgA($texto)
{
    echo "<script type='text/javascript'>";
    echo "notify('Advertencia','$texto','top', 'right', 'any', 'warning');";
    echo "</script>";
}
function msgE($texto)
{
    echo "<script type='text/javascript'>";
    echo "notify('Error','$texto','top', 'right', 'any', 'danger');";
    echo "</script>";
}
?>