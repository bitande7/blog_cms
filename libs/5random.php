<?php

define('ROOT', $_SERVER['DOCUMENT_ROOT']);

class Db {


    public $db;

    public $table = 'page';

    public $id = null;

    public function __construct() {

        try {
            $this->db = include ROOT . "/App/config/config.php";
        } catch(PDOException $e) {
            echo "can't connect to database: ". $e->getMessage();
        }

    }

    public function getAll($table){
        $query = "SELECT * FROM $table";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getId(){
        $query = "SELECT id FROM page";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_NUM);
    }

    public function getFive(array $num){
        $query = "SELECT * FROM page WHERE id IN(". implode(',', $num).")";
        echo $query;
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


}

$data = new Db;
$news = $data->getAll('page');

$i = 0;
$rand =[];
while($i<5) {
    $rand[] = $news[rand(1,count($news))];
    ++$i;
}

var_dump($rand);

echo '<hr>';

// ������ ������� ================================

$ids = $data->getId();

$arr = [];

foreach($ids as $first) {
    foreach($first as $id) {
        $arr[] = $id;
    }
}

echo '<hr> All id\'s';
var_dump($arr);

echo '<hr> Random id\'s';

$rand5 =[];
$count = 0;

while($count<5) {
    $r = array_rand($arr);
    if(array_key_exists('$r', $rand5)) {
        continue;
    } else {
        $rand5[] = $arr[$r];
        ++$count;
    }

}

var_dump($rand5);

$five = $data->getFive($rand5);

echo '<hr> Random posts';

var_dump($five);