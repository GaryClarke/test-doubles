<?php // /tests/TestDoublesTest.php

class TestDoublesTest extends \PHPUnit\Framework\TestCase
{
    public function testMock(): void
    {
        $mock = $this->createMock(\App\ExampleService::class);

        $mock->method('doSomething')->willReturn('foo');

        $exampleCommand = new \App\ExampleCommand($mock);

        $this->assertSame('foo', $exampleCommand->execute('bar'));
    }
}
