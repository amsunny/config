<?php

namespace Reign\Config\Tests;

use PHPUnit\Framework\TestCase;

class ConfigTest extends TestCase
{
    public function testCanLoadDirectory()
    {
        $config = new \Reign\Config\Config();
        $config->load(__DIR__ . '/config');
        $this->assertEquals('root', $config->get('app.db_user'));
    }
}
