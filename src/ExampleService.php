<?php // /src/ExampleService.php

namespace App;

class ExampleService
{
    private int $param1;
    private int $param2;

    public function __construct($param1, $param2)
    {
        $this->param1 = $param1;
        $this->param2 = $param2;
    }

    public function doSomething($arg)
    {
        return 'Some random text';
    }

    public function nonMockedMethod($arg)
    {
        return $this->doSomething($arg);
    }
}
