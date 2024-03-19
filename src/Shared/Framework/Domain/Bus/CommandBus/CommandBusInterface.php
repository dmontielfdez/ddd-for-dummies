<?php

namespace Dmontielfdez\Shared\Framework\Domain\Bus\CommandBus;


use Dmontielfdez\Shared\Framework\Application\Commands\CommandInterface;

interface CommandBusInterface
{
    /**
     * @param CommandInterface $command
     * @return void
     */
    public function dispatch(CommandInterface $command): void;


}
