<?php

namespace App\Core\Enum;

enum Permission: string
{
    case Registered = "registered";
    case ProtectedPage = "protected-page";
    case AdminIndex = 'admin-index';
}
