<?php

namespace App\Http\Controllers;

use App;
use App\Http\Requests\ApplicationCreateRequest;
use App\Models\Application;
use App\Traits\UploadTrait;
use Auth;
use Illuminate\Support\Str;

class HomeController extends Controller
{

    use UploadTrait;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Create application
     *
     * @param ApplicationCreateRequest $request
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function create(ApplicationCreateRequest $request)
    {
        if ($request->has('thumbnail')) {
            $image = $request->file('thumbnail');
            $name = Str::slug($request->input('theme')) . '_' . time();
            $folder = '/uploads/images/';
            $filePath = $folder . $name . '.' . $image->getClientOriginalExtension();
            $this->uploadOne($image, $folder, 'public', $name);
        }

        Application::create([
            'user_id' => Auth::user()->id,
            'theme' => $request->theme,
            'message' => $request->message,
            'thumbnail' => $filePath,
        ]);

        return redirect()->back()->with('message', 'Заявка отправлена');

    }
}
