<?php

namespace CurrencyPurchase\Validation;

use Violin\Violin;
use CurrencyPurchase\User\User;
use CurrencyPurchase\Helpers\Hash; 

class UserValidator extends Violin
{
    protected $user;
    protected $hash;
    protected $auth;
    
    public function __construct(User $user, Hash $hash, $auth = null)
    {
        $this->user = $user;
        $this->hash = $hash;
        $this->auth = $auth;
        
        $this->addFieldMessages([
           'email' => [
               'uniqueEmail' => 'That email is aleady in use.'
           ] 
        ]);
        
        $this->addRuleMessages([
           'currentPassword' => 'That does not match you current password.'
        ]);
    }
    
    public function validate_uniqueEmail($value, $input, $args)
    {
        $user = $this->user->where('email', $value);
        
        return ! (bool) $user->count();
    }
    
    public function validate_currentPassword($value, $input, $args)
    {
        if($this->auth && $this->hash->passwordCheck($value, $this->auth->password)){
            return true;
        }
        
        return false;
    }
}