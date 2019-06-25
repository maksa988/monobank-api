<?php

namespace Maksa988\MonobankAPI\DTO;

abstract class AbstractDTO
{
    protected $data = [];

    /**
     * @param array $data
     *
     * @return AbstractDTO
     */
    public abstract static function fromArray(array $data);

    /**
     * @param mixed $name
     *
     * @return mixed
     */
    public function __get($name)
    {
        return $this->data[$name];
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return implode(', ', $this->data);
    }
}