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
<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Vender|Devolver productos | SISFIN</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
	<!-- wave CSS
		============================================ -->
    <link rel="stylesheet" href="css/wave/waves.min.css">
    <link rel="stylesheet" href="css/wave/button.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- Notika icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/notika-custom-icon.css">
    <!-- Data Table JS
		============================================ -->
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">
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
    function modify(id){
       
         document.location.href="registrarCompra.php?id="+id;
    }
    function devo(id){
       
         document.location.href="devolverCompra.php?id="+id;
    }
     function kardex(id){
   
         document.location.href="kardex.php?id="+id;
    }
    function anadirCarrito(id,stock){ 
        
         var cantidadDeseada=document.getElementById(id).value;
      
         if(document.getElementById(id).value==""){
            alert("Ingrese una cantidad para poder agregar al carrito.");
         }else if(parseInt(cantidadDeseada)>parseInt(stock)){
            
            alert("La canrtidad deseada supera a la cantidad disponible.");
    
         }else{
          //  alert("La canditdad deseada es correcta y va A ser anadida al carrito");
             //aQUI CVA A IR EL CODIGO AJAX PARA PODER ANADIR AL CARRITO
              $.ajax({
        data:{"id":id,"cantidadDeseada":cantidadDeseada,"op":1},
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
										<i class="notika-icon notika-windows"></i>
									</div>
									<div class="breadcomb-ctn">
										<h2>Vender productos</h2>
										<p>Datos de <span class="bread-ntd">la compra.</span></p>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
								<div class="breadcomb-report">
									<button data-toggle="tooltip" data-placement="left" title="Download Report" class="btn"><i class="notika-icon notika-sent"></i></button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Breadcomb area End-->
    <!-- Data Table area Start-->
    <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            
                        </div>
                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                   <tr>                                       
                                        <th>Código</th>
                                        <th>Nombre</th>
                                        <th>Proveedor</th>
                                        <th>Stock</th>
                                        <th>Precio</th>
                                        <th>Cantidad</th>
                                        
                                        <th>Opciones</th>                                       
                                    </tr>
                                </thead>
                                <tbody>
                      <?php
include "config/conexion.php";
$result = $conexion->query("SELECT * from tproducto ORDER BY id_producto");
if ($result) {
    while ($fila = $result->fetch_object()) {
        echo "<tr>";
        echo "<td>" . $fila->codigo . "</td>";
        echo "<td>" . $fila->nombre . "</td>";
        // OBTENER EL NOMBRE DEL PROVEEDOR
        $result2 = $conexion->query("SELECT * from tproveedor where id_proveedor=".$fila->id_proveedor);
        if ($result2) {
             while ($fila2 = $result2->fetch_object()) {
                 echo "<td>" . $fila2->nombre . "</td>"; 
                }
            }
         
        echo "<td>" . $fila->stock . "</td>";
        echo "<td>" . $fila->precio_venta . "</td>";
        echo "<td><input type='number' name='" . $fila->id_producto . "' id='" . $fila->id_producto . "' min='1' max='" . $fila->stock . "'></td>";
        
        echo "<td>
        <div class='button-icon-btn'>
        
        <button class='btn btn-lightgreen lightgreen-icon-notika btn-reco-mg btn-button-mg' data-toggle='tooltip' data-placement='bottom' title='Anadir al carrito.' onclick='anadirCarrito(" . $fila->id_producto. ",". $fila->stock. ")'><i class='notika-icon notika-credit-card'></i></button>
        <button class='btn btn-lightgreen lightgreen-icon-notika btn-reco-mg btn-button-mg' data-toggle='tooltip' data-placement='bottom' title='Hacer una devolucion sobre compra.' onclick='devo(" . $fila->id_producto. ")'><i class='notika-icon notika-down-arrow'></i></button>
        </div>
        </td>";
        echo "</tr>";

    }
}
?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Código</th>
                                        <th>Nombre</th>
                                        <th>Proveedor</th>
                                        <th>Stock</th>
                                        <th>Precio</th>
                                        <th>Cantidad</th>
                                        <th>Opciones</th>  
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Data Table area End-->
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
    <!--  Chat JS
		============================================ -->
    <script src="js/chat/jquery.chat.js"></script>
    <!--  todo JS
		============================================ -->
    <script src="js/todo/jquery.todo.js"></script>
	<!--  wave JS
		============================================ -->
    <script src="js/wave/waves.min.js"></script>
    <script src="js/wave/wave-active.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="js/plugins.js"></script>
    <!-- Data Table JS
		============================================ -->
    <script src="js/data-table/jquery.dataTables.min.js"></script>
    <script src="js/data-table/data-table-act.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>
	<!-- tawk chat JS
		============================================ -->
    <script src="js/tawk-chat.js"></script>
</body>

</html>