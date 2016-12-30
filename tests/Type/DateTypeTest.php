<?php

namespace Test\Kwk\Geckoboard\Dataset\Type;

use Kwk\Geckoboard\Dataset\Type\DateType;
use Kwk\Geckoboard\Dataset\TypeInterface;

class DateTypeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test if class even exists
     */
    public function testClassExists()
    {
        $this->assertTrue(class_exists('Kwk\Geckoboard\Dataset\Type\DateType'), 'DateType does not exists');
    }

    /**
     * @test if DateType implements `Kwk\Geckoboard\Dataset\TypeInterface`
     */
    public function testImplementsTypeInterface()
    {
        $this->assertInstanceOf(TypeInterface::class, new DateType(''), 'DateType does not implement `Kwk\Geckoboard\Dataset\TypeInterface`');
    }

    /**
     * @test checking if object is translated correctly to Array
     */
    public function testToArray()
    {
        $obj    = new DateType('Date');
        $result = $obj->toArray();

        $expected = [
            'type' => 'date',
            'name' => 'Date',
        ];

        $this->assertEquals($expected, $result, 'Method toArray result has other structure than expected');
    }
}
