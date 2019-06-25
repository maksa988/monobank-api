<?php

namespace Maksa988\MonobankAPI\DTO;

/**
 * Class Account.
 *
 * @property  string $id
 * @property  int $balance
 * @property  int $creditLimit
 * @property  int $currencyCode
 * @property  string $cashbackType
 */
class Account extends AbstractDTO
{
    /**
     * Personal constructor.
     *
     * @param string $id
     * @param int    $balance
     * @param int    $creditLimit
     * @param int    $currencyCode
     * @param string $cashbackType
     */
    public function __construct(string $id, int $balance, int $creditLimit, int $currencyCode, string $cashbackType)
    {
        $this->data['id'] = $id;
        $this->data['balance'] = $balance;
        $this->data['creditLimit'] = $creditLimit;
        $this->data['currencyCode'] = $currencyCode;
        $this->data['cashbackType'] = $cashbackType;
    }

    /**
     * @param array $data
     *
     * @return Account
     */
    public static function fromArray(array $data)
    {
        return new self(
            $data['id'],
            $data['balance'],
            $data['creditLimit'],
            $data['currencyCode'],
            $data['cashbackType']
        );
    }
}
