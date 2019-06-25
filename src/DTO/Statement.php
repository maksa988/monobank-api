<?php

namespace Maksa988\MonobankAPI\DTO;

/**
 * Class Statement.
 *
 * @property string $id
 * @property int $time
 * @property string $description
 * @property int $mcc
 * @property bool $hold
 * @property int $amount
 * @property int $operationAmount
 * @property int $currencyCode
 * @property int $commissionRate
 * @property int $cashbackAmount
 * @property int $balance
 */
class Statement extends AbstractDTO
{
    /**
     * Statement constructor.
     *
     * @param string $id
     * @param int    $time
     * @param string $description
     * @param int    $mcc
     * @param bool   $hold
     * @param int    $amount
     * @param int    $operationAmount
     * @param int    $currencyCode
     * @param int    $commissionRate
     * @param int    $cashbackAmount
     * @param int    $balance
     */
    public function __construct(string $id, int $time, string $description, int $mcc, bool $hold,
                                int $amount, int $operationAmount, int $currencyCode,
                                int $commissionRate, int $cashbackAmount, int $balance)
    {
        $this->data['id'] = $id;
        $this->data['time'] = $time;
        $this->data['description'] = $description;
        $this->data['mcc'] = $mcc;
        $this->data['hold'] = $hold;
        $this->data['amount'] = $amount;
        $this->data['operationAmount'] = $operationAmount;
        $this->data['currencyCode'] = $currencyCode;
        $this->data['commissionRate'] = $commissionRate;
        $this->data['cashbackAmount'] = $cashbackAmount;
        $this->data['balance'] = $balance;
    }

    /**
     * @param array $data
     *
     * @return Statement
     */
    public static function fromArray(array $data)
    {
        return new self(
            $data['id'],
            (new \DateTime())->setTimestamp($data['time']),
            $data['description'],
            $data['mcc'],
            $data['hold'],
            $data['amount'],
            $data['operationAmount'],
            $data['currencyCode'],
            $data['commissionRate'],
            $data['cashbackAmount'],
            $data['balance']
        );
    }
}
