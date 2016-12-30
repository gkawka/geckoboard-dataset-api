<?php

namespace Test\Kwk\Geckoboard\Dataset\Resources\Type;

use Kwk\Geckoboard\Dataset\TypeInterface;

class TestType implements TypeInterface
{
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return [
            'field1' => 'field1value',
            'field2' => 'field2value',
        ];
    }
}
