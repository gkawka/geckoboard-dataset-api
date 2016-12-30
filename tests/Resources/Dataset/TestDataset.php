<?php

namespace Test\Kwk\Geckoboard\Dataset\Resources\Dataset;

use Kwk\Geckoboard\Dataset\DatasetBuilder;
use Kwk\Geckoboard\Dataset\DataSetInterface;
use Kwk\Geckoboard\Dataset\Type\DateType;
use Kwk\Geckoboard\Dataset\Type\NumberType;

/**
 * Example dataset object
 */
class TestDataset implements DataSetInterface
{
    const FIELD_DATE   = 'date';
    const FIELD_NUMBER = 'number';

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return 'test';
    }

    /**
     * {@inheritDoc}
     */
    public function getDefinition()
    {
        return (new DatasetBuilder())
            ->addField(self::FIELD_DATE, new DateType('Date'))
            ->addField(self::FIELD_NUMBER, new NumberType('Number'))
            ->build();
    }
}
