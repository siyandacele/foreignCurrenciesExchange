<?php

namespace CurrencyPurchase\User;

use Illuminate\Database\Eloquent\Model as Eloquent;
 
class User extends Eloquent {
 
    protected $table = 'user';
    protected $fillable = [
        'email',
        'first_name',
        'last_name',
        'password',
        'active',
        'active_hash',
        'recover_hash',
        'remember_identifier',
        'remember_token'
    ];
    
    public function activateAccount() {
        $this->update([
            'active' => TRUE,
            'active_hash' => NULL
        ]);
    }
    
    public function updateRememberCredentials($identifier, $token) {
        $this->update([
            'remember_identifier' => $identifier,
            'remember_token' => $token
        ]);
    }
 
    public function removeRememberCredentials() {
        $this->updateRememberCredentials(NULL, NULL);
    }

 
    public function permissions() {
        return $this->hasOne('BulkbuyerAfrica\User\UserPermission', 'user_id');
    }
 
}