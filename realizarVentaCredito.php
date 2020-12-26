
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
    <title>Vender al Contado| SISFIN</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <!-- datapicker CSS
		============================================ -->
        <link rel="stylesheet" href="css/datapicker/datepicker3.css">
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
<script  language=JavaScript> 
function recuperarPlanes(){ 
    if(document.getElementById("cliente").value=="Seleccione"){
        notify('Error:','Debe seleccionar un cliente.','top', 'right', 'any', 'warning');
    }else{
        $.ajax({
        data:{"id":document.getElementById("cliente").value},
        url: 'scriptsphp/recuperarPlanesDePago.php',
        type: 'post',
        beforeSend: function(){
        //   notify('Exito','Correlativo Generado','top', 'right', 'any', 'success');
        },
        success: function(response){
     
        //    alert(response);
            $("#selectpp").html(response);
            $('.selectpicker').selectpicker({
               
            });
           
        }
    });
    }
    
}
function go(){

    //Validaciones
   if(document.getElementById('tipo').value=="Seleccione"){
     notify(' Advertencia:','El campo Tipo Activo es obligatorio.','top', 'right', 'any', 'warning');
       document.getElementById("tipo").focus();
   }else if(document.getElementById('dpto').value=="Seleccione"){
        notify(' Advertencia:','El campo Departamento es obligatorio,','top', 'right', 'any', 'warning');
       document.getElementById("dpto").focus();
   }else if(document.getElementById('prov').value=="Seleccione"){
        notify(' Advertencia:','El campo Proveedor es obligatorio','top', 'right', 'any', 'warning');
       document.getElementById("prov").focus();
   }else if(document.getElementById('emp').value=="Seleccione"){
        notify(' Advertencia:','El campo Encargado es obligatorio', 'top', 'right', 'any', 'warning');
       document.getElementById("emp").focus();
   }else if(document.getElementById('fech').value==""){
        notify(' Advertencia:','El campo Fecha de Adquisicion es obligatorio', 'top', 'right', 'any', 'warning');
       document.getElementById("fech").focus();
   }else if(document.getElementById('tipo_adq').value=="Seleccione"){
        notify(' Advertencia:','Seleccione un tipo de Adquisicion', 'top', 'right', 'any', 'warning');
       document.getElementById("tipo_adq").focus();
   }else if(document.getElementById('precio').value==""){
        notify(' Advertencia:','El campo precio es obligatorio', 'top', 'right', 'any', 'warning');
       document.getElementById("precio").focus();
   }else if(document.getElementById('marca').value==""){
        notify(' Advertencia:','El campo Marca es obligatorio', 'top', 'right', 'any', 'warning');
       document.getElementById("marca").focus();
   }else if(document.getElementById('correlativo').value==""){
        notify(' Advertencia:','El campo correlativo es obligatorio', 'top', 'right', 'any', 'warning');
       document.getElementById("correlativo").focus();
   }else if(document.getElementById('descrip').value==""){
        notify(' Advertencia:','El campo Descripción es obligatorio', 'top', 'right', 'any', 'warning');
       document.getElementById("descrip").focus();
   }else{
      document.form.submit();  
   }   
} 
function tabla(){
    document.location.href="listaAF.php"; 
}
function enviar(){
        var idt=document.getElementById("tipo").value;
        var idd=document.getElementById("dpto").value;
       
        if(idt=="Seleccione" || idd=="Seleccione"){
            notify(' Advertencia:','Seleccione el tipo de activo y el departamento al que pertenece para generar correlativo','top', 'right', 'any', 'warning');
        }else{
            $.ajax({
        data:{"id":5,"idd":idd,"idt":idt,},
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
										<h2>Registro de Venta.</h2>
										<p> Formulario para Venta al Contado &nbsp;&nbsp;<?php echo $fecha=strftime( "%d-%m-%Y", time()); ?> <span class="bread-ntd">.</span></p>
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
                            <h2>Datos de la Venta al Contado</h2>
                            
                        </div>
                        <form name="form" method="post" action="">
                        <input type="hidden" name="bandera" id="bandera" value="1">
                                <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 mg-t-20">
                                <div class="form-example-int">
                                    <div class="form-group">
                                        <label>Codigo Venta:</label>
                                        <div class="nk-int-st">
                                            <?php 
                                                include 'config/conexion.php';
                                     $result = $conexion->query("SHOW TABLE STATUS LIKE 'tventas'");
                                     if ($result) {
                                         while ($fila = $result->fetch_object()) {
                                               
                                                $codigoR=str_pad($fila->Auto_increment, 4, "0", STR_PAD_LEFT);
                                            }
                                        }
                                            ?>
                                        <input type="text" class="form-control input-sm" placeholder="Codigo" id="codigo" name="codigo" value="<?php echo $codigoR;?>">
                                        
                                    </div>
                                        
                                    </div>
                                    
                                </div>
                               
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 mg-t-20">
                                <div class="form-example-int">
                                    <div class="form-group">
                                        <label>Vendedor:</label>
                                        <div class="nk-int-st">
                                        <input type="text" class="form-control input-sm" placeholder="" id="vendedor" name="vendedor" value="<?php echo $nombre?>"> 
                                    <!-- Consulta para recuperar el id del vendedor -->
                                         <?php 
                                                include 'config/conexion.php';
                                     $result = $conexion->query("select id_empleado from templeados where usuario='".$usuario."'");
                                     if ($result) {
                                         while ($fila = $result->fetch_object()) {
                                            
                                                $idVendedor=$fila->id_empleado;
                                            }
                                        }
                                            ?>
                                    <input type="hidden" id="idVendedor" name="idVendedor" value="<?php echo $idVendedor; ?>">   
                                    </div>
                                        
                                    </div>
                                    
                                </div>
                               
                            </div>
                             
                          
             
                           
                            </div>
                              <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <label>Cliente</label>
                                <div class="bootstrap-select fm-cmp-mg">
                                    <select class="selectpicker" data-live-search="true" name="cliente" id="cliente" onchange="recuperarPlanes();">
                                    <option value="Seleccione">Seleccione</option>
                                    <?php
                                     include 'config/conexion.php';
                                     $result = $conexion->query("select id_cliente as id,nombre,apellido FROM tclientes");
                                     if ($result) {
                                         while ($fila = $result->fetch_object()) {
                                             echo "<option value='".$fila->id."'>".$fila->nombre." ".$fila->apellido."</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"><label>Plan de Pago</label>
                                <div id="selectpp">

                                </div>
                               </div>
                            
                                
                          
                                </div>
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
                        
                        
                        </div>
                    </div>
                </div>
                                </div>
                           <div class="form-example-int mg-t-15">
                            <button type="button" class="btn btn-success notika-btn-success"  onclick="go();" >Guardar.</button>
                            <button type="button" class="btn btn-success notika-btn-success" onclick="tabla();">Cancelar</button>
                        </div>
                        </form>
                    
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
       <!-- datapicker JS
		============================================ -->
        <script src="js/datapicker/bootstrap-datepicker.js"></script>
    <script src="js/datapicker/datepicker-active.js"></script>
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
    $tipo    = $_REQUEST["tipo"];
    $dpto     = $_REQUEST["dpto"];
    $prov     = $_REQUEST["prov"];
    $emp    = $_REQUEST["emp"];
    $fech     = $_REQUEST["fech"];
    $fechaBD = date("Y-m-d", strtotime($fech));
    $tipo_adq     = $_REQUEST["tipo_adq"];
    if($tipo_adq==1){
        $tipo_adquicicion="Nuevo";
    }else if($tipo_adq==2){
        $tipo_adquicicion="Usado";
    }else if($tipo_adq==3){
        $tipo_adquicicion="Donado";
    }
    $precio    = $_REQUEST["precio"];
    $marca     = $_REQUEST["marca"];
    $correlativo     = $_REQUEST["correlativo"];
    $descrip     = $_REQUEST["descrip"];


$consulta  = "INSERT INTO tactivo VALUES('null','" .$tipo. "','" .$dpto. "','" .$emp. "','" .$prov. "','" .$correlativo. "','" .$fechaBD. "','" .$descrip. "','1','" .$precio. "','" .$marca. "','0','" .$tipo_adquicicion. "')";
// msg($consulta);    

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
function msg($texto)
{
    echo "<script type='text/javascript'>";
    echo "alert(".$texto.")";
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