<?php

namespace Dmontielfdez\Shared\Framework\Infrastructure\Bus\CommandBus;

use Dmontielfdez\Shared\Framework\Application\Commands\CommandInterface;
use Dmontielfdez\Shared\Framework\Domain\Bus\CommandBus\CommandBusInterface;
use Dmontielfdez\Shared\Framework\Domain\Bus\CommandBus\CommandHandlerInterface;
use Illuminate\Support\Facades\App;
use RuntimeException;
use function get_class;

final class CommandBus implements CommandBusInterface
{
    /**
     * @param CommandInterface $command
     * @return void
     */
    public function dispatch(CommandInterface $command): void
    {
        $commandClass = get_class($command);
        $commandHandlerName = preg_replace('/Command$/', 'Handler', $commandClass);
        if (null === $commandHandlerName) {
            throw new RuntimeException('Handler not found for ' . $commandClass);
        }

        /** @var CommandHandlerInterface $commandHandler */
        $commandHandler = App::make($commandHandlerName);
        $commandHandler->__invoke($command);
    }

}
