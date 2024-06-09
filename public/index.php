<?

require_once '../vendor/autoload.php';
require_once '../core/Router.php';
require_once '../core/Controller.php';
require_once '../core/Model.php';

use Core\Router;

$router = new Router();
$router->run();