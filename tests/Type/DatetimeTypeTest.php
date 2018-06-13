<?php

namespace Test\Kwk\Geckoboard\Dataset\Type;

use Kwk\Geckoboard\Dataset\Type\DatetimeType;
use Kwk\Geckoboard\Dataset\TypeInterface;
use PHPUnit\Framework\TestCase;

class DatetimeTypeTest extends TestCase
{
    /**
     * @test if class even exists
     */
    public function testClassExists()
    {
        $this->assertTrue(class_exists('Kwk\Geckoboard\Dataset\Type\DatetimeType'), 'DatetimeType does not exists');
    }

    /**
     * @test if DatetimeType implements `Kwk\Geckoboard\Dataset\TypeInterface`
     */
    public function testImplementsTypeInterface()
    {
        $this->assertInstanceOf(TypeInterface::class, new DatetimeType(''), 'DatetimeType does not implement `Kwk\Geckoboard\Dataset\TypeInterface`');
    }

    /**
     * @test checking if object is translated correctly to Array
     */
    public function testToArray()
    {
        $obj    = new DatetimeType('Datetime');
        $result = $obj->toArray();

        $expected = [
            'type' => 'datetime',
            'name' => 'Datetime',
        ];

        $this->assertEquals($expected, $result, 'Method toArray result has other structure than expected');
    }
}
