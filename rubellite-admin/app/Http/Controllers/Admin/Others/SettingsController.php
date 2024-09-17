<?php

namespace App\Http\Controllers\Admin\Others;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class SettingsController extends Controller
{
    private function getSettingItems()
    {
        return [
            [
                'label' => 'Notifications',
                'route' => 'admin.notification.index',
            ],
        ];
    }

    public function index()
    {
        return Inertia::render('Admin/SettingsManagement/Index', [
            'items' => $this->getSettingItems(),
        ]);
    }

}
