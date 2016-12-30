<?php

namespace Test\Kwk\Geckoboard\Dataset\Type;

use Kwk\Geckoboard\Dataset\Type\NumberType;
use Kwk\Geckoboard\Dataset\TypeInterface;

class NumberTypeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test if class even exists
     */
    public function testClassExists()
    {
        $this->assertTrue(class_exists('Kwk\Geckoboard\Dataset\Type\NumberType'), 'NumberType does not exists');
    }

    /**
     * @test if NumberType implements `Kwk\Geckoboard\Dataset\TypeInterface`
     */
    public function testImplementsTypeInterface()
    {
        $this->assertInstanceOf(TypeInterface::class, new NumberType(''), 'NumberType does not implement `Kwk\Geckoboard\Dataset\TypeInterface`');
    }

    /**
     * @test checking if object is translated correctly to Array
     */
    public function testToArray()
    {
        $obj    = new NumberType('Number');
        $result = $obj->toArray();

        $expected = [
            'type'     => 'number',
            'name'     => 'Number',
            'optional' => false,
        ];

        $this->assertEquals($expected, $result, 'Method toArray result has other structure than expected');
    }

    /**
     * @test checking if object is translated correctly to Array when optional flag is set
     * @depends testToArray
     */
    public function testToArrayOptional()
    {
        $obj    = new NumberType('Number', true);
        $result = $obj->toArray();

        $expected = [
            'type'     => 'number',
            'name'     => 'Number',
            'optional' => true,
        ];

        $this->assertEquals($expected, $result, 'Method toArray result should have `optional` flag set to true');
    }
}
