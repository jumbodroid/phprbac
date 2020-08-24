<?php

namespace Jumbodroid\PhpRbac\Tests;

use Jumbodroid\PhpRbac\Config;
use Jumbodroid\PhpRbac\Sample;

/**
 * Class SampleTest
 *
 * @category Test
 * @package  Jumbodroid\PhpRbac\Tests
 * @author Alois Odhiambo <rayalois22@gmail.com>
 */
class SampleTest extends TestCase
{

    public function testSayHello()
    {
        $config = new Config();
        $sample = new Sample($config);

        $name = 'Alois Odhiambo';

        $result = $sample->sayHello($name);

        $expected = $config->get('greeting') . ' ' . $name;

        $this->assertEquals($result, $expected);

    }

}
