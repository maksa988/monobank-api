<?php

namespace Maksa988\MonobankAPI\Exceptions;

use Exception as BaseException;
use Psr\Http\Message\ResponseInterface;

class Exception extends BaseException
{
    /**
     * @var ResponseInterface
     */
    protected $response;

    /**
     * Exception constructor.
     *
     * @param ResponseInterface $response
     */
    public function __construct(ResponseInterface $response)
    {
        $error = \GuzzleHttp\json_decode((string) $response->getBody(), true);

        $message = 'MonobankAPI: '.$error['errorDescription'];

        parent::__construct($message, $response->getStatusCode());
    }

    /**
     * @return ResponseInterface
     */
    public function getResponse()
    {
        return $this->response;
    }
}
