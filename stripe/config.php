<?php

require_once('init.php');

$stripe = array(
    "secret_key"      => esc_attr(get_option('stripe_secret_key')),
    "publishable_key" => esc_attr(get_option('stripe_publish_key'))
);

\Stripe\Stripe::setApiKey($stripe['secret_key']);

?>