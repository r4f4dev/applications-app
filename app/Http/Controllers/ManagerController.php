<?php

namespace App\Http\Controllers;

use App\Models\Application;

class ManagerController extends Controller
{
    public function index()
    {
        $applications = Application::paginate(1);

        return view('manager.index', ['apps' => $applications]);
    }

    public function check($id)
    {
        $app = Application::findOrFail($id);
        $app->changeStatus();

        return redirect()->back()->with('messages', 'Заявка выделена');
    }
}
