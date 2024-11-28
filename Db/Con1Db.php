<?php
    class Conex1
    {
        // Conexión MySQL
        public static function con1()
        {
            $se = "localhost";
            $us = "javier";
            $co = "madrid";
            $bd = "bd1";
    
            // $mysqli = new mysqli("localhost", "usuario", "clave", "bd", "puerto-opcional");
            $mysqli = new mysqli($se, $us, $co, $bd,3310);

            if ($mysqli->connect_errno)
            {
                // Mensaje
                $mensaje = "Error de conexión a BD\r\n" . $mysqli->connect_error;
                // Si cualquier línea es más larga de 70 caracteres, se debería usar wordwrap()
                $mensaje = wordwrap($mensaje, 70, "\r\n");
                // Envío
                mail('xxx@xxx.com', 'Error de conexión a BD', $mensaje);
                
                // printf("Error en la conexion: %s\n", $mysqli->connect_error);
                exit();
            }
            else
            {
                $mysqli->set_charset("utf8");
                return $mysqli;
            }
        }          
    }
?> 