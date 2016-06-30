<?php
require 'DataAccessAbstract.php';

class Schedule extends DataAccessAbstract
{
    protected $table = 'schedule';
    protected $model;
    protected $pdo;

    public function __construct() {
        try {
            $db = new PDO('sqlite:' . realpath(dirname(__FILE__)) . '/schedule.db');
            $this->pdo = $db;
        } catch(PDOException $e) {
            echo $e->getMessage();
            exit(1);
        }
    }
}
