<?php

class Nicolas
{
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $db = "nicolas";
    public $dbConnect;

    public $respuesta = array();
    public function __construct()
    {
        $this->dbConnect = new mysqli($this->host, $this->user, $this->pass, $this->db);
        if ($this->dbConnect->connect_error) {
            die("Error en la conexión a la base de datos: " . $this->dbConnect->connect_error);
        }
    }
    public function getDbConnect()
    {
        return $this->dbConnect;
    }

    public function postInsert($table, $camps, $vals, $bind_param, $data_camps)
    {
        // TEST DE LO QUE LLEGA
        // $respuesta = array(
        //     "table" => $table,
        //     "camps" => $camps,
        //     "vals" => $vals,
        //     "bind_param" => $bind_param,
        //     "data_camps" => $data_camps
        // );

        $sql = "INSERT INTO $table ($camps) VALUES ($vals)";

        $stmt = mysqli_prepare($this->dbConnect, $sql);
        if (!$stmt) {
            $respuesta["success"] = false;
            $respuesta["message"] = "Error en la preparación de la consulta" . mysqli_error($this->dbConnect);
        } else {
            // Enlaza los parámetros y ejecuta la consulta
            if (!mysqli_stmt_bind_param($stmt, $bind_param, ...$data_camps)) {
                // Si hay un error al enlazar los parámetros
                $respuesta["success"] = false;
                $respuesta["message"] = "Error al enlazar los parámetros: " . mysqli_stmt_error($stmt);
            } else {
                // Ejecuta la consulta
                if (!mysqli_stmt_execute($stmt)) {
                    // Si hay un error al ejecutar la consulta
                    $respuesta["success"] = false;
                    $respuesta["message"] = "Error en la consulta: " . mysqli_error($this->dbConnect);
                } else {
                    // Si la consulta se ejecuta correctamente
                    $respuesta["success"] = true;
                    $respuesta["message"] = "Consulta satisfactoria";
                }
            }
            // Cierra el statement
            mysqli_stmt_close($stmt);
        }
        return json_encode($respuesta);
    }

    public function getData($table)
    {
        $data = array();
        $sql = "SELECT *FROM $table";
        $result = $this->dbConnect->query($sql);
        if (!$result) {
            throw new Exception("Error en la consulta :" . $this->dbConnect->error);
        } else {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }
    public function getCamposSinCondicion($camposObtener, $table)
    {
        $data = array();
        $sql = "SELECT $camposObtener FROM $table";
        $result = $this->dbConnect->query($sql);
        if (!$result) {
            throw new Exception("Error en la consulta :" . $this->dbConnect->error);
        } else {
            while ($row = $result->fetch_assoc())
                $data[] = $row;
        }
        return $data;
    }
    public function getCamposConCondicion ($tabla, $condicion, $params){
        $data = array();
        $sql = "SELECT * FROM $tabla WHERE $condicion=$params";
        $result = $this->dbConnect->query($sql);
        if(!$result){
            throw new Exception("Error en la consulta :" . $this->dbConnect->error);
        }else{
            while ($row = $result->fetch_assoc())
            $data[] = $row;
        }
        return $data;
    }
}
