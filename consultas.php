<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PhoenixTech - Inicio</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="icon" href="phoenixtechimg/PhoenixTechPNG.png">
</head>

<body>
        <div class="logo">
            <a href="index.html"><img src="PhoenixTechCompleto.png"></a>
        </div>
        <nav>
            <ul class="ulencabezado">
                <li class="liencabezado"><a href="osticket/upload/">Contacto</a></li>
                <li class="liencabezado"><a href="faqs.html">FAQ</a></li>
                <li class="liencabezado"><a href="index.html#1">Servicios</a></li>
                <li class="liencabezado"><a href="recambios.html">Recambios</a></li>
                <li class="liencabezado"><a href="index.html">Inicio</a></li>
            </ul>
        </nav>
    
    <?php
        $conexion=new mysqli('192.168.101.4','grupo1mic','mic0123','phoenixtech') or die ("No se puede establecer la conexión");
        $consultanumempleados=$conexion->query("SELECT COUNT(*) AS numempleados FROM empleados");
        $consultadineropagado=$conexion->query("SELECT SUM(SalarioNeto) AS DineroPagado FROM nominas;");
        $consultairpfultimomes=$conexion->query("SELECT SUM(Retención_IRPF) AS IRPFUltimoMes FROM nominas WHERE Fecha = '2024-02-29';");
        $consultassanoactual=$conexion->query("SELECT SUM(Retención_SS) AS SSAnoActual FROM nominas WHERE YEAR(Fecha) = YEAR(CURDATE());");
        $consultanombresempleados=$conexion->query("SELECT CONCAT(Nombre, ' ', Apellido) AS Nombre FROM empleados");
    ?>

    <h3 id="tituloconsultas">Consultas sobre la empresa</h3>

<div class="contenedorconsultas">

    <div class="contenedorconsultas1">

        <div class="cartaconsulta">
            <br>
            <a class="tituloconsulta"><h2>Empleados de la empresa</h2></a>
            <div class="infoconsulta">
            <?php
                while($registroempleados=$consultanumempleados->fetch_object()) {	
                    echo '<p>'.$registroempleados->numempleados.'</p>';
                }
            ?>
                <br>
            </div>
        </div>

        <div class="cartaconsulta">
            <br>
            <a class="tituloconsulta"><h2>Dinero pagado a los empleados hasta este momento</h2></a>
            <div class="infoconsulta">
            <?php
                while($registrodineropagado=$consultadineropagado->fetch_object()) {	
                    echo '<p>'.$registrodineropagado->DineroPagado.'€</p>';
                }
            ?>
                <br>
            </div>
        </div>

    </div>
</div>

<div class="contenedorconsultas">

    <div class="contenedorconsultas2">
        <div class="cartaconsulta">
            <br>
            <a class="tituloconsulta"><h2>Cantidad de IRPF pagado en el último mes</h2></a>
            <div class="infoconsulta">
            <?php
                while($registroirpfultimomes=$consultairpfultimomes->fetch_object()) {	
                    echo '<p>'.$registroirpfultimomes->IRPFUltimoMes.'€</p>';
                }
            ?>
                <br>
            </div>
        </div>

        <div class="cartaconsulta">
            <br>
            <a class="tituloconsulta"><h2>Cantidad de dinero pagado a la SS durante el año actual</h2></a>
            <div class="infoconsulta">
            <?php
                while($registrossanoactual=$consultassanoactual->fetch_object()) {	
                    echo '<p>'.$registrossanoactual->SSAnoActual.'€</p>';
                }
            ?>
                <br>
            </div>
        </div>
    </div>   
</div>

<div class="contenedorconsultas">

    <div class="contenedorconsultas3">
        
        <div class="cartaconsulta2">
        <br>
            <a class="tituloconsulta"><h2>Empleados</h2></a>
            <div class="infoconsulta">
            <?php
                while($registronombres=$consultanombresempleados->fetch_object()) {	
                    echo '<p>'.$registronombres->Nombre.'</p>';
                }
            ?>
                <br>
            </div>
        </div>
    </div>   
</div>
    </body>
</html>