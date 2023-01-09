<?php
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

function validar($variable, $patron)
{
    if (isset($_REQUEST[$variable])) {
        $valor = $_REQUEST[$variable];
        if (!empty($valor)) {
            if (preg_match($patron, $valor)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    } else {
        return false;
    }
}

if (isset($_REQUEST["enviar"])) {
    $mensaje = $_REQUEST["mensaje"];
sanear();
    $contfallos = 0;
    if (validar("nombre", "/^[[:alpha:]|| ]+$/")) {
        $nombre = $_REQUEST["nombre"];
    } else {
        echo "<p style='color:red;'>Nombre inválido</p>";
        $contfallos++;
    }
   
    if (validar("email", "/^[[:alnum:]||@||\.]+$/")) {
        $email = $_REQUEST["email"];
    } else {
        echo "<p style='color:red;'>email inválido</p>";
        $contfallos++;
    }
   

  
    if ($contfallos == 0) {
      
        $para = $email;
        $asunto = "";
       
        if( empty($_FILES['archivo']['name']) == false )
		{	

			// Creamos una cadena aleatoria, para que tenga valor unico
			//como separador entre cuerpo y archivos adjuntos:
			$separador = md5(uniqid(time()));

			// Comprobamos si el archivo fue subido, y leemos su contenido
		    if(is_uploaded_file($_FILES['archivo']['tmp_name']))
			{
 				 // Leemos el archivo obteniéndolo como una cadena de texto:
				 $archivo = fopen($_FILES['archivo']['tmp_name'], "rb");
				 $datos = fread( $archivo, filesize($_FILES['archivo']['tmp_name']) );
				 fclose($archivo);

				 // Dividimos la cadena de texto en varias partes más pequeñas:
				 $datos = chunk_split( base64_encode($datos) );
			 }
	
			// Creamos la cabecera del mensaje:
			$headers = "MIME-Version: 1.0\r\n".
						 "Content-Type: multipart/mixed ; boundary=\"".$separador."\"\r\n\r\n";

			// Construimos el cuerpo del mensaje (para el texto):
			$descripcion = "--".$separador."\r\n";
			$descripcion .= "Content-Type:text/html; charset='iso-8859-1'\r\n";
			$descripcion .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
			$descripcion .= $mensaje."\r\n\r\n";

			// Continuamos construyendo el cuerpo del mensaje, añadiendo el archivo:
			$descripcion .= "--".$separador."\r\n";
			$descripcion .=	"Content-Type: ".$_FILES['archivo']['type']."; name='".$_FILES['archivo']['name']."'\r\n";
			$descripcion .= "Content-Transfer-Encoding: base64\r\n";
			$descripcion .= "Content-Disposition: attachment; filename='".$_FILES['archivo']['name']."'\r\n\r\n";
			$descripcion .= $datos."\r\n\r\n";

            /*
                Si se fuera a insertar otro archivo, tras haber leído el contenido 
				del mismo y haberlo cargado en otra variable, repetiríamos aquí las 
				cinco líneas anteriores (cambiando el nombre del componente del 
				formulario en $_FILES)
            */
			
            // Separador de final del mensaje
            $descripcion .= "--".$separador."--";

		}
		else
		{
            $descripcion = $mensaje;
            $headers="MIME-Version:1.0\r\n";
            $headers.="Content-type:text/html;charset=utf-8\r\n";

			// No se adjuntó ningún archivo, enviamos sólo el texto del mensaje:

           
	
		}

		// IMPORTANTE: debes sustituir la dirección de correo por aquella en que deseas
		//recibir el EMail:
        if (mail($para, $asunto, $descripcion, $headers)) {
            echo "<p style='color:green;'>exito</p>";
            echo "<p>Nombre:$nombre</p>";
 
            echo "<p>Email:$email</p>";
       
            echo "<p>Mensaje:$descripcion</p>";
        } else {
            echo "<p>error</p>";
            
        }

	
   
       
    }
}else{


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="POST" enctype="multipart/form-data">
        <p>Nombre: <input type="text" name="nombre"></p>
       
        <p>Email: <input type="text" name="email"></p>
     
       Mensaje: <textarea name="mensaje"></textarea>
        <input type="file" name="archivo" >
        <button type="submit" name="enviar">Enviar</button>
    </form>
</body>

</html>
<?php
}
?>