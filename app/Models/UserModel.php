<?
namespace App\Models;

use Core\Model;
use PDO;

class UserModel extends Model{
    
    public function getUser(){
        $stmt = $this->db->query("SELECT * FROM users");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}