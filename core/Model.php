<?
namespace Core;

use PDO;

class Model{
    protected $db;

    public function __construct(){
        $config = require '../config/config.php';
        $this->db = new PDO($config['dsn'], $config['username'], $config['password']);
    }
}