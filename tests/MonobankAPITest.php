<?php

namespace Maksa988\MonobankAPI\tests;

use Maksa988\MonobankAPI\DTO\CurrencyInfo;
use Maksa988\MonobankAPI\Exceptions\InvalidToken;
use Maksa988\MonobankAPI\Exceptions\TooManyRequests;
use Maksa988\MonobankAPI\MonobankAPI;
use Maksa988\MonobankAPI\Test\TestCase;

class MonobankAPITest extends TestCase
{
    /** @test */
    public function cannot_do_request_with_invalid_token()
    {
        $api = new MonobankAPI('invalid token');

        $this->expectException(InvalidToken::class);

        $api->personalInfo();
    }

    /** @test */
    public function can_get_currencies_list()
    {
        $result = $this->api->currency();

        $this->assertInternalType('array', $result);
    }

    /** @test */
    public function currencies_list_has_dto()
    {
        sleep(5);

        $result = $this->api->currency();

        $this->assertInstanceOf(CurrencyInfo::class, array_shift($result));
    }

    /** @test */
    public function to_many_requests()
    {
        $this->expectException(TooManyRequests::class);

        $this->api->currency();
        $this->api->currency();
        $this->api->currency();
    }

    /** @test */
    public function invalid_token_when_request_with_invalid_token_to_private_methods()
    {
        sleep(5);

        $this->expectException(InvalidToken::class);

        $this->api->personalInfo();
    }
}
