<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if (isset($_REQUEST['enviar'])) {

        // function inicializarFormulario($tipo){
        //     if($tipo=="inicio"){
        //         echo '<div class="inicio"><form  method="post"  >
        //     <p>Validacion</p>
        //     <br>
        //     <p id="nombre" class="nombre" >Nombre:  <input type="text" name="nombre"></p>
        //     <p id="telefono" class="telefono">Telefono:  <input type="number" id="telefono" name="telefono"></p>
        //     <p id="email" class="email">Correo:  <input type="email" id="email"  name="email"></p>

        //    <input type="submit" name="enviar" value="Enviar">
        //     <input type="reset" name="borrar" value="Borrar">


        // </form> </div>     ';
        //     }
        // elseif($tipo=="fallo"){
        //     echo '<form  method="post" >
        //     <p>Validacion</p>
        //     <br>
        //     <p id="nombre" style="color:red;" >Nombreaaaaa:  <input type="text" name="nombre"></p>
        //     <p id="telefono" style="color:red;">Telefono:  <input type="number" id="telefono" name="telefono"></p>
        //     <p id="email" style="color:red;">Correo:  <input type="email" id="email"  name="email"></p>

        //    <input type="submit" name="enviar" value="Enviar">
        //     <input type="reset" name="borrar" value="Borrar">


        // </form>      ';
        // }

        // }
        // inicializarFormulario("inicio");


        function sanear()
        {
            foreach ($_REQUEST as $key => $valor) {
                if (!is_array($_REQUEST[$key])) {
                    $_REQUEST[$key] = trim(htmlspecialchars(strip_tags($_REQUEST[$key]), ENT_QUOTES, "utf-8"));
                } else {
                    foreach ($_REQUEST[$key] as $posicion => $dato) {
                        $_REQUEST[$key][$posicion] = trim(htmlspecialchars(strip_tags($dato), ENT_QUOTES, "utf-8"));
                    }
                }
            }
        }
        function validacion($variable)
        {
            if (isset($_REQUEST[$variable])) {
                $variable = ($_REQUEST[$variable]);

                if (!empty($variable)) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
        function cargarImagenes($nombre)
        {

            if (is_uploaded_file($_FILES[$nombre]["tmp_name"])) {
                $nombreDirectorio = "../img/";
                $nombreFichero = $_FILES["archivo"]["name"];
                $nombreCompleto = $nombreDirectorio . $nombreFichero;
                if (is_file($nombreCompleto)) {
                    $idunico = time();
                    $nombreFichero = $idunico . "-" . $nombreFichero;
                    $nombreCompleto = $nombreDirectorio . $nombreFichero;
                }

                if (move_uploaded_file($_FILES[$nombre]["tmp_name"], $nombreCompleto)) {
                    echo "<p>Fichero subido con el nombre: ", $nombreFichero, "</p>";
                    echo "<p><img src=$nombreCompleto></p>";
                } else {
                    echo "<p style='color:red;'>El archivo es invalido</p>";
                }
            } else {
                echo "<p style='color:red;'>El archivo es invalido</p>";
            }
        }

        sanear();







        if (validacion("tipo")) {
            $tipo = ($_REQUEST["tipo"]);


            echo "<p>Tipo: ", $tipo, "</p>";
        } else {

            echo "<p style='color:red;'>El tipo es invalido</p>";
        }

        if (validacion("zona")) {
            $zona = ($_REQUEST["zona"]);



            echo "<p>Zona: ", $zona, "</p>";
        } else {

            echo "<p style='color:red;'>La zona es invalida</p>";
        }
        if (validacion("direccion")) {
            $direccion = ($_REQUEST["direccion"]);



            echo "<p>Direccion: ", $direccion, "</p>";
        } else {

            echo "<p style='color:red;'>La direccion es invalida</p>";
        }
        




    
        if (validacion("dormitorios")) {
            $dormitorios = ($_REQUEST["dormitorios"]);



            echo "<p>Dormitorios: ", $dormitorios, "</p>";
        } else {
            echo "<p style='color:red;'>Los dormitorios es invalido</p>";
        }
        if (validacion("precio")) {
            $precio = ($_REQUEST["precio"]);



            echo "<p>Precio: ", $precio, "</p>";
        } else {


            echo "<p style='color:red;'>El precio es invalido</p>";
        }
        if (validacion("tamano")) {
            $tamano = ($_REQUEST["tamano"]);



            echo "<p>Tamaño: ", $tamano, "</p>";
        } else {


            echo "<p style='color:red;'>El tamaño es invalido</p>";
        }
        if (validacion("extras")){
   
            $extras=($_REQUEST["extras"] );
            
            echo "<p>Extras:";
           foreach($extras as $extra)
                echo $extra." ";
            
            echo "</p>";
        }
        if (validacion("observaciones")) {
            $observaciones = ($_REQUEST["observaciones"]);



            echo "<p>Observaciones: ", $observaciones, "</p>";
        } else {


            echo "<p style='color:red;'>Las observaciones no son validas</p>";
        }

        cargarImagenes("archivo");




        print "<style>";
        print ".inicio{";

        print "visibility:hidden;";
        print "widht:1px;";
        print "heigth:1px;";
        print "}";
        print "</style>";
    }


    ?>

    <div class="inicio">
        <form method="post" enctype="multipart/form-data">
            <p>Validacion</p>
            <br>
            <p>Tipo de Vivienda: <SELECT name="tipo">

                    <OPTION value="piso" selected>Piso
                    <OPTION value="chalet">Chalet
                    <OPTION value="adosado">Adosado


                </SELECT></p>
            <p>Zona: <SELECT name="zona">

                    <OPTION value="centro" selected>Centro
                    <OPTION value="sur">Sur
                    <OPTION value="norte">Norte

                    <OPTION value="oeste">Oeste
                    <OPTION value="este">Este


                </SELECT></p>
            <p>Direccion: <input type="text" name="direccion"></p>
            <p>Numero de Dormitorios: <input type="radio" id="uno" name="dormitorios" value="uno" checked>
                <label for="uno">1</label>
                <input type="radio" id="dos" name="dormitorios" value="dos">
                <label for="dos">2</label>
                <input type="radio" id="tres" name="dormitorios" value="tres">
                <label for="tres">3</label>
                <input type="radio" id="cuatro" name="dormitorios" value="cuatro">
                <label for="cuatro">4</label>
                <input type="radio" id="cinco" name="dormitorios" value="cinco">
                <label for="cinco">5</label>
            </p>
            <p>Precio: <input type="number" id="precio" name="precio">€</p>
            <p>Tamaño: <input type="number" id="tamano" name="tamano"> metros cuadrados</p>
            <p>Extras: <input type="checkbox" id="piscina" name="extras[]" value="piscina">
            <label for="piscina">Piscina</label>
            <input type="checkbox" id="garage" name="extras[]" value="garage">
            <label for="garage"> Garage</label>
            <input type="checkbox" id="jardin" name="extras[]" value="jardin">
            <label for="jardin"> Jardin</label>
            </p>
            <p>Imagen: <input type="file" id="archivo" name="archivo"></p>
            <p>Observaciones: <textarea name="observaciones"></textarea></p>

            <input type="submit" name="enviar" value="Enviar">
            <input type="reset" name="borrar" value="Borrar">


        </form>
    </div>

</body>

</html>