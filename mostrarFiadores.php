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
    <title>Lista de Fiadores| SISFIN</title>
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

     <!-- notification CSS
        ============================================ -->
        <link rel="stylesheet" href="css/notification/notification.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    <script>

        function go(){
    //validacion respectiva me da hueva
        document.form.submit();  
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
    function modify(id){
       
        document.location.href="editarFiador.php?id="+id;
    }
    function edit(id,nom,ape,dire,dui,nit,corre,profe,sal,tel,cel)
        {
         // document.getElementById("baccion2").value=id;
          document.getElementById("nombrem").value=nom;
          document.getElementById("apellidom").value=ape;
          document.getElementById("direccionm").value=dire;
          document.getElementById("duim").value=dui;
          document.getElementById("nitm").value=nit;
          document.getElementById("correom").value=corre;
          document.getElementById("profem").value=profe;
          document.getElementById("salm").value=sal;
          document.getElementById("telm").value=tel;
          document.getElementById("celm").value=cel;
         //$("#baccion2").val(id);
          
          
         //$("#nomb").val(nom);
        //$("#marc").val(marca);
          //$("#num").val(num);
          //$("#donad").val(don);
          //$("#descr").val(des);
          $("#ModalInfo").modal();
        //Ya manda todos los datos correcatamente
          
          
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
										<h2>Lista de fiadores</h2>
										<p>Datos de personales<span class="bread-ntd"> de fiadores.</span></p>
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
                                        
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>DUI</th>
                                        <th>Teléfono</th>
                                        <th>Celular</th>
                                        <th>E-mail</th>
                                        <th>Opciones</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                include "config/conexion.php";
                                $result = $conexion->query("SELECT * from tfiador ORDER BY id_fiador");
                                  if ($result) {
                                      while ($fila = $result->fetch_object()) {
                                          echo "<tr>";
                                          echo "<td>" . $fila->nombre . "</td>";
                                          echo "<td>" . $fila->apellido . "</td>";
                                          echo "<td>" . $fila->dui . "</td>";  
                                          echo "<td>" . $fila->telefono . "</td>";
                                          echo "<td>" . $fila->celular . "</td>";
                                          echo "<td>" . $fila->correo . "</td>";
                                          echo "<td>
                                          <div class='button-icon-btn'>
                                        <button class='btn btn-lightgreen lightgreen-icon-notika btn-reco-mg btn-button-mg' onclick='modify(" . $fila->id_fiador. ")'><i class='notika-icon notika-menus'></i></button>
                                        <button title='Ver' class='btn btn-info info-icon-notika btn-reco-mg btn-button-mg' onclick=\"edit('$fila->id_fiador','$fila->nombre','$fila->apellido','$fila->direccion','$fila->dui','$fila->nit','$fila->correo','$fila->profecion','$fila->salario','$fila->telefono','$fila->celular')\";><i class='notika-icon notika-search'></i></button>
                                          </div>
                                          </td>";
                                          echo "</tr>";

                                      }
                                  }
                                ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>DUI</th>
                                        <th>Teléfono</th>
                                        <th>Celular</th>
                                        <th>E-mail</th>
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
    <!-- MODAL PARA FIADOR -->
 <div class="modal animated shake" id="ModalInfo" role="dialog">
              <div class="modal-dialog modal-large">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>
                      <div class="modal-body">
                      <h1>Datos del Fiador</h1>
                      <div class="row">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <div class="form-example-int">
                              <div class="form-group">
                                  <label>Nombre:</label>
                                  <div class="nk-int-st">
                                  <input type="text" name="nombrem" id="nombrem" class="form-control input-sm" readonly>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <div class="form-example-int">
                              <div class="form-group">
                                  <label>Apellido:</label>
                                  <div class="nk-int-st">
                                  <input type="text" name="apellidom" id="apellidom" class="form-control input-sm" readonly>
                                  </div>
                              </div>
                          </div>
                      </div>
                      
                      <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                      <div class="form-example-int">
                      <div class="form-group">
                          <label>Dirección:</label>
                          <div class="nk-int-st">
                              <input type="text" name="direccionm" id="direccionm"class="form-control input-sm" readonly>
                          </div>
                      </div>
                  </div>
                  </div>
                  </div>
                  <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <div class="form-example-int">
                              <div class="form-group">
                                  <label>DUI:</label>
                                  <div class="nk-int-st">
                                    <input type="text" name="duim" id="duim" class="form-control input-sm" readonly>
                                  </div>
                              </div>                            
                          </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <div class="form-example-int">
                              <div class="form-group">
                                  <label>NIT:</label>
                                  <div class="nk-int-st">
                                    <input type="text" name="nitm" id="nitm" class="form-control input-sm" readonly>
                                  </div>
                              </div>                            
                          </div>
                      </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <div class="form-example-int">
                              <div class="form-group">
                                  <label>Correo:</label>
                                  <div class="nk-int-st">
                                  <input type="text" name="correom" id="correom" class="form-control input-sm" readonly>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <div class="form-example-int">
                              <div class="form-group">
                                  <label>Profesión:</label>
                                  <div class="nk-int-st">
                                  <input type="text" name="profem" id="profem" class="form-control input-sm" readonly>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <div class="form-example-int">
                              <div class="form-group">
                                  <label>Salario:</label>
                                  <div class="nk-int-st">
                                  <input type="text" name="salm" id="salm" class="form-control input-sm" readonly>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <div class="form-example-int">
                              <div class="form-group">
                                  <label>Telefono:</label>
                                  <div class="nk-int-st">
                                  <input type="text" name="telm" id="telm" class="form-control input-sm" readonly>
                                  </div>
                              </div>
                          </div>
                      </div>
                      </div>
                  <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12" >
                          <div class="form-example-int mg-t-15">
                              <div class="form-group">
                                  <label>Celular:</label>
                                  <div class="nk-int-st">
                                    <input type="text" name="celm" id="celm" class="form-control input-sm" readonly>
                                  </div>
                              </div>                            
                          </div>
                      </div>
                      
                  </div>
                  </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                      </div>
                  </div>
              </div>
          </div>
            <!-- FIN PARA MODAL DE FIADOR -->
    
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
      msgE("ocurrio un error en el registro de los archivos");
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
