<?php

require('vendor/autoload.php');

\Stripe\Stripe::setApiKey('sk_xxx');

// Token is created using Stripe Checkout or Elements!
// Get the payment token ID submitted by the form:
$token = $_POST['stripeToken'];
$charge = \Stripe\Charge::create([
  'amount' => $_POST['amount'] * 100,
  'currency' => 'myr',
  'description' => 'Example charge',
  'source' => $token,
]);

header('Location: '.$charge->receipt_url);
