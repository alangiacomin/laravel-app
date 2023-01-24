<?php

namespace App\Http\Controllers;

use Alangiacomin\LaravelBasePack\Controllers\Controller;
use Alangiacomin\LaravelBasePack\Repositories\IBusLogRepository;
use App\Core\Enum\Permission;

class AdminController extends Controller
{
    public IBusLogRepository $busLogRepository;

    protected array $cfgMiddleware = [
        'protected' => ['auth', 'verified'],
    ];

    protected array $cfgPermission = [
        'protected' => [Permission::AdminIndex],
    ];

    public function index()
    {
        return view('admin.home');
    }

    public function monitor()
    {
        $logs = $this->busLogRepository->list(
            [
                'order' => ['timestamp', 'desc'],
            ]
        )->paginate(20);

        return view('admin.monitor', ['logs' => $logs]);
    }
}
