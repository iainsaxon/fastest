<?php

namespace Liuggio\Fastest\Queue\Infrastructure;

use Liuggio\Fastest\Queue\QueueInterface;
use Liuggio\Fastest\Queue\TestsQueue;

class InMemoryQueue implements QueueInterface
{
    private $queue;

    public function __construct()
    {
        $this->queue = array();
    }

    public function pop()
    {
        return array_pop($this->queue);
    }

    public function push(TestsQueue $testSuite)
    {
        $this->queue = array_merge($this->queue, $testSuite->toArray());

        return (count($this->queue)>0);
    }

    public function getMessagesInTheQueue($port = null)
    {
        return count($this->queue);
    }

    public function getNumberOfPushedMessage()
    {
        return count($this->queue);
    }

    public function close()
    {
        unset($this->queue);
    }
}
