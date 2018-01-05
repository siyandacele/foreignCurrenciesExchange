<?php

$app->get('/password-reset', $guest(), function() use ($app) {
    
    $request = $app->request();
    
    $email = $request->get('email');
    $identifier = $request->get('identifier');
    
    $hashIdentifier = $app->hash->hash($identifier);
    
    $user = $app->user->where('email', $email)->first();
    
    if(!$user){
        $app->response->redirect($app->urlFor('home'));
    }
    
    if(!$user->recover_hash){
        $app->response->redirect($app->urlFor('home'));
    }
    
    if(!$app->hash->hashCheck($user->recover_hash, $hashIdentifier)){
        $app->response->redirect($app->urlFor('home'));
    }
    
    $app->render('auth/password/reset.php', [
        'email' => $user->email,
        'identifier' => $identifier
    ]);
    
})->name('password.reset');

$app->post('/password-reset', $guest(), function() use ($app) {
    
    $request = $app->request();
    
    $email = $request->get('email');
    $identifier = $request->get('identifier');
    
    $hashIdentifier = $app->hash->hash($identifier);
    
    $password = $request->post('password');
    $password_confirm = $request->post('password_confirm');
    
    $user = $app->user->where('email', $email)->first();
    
    if(!$user){
        $app->response->redirect($app->urlFor('home'));
    }
    
    if(!$user->recover_hash){
        $app->response->redirect($app->urlFor('home'));
    }
    
    if(!$app->hash->hashCheck($user->recover_hash, $hashIdentifier)){
        $app->response->redirect($app->urlFor('home'));
    }
    
    $v = $app->userValidation;
    
    $v->validate([
        'password' => [$password, 'required|min(8)'],
        'password_confirm' => [$password_confirm, 'required|matches(password)'],
    ]);
    
    if ($v->passes()){
        $user->update([
            'password' => $app->hash->password($password),
            'recover_hash' => null
        ]);
        
        $app->flash('global', 'Your password has been reseted and you can now log in.');
        $app->response->redirect($app->urlFor('sign-in'));
    }
    
    $app->render('auth/password/reset.php', [
        'errors' => $v->errors(),
        'email' => $user->email,
        'identifier' => $identifier
    ]);
    
})->name('password.reset.post');