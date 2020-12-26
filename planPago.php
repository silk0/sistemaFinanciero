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
<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Ingreso de Plan de Pago | SISFIN</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- notification CSS
        ============================================ -->
        <link rel="stylesheet" href="css/notification/notification.css">
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
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>
<script  language=JavaScript> 
function go(){
      //Validaciones
   if(document.getElementById('nombre').value==""){
    //    alert("El campo nombre es obligatorio");
    //    prueba :p
     notify(' Advertencia:','El campo Clasificación es obligatorio.','top', 'right', 'any', 'warning');
       document.getElementById("nombre").focus();
   }else if(document.getElementById('cuotas').value==""){
        notify(' Advertencia:','El campo Correlativo es obligatorio,','top', 'right', 'any', 'warning');
       document.getElementById("cuotas").focus();
   }else if(document.getElementById('interes').value==""){
        notify(' Advertencia:','El campo Depreciación es obligatorio','top', 'right', 'any', 'warning');
       document.getElementById("interes").focus();
   }else{
      document.form.submit();  
   }   
} 

function enviar(){
    
    $.ajax({
        data:{"id":4},
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

  

function modificar(id){
       
       document.location.href="editarClasificacion.php?id="+id;
   }
   
function back(){
    document.location.href="listaclasificacion.php"; 
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
										<h2>Registro de Plan de Pago.</h2>
										<p>Formulario de plan de pago <span class="bread-ntd">.</span></p>
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
                            <h2>Datos de Plan de Pago</h2>
                            
                        </div>
                        <form id="form"name="form" method="post" action="">
                       
                 
                        

                        <div class="row">
                             <input type="hidden" name="bandera" id="bandera" value="1">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-example-int">
                                    <div class="form-group">
                                        <label>Nombre:</label>
                                        <div class="nk-int-st">
                                        <input type="text" class="form-control input-sm" placeholder="Ingrese  nombre del plan de pago." id="nombre" name="nombre">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
                               <div class="">
                            </div>
                            </div>
                            </div>
                           
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                <div class="form-example-int">
                                    <div class="form-group">
                                        <label>Cuotas:</label>
                                        <div class="nk-int-st">
                                        <input type="number" class="form-control input-sm" placeholder="Numero de cuotas." id="cuotas" name="cuotas">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
                               <div class="">
                            </div>
                            </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                <div class="form-example-int">
                                    <div class="form-group">
                                        <label>Tasa De Interes:</label>
                                        <div class="nk-int-st">
                                        <input type="number" class="form-control input-sm" placeholder="Tasa de interes." id="interes" name="interes">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
                               <div class="">
                            </div>
                            </div>
                            </div>
                           <div class="form-example-int mg-t-15">
                            <button type="button" class="btn btn-success notika-btn-success"  onclick="go();" >Guardar</button>
                            <button type="button" class="btn btn-success notika-btn-success" onclick="back();">Cancelar</button>
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
     <!-- bootstrap select JS
		============================================ -->
        <script src="js/bootstrap-select/bootstrap-select.js"></script>

    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>
	<!-- tawk chat JS
		============================================ -->
    <!-- <script src="js/tawk-chat.js"></script> -->
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
    $nombre     = $_REQUEST["nombre"];
    $cuotas      = $_REQUEST["cuotas"];
    $interes       = $_REQUEST["interes"];
 
$consulta  = "INSERT INTO tplan_pago VALUES('null','" .$nombre. "','" .$interes. "','" .$cuotas. "')";
    $resultado = $conexion->query($consulta);
      if($resultado){
          msgI("Se agregaron los datos correctamente");
      } else {
          msgE("Error al insertar los datos");
      }

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