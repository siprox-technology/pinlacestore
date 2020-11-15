<?php 

try{

    // create customer and charge
    try{
        $customer = \Stripe\Customer::create(array(
            "name" =>$name,
        "email" => $email,
        "address" => $address,
        "source" => $token
        ));

        header('Content-Type: application/json');
        $charge = \Stripe\Charge::create(array(
        "amount" => ($POST['amount'])*100,
        "currency" => "usd",
        "description" => "order number: ".$POST['order_id'],
        "customer" => $customer->id
        ));
        $transactionData = [
            'transaction_id' => $charge->id,
            'amount' => (($charge->amount)/100),
            'currency' => $charge->currency,
            'payment_method' =>$charge->payment_method_details->card->network,
            'last_4' => $charge->payment_method_details->card->last4,
            'order_id'=>$order_id
            ];
    }
    catch(\Stripe\Exception\CardException $e) 
    {
        //The zip code you supplied failed validation.
        //Your card's security code is incorrect.
        //Your card has insufficient funds.
        //Your card was declined.
        //Your card has expired.
        //Your card's security code is incorrect.
        //An error occurred while processing your card. Try again in a little bit.
        $payment_status = 'Payment failed: '.$e->getMessage();
        header('location:payment-result.php?status='.$payment_status);
    break;
    } 

    /* add transaction to payments */
    $payment = new Payment();
    $x = $payment->savePayment($transactionData);
    /* update order status to 1 */
    $order = new Order();
    $y = $order->updateOrder_Payment_status($order_id);
    $payment_status = "payment success";
    header('location:payment-result.php?status='.$payment_status.
    '&tid='.$transactionData['transaction_id'].
    '&amount='.$transactionData['amount'].'&currency='.
    $transactionData['currency'].'&payment_method='.
    $transactionData['payment_method'].'&last_4='.
    $transactionData['last_4'].'&order_id='.$transactionData['order_id']);
} 
catch (Exception $e) 
{
    $payment_status = 'Payment success but could not save payment'.$e->getMessage();
    header('location:payment-result.php?status='.$payment_status);
break;
}   