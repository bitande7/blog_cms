<?php

namespace App\Models;

class ActiveRecord
{
    public static $db;

    const TABLE = 'news';

// get all and get one record

    public static function getAll(){
        $query = "SELECT * FROM " .static::TABLE;
        return Db::getInstance()->query($query, static::class);
    }

    public static function getOne($id){
        $query = "SELECT * FROM ". static::TABLE. " WHERE id = :id";
        return Db::getInstance()->queryOne($query, static::class, [':id' => $id]);
    }

    // CRUD

    public function insert() {

        $sql = [];
        foreach($this as $key => $value) {
            if($key == 'id') {
                continue;
            }
            $sql[$key] = $value;
        }


        $query = "INSERT INTO ".static::TABLE."(". implode(', ', array_keys($sql)).") VALUES('". implode("', '", $sql)."')";
        Db::getInstance()->exec_crud($query);

    }

    public function update() {

        $query = '';
        foreach($this as $key => $value) {
            if($key == 'id') {
                continue;
            }
            $query .= "$key = '$value', ";
        }
        $query = rtrim($query, ', '); // костыль - удаляем лишнюю запятую в конце строке, иначе ошибка in SQL query

        $query = "UPDATE ".static::TABLE." SET  ".$query." WHERE id = {$this->id}";

        Db::getInstance()->exec_crud($query);

    }

    public function delete() {


        $query = "DELETE FROM ".static::TABLE." WHERE id = {$this->id} ";

        Db::getInstance()->exec_crud($query);
    }

    public function save() {

    if($this->id) {
        $this->update();
    } else {
        $this->insert();
    }
}

}