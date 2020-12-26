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
$result = $conexion->query("select * from tproveedor where id_proveedor=" . $id);
if ($result) {
    while ($fila = $result->fetch_object()) {
        $idR               = $fila->id_proveedor;
        $nombreR           = $fila->nombre;
        $direccionR        = $fila->direccion;
        $telefonoR         = $fila->telefono;
        $representanteR    = $fila->representante;
        $duiR              = $fila->dui;
        $nitR              = $fila->nit;
        $celularR          = $fila->celular;
        $emailR           = $fila->email;
       
       }
}

?>
<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Modificación de Proveedores | SISFIN</title>
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

    function back(){
        document.location.href="/SISFIN/mostrarProveedores.php";
    } 

function go(){

    //Validaciones
   if(document.getElementById('nombre').value==""){
    //    alert("El campo nombre es obligatorio");
    //    prueba :p
     notify(' Advertencia:','El campo Nombre es obligatorio.','top', 'right', 'any', 'warning');
       document.getElementById("nombre").focus();
   }else if(document.getElementById('telefono').value=="" ){
        notify(' Advertencia:','El campo telefono es obligatorio', 'top', 'right', 'any', 'warning');
       document.getElementById("telefono").focus();
   }else if(document.getElementById('direc').value==""){
        notify(' Advertencia:','El campo Direccion es obligatorio', 'top', 'right', 'any', 'warning');
       document.getElementById("direc").focus();
   }else if(document.getElementById('representante').value==""){
        notify(' Advertencia:','El campo Representante es obligatorio','top', 'right', 'any', 'warning');
       document.getElementById("representante").focus();
   }else if(document.getElementById('dui').value==""){
        notify(' Advertencia:','El campo DUI es obligatorio', 'top', 'right', 'any', 'warning');
       document.getElementById("dui").focus();
   }else if(document.getElementById('nit').value==""){
        notify(' Advertencia:','El campo NIT es obligatorio', 'top', 'right', 'any', 'warning');
       document.getElementById("nit").focus();
   }else if(document.getElementById('celular').value=="" ){
        notify(' Advertencia:','Ingrese Celular', 'top', 'right', 'any', 'warning');
       document.getElementById("celular").focus();
   }else if(document.getElementById('email').value==""){
        notify(' Advertencia:','El campo E-mail es obligatorio,','top', 'right', 'any', 'warning');
       document.getElementById("email").focus();
   }else{
      document.form.submit();  
   }   
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
										<h2>Modificación de proveedores.</h2>
										<p>Formulario de datos personales<span class="bread-ntd">para un  proveedor.</span></p>
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
                            <h2>Datos del Proveedor</h2>
                            
                        </div>
                        <form name="form" method="post" action="../SISFIN/scriptsphp/modificarFiador.php?bandera=3">
                        
                        <input type="hidden" name="baccion" id="baccion" value="<?php echo $idR; ?>">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                <div class="form-example-int">
                                    <div class="form-group">
                                        <label>Nombre:</label>
                                        <div class="nk-int-st">
                                        <input type="text" id="nombre" name="nombre" class="form-control input-sm" placeholder="Ingrese el nombre del proveedor." value="<?php echo $nombreR; ?>" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-example-int">
                                    <div class="form-group">
                                        <label>Teléfono:</label>
                                        <div class="nk-int-st">
                                        <input type="text" id="telefono" name="telefono" class="form-control input-sm" data-mask="9999-9999" placeholder="Ingrese el número de teléfono." value="<?php echo $telefonoR; ?>" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="form-example-int mg-t-15">
                            <div class="form-group">
                                <label>Dirección:</label>
                                <div class="nk-int-st">
                                    <input type="text" id="direc" name="direc" class="form-control input-sm" placeholder="Ingrese la dirección del proveedor." value="<?php echo $direccionR; ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="cmp-tb-hd">
                            <h2>Datos del representante del proveedor</h2>
                            
                        </div>
                        <div class="row">
                           <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                <div class="form-example-int mg-t-15">
                                    <div class="form-group">
                                        <label>Representante:</label>
                                        <div class="nk-int-st">
                                        <input type="text" id="representante" name="representante" class="form-control input-sm" placeholder="Ingrese el nombre." value="<?php echo $representanteR; ?>" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-example-int mg-t-15">
                                    <div class="form-group">
                                        <label>DUI:</label>
                                        <div class="nk-int-st">
                                           <input type="text" id="dui" name="dui" class="form-control input-sm" data-mask="99999999-9" placeholder="Ingrese el DUI." value="<?php echo $duiR; ?>" required>
                                        </div>
                                     </div>                            
                                </div>
                            </div>

                        </div>
                            
                        <!-- FILA PARA DATOS CORTOS -->
                        
                         <!-- FIN DE FILA PARA DATOS CORTOS -->
                      
                        <div class="row">
                            
                             <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-example-int mg-t-15">
                                    <div class="form-group">
                                        <label>NIT:</label>
                                        <div class="nk-int-st">
                                           <input type="text" id="nit" name="nit" class="form-control input-sm" data-mask="9999-999999-999-9" placeholder="Ingrese el NIT." value="<?php echo $nitR; ?>" required>
                                        </div>
                                     </div>                            
                                </div>
                            </div> 
                             

                             <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" >
                                <div class="form-example-int mg-t-15">
                                    <div class="form-group">
                                        <label>Celular:</label>
                                        <div class="nk-int-st">
                                           <input type="text" id="celular" name="celular" class="form-control input-sm" data-mask="9999-9999" placeholder="Ingrese celular."  value="<?php echo $celularR; ?>" required>
                                        </div>
                                     </div>                            
                                </div>
                            </div>
                             <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-example-int mg-t-15">
                                    <div class="form-group">
                                        <label>E-mail:</label>
                                        <div class="nk-int-st">
                                           <input type="text" id="email" name="email" class="form-control input-sm" placeholder="Ingrese el E-mail." value="<?php echo $emailR; ?>">
                                        </div>
                                     </div>                            
                                </div>
                            </div>
                        </div>  
                        <div class="form-example-int mg-t-15">
                            <button class="btn btn-success notika-btn-success" onclick="go();">Guardar cambios.</button>
                             <button type="reset" class="btn btn-warning notika-btn-warning">Restablecer</button>
                             <button type="button" class="btn btn-warning notika-btn-warning" onclick="back();">Cancelar</button>
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

    <!--  notification JS
        ============================================ -->
        <script src="js/notification/bootstrap-growl.min.js"></script>
        <script src="js/notification/notification-active.js"></script>
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

       
<!-- nose 
		============================================ -->
    <!-- <script src="js/tawk-chat.js"></script> -->
</body>

</html>
<?php

function msg($texto)
{
    echo "<script type='text/javascript'>";
    echo "alert('$texto');";
    echo "document.location.href='mostrarProveedores.php';";
    echo "</script>";
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