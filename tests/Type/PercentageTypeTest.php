<?php

namespace Test\Kwk\Geckoboard\Dataset\Type;

use Kwk\Geckoboard\Dataset\Type\PercentageType;
use Kwk\Geckoboard\Dataset\TypeInterface;
use PHPUnit\Framework\TestCase;

class PercentageTypeTest extends TestCase
{
    /**
     * @test if class even exists
     */
    public function testClassExists()
    {
        $this->assertTrue(class_exists('Kwk\Geckoboard\Dataset\Type\PercentageType'), 'PercentageType does not exists');
    }

    /**
     * @test if PercentageType implements `Kwk\Geckoboard\Dataset\TypeInterface`
     */
    public function testImplementsTypeInterface()
    {
        $this->assertInstanceOf(TypeInterface::class, new PercentageType(''), 'PercentageType does not implement `Kwk\Geckoboard\Dataset\TypeInterface`');
    }

    /**
     * @test checking if object is translated correctly to Array
     */
    public function testToArray()
    {
        $obj    = new PercentageType('Percent');
        $result = $obj->toArray();

        $expected = [
            'type'     => 'percentage',
            'name'     => 'Percent',
            'optional' => false,
        ];

        $this->assertEquals($expected, $result, 'Method toArray result has other structure than expected');
    }

    /**
     * @test    checking if object is translated correctly to Array when optional flag is set
     * @depends testToArray
     */
    public function testToArrayOptional()
    {
        $obj    = new PercentageType('Percent', true);
        $result = $obj->toArray();

        $expected = [
            'type'     => 'percentage',
            'name'     => 'Percent',
            'optional' => true,
        ];

        $this->assertEquals($expected, $result, 'Method toArray result should have `optional` flag set to true');
    }
}
