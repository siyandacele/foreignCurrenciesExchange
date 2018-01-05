<?php

namespace CurrencyPurchase\Rate;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Rate extends Eloquent 
{ 
    protected $table = 'rate';
    public $timestamps = false;
    protected $fillable = [
        'utctime',
        'from',
        'to',
        'rate',
        'surcharge'
    ];
    
    public $token;
    protected $rate;
/**
 * @var array    key contains country code, value contains respective country currency
 */
    protected $currencies = ['ZAR','EUR','GBP','KES','USD'];
    
    
    public function __construct ($token = 'DD6C71A328D742FB8AC0EB1FDC83FD84') {
        $this->token = $token;
    }
    
    public function currentRate($from, $to)
    {
        $parseTo = $this->parseCurrencyArgument($to);
        $parseFrom = $this->parseCurrencyArgument($from);
        $request ='http://.xignite.com/xGlobalCurrencies.json/GetRealTimeRate?Symbol='.$parseFrom . $parseTo .'&_token='.$this->token;
        $requestToArray = json_decode(file_get_contents($request), true);
        return $requestToArray['Bid'];
    }
    
    public function isGlobalCurrenciesConnected()
    {
        
        if($socket =@ fsockopen('globalcurrencies.xignite.com', 80, $errno, $errstr, 30)) {
            return true;
            fclose($socket);
        }
        return false;

    }

    protected function parseCurrencyArgument($currencyCode)
    {
        if (is_array($currencyCode, $this->currencies)) {
            return $currencyCode;
        } else {
            throw new Exception\InvalidArgumentException('Invalid currency abbreviation provided.');
        }
    }
    
    public function rateToExist($to)
    {
        if($this->where('to',$to)->first()){
            return true;
        }
        return false;
    }

    public function getRateByParams($from,$to)
    {
        $rate = $this->getRate($from,$to);
        return $rate->rate;
    }
    
    protected function getFromTo($from,$to)
    {
        return $this
            ->where('from', $from)
            ->where('to',$to)
            ->first();
    }
    
    public function getRateId($from,$to){
        $rate = $this->getRate($from,$to);
        return $rate->id;
    }
    
    public function toRate($to)
    {
        return json_decode($this
            ->where('to',$to)
            ->first(), true);
    }

    public function calculateFrom($from, $amount){
        $rate =  $this->toRate($from);	
        return round($amount*$rate['rate'],7);
    }

    public function calculateTo($to, $amount){
        $rate =  $this->toRate($to);
        return round($amount/$rate['rate'],7);
    }
    
    public function surchargeAmount($to, $amount)
    {
        $rate = $this->toRate($to);
        $amountSurcharged = (($amount*$rate['surcharge'])/100);
        return round($amountSurcharged,7);
    }
    
    public function getSurcharge($to)
    {
        $rate = $this->toRate($to);
        return $rate['surcharge'];
    }
            
    public function calculateSurchargedTo($freezeamount,$id){
        $surcharge = $this->where('id', $id)->first();
        $amount_surcharged = ($freezeamount + (($freezeamount*$surcharge)/100));
        return round($amount_surcharged,7);	
    }

    public function amountOfSurcharge($amount,$id){
        return $this->calculateSurchargedTo($amount,$id) - $amount;
    }
    
    public function setDiscount($percentage,$amount){
        $discount = ($amount - (($amount*$percentage)/100));	
        return round($discount,4);
    }
    

}