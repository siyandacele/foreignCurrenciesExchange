<?php

$app->get('/signup', $guest(), function() use ($app) {
    $app->render('auth/signup.php');
})->name('signup');

$app->post('/signup',$guest(), function() use ($app) {
    $request = $app->request;
    
    $email = $request->post('email');
    $first_name = $request->post('first_name');
    $last_name = $request->post('last_name');
    $password = $request->post('password');
    $passwordConfirm = $request->post('password_confirm');
    
    $v = $app->userValidation;
    
    $v->validate([
       'email' => [$email, 'required|email|uniqueEmail'],
       'first_name' => [$first_name, 'required|max(255)'],
        'last_name' => [$last_name, 'required|max(255)'],
       'password' => [$password, 'required|min(6)'],
        'password_confirm' => [$passwordConfirm, 'required|matches(password)']
    ]);
    
    if ($v->passes()){
        
        $identifier = $app->randomlib->generateString(128);
        
       $user = $app->user->create([
           'email' => $email,
           'last_name' => $last_name,
           'first_name' => $first_name,
           'password' => $app->hash->password($password),
           'active' => false,
           'active_hash' => $app->hash->hash($identifier)
        ]);
        
        $app->mail->send('email/auth/registered.php', ['user' => $user, 'identifier' => $identifier], function($message) use ($user) {

            $message->to($user->email);
            $message->subject('Thanks for registering');
        });
        
        $app->flash('global', 'You have been registered.');
        $app->response->redirect($app->urlFor('home'));
    } 
    
    $app->render('auth/signup.php', [
       'errors' => $v->errors(),
        'request' => $request,
        
    ]);
    
})->name('signup.post');