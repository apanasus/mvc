<?
namespace App\Controllers;

use Core\Controller;

class HomeController extends Controller{
    
    public function index(){
        $data = ['message' => 'Хуй индексовый'];
        $this->view('home', $data);
    }
}