<?php

namespace App\Services;

use Alangiacomin\LaravelBasePack\Bus\IBusObject;
use Alangiacomin\LaravelBasePack\Commands\ICommand;
use Alangiacomin\LaravelBasePack\Core\Enums\LogType;
use Alangiacomin\LaravelBasePack\Events\IEvent;
use Alangiacomin\LaravelBasePack\Repositories\IBusLogRepository;
use Alangiacomin\LaravelBasePack\Services\IBusMonitorService;
use Alangiacomin\LaravelBasePack\Services\Service;
use Alangiacomin\PhpUtils\Guid;
use Throwable;

class BusMonitorService extends Service implements IBusMonitorService
{
    public IBusLogRepository $busLogRepository;

    /**
     * @inheritDoc
     */
    function exception(IBusObject $obj, Throwable $ex): void
    {
        $this->busLogRepository->create(
            correlation_id: $obj->correlationId ?? Guid::newGuid(),
            type: LogType::Exception ?? LogType::Info,
            object_id: $obj->id,
            class: $obj->class(),
            payload: $ex->getMessage(),
        );
    }

    /**
     * @inheritDoc
     */
    function received(IBusObject $obj): void
    {
        $type = $obj instanceof ICommand
            ? LogType::CommandReceived
            : ($obj instanceof IEvent
                ? LogType::EventReceived
                : LogType::Info);
        $this->busLogRepository->create(
            correlation_id: $obj->correlationId ?? Guid::newGuid(),
            type: $type,
            object_id: $obj->id,
            class: $obj->class(),
            payload: $obj->payload(),
        );
    }

    /**
     * @inheritDoc
     */
    function sent(IBusObject $obj): void
    {
        $type = $obj instanceof ICommand
            ? LogType::CommandSent
            : ($obj instanceof IEvent
                ? LogType::EventSent
                : LogType::Info);
        $this->busLogRepository->create(
            correlation_id: $obj->correlationId ?? Guid::newGuid(),
            type: $type,
            object_id: $obj->id,
            class: $obj->class(),
            payload: $obj->payload(),
        );
    }
}
