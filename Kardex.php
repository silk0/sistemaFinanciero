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
$result = $conexion->query("select p.id_producto as idp, p.nombre as namep,prov.id_proveedor as idprov,prov.nombre as nameprov from tproducto as p,tproveedor as prov  where p.id_proveedor=prov.id_proveedor and id_producto=" . $id);
if ($result) {
    while ($fila = $result->fetch_object()) {
        $idR            = $fila->idp;
        $nombreprod     = $fila->namep;
        $idprov         = $fila->idprov;
        $nombreprov      = $fila->nameprov;       
       }
}

?>
<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Kardex| SISFIN</title>
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
										<h2>Lista Kardex</h2>
										<p>Tabla con los movimientos<span class="bread-ntd"> de la empresa.</span></p>
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
    
     <div class="normal-table-area">
        <div class="container">
    <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="normal-table-list mg-t-30">
                        <div class="basic-tb-hd">
                            <h2>Listado de movimientos.</h2>
                            <!-- <p>Use contextual classes (<code>.info, .warning, .success, .danger</code>) to color table rows or individual cells.</p> -->
                        </div>
                        <div class="bsc-tbl-cls">
                            <table class="table table-hover table-striped table-condensed">
                                <thead>
                                    <tr>
                                    
                                    <th class="active">Fecha</th>
                                    <th class="active">Descripción</th>
                                    <th colspan="3" class="warning">Entradas</th>
                                    <th colspan="3" class="danger">Salidas</th>
                                    <th colspan="3" class="info">Saldo</th>
                                    
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="active">
                                        <td></td>
                                        <td></td>
                                        <td class="warning">Cantidad</td>
                                        <td class="danger">V.Unitario</td>
                                        <td class="info">V.Total</td>
                                        <td class="warning">Cantidad</td>
                                        <td class="danger">V.Unitario</td>
                                        <td class="info">V.Total</td>
                                        <td class="warning">Cantidad</td>
                                        <td class="danger">V.Unitario</td>
                                        <td class="info">V.Total</td>                       
                                    </tr>
                                     <?php
                      include 'config/conexion.php';
                      $result = $conexion->query("select * from kardex where id_producto=".$id);
                      if ($result) {
                        while ($fila = $result->fetch_object()) {
                          echo "<tr>";
                          echo "<td>".$fila->fecha."</td>";
                          echo "<td>".$fila->descripcion."</td>";
                          if ($fila->movimiento==1){
                            echo "<td class='warning'>".$fila->cantidad."</td>";
                            echo "<td class='danger'>".$fila->vunitario."</td>";
                            $total=($fila->cantidad)*$fila->vunitario;
                            echo "<td class='info'>".$total."</td>";
                            echo "<td class='warning'>0</td>";
                            echo "<td class='danger'>0</td>";
                            echo "<td class='info'>0</td>";
                          }else {
                            echo "<td class='warning'>0</td>";
                            echo "<td class='danger'>0</td>";
                            echo "<td class='info'>0</td>";
                            echo "<td class='warning'>".$fila->cantidad."</td>";
                            echo "<td class='danger'>".$fila->vunitario."</td>";
                            $total=($fila->cantidad)*$fila->vunitario;
                            echo "<td class='info'>".$total."</td>";
                          }
                          echo "<td class='warning'>".$fila->cantidads."</td>";
                          echo "<td class='danger'>".$fila->vunitarios."</td>";
                          echo "<td class='info'>".$fila->vtotals."</td>";

                          echo "</tr>";
                           }
                      }
                       ?>
                                </tbody>
                            </table>
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
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>
	<!-- tawk chat JS
		============================================ -->
    <!-- <script src="js/tawk-chat.js"></script> -->
</body>

</html>