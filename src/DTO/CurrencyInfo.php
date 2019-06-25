<?php

namespace Maksa988\MonobankAPI\DTO;

/**
 * Class CurrencyInfo
 *
 * @property  int $currencyCodeA
 * @property  int $currencyCodeB
 * @property  \DateTime $date
 * @property  float $rateSell
 * @property  float $rateBuy
 * @property  float $rateCross
 */
class CurrencyInfo extends AbstractDTO
{
    /**
     * Personal constructor.
     * @param int $currencyCodeA
     * @param int $currencyCodeB
     * @param \DateTime $date
     * @param float $rateSell
     * @param float $rateBuy
     * @param float $rateCross
     */
    public function __construct(int $currencyCodeA, int $currencyCodeB, \DateTime $date,
                                float $rateSell, float $rateBuy, float $rateCross)
    {
        $this->data['currencyCodeA'] = $currencyCodeA;
        $this->data['currencyCodeB'] = $currencyCodeB;
        $this->data['date'] = $date;
        $this->data['rateSell'] = $rateSell;
        $this->data['rateBuy'] = $rateBuy;
        $this->data['rateCross'] = $rateCross;
    }

    /**
     * @param array $data
     *
     * @return CurrencyInfo
     */
    public static function fromArray(array $data)
    {
        return new self(
            $data['currencyCodeA'],
            $data['currencyCodeB'],
            (new \DateTime())->setTimestamp($data['date']),
            $data['rateSell'] ?? 0.0,
            $data['rateBuy'] ?? 0.0,
            $data['rateCross'] ?? 0.0
        );
    }
}