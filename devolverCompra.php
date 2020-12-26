<?php
//Codigo que muestra solo los errores exceptuando los notice.
error_reporting(E_ALL & ~E_NOTICE);
session_start();
if($_SESSION["logueado"] == TRUE) {
$usuario=$_SESSION["usuario"];
$nombre = $_SESSION["nombre"];
$tipo  = $_REQUEST["tipo"];
$ids  = $_REQUEST["id"];
}else {
    header("Location:index.php");
  }
?>
<?php
$id = $_REQUEST["id"];
include "config/conexion.php";
$result = $conexion->query("select p.precio_compra as precioco ,p.stock as stock,p.id_producto as idp, p.nombre as namep,prov.id_proveedor as idprov,prov.nombre as nameprov from tproducto as p,tproveedor as prov  where p.id_proveedor=prov.id_proveedor and id_producto=" . $id);
if ($result) {
    while ($fila = $result->fetch_object()) {
        $idR               = $fila->idp;
        $nombreprod      = $fila->namep;
        $idprov         = $fila->idprov;
        $nombreprov        = $fila->nameprov;
        $precioco= $fila->precioco;
        $cantidad= $fila->stock;
       }
}

?>
<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Registrar devolución | SISFIN</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <!-- notification CSS
		============================================ -->
    <link rel="stylesheet" href="css/notification/notification.css">
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
    <link rel="stylesheet" href|="css/owl.transitions.css">
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
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    <script>
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
        function go(){

    //Validaciones
    var can=document.getElementById("cantidad").value;
    var canr=document.getElementById("cantidadr").value;
    alert(can);
    alert(canr);
    if (parseInt(can)>parseInt(canr)) {
        
        notify(' Advertencia:','No puede devolver mas productos de los que dispone.','top', 'right', 'any', 'warning');
    }else{
         if(document.getElementById('precioco').value==""){
 
     notify(' Advertencia:','El campo precio de compra es obligatorio.','top', 'right', 'any', 'warning');
       document.getElementById("precioco").focus();
   }else if(document.getElementById('cantidad').value==""){
        notify(' Advertencia:','El campo Cantidad es obligatorio,','top', 'right', 'any', 'warning');
       document.getElementById("cantidad").focus();
   }else{
      document.form.submit();  
   }   
    }
  
} 
    function calcular(){
        
        var precioco= document.getElementById("precioco").value;
        var cantidad=document.getElementById("cantidad").value;
     
        var subtotal=precioco*cantidad; 
        document.getElementById("subtotal").value=subtotal;
    }

        function edit(id)
        {
            document.location.href="editarProducto.php?id="+id;
        }
        function regresar(){
            document.location.href="comprarProductos.php";
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
    </script>
</head>

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
										<h2>Registro de devolución.</h2>
										<p>Formulario de devolución <span class="bread-ntd">.</span></p>
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
                            <h2>Datos de la devolución&nbsp;&nbsp;<?php echo $fecha=strftime( "%d-%m-%Y", time()); ?></h2>
                            
                        </div>
                         <form name="form" method="post" action='devolverCompra.php?bandera=1&id=<?php echo $idR;?>'>
                        <input type="hidden" id="fechac" name="fechac" value="<?php echo $fecha;?>">
                        <input type="hidden" id="id" name="id" value="<?php echo $idR;?>">
                        <input type="text" id="cantidadr" name="cantidadr" value="<?php echo $cantidad;?>">
                     
                       <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-example-int">
                                    <div class="form-group">
                                        <label>Producto:</label>
                                        <div class="nk-int-st">
                                        <input type="text" name="nombre" id="nombre" class="form-control input-sm" placeholder="Ingrese nombre del producto." value="<?php echo $nombreprod ?>" readonly >
                                        </div>
                                        <button class='btn btn-lightgreen lightgreen-icon-notika btn-reco-mg btn-button-mg' data-toggle='tooltip' data-placement='bottom' title='Cambiar el producto.' onclick='regresar()'><i class='notika-icon notika-up-arrow'></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-example-int">
                                    <div class="form-group">
                                        <label>Proveedor:</label>
                                        <div class="nk-int-st">
                                        <input type="text" name="apellido" id="apellido" class="form-control input-sm" placeholder="Ingrese el nombre del proveedor." value="<?php echo $nombreprov ?>" readonly>
                                        </div>
                                        <button class='btn btn-lightgreen lightgreen-icon-notika btn-reco-mg btn-button-mg' data-toggle='tooltip' data-placement='bottom' title='Cambiar proveedor.' onclick='edit("<?php echo $idR ?>")'><i class='notika-icon notika-up-arrow'></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                <div class="form-example-int">
                                    <div class="form-group">
                                        <label>Precio de compra:</label>
                                        <div class="nk-int-st">
                                        <input type="text" name="precioco" readonly="true" id="precioco" class="form-control input-sm" placeholder="$0.00"  value="<?php echo $precioco; ?>" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
                                <div class="form-example-int">
                                    <div class="form-group">
                                        <label>Cantidad:</label>
                                        <div class="nk-int-st">
                                        <input type="text" name="cantidad" id="cantidad" class="form-control input-sm" placeholder="00" onkeyup="calcular()">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
                                <div class="form-example-int">
                                    <div class="form-group">
                                        <label>Subtotal:</label>
                                        <div class="nk-int-st">
                                        <input type="text" name="subtotal" id="subtotal" class="form-control input-sm" placeholder="00" >
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                            
                        
                        
                        
                        
                        
                        <!-- FILA PARA DATOS CORTOS -->
                        
                         <!-- FIN DE FILA PARA DATOS CORTOS -->
                        
                        
                        

                        
                        
                        <div class="form-example-int mg-t-15">
                            <button type="button" class="btn btn-success notika-btn-success" style="margin-left: 500px;" onclick="go()" >Guardar.</button>
                        </div>
                        </form>
                    </div>
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
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>
     <!--  notification JS
		============================================ -->
        <script src="js/notification/bootstrap-growl.min.js"></script>
    <script src="js/notification/notification-active.js"></script>
	<!-- tawk chat JS
		============================================ -->
    <!-- <script src="js/tawk-chat.js"></script> -->
</body>

</html>
<?php
include "config/conexion.php";

$accion=$_REQUEST['bandera'];
  $precio=$_POST['precioco'];
  $cantidad  = $_POST['cantidad'];

if($accion==1){

    $consulta  = "INSERT INTO tdevolucion VALUES('null','" .$idR. "','" .$idprov. "',now(),'" .$precio. "','" .$cantidad. "')";
    $resultado = $conexion->query($consulta);
      if ($resultado) {
        // Ahora se va a modificar la exstencia del producto
        // Obtenemos la cantidad anterior del precio del producto
        $result = $conexion->query("select * from tproducto where id_producto=" . $idR);
        if ($result) {
            while ($fila = $result->fetch_object()) {
              $cantidadAnterior=$fila->stock;
              $margen=$fila->margen;
            }
        }else{
           msgI('Error consulta cantidad anterior.');
        }
        // Ahora vamos a actualizar el stock actual y establecer el precio de venta 
        // $margen=$margen/100;
        // $nprecioventa=($margen*$precio)+$precio;
        $nstock=$cantidadAnterior-$cantidad;
        $consulta2  = "UPDATE tproducto set stock='" . $nstock . "' where id_producto='" . $idR . "'";
        $resultado2 = $conexion->query($consulta2);
        if($resultado2){

        }else{
           msgI('Error actualizando datos');
        }
        msgI("Los datos fueron almacenados con exito");
        msgk($idR,$cantidad,$precio);
      } else {
        msgI('Error, no se ingreso en la bd.');
      }     

}
function msgK($idR,$cantidad,$precio)
{
     $subtotal=$cantidad*$precio;
    $fecha2=strftime( "%Y-%m-%d", time());
    echo "<script type='text/javascript'>";
    // echo "alert('Hola msgk');";
    echo "kardex('add','".$idR."','".$fecha2."','Devolucion de producto.','2','".$cantidad."','".$precio."','".$subtotal."');";
    echo "</script>";
}
function msgI($texto){
   echo "<script type='text/javascript'>";
    echo "notify('Exito','$texto','top', 'right', 'any', 'success');";
    
    echo "</script>";

}
?>