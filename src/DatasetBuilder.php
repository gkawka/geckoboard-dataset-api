<?php

namespace Kwk\Geckoboard\Dataset;

class DatasetBuilder
{
    private $fields     = [];
    private $parameters = [];

    /**
     * @return array
     */
    public function build()
    {
        return $this->parameters + [
            'fields' => $this->fields,
        ];
    }

    /**
     * @param string        $id
     * @param TypeInterface $fieldDefinition
     *
     * @return $this
     *
     */
    public function addField($id, TypeInterface $fieldDefinition)
    {
        $this->fields[$id] = $fieldDefinition->toArray();

        return $this;
    }

    /**
     * Adding custom parameter to dataset
     *
     * @param string $paramName
     * @param string $value
     *
     * @return $this
     */
    public function addParam($paramName, $value)
    {
        $this->parameters[$paramName] = $value;

        return $this;
    }
}
