<?php
//Codigo que muestra solo los errores exceptuando los notice.

session_start();
error_reporting(E_ALL & ~E_NOTICE);
$usuario=$_SESSION["usuario"];
$nombre = $_SESSION["nombre"];
$tipo  = $_REQUEST["tipo"];
$id  = $_REQUEST["id"];

?>
<script>
     function cargarCarrito(){
        $.ajax({
        data:{"op":1},
        url: 'scriptsphp/recuperarCarrito.php',
        type: 'post',
        beforeSend: function(){
            //  alert("Por favor espere...");
        },
        success: function(response){
                // alert(response);
                $("#menuCarrito").html(response);
                // alert(response);
        }
    });
    }
</script>
<div class="header-top-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="logo-area">
                        <a href="main.php"><img src="img/logo/buho.png" height="42" width="42" alt="" /></a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="header-top-menu">
                        <ul class="nav navbar-nav notika-top-nav">
                            <li class="nav-item dropdown">
                                <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><span><i class="notika-icon notika-search"></i></span></a>
                                <div role="menu" class="dropdown-menu search-dd animated flipInX">
                                    <div class="search-input">
                                        <i class="notika-icon notika-left-arrow"></i>
                                        <input type="text" />
                                    </div>
                                </div>
                            </li>
                            <li  class="nav-item dropdown">
                                <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle" onclick="cargarCarrito()"><span><i class="notika-icon notika-dollar"></i></span></a>
                                <div id="menuCarrito" role="menu" class="dropdown-menu message-dd animated zoomIn">
                                    

                                    
                                </div>
                            </li>
<?php 
    include "config/conexion.php";
     $consulta  = "select * from tcarrito";
    $resultado = $conexion->query($consulta);
      $auxiliarCarrito=$resultado->num_rows;
?>
                           
                            <li class="nav-item nc-al"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><span><i class="notika-icon notika-alarm"></i></span><div class="spinner4 spinner-4"></div><div id="cantidadCarrito" class="ntd-ctn"><?php echo $auxiliarCarrito; ?></div></a>
                                <div role="menu" class="dropdown-menu message-dd notification-dd animated zoomIn">
                                    <div class="hd-mg-tt">
                                        <h2>Existencias abajo del mínimo o agotadas.</h2>
                                    </div>
                                    <div class="hd-message-info">
                                    <?php 
                            include "config/conexion.php";
$result = $conexion->query("SELECT * FROM tproducto where stock<stock_minimo");
$contador=0;
if ($result) {  
    while ($fila = $result->fetch_object()) {
    $contador++;
    echo '
                                        <a href="registrarCompra.php?id='.$fila->id_producto.'">
                                            <div class="hd-message-sn">
                                                <div class="hd-message-img">
                                                    <img src="img/post/2.jpg" alt="" />
                                                </div>
                                                <div class="hd-mg-ctn">
                                                    <h3>'.$fila->nombre.'</h3>
                                                    <p>Solo quedan '.$fila->stock.' productos.</p>
                                                </div>
                                            </div>
                                        </a>
    
    ';


    }
}
                            ?>
                                        
                                        
                                        
                                    </div>
                                    <div class="hd-mg-va">
                                        <a href="#">Ver todos...</a>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><span><i class="notika-icon notika-support"></i></span><div class="spinner4 spinner-4"></div><div class="ntd-ctn"><span><?php echo $contador; ?></span></div></a>
                                <div role="menu" class="dropdown-menu message-dd task-dd animated zoomIn">
                                    <div class="hd-mg-tt">
                                        <h2>Usuario en sesion.</h2>
                                    </div>
                                    <div class="hd-message-info">
                                        <a href="registrarCompra.php?id='.$fila->id_producto.'">
                                            <div class="hd-message-sn">
                                                <div class="hd-message-img">
                                                    <img src="img/post/user.png" widht="50" height="50" alt="" />
                                                </div>
                                                <div class="hd-mg-ctn">
                                                    <h3><?php echo $usuario?></h3>
                                                    <p><?php echo $nombre?></p>
                                                    <?php if($tipo==1){
                                                       echo "<p>Administrador</p>";
                                                    }else{
                                                        echo "<p>Vendedor</p>";
                                                    } 
                                                    ?>
                                                   

                                                    
                                                    
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="hd-mg-va">
                                        <a href="logout.php">Cerrar sesion.</a>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><span><i class="notika-icon notika-chat"></i></span></a>
                                <div role="menu" class="dropdown-menu message-dd chat-dd animated zoomIn">
                                    <div class="hd-mg-tt">
                                        <h2>Chat</h2>
                                    </div>
                                    <div class="search-people">
                                        <i class="notika-icon notika-left-arrow"></i>
                                        <input type="text" placeholder="Search People" />
                                    </div>
                                    <div class="hd-message-info">
                                        <a href="#">
                                            <div class="hd-message-sn">
                                                <div class="hd-message-img chat-img">
                                                    <img src="img/post/1.jpg" alt="" />
                                                    <div class="chat-avaible"><i class="notika-icon notika-dot"></i></div>
                                                </div>
                                                <div class="hd-mg-ctn">
                                                    <h3>David Belle</h3>
                                                    <p>Available</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="hd-message-sn">
                                                <div class="hd-message-img chat-img">
                                                    <img src="img/post/2.jpg" alt="" />
                                                </div>
                                                <div class="hd-mg-ctn">
                                                    <h3>Jonathan Morris</h3>
                                                    <p>Last seen 3 hours ago</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="hd-message-sn">
                                                <div class="hd-message-img chat-img">
                                                    <img src="img/post/4.jpg" alt="" />
                                                </div>
                                                <div class="hd-mg-ctn">
                                                    <h3>Fredric Mitchell</h3>
                                                    <p>Last seen 2 minutes ago</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="hd-message-sn">
                                                <div class="hd-message-img chat-img">
                                                    <img src="img/post/1.jpg" alt="" />
                                                    <div class="chat-avaible"><i class="notika-icon notika-dot"></i></div>
                                                </div>
                                                <div class="hd-mg-ctn">
                                                    <h3>David Belle</h3>
                                                    <p>Available</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="hd-message-sn">
                                                <div class="hd-message-img chat-img">
                                                    <img src="img/post/2.jpg" alt="" />
                                                    <div class="chat-avaible"><i class="notika-icon notika-dot"></i></div>
                                                </div>
                                                <div class="hd-mg-ctn">
                                                    <h3>Glenn Jecobs</h3>
                                                    <p>Available</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="hd-mg-va">
                                        <a href="#">View All</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
