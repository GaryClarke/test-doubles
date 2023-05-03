<?php // /src/ExampleCommand.php

namespace App;

class ExampleCommand
{
    private ExampleService $service;

    public function __construct(ExampleService $service)
    {
        $this->service = $service;
    }

    public function execute(string $arg)
    {
        return $this->service->doSomething($arg);
    }
}
