<?php

namespace Kwk\Geckoboard\Dataset\Type;

use Kwk\Geckoboard\Dataset\TypeInterface;

class DatetimeType implements TypeInterface
{
    /**
     * @var string
     */
    private $name;

    /**
     * @param string $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * {@inheritdoc}
     */
    public function toArray()
    {
        return [
            'type' => 'datetime',
            'name' => $this->name,
        ];
    }
}
