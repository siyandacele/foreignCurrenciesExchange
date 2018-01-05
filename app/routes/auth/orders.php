<?php

$app->get('/orders',$authenticated(), function() use ($app) {
    
    $orders = $app->db
        ->table('orders')
        ->where('user_id', $app->auth->id)
        ->get();
        
    $app->render('auth/orders.php',[
       'orders' => $orders
    ]); 
    
})->name('orders');