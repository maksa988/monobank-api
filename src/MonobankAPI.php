<?php

namespace Maksa988\MonobankAPI;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ClientException;
use Maksa988\MonobankAPI\DTO\CurrencyInfo;
use Maksa988\MonobankAPI\DTO\StatementItems;
use Maksa988\MonobankAPI\DTO\UserInfo;
use Maksa988\MonobankAPI\Exceptions\Exception;
use Maksa988\MonobankAPI\Exceptions\InternalError;
use Maksa988\MonobankAPI\Exceptions\InvalidAccount;
use Maksa988\MonobankAPI\Exceptions\InvalidToken;
use Maksa988\MonobankAPI\Exceptions\MissingRequiredField;
use Maksa988\MonobankAPI\Exceptions\PeriodMustBeNoMore;
use Maksa988\MonobankAPI\Exceptions\TooManyRequests;
use Maksa988\MonobankAPI\Exceptions\ValueMustBeGreater;
use Psr\Http\Message\ResponseInterface;

class MonobankAPI
{
    /**
     * @var string
     */
    const VERSION = '1.0';

    /**
     * @var int
     */
    const MONOBANK_VERSION = 201903;

    /**
     * @var string
     */
    protected $token;

    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var string
     */
    const API_URL = 'https://api.monobank.ua/';

    /**
     * MonobankAPI constructor.
     *
     * @param string $token
     */
    public function __construct($token)
    {
        $this->token = $token;

        $this->client = new Client();
    }

    /**
     * @throws Exception
     *
     * @return array
     */
    public function currency()
    {
        return array_map(function ($item) {
            return CurrencyInfo::fromArray($item);
        }, $this->request('/bank/currency'));
    }

    /**
     * @throws Exception
     *
     * @return UserInfo
     */
    public function personalInfo()
    {
        return UserInfo::fromArray($this->request('/personal/client-info'));
    }

    /**
     * @param \DateTime      $from
     * @param int|null       $account
     * @param \DateTime|null $to
     *
     * @throws Exception
     *
     * @return StatementItems
     */
    public function personalStatement(\DateTime $from, $account = 0, \DateTime $to = null)
    {
        $parameters = $account.'/'.$from->getTimestamp().'/'.($to ? $to->getTimestamp() : '');

        return StatementItems::fromArray($this->request('/personal/statement/'.$parameters));
    }

    /**
     * @param string $url
     *
     * @throws Exception
     *
     * @return array
     */
    protected function request($url)
    {
        try {
            $response = $this->client->get(self::API_URL.$url, [
                'headers' => [
                    'X-Token' => $this->token,
                ],
            ]);
        } catch (ClientException  $e) {
            $this->throwError($e);
        }

        return $this->decodeResponse($response);
    }

    /**
     * @param ClientException $e
     *
     * @throws Exception
     */
    protected function throwError(ClientException $e)
    {
        $error = $this->decodeResponse($e->getResponse());

        if ($error['errorDescription'] == "Unknown 'X-Token'") {
            throw new InvalidToken($e->getResponse());
        }

        if ($error['errorDescription'] == 'Too many requests') {
            throw new TooManyRequests($e->getResponse());
        }

        if ($error['errorDescription'] == 'invalid account') {
            throw new InvalidAccount($e->getResponse());
        }

        if ($error['errorDescription'] == 'internal error') {
            throw new InternalError($e->getResponse());
        }

        if (strpos($error['errorDescription'], 'Missing required field') !== false) {
            throw new MissingRequiredField($e->getResponse());
        }

        if (strpos($error['errorDescription'], 'out of bounds') !== false) {
            throw new PeriodMustBeNoMore($e->getResponse());
        }

        if (strpos($error['errorDescription'], 'must be greater') !== false) {
            throw new ValueMustBeGreater($e->getResponse());
        }

        throw new Exception($e->getResponse());
    }

    /**
     * @param ResponseInterface $response
     *
     * @return array
     */
    protected function decodeResponse(ResponseInterface $response)
    {
        return \GuzzleHttp\json_decode($response->getBody()->getContents(), true);
    }
}
