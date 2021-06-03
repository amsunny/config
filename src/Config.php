<?php

namespace Reign\Config;

class Config
{
    protected array $configs;

    public function __construct()
    {
        $this->configs = [];
    }

    public function load($path)
    {
        $files = glob($path . '/*.php');
        foreach ($files as $file) {
            $name = basename($file, '.php');
            $this->set($name, require($file));
        }
    }

    public function set($name, $value)
    {
        $this->configs[$name] = $value;
        if (is_array($value)) {
            foreach ($value as $key => $val) {
                $this->set("$name.$key", $val);
            }
        }
    }

    public function get($name)
    {
        return $this->configs[$name] ?? null;
    }

    public function has($name): bool
    {
        return isset($this->configs[$name]);
    }
}
