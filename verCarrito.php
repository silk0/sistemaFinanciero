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
// $id = $_REQUEST["id"];
// include "config/conexion.php";
// $result = $conexion->query("select p.id_producto as idp, p.nombre as namep,prov.id_proveedor as idprov,prov.nombre as nameprov from tproducto as p,tproveedor as prov  where p.id_proveedor=prov.id_proveedor and id_producto=" . $id);
// if ($result) {
//     while ($fila = $result->fetch_object()) {
//         $idR            = $fila->idp;
//         $nombreprod     = $fila->namep;
//         $idprov         = $fila->idprov;
//         $nombreprov      = $fila->nameprov;       
//        }
// }

?>
<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Plan de Pago| SISFIN</title>
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
      <!-- bootstrap select CSS
		============================================ -->
        <link rel="stylesheet" href="css/bootstrap-select/bootstrap-select.css">
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
     <!-- notification CSS
        ============================================ -->
        <link rel="stylesheet" href="css/notification/notification.css">
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
        if(document.getElementById('tipov').value=="Seleccione"){
        notify(' Advertencia:','Antes de comprar, seleccione el tipo de venta.', 'top', 'right', 'any', 'warning');
       document.getElementById("tipov").focus();
        }else{
          if(document.getElementById('tipov').value=="1"){
            // Esto va a ser una cventa al contado
            document.location.href="realizarVentaCredito.php";
          }else{
            // Esta va as er una venta al credito
            document.location.href="realizarVentaContado.php";
          }
        }
      }
    function anadirCarrito(id){ 
         
        
      $.ajax({
        data:{"id":id,"op":2},
        url: 'scriptsphp/ajaxCarrito.php',
        type: 'post',
        beforeSend: function(){
            // alert("Por favor espere...");
        },
        success: function(response){
                // alert(response);
                $("#cantidadCarrito").html(response);
                document.location.href="verCarrito.php";
            
        }
    });
    //Fin de ajax para agregar al carrito
         
    }
    function modify(id){
       
        document.location.href="editarFiador.php?id="+id;
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
										<h2>Carrito de Compras</h2>
										<p>Tabla con los productos<span class="bread-ntd"> cargados al carrito.</span></p>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 mg-t-20">
                           
                                <div class="bootstrap-select fm-cmp-mg">
                                    <select class="selectpicker" data-live-search="true" name="tipov" id="tipov">
                                    <option value="Seleccione">Tipo de Venta</option>
                                    <?php
                                             echo "<option value='1'>Credito</option>";
                                             echo "<option value='2'>Contado</option>";
                                           
                                        
                                        ?>
                                    </select>
                                </div>
                                </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Breadcomb area End-->
    
     <div class="normal-table-area">
        <div class="container">
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
                      $result = $conexion->query("select p.id_producto as id,p.codigo as codigo, p.nombre as nombre, p.precio_venta as preciov, c.cantidad as cantidad,p.precio_venta * c.cantidad as subtotal from tcarrito as c, tproducto as p where c.id_producto=p.id_producto");
                      if ($result) {
                          $total=0;
                        while ($fila = $result->fetch_object()) {
                          echo "<tr>";
                          echo "<td >".$fila->codigo."</td>";
                          echo "<td>".$fila->nombre."</td>";
                          echo "<td class='warning'>".$fila->cantidad."</td>";
                          $nuevoPrecio=number_format($fila->subtotal, 2, ".", "");
                          echo "<td class='danger'>".$fila->preciov."</td>";                        
                          echo '<td class="info">'.$nuevoPrecio.'<div class="breadcomb-report">
									<button type="button" onclick="anadirCarrito('.$fila->id.')" data-toggle="tooltip" data-placement="right" title="Eliminar del carrito." class="btn"><i class="notika-icon notika-close"></i></button>
								</div></td>';
                          
                          $total=$total+$nuevoPrecio;
                          echo "</tr>";
                           }
                          echo "<tr>";
                          echo "<th colspan='4' class='danger'>Total:</td>";
                          echo "<th class='danger'>".$total."</td>";                         
                         
                          echo "</tr>";
                      }
                       ?>
                                </tbody>
                            </table><br>
                            
                            <div class="row">
                              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 mg-t-20">
                                <div class="form-example-int">
                                    <div class="form-group">
                                          <button class="btn btn-success notika-btn-success"  onclick="go();">Procesar venta.</button>
                                        
                                    </div>
                                    
                                </div>
                               
                            </div>
                            
                            </div>
                        
                        </div>
                    </div>
                </div>
            </div>
         </div>
    </div>
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
       <!-- bootstrap select JS
		============================================ -->
        <script src="js/bootstrap-select/bootstrap-select.js"></script>
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