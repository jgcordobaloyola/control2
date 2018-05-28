<?php

include '../config/Connect.php';

class Producto {

    public $id = "";
    public $nombre = "";
    public $codigo = "";
    public $valor = "";

    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getCodigo() {
        return $this->codigo;
    }

    function getValor() {
        return $this->valor;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setValor($valor) {
        $this->valor = $valor;
    }

    private function closeDB() {
        mysql_close();
    }

    public function save() {
        $db = new DataBase();
        $conn = $db->connect();

        if ($conn) {
            $sql = "INSERT INTO producto (nombre, codigo,valor) VALUES ('" . $this->nombre . "', '" . $this->codigo . "', '" . $this->valor . "');";

            if ($conn->query($sql) === TRUE) {
                return array(TRUE, $this->toJSON());
            } else {
                return array(FALSE, $conn->error);
            }
        }
    }

    public function delete() {
        $db = new DataBase();
        $conn = $db->connect();

        if ($conn) {
            $sql = "DELETE FROM producto where id=" . $this->id . ";";

            if ($conn->query($sql) === TRUE) {
                return array(TRUE, $this->toJSON());
            } else {
                return array(FALSE, $conn->error);
            }
        }
    }

    public function updateById() {
        $db = new DataBase();
        $conn = $db->connect();

        if ($conn) {
            $sql = "update producto "
                    . "set nombre ='" . $this->nombre . "',"
                    . "codigo ='" . $this->codigo . "',"
                    . "valor ='" . $this->valor . "' "
                    . "where id=" . $this->id . ";";

            if ($conn->query($sql) === TRUE) {
                return array(TRUE, $this->toJSON());
            } else {
                return array(FALSE, $conn->error);
            }
        }
    }

    function listarProductos() {
        $productos = [];

        $db = new DataBase();
        $conn = $db->connect();
        if ($conn) {
            $sql = "SELECT id,nombre,codigo,valor FROM producto";
            if ($conn->query($sql)) {
                $rs = $conn->query($sql);
                // print_r(mysqli_fetch_assoc($rs));
                while ($fila = mysqli_fetch_assoc($rs)) {

                    $p = new Producto();
                    $p->setId($fila['id']);
                    $p->setNombre($fila['nombre']);
                    $p->setValor($fila['valor']);
                    $p->setCodigo($fila['codigo']);

                    array_push($productos, $p);
                }
                return $productos;

//                return mysqli_fetch_all($rs);
            }
        }
    }

//    function listarProductos() {
//        $productos = [];
//        $db = new DataBase();
//        $conn = $db->connect();
//
//        if ($conn) {
//            $sql = "Select id, nombre, codigo,valor"
//                    . "from producto";
//            if ($conn->query($sql)) {
//                $rs = $conn->query($sql);
//
//                while ($fila = mysqli_fetch_assoc($rs)) {
//                    $p = new Producto();
//                    $p->setId($fila['id']);
//                    $p->setNombre($fila['nombre']);
//                    $p->setValor($fila['valor']);
//                    $p->setCodigo($fila['codigo']);
//                    array_push($productos, $p);
//                }
//                return $productos;
//            }
//        }
//    }

    function toJSON() {
        $arr = array(
            'id' => $this->id,
            'nombre' => $this->nombre,
            'codigo' => $this->codigo,
            'valor' => $this->valor,
        );
        return json_encode($arr);
    }

    function toArray() {
        $arr = array(
            'id' => $this->id,
            'nombre' => $this->nombre,
            'codigo' => $this->codigo,
            'valor' => $this->valor,
        );
        return $arr;
    }

}

?>