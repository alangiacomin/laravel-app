<?php

namespace App\Http\Livewire\Core;

use Alangiacomin\LaravelBasePack\Livewire\Component as BaseComponent;

class Component extends BaseComponent
{
    protected function getListeners(): array
    {
        return [
            // ...($this->defineEventListener(Event::LoginExecuted, '$refresh')),
            // ...($this->defineEventListener(Event::LanguageChanged, '$refresh')),
        ];
    }
}
