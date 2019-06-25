<?php

// NOTE: Require vendor autoload

use Maksa988\MonobankAPI\MonobankAPI;

$api = new MonobankAPI('YOUR_TOKEN');

/*
 * Get information about client
 */
echo $api->personalInfo();
