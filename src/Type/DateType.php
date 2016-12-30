<?php

namespace Kwk\Geckoboard\Dataset\Type;

use Kwk\Geckoboard\Dataset\TypeInterface;

class DateType implements TypeInterface
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
     * {@inheritDoc}
     */
    public function toArray()
    {
        return [
            'type' => 'date',
            'name' => $this->name,
        ];
    }
}
