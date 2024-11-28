<?php
class Datos
{

    // Devuelve Datos (select)
    public function getData1($sql, $typeParameters, $p1)
    {
        // Conexión
        $mysqli = Conex1::con1();
        // Protección frente a SQL inyectado (mysql_real_escape_string)
        $p1 = $mysqli->real_escape_string($p1);
        // Sentencia
        $statement = $mysqli->prepare($sql);
        // Parámetros (ejemplo: si = string integer)
        $statement->bind_param($typeParameters, $p1, $p1, $p1);
        // Ejecución de la sentencia
        $statement->execute();
        // Obtención del resultado
        $result = $statement->get_result();
        // Obtención del numero de registros devueltos
        $data = [];

        if($result->num_rows >= 1) {
            // Obtención de los datos
            while ($row = $result->fetch_assoc()) {
                $data[] = [
                    'ide_coc' => $row['ide_coc'],
                    'mar_coc' => $row['mar_coc'],
                    'mod_coc' => $row['mod_coc'],
                    'aut_coc' => $row['aut_coc']
                ];
            }
        }

        // Liberación del conjunto de resultados
        $result->free();
        // Cierre de la declaración
        $statement->close();
        // Cierre de la conexión
        $mysqli->close();

        // Devolución del resultado
        return $data;
    }
    
}
?>