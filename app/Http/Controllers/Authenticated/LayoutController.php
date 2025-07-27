<?php

namespace App\Http\Controllers\Authenticated;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Layout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class LayoutController extends Controller
{
    public function index($app_id) {
        $application = Application::find(Crypt::decryptString($app_id));
        $layouts = $application->layouts;
        return view('authenticated.application.layout', [
            'application' => $application,
            'layouts' => $layouts
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'application_id' => 'required|string',
            'name' => 'required|string|max:255'
        ]);
        $app_id = Crypt::decryptString($request->application_id);
        $application = Application::find($app_id);
        if (!$application) return back()->withErrors('Application not found');
        $layout = Layout::where('application_id', $app_id)->where('name', $request->name)->first();
        if ($layout) return back()->withErrors("Layout with name $request->name already exist");
        $layout = Layout::create([
            'application_id' => $app_id,
            'name' => $request->name
        ]);
        return redirect()->route('layout.edit', Crypt::encryptString($layout->id))->with('success', 'New layout created successfully');
    }

    public function edit($id) {
        $layout = Layout::find(Crypt::decryptString($id));
        if (!$layout) return back()->withErrors('Layout not found');
        return view('authenticated.application.layout_edit', [
            'layout' => $layout
        ]);
    }
}
