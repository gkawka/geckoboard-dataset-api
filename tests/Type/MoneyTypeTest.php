<?php

namespace Test\Kwk\Geckoboard\Dataset\Type;

use Kwk\Geckoboard\Dataset\TypeInterface;
use Kwk\Geckoboard\Dataset\Type\MoneyType;
use PHPUnit\Framework\TestCase;

class MoneyTypeTest extends TestCase
{
    /**
     * @test if class even exists
     */
    public function testClassExists()
    {
        $this->assertTrue(class_exists('Kwk\Geckoboard\Dataset\Type\MoneyType'), 'MoneyType does not exists');
    }

    /**
     * @test    if MoneyType implements `Kwk\Geckoboard\Dataset\TypeInterface`
     * @depends testClassExists
     */
    public function testImplementsTypeInterface()
    {
        $this->assertInstanceOf(TypeInterface::class, new MoneyType('', ''), 'MoneyType does not implement `Kwk\Geckoboard\Dataset\TypeInterface`');
    }

    /**
     * @test    checking if object is translated correctly to Array
     * @depends testClassExists
     */
    public function testToArray()
    {
        $obj    = new MoneyType('Money', 'PLN');
        $result = $obj->toArray();

        $expected = [
            'type'          => 'money',
            'name'          => 'Money',
            'currency_code' => 'PLN',
            'optional'      => false,
        ];

        $this->assertEquals($expected, $result, 'Method toArray result has other structure than expected');
    }

    /**
     * @test    checking if object is translated correctly to Array when optional flag is set
     * @depends testToArray
     */
    public function testToArrayOptional()
    {
        $obj    = new MoneyType('Money', 'PLN', true);
        $result = $obj->toArray();

        $expected = [
            'type'          => 'money',
            'name'          => 'Money',
            'currency_code' => 'PLN',
            'optional'      => true,
        ];

        $this->assertEquals($expected, $result, 'Method toArray result has other structure than expected');
    }
}
