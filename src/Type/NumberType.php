<?php

namespace Kwk\Geckoboard\Dataset\Type;

use Kwk\Geckoboard\Dataset\TypeInterface;

class NumberType implements TypeInterface
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var bool
     */
    private $isOptional;

    /**
     * @param string $name
     * @param bool   $isOptional
     */
    public function __construct($name, $isOptional = false)
    {
        $this->name       = $name;
        $this->isOptional = $isOptional;
    }

    /**
     * {@inheritDoc}
     */
    public function toArray()
    {
        return [
            'type'     => 'number',
            'name'     => $this->name,
            'optional' => $this->isOptional,
        ];
    }
}
