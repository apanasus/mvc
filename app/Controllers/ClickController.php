<?
namespace App\Controllers;

use Core\Controller;

class ClickController extends Controller{
    
    public function index(){
        $data = ['Click' =>[
            'Click',
            'Click',
            'Click'
        ]];
        $this->view('Click',$data);
    }
}