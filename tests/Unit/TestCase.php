<?php

namespace Tests\Unit;

use Dmontielfdez\Shared\Framework\Infrastructure\Bus\CommandBus\CommandBus;
use Illuminate\Support\Facades\App;
use Tests\CreatesApplication;

abstract class TestCase extends \Illuminate\Foundation\Testing\TestCase
{
    use CreatesApplication;

    public function commandBus(): CommandBus
    {
        return App::make(CommandBus::class);
    }
}
