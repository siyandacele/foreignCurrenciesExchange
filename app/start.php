<?php

use Slim\Slim;
use Slim\Views\Twig;
use Slim\Views\TwigExtension;

use Noodlehaus\Config;
use RandomLib\Factory as RandomLib;

use CurrencyPurchase\User\User;
use CurrencyPurchase\Mail\Mailer;
use CurrencyPurchase\Helpers\Hash;  
use CurrencyPurchase\Validation\UserValidator;    

use CurrencyPurchase\Middleware\BeforeMiddleware;
use CurrencyPurchase\Middleware\CsrfMiddleware;

use CurrencyPurchase\Rate\Rate;

use Illuminate\Database\Capsule\Manager as Capsule;

session_cache_limiter(false);
session_start();

ini_set('display_errors', 'On');
$domain = $_SERVER['HTTP_HOST'];
$docRoot = $_SERVER['DOCUMENT_ROOT'];
$dirRoot = dirname(__FILE__);
$protocol = isset($_SERVER["HTTPS"]) ? 'https://' : 'http://';

$site_path = $protocol.$domain;
define ('BASE_URL', $site_path);

define('INC_ROOT', dirname(__DIR__));
define('SCRIPT_ROOT', $_SERVER['REQUEST_URI'] );

require INC_ROOT . '/vendor/autoload.php';

$app = new Slim([
    'mode' => file_get_contents(INC_ROOT . '/mode.php'),
    'view' => new Twig(),
    'templates.path' => INC_ROOT . '/app/views' 
]);

$app->add(new BeforeMiddleware);
$app->add(new CsrfMiddleware);

$app->configureMode($app->config('mode'), function() use ($app){
    $app->config = Config::load(INC_ROOT . "/app/config/{$app->mode}.php"); 
});

require 'database.php';
require 'filters.php';
require 'helpers.php';
require 'routes.php';

$app->auth = false;

$app->container->set('user', function(){
   return new User; 
});

$app->container->singleton('hash', function() use ($app) {
    return new Hash($app->config);
});

$app->container->singleton('rate', function() use ($app) {
   return new Rate($app->config->get('api.globalcurrencies')); 
});
$app->container->singleton('userValidation', function() use ($app) {
   return new UserValidator($app->user, $app->hash, $app->auth); 
});

$app->db = function() {
    return new Capsule;
};

$app->container->singleton('mail', function() use ($app) {
    $mailer = new PHPMailer;
    
    $mailer->isSMTP();
    $mailer->Host = $app->config->get('mail.host');
    $mailer->SMTPAuth = $app->config->get('mail.smtp_auth');
    $mailer->SMTPSecure = $app->config->get('mail.smtp_secure');
    $mailer->Port = $app->config->get('mail.port'); 
    $mailer->Username = $app->config->get('mail.username'); 
    $mailer->Password = $app->config->get('mail.password'); 
    $mailer->FromName = $app->config->get('mail.name'); 
    $mailer->isHTML($app->config->get('mail.html')); 
    return new Mailer($app->view, $mailer);
    
});

$app->container->singleton('randomlib', function(){
     $factory = new RandomLib;
    return $factory->getMediumStrengthGenerator();  
});

// Views
$view = $app->view();

$view->parserOptions = [
    'debug' => $app->config->get('twig.debug')
];

$view->parserExtensions = [
  new TwigExtension  
];