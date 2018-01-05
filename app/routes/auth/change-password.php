<?php

$app->get('/change-password',$authenticated(), function() use ($app) {

    $app->render('auth/change-password.php');
    
})->name('change.password');

$app->post('/change-password', function() use ($app) {
    
    $request = $app->request; 
    
    $old_password = $request->post('old_password');
    $password = $request->post('password');
    $confirm_password = $request->post('confirm_password');
   
    $v = $app->userValidation;
    
    $v->validate([
        'old_password' => [$old_password, 'required|currentPassword'],
        'password' => [$password, 'required|min(8)'],
        'confirm_password' => [$confirm_password, 'required|matches(password)']
    ]);
    
    if ($v->passes()){
        
       $user = $app->auth
           ->update([
           'password' => $app->hash->password($password)
        ]);
        
        
         $app->mail->send('email/auth/change-password.php', [], function($message) use ($app) {
                $message->to($app->auth->email);
                $message->subject('Your password has been changed');
            });
        
        $app->flash('global', 'Your password has been change.');
        $app->response->redirect($app->urlFor('currencies'));
    }
    
    $app->render('customer/change-password.php', [
       'errors' => $v->errors(),
        'request' => $request,
    ]);
    
})->name('change.password.post');