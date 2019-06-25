<?php

// NOTE: Require vendor autoload

use Maksa988\MonobankAPI\MonobankAPI;

$api = new MonobankAPI('YOUR_TOKEN');

/*
 * Get personal statement
 */
echo $api->personalStatement(new \DateTime('yesterday'));
