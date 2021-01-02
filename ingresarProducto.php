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
include "config/conexion.php";
$resultc = $conexion->query("select id_producto as id from tproducto");
if ($resultc) {

  while ($filac = $resultc->fetch_object()) {
    $temp=$filac->id;
   
     }
}   
//$numero=sprintf("%03s",$temp+1);  
?>
<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Ingreso de Productos | SISFIN</title>
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

    <!-- notification CSS
        ============================================ -->
    <link rel="stylesheet" href="css/notification/notification.css">
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
function go(){

   if(document.getElementById('nombre').value==""){
     notify(' Advertencia:','El campo Nombre es obligatorio.','top', 'right', 'any', 'warning');
       document.getElementById("nombre").focus();
   }else if(document.getElementById('stock').value==""){
        notify(' Advertencia:','El campo Stock es obligatorio,','top', 'right', 'any', 'warning');
       document.getElementById("stock").focus();
   }else if(document.getElementById('categoria').value==""){
        notify(' Advertencia:','El campo Categoria es obligatorio','top', 'right', 'any', 'warning');
       document.getElementById("categoria").focus();
   }else if(document.getElementById('mganancia').value==""){
        notify(' Advertencia:','El campo Margen de Ganancia es obligatorio', 'top', 'right', 'any', 'warning');
       document.getElementById("mganancia").focus();
   }else if(document.getElementById('proveedor').value==""){
        notify(' Advertencia:','El campo Proveedor es obligatorio,','top', 'right', 'any', 'warning');
       document.getElementById("proveedor").focus();
   }else if(document.getElementById('descrip').value==""){
        notify(' Advertencia:','El campo Descripcion es obligatorio', 'top', 'right', 'any', 'warning');
       document.getElementById("descrip").focus();
   }else{
      document.form.submit();  
   }   
}
function enviar(id){
    
    $.ajax({
        data:{"id":id},
        url: 'scriptsphp/recuperarProveedor.php',
        type: 'post',
        beforeSend: function(){
            alert("Por favr espere...");
        },
        success: function(response){
            alert(response);
            document.getElementById("proveedor").value=response;
            document.getElementById("idproveedor").value=id;
        }
    });
} 
function enviarC(id){
    
    $.ajax({
        data:{"id":id},
        url: 'scriptsphp/recuperarCategoria.php',
        type: 'post',
        beforeSend: function(){
            alert("Por favr espere...");
        },
        success: function(response){
            alert(response);
            document.getElementById("categoria").value=response;
            document.getElementById("idcat").value=id;
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
										<h2>Registro de Producto.</h2>
										<p>Formulario de datos <span class="bread-ntd">para un nuevo producto.</span></p>
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
                            <h2>Datos del Producto</h2>
                            
                        </div>
                        <form name="form" method="post">
                         <input type="hidden" id="bandera" name="bandera" value="1">
                        <input type="hidden" id="idproveedor" name="idproveedor">
                        <input type="hidden" id="idcat" name="idcat">
                        <div class="row">
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                <div class="form-example-int">
                                    <div class="form-group">
                                        <label>Código:</label>
                                        <div class="nk-int-st">
                                        <input type="text" name="codigo" id="codigo" class="form-control input-sm" placeholder="Codigo del producto." readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="form-example-int">
                                    <div class="form-group">
                                        <label>Nombre:</label>
                                        <div class="nk-int-st">
                                        <input type="text" name="nombre" id="nombre" class="form-control input-sm" placeholder="Ingrese el nombre del producto." >
                                        </div>
                                    </div>
                                </div>
                            </div>
                           <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                <div class="form-example-int">
                                    <div class="form-group">
                                        <label>Stock Mínimo:</label>
                                        <div class="nk-int-st">
                                        <input type="text" name="stock" id="stock" class="form-control input-sm" placeholder="Ingrese el stock minimo" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-example-int">
                                    <div class="form-group">
                                        <label>Categoria:</label>
                                        <div class="nk-int-st">
                                           <input type="text" name="categoria" id="categoria" class="form-control input-sm"  placeholder="Nombre del proveedor." readonly>
                                           
                                        </div>
                                     </div>                            
                                </div>
                            </div>

                            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
                               <div class="">
                                   <br>
									<button type="button" data-toggle="modal" title="Selecciona una categoria" data-target="#myModaloneCat" class="btn btn-success success-icon-notika btn-reco-mg btn-button-mg waves-effect"><i class="notika-icon notika-house"></i></button>
								</div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                <div class="form-example-int mg-t-15">
                                    <div class="form-group">
                                        <label>Precio de Compra:</label>
                                        <div class="nk-int-st">
                                           <input type="text" name="pcompra" id="pcompra" class="form-control input-sm"  placeholder="Precio de compra." value="0.00">
                                        </div>
                                     </div>                            
                                </div>
                            </div>

                             <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="form-example-int mg-t-15">
                                    <div class="form-group">
                                        <label>Margen de Ganancia:</label>
                                        <div class="nk-int-st">
                                           <input type="text" name="mganancia" id="mganancia" class="form-control input-sm"  placeholder="Ingrese el margen deseado %." >
                                        </div>
                                     </div>                            
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                <div class="form-example-int mg-t-15">
                                    <div class="form-group">
                                        <label>Precio de Venta:</label>
                                        <div class="nk-int-st">
                                           <input type="text" name="pventa" id="pventa" class="form-control input-sm"  placeholder="Ingrese el precio de venta deseado." readonly value="0.00">
                                        </div>
                                     </div>                            
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-example-int mg-t-15">
                                    <div class="form-group">
                                        <label>Proveedor:</label>
                                        <div class="nk-int-st">
                                           <input type="text" name="proveedor" id="proveedor" class="form-control input-sm"  placeholder="Nombre del proveedor." readonly>
                                           
                                        </div>
                                     </div>                            
                                </div>
                            </div>

                            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
                               <div class="">
                                   <br>
									<button type="button" data-toggle="modal" title="Selecciona un Proveedor" data-target="#myModalone" class="btn btn-success success-icon-notika btn-reco-mg btn-button-mg waves-effect"><i class="notika-icon notika-house"></i></button>
								</div>
                            </div>
                            
                        </div>
                    
                        
                        
                        <!-- FILA PARA DATOS CORTOS -->
                        
                         <!-- FIN DE FILA PARA DATOS CORTOS -->
                      
                    
                        <!-- salrios-->
                    
                        
                            
                        <div class="row">
                            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                                <div class="floating-numner form-rlt-mg">
                                    <p>Descripción:</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <div class="nk-int-st">
                                        <textarea class="form-control" name="descrip" id="descrip" rows="3" placeholder="Escriba aquí la descripción deseada acerca del producto..."></textarea required>
                                    </div>
                                </div>
                            </div>
                        </div>
                       <!-- <div class="form-example-int mg-t-15">
                            <div class="fm-checkbox">
                                <label><input type="checkbox" name="estado" class="i-checks"> <i></i> Estado.</label>
                                <label for="">Checkee para activar</label>
                            </div>
                        </div>-->
                        
                        <div class="form-example-int mg-t-15">
                            <button type="button" class="btn btn-success notika-btn-success" onclick="go();">Guardar.</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            
    </div>
    </div>
    <!-- Form Examples area End-->
            <!-- MODAL PARA Proveedor -->
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
                            <h2>Seleccione un Proveedor.</h2>
                        </div>
                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                    <tr>
                                        
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Dui</th>
                                        <th>Enviar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <?php
include "config/conexion.php";
$result = $conexion->query("SELECT * from tproveedor ORDER BY id_proveedor");
if ($result) {
    while ($fila = $result->fetch_object()) {
        echo "<tr>";
        echo "<td>" . $fila->nombre . "</td>";
        echo "<td>" . $fila->representante . "</td>";
        echo "<td>" . $fila->celular . "</td>";  
        
        echo "<td>
        <div class='button-icon-btn'>
        <button class='btn btn-info info-icon-notika btn-reco-mg btn-button-mg' data-dismiss='modal' onclick=\"enviar('$fila->id_proveedor')\";><i class='notika-icon notika-next'></i></button>
        </div>
        </td>";
        echo "</tr>";

    }
}
?>
                                
                                   
                                    
                                 
                                </tbody>
                                <tfoot>
                                    
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


                 <!-- MODAL PARA Proveedor -->
                 <div class="modal animated shake" id="myModaloneCat" role="dialog">
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
                            <h2>Seleccione una Categoria.</h2>
                        </div>
                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Nombre</th>
                                        <th>Nombre</th>
                                        <th>Estado</th>
                                        <th>Opciones</th>
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
        echo "<td>" . $fila->categoria . "</td>";
        echo "<td>" . $fila->categoria . "</td>";
        if($fila->estado==1){
            echo "<td>Activo</td>";
        }else{
            echo "<td>Inactivo</td>";  
        }    
        echo "<td>
        <div class='button-icon-btn'>
        <button class='btn btn-info info-icon-notika btn-reco-mg btn-button-mg' data-dismiss='modal' onclick=\"enviarC('$fila->id_categoria')\";><i class='notika-icon notika-next'></i></button>
        </div>
        </td>";
        echo "</tr>";

    }
}
?>
                                
                                   
                                    
                                </tbody>
                                <tfoot>
                                    
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
        <!-- Data Table JS
		============================================ -->
    <script src="js/data-table/jquery.dataTables.min.js"></script>
    <script src="js/data-table/data-table-act.js"></script>
        <!-- Input Mask JS
		============================================ -->
    <script src="js/jasny-bootstrap.min.js"></script>

    <!--  notification JS
        ============================================ -->
        <script src="js/notification/bootstrap-growl.min.js"></script>
        <script src="js/notification/notification-active.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>
	<!-- tawk chat JS
		============================================ -->
    <!-- <script src="js/tawk-chat.js"></script> -->
 <!-- bootstrap select JS
		============================================ -->
        <script src="js/bootstrap-select/bootstrap-select.js"></script>

<script type="text/javascript">
//genracion de codigo
        $(document).ready(function () {
                $("#nombre").keyup(function () {
                    var value = $(this).val();
                    $cod = value.substr(0, 4).toUpperCase();
                    if (value != "") {
                        var numero = Math.floor(Math.random() * (9999 - 1000)) + 1000;
                        $codigo = $cod + numero;
                        $("#codigo").val($codigo);
                    } else {
                        $("#codigo").val("");
                    }
                });
            });
    </script>
</body>

</html>
<?php
include "config/conexion.php";
$accion = $_POST['bandera'];
if($accion==1){
$codigo = $_POST['codigo'];
$nombre   = $_POST['nombre'];
$stock   = $_POST['stock'];
$categoria   = $_POST['idcat'];
$pcompra   = $_POST['pcompra'];
$pventa  = $_POST['pventa'];
$mganancia   = $_POST['mganancia'];
$proveedor   = $_POST['idproveedor'];
$descrip   = $_POST['descrip'];

    $consulta  = "INSERT INTO tproducto VALUES('null','".$proveedor."','".$categoria."','" .$nombre. "','" .$descrip. "','" .$pcompra. "','" .$pventa. "','" .$mganancia. "','" .$stock. "','0','" .$codigo. "','1')";
    $resultado = $conexion->query($consulta);
      if ($resultado) {
          msgI("Se agregaron los datos correctamente");
      } else {
          msgE("Error al insertar los datos");
      }
}
function msg($texto)
{
    echo "<script type='text/javascript'>";
    echo "alert('$texto');";
    echo "document.location.href='ingresarProducto.php';";
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