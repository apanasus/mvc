<?
namespace App\Controllers;

use Core\Controller;

class OfferController extends Controller{
    
    public function index(){
        $data = ['offers' =>[
            'offer1',
            'offer2',
            'offer3'
        ]];
        $this->view('offers',$data);
    }
}