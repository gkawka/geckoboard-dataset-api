<?php

namespace Test\Kwk\Geckoboard\Dataset\Resources\Dataset;

use Kwk\Geckoboard\Dataset\DataSetRowInterface;

class TestDatarow implements DataSetRowInterface
{
    /**
     * {@inheritDoc}
     */
    public function getData()
    {
        return [
            'param1' => 'val1',
            'param2' => 'val2',
        ];
    }
}
