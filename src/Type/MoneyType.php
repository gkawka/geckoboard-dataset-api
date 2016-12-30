<?php

namespace Kwk\Geckoboard\Dataset\Type;

use Kwk\Geckoboard\Dataset\TypeInterface;

class MoneyType implements TypeInterface
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
     * @var string
     */
    private $currency;

    /**
     * @param string $name
     * @param string $currency
     * @param bool   $isOptional
     */
    public function __construct($name, $currency, $isOptional = false)
    {
        $this->name       = $name;
        $this->currency   = $currency;
        $this->isOptional = $isOptional;
    }

    /**
     * {@inheritDoc}
     */
    public function toArray()
    {
        return [
            'type'          => 'money',
            'name'          => $this->name,
            'currency_code' => $this->currency,
            'optional'      => $this->isOptional,
        ];
    }
}
