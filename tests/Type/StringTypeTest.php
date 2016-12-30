<?php

namespace Test\Kwk\Geckoboard\Dataset\Type;

use Kwk\Geckoboard\Dataset\TypeInterface;
use Kwk\Geckoboard\Dataset\Type\StringType;

class StringTypeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test if class even exists
     */
    public function testClassExists()
    {
        $this->assertTrue(class_exists('Kwk\Geckoboard\Dataset\Type\StringType'), 'StringType does not exists');
    }

    /**
     * @test if StringType implements `Kwk\Geckoboard\Dataset\TypeInterface`
     */
    public function testImplementsTypeInterface()
    {
        $this->assertInstanceOf(TypeInterface::class, new StringType(''), 'StringType does not implement `Kwk\Geckoboard\Dataset\TypeInterface`');
    }

    /**
     * @test checking if object is translated correctly to Array
     */
    public function testToArray()
    {
        $obj    = new StringType('String');
        $result = $obj->toArray();

        $expected = [
            'type' => 'string',
            'name' => 'String',
        ];

        $this->assertEquals($expected, $result, 'Method toArray result has other structure than expected');
    }
}
