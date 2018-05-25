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

    public function listar() {
        $db = new DataBase();
        $conn = $db->connect();

        if ($conn) {
            $sql = "select * from producto";

            if ($conn->query($sql) === TRUE) {
                return array(TRUE, $this->toJSON());
            } else {
                return array(FALSE, $conn->error);
            }
        }
    }

    function listProduc() {
        $db = new DataBase();
        $conn = $db->connect();
        if ($conn) {
            $sql = "SELECT id,nombre,codigo,valor FROM producto;";
            if ($conn->query($sql)) {
                $rs = $conn->query($sql);
                //return array (TRUE, $this->toJSON($rs));
                // print_r(mysqli_fetch_assoc($rs));
                return mysqli_fetch_all($rs);
                //return mysqli_fetch_assoc($rs);
                while ($fila = mysqli_fetch_assoc($rs)) {
//                 print_r($fila);
                    array_push($filas, $fila);
                }
                return $filas;
            }
        }
    }

    function listProducto() {
        $filas = [];
        $db = new DataBase();
        $conn = $db->connect();
        if ($conn) {
            $sql = "SELECT id,nombre,codigo,valor FROM producto;";
            if ($conn->query($sql)) {
                $rs = $conn->query($sql);
//                print_r(mysqli_fetch_assoc($rs));
                // print_r(mysqli_fetch_assoc($rs));
//               array_push($users, $user->listUsers());



                while ($fila = mysqli_fetch_assoc($rs)) {
//                 print_r($fila);
                    array_push($filas, $fila);
                }
//                return mysqli_fetch_all($rs);
                return $filas;
            }
        }
    }

//    public function view() {
//        try {
//            $db = new DataBase();
//            $conn = $db->connect();
//
//            if ($conn) {
//                $sql = "select * from producto";
//                $resultado = mysqli_query($conn, $query);
//
//                if ($conn->query($sql) === TRUE) {
//                    echo 'Si hizo la query';
////                    while ($data = mysqli_fetch_assoc($resultado)) {
////                        $arreglo[] = $data;
////                    }
//                    return array(TRUE, $this->toJSON());
//                } else {
//                    return array(FALSE, $conn->error);
//                }
//            }
//        } catch (Exception $ex) {
//            die($e->getMessage());
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

}

?>