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
$result = $conexion->query("select * from tcategoria where id_categoria=" . $id);
if ($result) {
    while ($fila = $result->fetch_object()) {
        $idR               = $fila->id_categoria;
        $nombreR           = $fila->categoria;
        
       }
}

?>
<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Ingreso de Categorias | SISFIN</title>
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
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>
<script  language=JavaScript> 
function go(){
    //validacion respectiva me da hueva
        document.form.submit();  
} 
function modificar(id){
       
       document.location.href="editarCategoria.php?id="+id;
   }
function enviar(id){
    
    $.ajax({
        data:{"id":id},
        url: 'scriptsphp/recuperarCategoria.php',
        type: 'post',
        beforeSend: function(){
            alert("Por favor espere...");
        },
        success: function(response){
            alert(response);
            document.getElementById("nombre").value=response;
            document.getElementById("idcategoria").value=id;
        }
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
										<h2>Registro de Categorias</h2>
										<p>Formulario de categorias<span class="bread-ntd">.</span></p>
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
                            <h2>Datos de la Categoria</h2>
                            
                        </div>
                        <form name="form" method="post" action="editarCategoria.php?bandera=1">
                        <input type="hidden" name="baccion" id="baccion" value="<?php echo $idR; ?>">
                        

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-example-int">
                                    <div class="form-group">
                                        <label>Categoria:</label>
                                        <div class="nk-int-st">
                                        <input type="text" class="form-control input-sm" placeholder="Ingrese  nombre de categoria." id="nombre" name="nombre" value="<?php echo $nombreR; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
                               <div class="">
                               
								               </div>
                            </div>
                            </div>
                            
                        
                        
                        
                        <div class="form-example-int mg-t-15">
                            <button class="btn btn-success notika-btn-success" style="margin-left: 500px;" onclick="go();" >Modificar.</button>
                            <button type="button" data-toggle="modal" data-target="#myModalone" class="btn btn-success notika-btn-success">Ver Categorias</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- MODAL PARA CATEGORIAS -->
            <div class="modal animated shake" id="myModalone" role="dialog">
                                    <div class="modal-dialog modal-large">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                               <!-- Data Table area Start-->
    <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <h2>Seleccione una de las categorias de la siguiente  tabla.</h2>
                        </div>
                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                    <tr>
                                        
                                        <th>Categoria</th>
                                        <th>Modificar</th>
                                        <th>Enviar</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                        <?php
include "config/conexion.php";
$result = $conexion->query("SELECT * from tcategoria ORDER BY id_categoria");
if ($result) {
    while ($fila = $result->fetch_object()) {
        echo "<tr>";
        echo "<td>" . $fila->categoria . "</td>";
        echo "<td>
        <div class='button-icon-btn'>
        
        <button class='btn btn-lightgreen lightgreen-icon-notika btn-reco-mg btn-button-mg' data-dismiss='modal' onclick=\"modificar('$fila->id_categoria')\";><i class='notika-icon notika-menus'></i></button>
        
        </div>
        </td>";
        
        
        echo "<td>
        <div class='button-icon-btn'>
        <button class='btn btn-info info-icon-notika btn-reco-mg btn-button-mg' data-dismiss='modal' onclick=\"enviar('$fila->id_categoria')\";><i class='notika-icon notika-next'></i></button>
        
        
        </div>
        </td>";
        
        
        echo "</tr>";

    }
}
?>
                                
                                   
                                    
                                </tbody>
                                <tfoot>
                                    <tr>
                                       
                                        <th>Categoria</th>
                                        <th>Modificar</th>
                                        <th>Enviar</th>
                                        
                                       
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
</div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Listo</button>
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
            <!-- FIN PARA MODAL DE FIADOR -->
            
            
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
	<!-- tawk chat JS
		============================================ -->
    <!-- <script src="js/tawk-chat.js"></script> -->
</body>

</html>
<?php
include "config/conexion.php";
$bandera = $_REQUEST['bandera'];
$baccion  = $_REQUEST["baccion"];
if ($bandera==1) {
$nombre     = $_REQUEST['nombre'];
msg($nombre);

    $consulta  = "UPDATE tcategoria set categoria='" . $nombre . "' where id_categoria='" . $baccion . "'";
    $resultado = $conexion->query($consulta);
    msg("antes if php");
      if ($resultado) {
          
          msg("Se modificacon los datos correctamente");
      } else {
          msg("Error al insertar los datos");
      }
    }

function msg($texto)
{
    echo "<script type='text/javascript'>";
    echo "alert('$texto');";
    echo "document.location.href='ingresarCategoria.php';";
    echo "</script>";
}
?>