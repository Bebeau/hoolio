<?php

require_once('init.php');

$stripe = array(
	"secret_key"      => "sk_test_a2XQZufg8dtZ7ADWOr0zCtpH",
	"publishable_key" => "pk_test_ByoJucUkS7YYjs6OMlbtlA7x"
);

\Stripe\Stripe::setApiKey($stripe['secret_key']);

\Stripe\Plan::create(array(
    "amount" => 22000,
    "interval" => "year",
    "name" => "Pre-paid Subscription",
    "currency" => "usd",
    "id" => "pps"
));

?>