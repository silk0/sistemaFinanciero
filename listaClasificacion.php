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
    <title>Lista de Clasificación | SISFIN</title>
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
     <!-- Data Table JS
		============================================ -->
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">
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

</head>
<SCRIPT  language=JavaScript> 
function go(){
    //validacion respectiva me da hueva
    document.location.href="ingresarClasificacion.php"; 
} 

</script> 
<SCRIPT  language=JavaScript> 
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
  function modificar(id){
       
       document.location.href="editarClasificacion.php?id="+id;
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
										<h2>Lista de Clasificacón de Activos.</h2>
										<p>Datos <span class="bread-ntd">de Clasificación de Activos</span></p>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
								<div class="breadcomb-report">
									<button data-toggle="tooltip" data-placement="left" title="Download Report" class="btn"><i class="notika-icon notika-sent"></i></button>
                       
                                    <button class="btn btn-primary notika-btn-primary" onclick="go();">+ Agregar Nuevo</button>
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
                                        
                                        <th>Clasificaión</th>
                                        <th>Tipo de Depreciación</th>
                                        <th>Correlativo</th> 
                                        <th>Modificar</th>
                                    </tr>
                                </thead>
                                <tbody>
                      <?php
include "config/conexion.php";
$result = $conexion->query("SELECT * from tclasificacion ORDER BY id_clasificaion");
if ($result) {
    while ($fila = $result->fetch_object()) {
        echo "<tr>";
     
        echo "<td>" . $fila->nombre . "</td>";
        echo "<td>" . $fila->tiempo_depreciacion . "</td>";
        echo "<td>" . $fila->correlativo . "</td>";
        echo "<td>
        <div class='button-icon-btn'>
        <button class='btn btn-lightgreen lightgreen-icon-notika btn-reco-mg btn-button-mg' data-dismiss='modal' onclick=\"modificar('$fila->id_clasificaion')\";><i class='notika-icon notika-menus'></i></button>
         </div>
        </td>";
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
     <!--  notification JS
		============================================ -->
        <script src="js/notification/bootstrap-growl.min.js"></script>
    <script src="js/notification/notification-active.js"></script>
</body>

</html>
<?php
include "config/conexion.php";
$accion = $_REQUEST['bandera'];
if($accion==1){
      msgI("Se modificaron los datos con exito");
  } else if($accion==2) {
      msgE("cocurrio un error en el registro de los archivos");
  }else if($accion==3) {
    msgA("Los datos que se ingresaron ya existen");
}   
function msgI($texto)
{
    echo "<script type='text/javascript'>";
    echo "notify('Exito','$texto','top', 'right', 'any', 'success');";
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