<?php

namespace Maksa988\MonobankAPI\DTO;

/**
 * Class UserInfo.
 *
 * @property  string $name
 * @property  array|Account[] $accounts
 */
class UserInfo extends AbstractDTO
{
    /**
     * UserInfo constructor.
     *
     * @param string          $name
     * @param array|Account[] $accounts
     */
    public function __construct(string $name, array $accounts)
    {
        $this->data['name'] = $name;
        $this->data['accounts'] = $accounts;
    }

    /**
     * @param array $data
     *
     * @return UserInfo
     */
    public static function fromArray(array $data)
    {
        return new self(
            $data['name'],
            array_map(function ($account) {
                return Account::fromArray($account);
            }, $data['accounts'])
        );
    }
}
