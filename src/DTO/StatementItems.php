<?php

namespace Maksa988\MonobankAPI\DTO;

/**
 * Class StatementItems.
 *
 * @property  array|Statement[] $items
 */
class StatementItems extends AbstractDTO
{
    /**
     * UserInfo constructor.
     *
     * @param array|Statement[] $items
     */
    public function __construct(array $items)
    {
        $this->data['items'] = $items;
    }

    /**
     * @param array $data
     *
     * @return StatementItems
     */
    public static function fromArray(array $data)
    {
        return new self(
            array_map(function ($item) {
                return Statement::fromArray($item);
            }, $data)
        );
    }
}
