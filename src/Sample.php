<?php

namespace Jumbodroid\PhpRbac;

/**
 * Class Sample
 *
 * @author  Alois Odhiambo  <rayalois22@gmail.com>
 */
class Sample
{

    /**
     * @var  \Jumbodroid\PhpRbac\Config
     */
    private $config;

    /**
     * Sample constructor.
     *
     * @param \Jumbodroid\PhpRbac\Config $config
     */
    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    /**
     * @param $name
     *
     * @return  string
     */
    public function sayHello($name)
    {
        $greeting = $this->config->get('greeting');

        return $greeting . ' ' . $name;
    }

}
