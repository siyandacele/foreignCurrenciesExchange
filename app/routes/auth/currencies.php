<?php

$app->get('/currencies',$authenticated(), function() use ($app) {
  $app->render('auth/currencies.php'); 
})->name('currencies');