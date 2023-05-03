<?php // /tests/TestDoublesTest.php

class TestDoublesTest extends \PHPUnit\Framework\TestCase
{
    public function testMock(): void
    {
        $mock = $this->createMock(\App\ExampleService::class);

        $mock->expects($this->once())
            ->method('doSomething')
            ->with('bar')
            ->willReturn('foo');

        $exampleCommand = new \App\ExampleCommand($mock);

        $this->assertSame('foo', $exampleCommand->execute('bar'));
    }

    public function testReturnTypes(): void
    {
        $mock = $this->createMock(\App\ExampleService::class);

        $this->assertNull($mock->doSomething('bar'));
    }
}
