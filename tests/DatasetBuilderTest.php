<?php

namespace Test\Kwk\Geckoboard\Dataset;

use Kwk\Geckoboard\Dataset\DatasetBuilder;
use Test\Kwk\Geckoboard\Dataset\Resources\Type\TestType;

class DatasetBuilderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test if class even exists
     */
    public function testClassExists()
    {
        $this->assertTrue(class_exists('Kwk\Geckoboard\Dataset\DatasetBuilder'), 'Class `DatasetBuilder` does not exist');
    }

    /**
     * @test building empty dataset
     */
    public function testBuildEmpty()
    {
        $expected = [
            'fields' => [],
        ];

        $obj    = new DatasetBuilder();
        $result = $obj->build();

        $this->assertEquals($expected, $result, 'Empty dataset should have only empty `fields` field');
    }

    /**
     * @test building dataset with one field
     */
    public function testBuildOneField()
    {
        $expected = [
            'fields' => [
                'test1' => [
                    'field1' => 'field1value',
                    'field2' => 'field2value',
                ],
            ],
        ];

        $obj    = new DatasetBuilder();
        $result = $obj
            ->addField('test1', new TestType())
            ->build();

        $this->assertEquals($expected, $result);
    }

    /**
     * @test building dataset with multiple fields
     */
    public function testBuildMultipleFileds()
    {
        $expected = [
            'fields' => [
                'test1' => [
                    'field1' => 'field1value',
                    'field2' => 'field2value',
                ],
                'test2' => [
                    'field1' => 'field1value',
                    'field2' => 'field2value',
                ],
            ],
        ];


        $obj    = new DatasetBuilder();
        $result = $obj
            ->addField('test1', new TestType())
            ->addField('test2', new TestType())
            ->build();

        $this->assertEquals($expected, $result);
    }

    /**
     * @test setting custom string parameter for dataset
     */
    public function testCustomParameterString()
    {
        $expected = [
            'fields'      => [
                'test1' => [
                    'field1' => 'field1value',
                    'field2' => 'field2value',
                ],
            ],
            'customParam' => 'customParamValue',
        ];

        $obj    = new DatasetBuilder();
        $result = $obj
            ->addField('test1', new TestType())
            ->addParam('customParam', 'customParamValue')
            ->build();

        $this->assertEquals($expected, $result);
    }

    /**
     * @test setting custom array for dataset
     */
    public function testCustomParameterArray()
    {
        $expected = [
            'fields'      => [
                'test1' => [
                    'field1' => 'field1value',
                    'field2' => 'field2value',
                ],
            ],
            'customparam' => [
                'param' => 'customparamvalue',
            ],
        ];

        $obj    = new DatasetBuilder();
        $result = $obj
            ->addfield('test1', new testtype())
            ->addparam('customparam', ['param' => 'customparamvalue'])
            ->build();

        $this->assertequals($expected, $result);
    }
}
