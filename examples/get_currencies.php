<?php

// NOTE: Require vendor autoload

use Maksa988\MonobankAPI\MonobankAPI;

$api = new MonobankAPI('YOUR_TOKEN');

/*
 * Get currencies
 */
foreach ($api->currency() as $currency) {
    echo $currency->__toString().'\n';
}
