<?php

class Categoryes extends db
{
    public function HienThi()
    {
        $sql = self::$connection->prepare("SELECT * FROM categoryes");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function HienThiMotCategoryes($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM categoryes WHERE id = ?");
        $sql->bind_param("i", $id);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
}
