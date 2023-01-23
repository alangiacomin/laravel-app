<?php

namespace App\Http\Controllers;

use Alangiacomin\LaravelBasePack\Controllers\Controller;
use App\Core\Enum\Permission;

class HomeController extends Controller
{
    protected array $cfgMiddleware = [
        'protected' => ['auth', 'verified'],
    ];

    protected array $cfgPermission = [
        'protected' => [Permission::ProtectedPage],
    ];

    public function index()
    {
        return view('home');
    }

    public function public()
    {
        return view('public');
    }

    public function protected()
    {
        return view('protected');
    }
}
