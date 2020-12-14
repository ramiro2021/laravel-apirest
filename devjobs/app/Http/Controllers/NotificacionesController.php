<?php

namespace App\Http\Controllers;

use auth;
use Illuminate\Http\Request;

class NotificacionesController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $notificaciones = auth()->user()->unreadNotifications;
        auth()->user()->unreadNotifications->markAsRead();
        $notificacionesAll = auth()->user()->notifications()->simplePaginate(10);
        return View('notificaciones.index', compact('notificaciones', 'notificacionesAll'));
    }
}