<?php

namespace App\Models;

class Db {
    private static $instance = null;

    public static $db;

    public static function getInstance() {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function __construct() {

        try {

            $options = array(
                \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
            );

            self::$db = new \PDO(DSN, DB_USER, DB_PASS, $options);

        } catch(\PDOException $e) {
            echo "can't connect to database: ". $e->getMessage();
        }
    }

    private function __clone() {
    }


    public static function exec($sql)  // for paginator
    {

        $sth = self::$db->prepare($sql);
        $sth->execute();
        $res = $sth->fetch(\PDO::FETCH_ASSOC);
        return $res;
    }


    public static function exec_crud($sql, $params = [])  // for insert, delete or update
    {
        $sth = self::$db->prepare($sql);
        $sth->execute($params);
        $count = $sth->rowCount();
        return $count;
    }

    // query all records from database -  return objects array

    public static function query($sql, $class = 'StdClass', $params =[])
    {
        $sth = self::$db->prepare($sql);
        $res = $sth->execute($params);
        if (false !== $res) {
            return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
        }
        return [];
    }

    // query just one records from database - return object

    public static function queryOne($sql, $class, $params)
    {
        $sth = self::$db->prepare($sql);
        $res = $sth->execute($params);
        $sth->setFetchMode(\PDO::FETCH_CLASS, $class);
        if (false !== $res) {
            return $sth->fetch();
        }
        return [];
    }
}
