<?php

namespace App\View\Components;

use App\Core\Enum\Permission;
use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Request;
use Illuminate\View\Component;

class Header extends Component
{
    public array $links;

    public User|null $user;

    public array $linkConfiguration;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->linkConfiguration = [
            'home' => [
                'route' => 'home',
                'text' => 'Home',
            ],
            'publicPage' => [
                'route' => 'public-page',
                'text' => 'Public Page',
            ],
            'testPage' => [
                'route' => 'protected-page',
                'text' => 'Test Page',
            ],
            'protectedPage' => [
                'route' => 'protected-page',
                'text' => 'Protected Page',
                'perm' => Permission::Registered->value,
            ],
        ];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render(): View|string|Closure
    {
        $this->user = auth()->user();
        $logged = $this->user != null;

        $this->links = array_map(
            function ($link) {
                return [
                    ...$link,
                    'route' => route($link['route']),
                    'active' => Request::routeIs($link['route']),
                ];
            },
            array_filter(
                $this->linkConfiguration,
                function ($link) use ($logged) {
                    return empty($link['perm']) || ($logged && $this->user->can($link['perm']));
                }
            )
        );

        return view('components.header');
    }
}
