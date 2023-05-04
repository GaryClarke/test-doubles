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

    public function testConsecutiveReturns()
    {
        $mock = $this->createMock(\App\ExampleService::class);

        $mock->method('doSomething')
            ->will($this->onConsecutiveCalls(1, 2));

        foreach ([1, 2] as $value) {

            $this->assertSame($value, $mock->doSomething('bar'));
        }
    }

    public function testExceptionsThrown(): void
    {
        $mock = $this->createMock(\App\ExampleService::class);

        $mock->method('doSomething')
            ->willThrowException(new RuntimeException());

        $this->expectException(RuntimeException::class);

        $mock->doSomething('bar');
    }

    public function testCallbackReturns(): void
    {
        $mock = $this->createMock(\App\ExampleService::class);

        $mock->method('doSomething')
            ->willReturnCallback(function($arg) {

                if ($arg % 2 === 0) {
                    return $arg;
                }

                throw new InvalidArgumentException();
            });

        $this->assertSame(10, $mock->doSomething(10));

        $this->expectException(InvalidArgumentException::class);
        $mock->doSomething(9);
    }
}
