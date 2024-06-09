<?
namespace App\Controllers;

use Core\Controller;

class ClickController extends Controller
{
    public function index()
    {
        $data = ['message' => 'This is the Click page'];
        $this->view('click', $data);
    }
}
