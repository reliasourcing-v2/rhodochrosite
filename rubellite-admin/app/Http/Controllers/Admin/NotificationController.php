<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class NotificationController extends Controller
{
    public function index(Request $request)
    {
        $tab = $request->input('tab');
        $date = $request->input('date');

        $read = Auth::user()->readNotifications();
        $unread = Auth::user()->unreadNotifications();

        if ($tab == 'read') {
            $notifications = $read;
        } else {
            $notifications = $unread;
        }

        if ($date) {
            $notifications = $notifications->whereDate('created_at', Carbon::parse($date));
        }

        $notifications = $notifications->paginate(10)->appends(request()->query());

        return Inertia::render('Admin/Notification/Index', [
            'notifications' => $notifications,
            'selected_tab' => $tab,
            'date' => $date,
            'read_count' => $read->count(),
            'unread_count' => $unread->count(),
        ]);
    }

    public function show(Request $request, $id)
    {
        $notifications = Auth::user()->notifications->when(true, function ($query) use ($id) {
            return $query->where('id', $id);
        });

        $notification = $notifications->first();

        if ($notification) {
            if ($notification->unread()) {
                $notification->markAsRead();
            }
        } else {
            abort(404);
        }

        return Inertia::render('Admin/Notification/Show', [
            'notification' => $notification,
        ]);
    }

    public function readAll(Request $request)
    {
        Auth::user()->unreadNotifications->markAsRead();

        return to_route('admin.notification.index')
            ->with('success', 'All unread notifications have been marked as read.');
    }
}
