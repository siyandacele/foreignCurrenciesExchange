<?php

$app->post('/rate', function() use ($app) {
    
    $orders = new CurrencyPurchase\Rate\Orders;
    $discount = new CurrencyPurchase\Rate\Discount;
    
    $request = $app->request;
    
    // Get posted amount to or from a currency
    $amount = (int)$request->post('amount');
    $from =sanitize($request->post('from'));
    $to = sanitize($request->post('to'));
    $oparation = sanitize($request->post('type'));
        
    $isConnected = $app->rate->isGlobalCurrenciesConnected(); 
    $surchargeAmount = 0;
    $surcharge = 0;
    #This here because I did have internet connection -- Should never happen
    $timezone  = +2; 
    $time = gmdate("Y/m/j H:i:s", time() + 3600*($timezone+date("I")));
    $action = false;
    
    // To be currency to be stored in the orders DB. To charged
    $currency = $to;
     
    #This here because I did have internet connection -- Should never happen
    if(!$app->rate->isGlobalCurrenciesConnected()){

        if(!$app->rate->rateToExist($to)){
            $storedRate =  $app->rate
                ->where('to', $from)
                ->first();
        } else{
            $storedRate =  $app->rate
                ->where('to', $to)
                ->first();

        }    
        
        $decodeStoredRate = json_decode($storedRate, true);
        $rate = $decodeStoredRate['rate'];
        
    } else {
        (!$app->rate->rateToExist($to))
        ?$rate = $app->rate->currentRate('ZAR', $to)
        :$rate = $app->rate->currentRate($from, 'ZAR');
    }
    
    if($oparation == 'pay'){
        $calculatedAmount = $app->rate->calculateFrom($from,$amount);
        $totalAmount = $calculatedAmount;
        $currency = $from;
    }

    if($oparation == 'purchase'){
        $calculatedAmount = $app->rate->calculateFrom($to,$amount);
        $surchargeAmount = $app->rate->surchargeAmount($to,$calculatedAmount);
        $surcharge = $app->rate->getSurcharge($to);
        $totalAmount = ($calculatedAmount + $surchargeAmount);
    }
    
    #Storing only the requested rate on the database...
    if($app->rate->rateToExist($to) && $isConnected){
        $app->rate
         ->where('to', $to)
         ->update([
            'time' => $time,
            'rate' => $rate
         ]);
    }


    $finalAmount = $totalAmount;

    if($to == 'EUR' && $oparation == 'purchase'){
        $finalAmount = $app->rate->setDiscount(2, $totalAmount);
        $action = 'You got a 2% discount';
    }      

    if($to == 'GBP' && $oparation == 'purchase'){
        $action = 'Email was sent to with Details';
        $app->mail->send('email/auth/order.php', [
            'auth' => $app->auth, 
            'currency' => $to, 
            'rate' => $rate, 
            'surcharge' => $surcharge, 
            'surchargeAmount' => $surchargeAmount, 
            'date' => $time, 
            'amount' => $amount, 
            'rateAmount' => $surchargeAmount, 
            'calculatedAmount' => $calculatedAmount, 
            'totalAmount' => $totalAmount],
                         function($message) use ($app) {

            $message->to($app->auth->email);
            $message->subject('You have ordered GBP - British Pound rates');
        });
    }            

    $order = $orders->create([
            'user_id' => $app->auth->id,
            'operation' => $oparation,
            'currency' => $currency,
            'rate' => $rate,
            'amount' => $amount,
            'surcharge' => $surcharge,
            'calculated_amount' => $calculatedAmount,
            'total_surcharged_amount' => $totalAmount,
            'surcharge_amount' => $surchargeAmount,
            'final_amount' => $finalAmount
    ]);

    if($to == 'GBP' || $to == 'EUR'){
        $discount->create([
                'order_id' => $order->id,
                'action' => $action,
                'total_amount_discount' => $totalAmount
        ]);
    }
    
    $responce = array();
    
    $responce['success'] = [
        'type' => $oparation,
        'amount' => $calculatedAmount,
        'surcharge' => $surcharge . "%",
        'surcharge_amount' => $surchargeAmount,
        'massage' => ($action)? $action : '',
        'final_amount' => $finalAmount
    ];
    echo json_encode($responce);
    
    #The following information must be saved with an order:
    #Foreign currency purchased.
    #Exchange rate for foreign currency.
    #Surcharge percentage.
    #Amount of foreign currency purchased.
    #Amount to be paid in ZAR.
    #Amount of surcharge.
    #Date created.
    
    /**
     * When an order is saved, the following extra actions need to be taken for the different foreign currencies:
    **/
    #USD: No action.
    #GBP: Send an email with order details. This can be a basic text or html email to any configurable email address.
    #EUR: Apply a 2% discount on the total order amount, this needs to be configurable for the currency and be saved separately on an order. This must not be included in the initial currency calculation.

    
    

    
    #Store an Order
    /** get current amount **/
    /** get amount of surcharge **/
    /** EUR: Apply a 2% discount on the total order amount **/ 
    
    
    #If Currency is GBP send an email with order details.
    
})->name('rate.post');