<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once "vendor/autoload.php";
/**
 * Created by PhpStorm.
 * User: A-VE
 * Date: 1/9/2019
 * Time: 10:05 AM
 */

$f3 = Base::instance();
$f3->set('colors', array('pink', 'green', 'blue'));

$f3->route('GET /', function() {
    echo "<h1>My Pets</h1>";
    echo "<a href='order'>Order a Pet</a>";
});

$f3->route('GET /order', function() {
    $view = new View;
    echo $view->render('views/form1.html');
});

$f3->route('POST /order2', function($f3) {
    $f3->set('SESSION.animal', $f3->get('POST.animal'));
    $template = new Template;
    echo $template->render('views/form2.html');
});

$f3->route('POST /results', function($f3) {
    $f3->set('SESSION.color', $f3->get('POST.color'));
    $template = new Template;
    echo $template->render('views/results.html');
});

//Define a route that accepts a parameter for animal type
$f3->route('GET /@animal', function($f3, $params)
{
    switch ($params['animal'])
    {
        case 'dog':
            echo 'Woof!';
            break;
        case 'chicken':
            echo 'Cluck!';
            break;
        case 'cat':
            echo 'Meow!';
            break;
        case 'cow':
            echo 'Moo!';
            break;
        case 'pig':
            echo 'Oink!';
            break;
        default:
            echo $f3->error(404);
    }

});


$f3->run();
