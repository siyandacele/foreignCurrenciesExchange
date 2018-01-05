<?php

use Carbon\Carbon;
    
$app->get('/', function() use ($app) {
    
    $app->render('/home.php');
    
    if($app->auth){
        $app->response->redirect($app->urlFor('currencies'));
    }
    
})->name('home');

$app->post('/', $guest(), function() use ($app) {
    $request = $app->request;
    
    $email = $request->post('email');
    $password = $request->post('password');
    $remember = $request->post('remember');
    
    $v = $app->userValidation;
    
    $v->validate([
        'email' => [$email, 'required'],
        'password' => [$password, 'required']
    ]);
    
    if ($v->passes()){
        $user = $app->user
            ->where('email', $email)
            ->where('active', true)
            ->first();
        if ($user && $app->hash->passwordCheck($password, $user->password)){
            $_SESSION[$app->config->get('auth.session')] = $user->id;
            
            if($remember === 'on') {
                $rememberIdentifier = $app->randomlib->generateString(128);
                $rememberToken = $app->randomlib->generateString(128);
                
                $user->updateRememberCredentials(
                    $rememberIdentifier,
                    $app->hash->hash($rememberToken)
                );
                
                $app->setCookie(
                    $app->config->get('auth.remember'),
                    "{$rememberIdentifier}___{$rememberToken}",
                    Carbon::parse('+1 week')->timestamp
                );
            }
            
            $app->flash('global', 'You are now signed in!');
            $app->response->redirect($app->urlFor('currencies'));
        } else {
            $app->flash('global', 'Could not log you in!');
            $app->response->redirect($app->urlFor('home'));
        }
        
    }
    
    $app->render('auth/login.php', [
        'errors' => $v->errors(),
        'request' => $request
    ]);
    
})->name('home.post');
