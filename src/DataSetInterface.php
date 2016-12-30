<?php

namespace Kwk\Geckoboard\Dataset;

/**
 * Interface dla pojedyńczego dataset'a
 */
interface DataSetInterface
{
    /**
     * Nazwa datasetu
     *
     * @return string
     */
    public function getName();

    /**
     * Zwraca definicję dataset'a
     *
     * @see https://developer.geckoboard.com/api-reference/curl/
     *
     * @return array
     */
    public function getDefinition();
}
