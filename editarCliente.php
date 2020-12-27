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
?><?php
$id = $_REQUEST["id"];
include "config/conexion.php";
$result = $conexion->query("select * from tclientes where id_cliente=" . $id);
if ($result) {
    while ($fila = $result->fetch_object()) {
        $idR               = $fila->id_cliente;
        $nombreR           = $fila->nombre;
        $idcaertera        = $fila->id_cartera;
        $apellidoR         = $fila->apellido;
        $direccionR        = $fila->direccion;
        $duiR              = $fila->dui;
        $nitR              = $fila->nit;
        $correoR           = $fila->correo;
        $trabajoR          = $fila->profecion;
        $salarioR          = $fila->salario;
        $telefonoR         = $fila->telefono;
        $celularR          = $fila->celular;
        $observR           = $fila->observaciones;
        $tipoR             = $fila->tipo_ingreso;
       }
}

?> 
<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Ingreso de Clientes | SISFIN</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <!-- notification CSS
		============================================ -->
    <link rel="stylesheet" href="css/notification/notification.css">
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
        document.location.href="/sistemaFinanciero/mostrarClientes.php";
    }	
    function go(){

        //Validaciones
    if(document.getElementById('nombre').value==""){
        //    alert("El campo nombre es obligatorio");
        //    prueba :p
        notify(' Advertencia','El campo Nombre es obligatorio.','top', 'right', 'any', 'warning');
        document.getElementById("nombre").focus();
    }else if(document.getElementById('apellido').value==""){
            notify(' Advertencia','El campo Apellido es obligatorio,','top', 'right', 'any', 'warning');
        document.getElementById("apellido").focus();
    }else if(document.getElementById('dui').value==""){
            notify(' Advertencia','El campo DUI es obligatorio','top', 'right', 'any', 'warning');
        document.getElementById("dui").focus();
    }else if(document.getElementById('nit').value==""){
            notify(' Advertencia','El campo NIT es obligatorio', 'top', 'right', 'any', 'warning');
        document.getElementById("nit").focus();
    }else if(document.getElementById('direc').value==""){
            notify(' Advertencia','El campo Direccion es obligatorio', 'top', 'right', 'any', 'warning');
        document.getElementById("direc").focus();
    }else if(document.getElementById('telefono').value=="" && document.getElementById('celular').value==""){
            notify(' Advertencia','Es necesario por lo menos un numero de telefono', 'top', 'right', 'any', 'warning');
        document.getElementById("telefono").focus();
    }else if(document.getElementById('email').value==""){
            notify(' Advertencia','El campo E-mail es obligatorio,','top', 'right', 'any', 'warning');
        document.getElementById("email").focus();
    }else if(document.getElementById('tipo').value=="Seleccione"){
            notify(' Advertencia','Seleccione un tipo de Ingreso', 'top', 'right', 'any', 'warning');
        document.getElementById("tipo").focus();
    }else if(document.getElementById('profecion').value==""){
            notify(' Advertencia','El campo Profecion u Oficio es obligatorio', 'top', 'right', 'any', 'warning');
        document.getElementById("profecion").focus();
    }else if(document.getElementById('salario').value==""){
            notify(' Advertencia','El campo Ingreso Promedio es obligatorio', 'top', 'right', 'any', 'warning');
        document.getElementById("salario").focus();
    }else if(document.getElementById('observ').value==""){
            notify(' Advertencia','El campo Observaciones es obligatorio', 'top', 'right', 'any', 'warning');
        document.getElementById("observ").focus();
    }else{
        document.form.submit();  
    }   
    } 

    function recuperar(id){
        
        $.ajax({
            data:{"id":id},
            url: 'scriptsphp/recuperarFiador.php',
            type: 'post',
            beforeSend: function(){
                alert("Por favor espere...");
            },
            success: function(response){
                alert(response);
                document.getElementById("fiador").value=response;
                document.getElementById("idfiador").value=id;
            }
        });
    } 
    function modify(id){
       document.location.href="editarCliente.php?id="+id;
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
										<h2>Rgistro de cliente.</h2>
										<p>Formulario de datos personales <span class="bread-ntd">para un nuevo cliente.</span></p>
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
                            <h2>Datos del Cliente</h2>
                            
                        </div>
                        <form name="form" method="post" action="../sistemaFinanciero/scriptsphp/modificarCliente.php?bandera=1">
                        <input type="hidden" id="idfiador" name="idfiador" value="<?php echo $idR; ?>">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-example-int">
                                    <div class="form-group">
                                        <label>Nombre:</label>
                                        <div class="nk-int-st">
                                        <input type="text" name="nombre" id="nombre" class="form-control input-sm" value="<?php echo $nombreR;?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-example-int">
                                    <div class="form-group">
                                        <label>Apellido:</label>
                                        <div class="nk-int-st">
                                        <input type="text" name="apellido" id="apellido" class="form-control input-sm" value="<?php echo $apellidoR;?>">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-example-int mg-t-15">
                                    <div class="form-group">
                                        <label>DUI:</label>
                                        <div class="nk-int-st">
                                           <input type="text" name="dui" id="dui" class="form-control input-sm" data-mask="99999999-9" value="<?php echo $duiR;?>">
                                        </div>
                                     </div>                            
                                </div>
                            </div>

                             <div class="col-lg-4 col-md-4 col-sm-4 col-xs-10">
                                <div class="form-example-int mg-t-15">
                                    <div class="form-group">
                                        <label>NIT:</label>
                                        <div class="nk-int-st">
                                           <input type="text" name="nit" id="nit" class="form-control input-sm" data-mask="9999-999999-999-9" value="<?php echo $nitR;?>">
                                        </div>
                                     </div>                            
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                
                                <label>Cartera</label>
                                <div class="bootstrap-select fm-cmp-mg">
                                    <select class="selectpicker" data-live-search="true" name="cartera" id="cartera">
                                    <option value="Seleccione">Seleccione</option>
                                    <?php
                                     include 'config/conexion.php';
                                     $result = $conexion->query("select id_categoria as id,nombre FROM tcartera");
                                     if ($result) {
                                         while ($fila = $result->fetch_object()) {
                                            if ($fila->id == $idcaertera ) {
                                                echo '<option value="' . $fila->id. '" selected>' . $fila->nombre . '</opcion>';
                                            }else {
                                                echo '<option value="' . $fila->id . '">' . $fila->nombre . '</opcion>';
                                            }
                                        }
                                    }
                                    ?> 
									</select>
                                </div>
                            </div>
                           
                            <!-- <div class="col-lg-4 col-md-4 col-sm-4 col-xs-10">
                                <div class="form-example-int mg-t-15">
                                    <div class="form-group">
                                        <label>Fiador:</label>
                                        <div class="nk-int-st">
                                           <input type="text" name="fiador" id="fiador" class="form-control input-sm"  placeholder="Nombre del fiador." readonly>
                                           
                                        </div>
                                     </div>                            
                                </div>
                            </div> -->

                            <!-- <div class="col-lg-2 col-md-2 col-sm-2 col-xs-10">
                               <div class="">
                                   <br>
									<button  type="button" data-toggle="modal" data-target="#myModalone" class="btn btn-success success-icon-notika btn-reco-mg btn-button-mg waves-effect"><i class="notika-icon notika-house"></i></button>
								</div>
                            </div> -->
                            
                        </div>
                        
                        <div class="form-example-int mg-t-15">
                            <div class="form-group">
                                <label>Dirección:</label>
                                <div class="nk-int-st">
                                    <input type="text" name="direc" id="direc" class="form-control input-sm" value="<?php echo $direccionR;?>">
                                </div>
                            </div>
                        </div>
                        
                        
                        <!-- FILA PARA DATOS CORTOS -->
                        
                         <!-- FIN DE FILA PARA DATOS CORTOS -->
                      
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-example-int mg-t-15">
                                    <div class="form-group">
                                        <label>Teléfono:</label>
                                        <div class="nk-int-st">
                                           <input type="text" name="telefono" id="telefono" class="form-control input-sm" data-mask="9999-9999" value="<?php echo $telefonoR;?>">
                                        </div>
                                     </div>                            
                                </div>
                            </div>

                             <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" >
                                <div class="form-example-int mg-t-15">
                                    <div class="form-group">
                                        <label>Celular:</label>
                                        <div class="nk-int-st">
                                           <input type="text" name="celular" id="celular" class="form-control input-sm" data-mask="9999-9999" value="<?php echo $celularR;?>">
                                        </div>
                                     </div>                            
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-example-int mg-t-15">
                                    <div class="form-group">
                                        <label>E-mail:</label>
                                        <div class="nk-int-st">
                                           <input type="text" name="email" id="email" class="form-control input-sm" value="<?php echo $correoR;?>">
                                        </div>
                                     </div>                            
                                </div>
                            </div>
                        </div>
                        <!-- salrios-->
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                
                                <label>Tipo de Ingreso</label>
                                <div class="bootstrap-select fm-cmp-mg">
                                    <select class="selectpicker" data-live-search="true" name="tipo" id="tipo">
                                    <option value="Seleccione">Seleccione</option>
                                    <?php
                                    if($tipoR=="Salario"){
                                        ?>
                                        <option selected>Salario</option>
                                        <option>Remesa</option>
                                        <option>Salario informal</option>
                                        <?php
                                    }else if($tipoR=="Remesa"){
                                        ?>
                                        <option>Salario</option>
                                        <option selected>Remesa</option>
                                        <option>Salario informal</option>
                                        <?php
                                    }else if($tipoR=="Salario Informal"){
                                        ?>
                                        <option>Salario</option>
                                        <option>Remesa</option>
                                        <option selected>Salario Informal</option>
                                        <?php
                                    }
                                    ?>
										</select>
                                </div>
                            </div>
                             <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" >
                                <div class="form-example-int mg-t-15">
                                    <div class="form-group">
                                        <label>Profecion u oficio</label>
                                        <div class="nk-int-st">
                                           <input type="text" name="profecion" id="profecion" class="form-control input-sm" value="<?php echo $trabajoR;?>">
                                        </div>
                                     </div>                            
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-example-int mg-t-15">
                                    <div class="form-group">
                                        <label>Ingreso Promedio $ (Mensual)</label>
                                        <div class="nk-int-st">
                                           <input type="number" name="salario" id="salario" class="form-control input-sm" value="<?php echo $salarioR;?>">
                                        </div>
                                     </div>                            
                                </div>
                            </div>
                        </div>
                        
                            
                        <div class="row">
                            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                                <div class="floating-numner form-rlt-mg">
                                    <p>Observaciones:</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <div class="nk-int-st">
                                        <textarea class="form-control" name="observ" id="observ" rows="5"><?php echo $observR;?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                       <!-- <div class="form-example-int mg-t-15">
                            <div class="fm-checkbox">
                                <label><input type="checkbox" name="estado" class="i-checks"> <i></i> Estado.</label>
                                <label for="">Checkee para activar</label>
                            </div>
                        </div> -->
                        
                        <div class="form-example-int mg-t-15">
                            <button type="button" class="btn btn-success notika-btn-success" onclick="go();">Guardar Cambios</button>
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
    <!--  todo JS
		============================================ -->
    <script src="js/todo/jquery.todo.js"></script>
     <!-- Data Table JS
		============================================ -->
        <script src="js/data-table/jquery.dataTables.min.js"></script>
    <script src="js/data-table/data-table-act.js"></script>
    <!-- plugins JS
		============================================ -->
        
    <script src="js/plugins.js"></script>
        <!-- Input Mask JS
		============================================ -->
    <script src="js/jasny-bootstrap.min.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>
    
	<!-- tawk chat JS
		============================================ -->
    <!-- <script src="js/tawk-chat.js"></script> -->
 <!-- bootstrap select JS
		============================================ -->
        <script src="js/bootstrap-select/bootstrap-select.js"></script>
 <!--  notification JS
		============================================ -->
        <script src="js/notification/bootstrap-growl.min.js"></script>
    <script src="js/notification/notification-active.js"></script>
    
</body>

</html>
<?php
        
    function msg($var)
    {
        echo "<script type='text/javascript'>";
        echo "document.location.href='mostrarClientes.php?mod='+$var;";
        echo "</script>";
    }

?>