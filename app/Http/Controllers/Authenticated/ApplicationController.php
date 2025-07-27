<?php

namespace App\Http\Controllers\Authenticated;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class ApplicationController extends Controller
{
    
    public function index($id) {
        $application = Application::find(Crypt::decryptString($id));
        if (!$application) return back()->withErrors("Can't find the application");
        return view('authenticated.application.index', [
            'application' => $application
        ]);
    }

    public function store(Request $request) {
        $user = Auth::user();
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $application = Application::where('user_id', $user->id)->where('name', $request->name)->first();
        if ($application) return back()->withErrors("Application with name '$request->name' already exist");
        $application = Application::create([
            'user_id' => $user->id,
            'name'=> $request->name
        ]);
        if ($application->id) {
            Storage::disk('local')->put("applications/$application->id/index.html", '<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>RJG</title><link rel="shortcut icon" href="favicon.ico" type="image/x-icon"><link rel="stylesheet" href="assets/css/style.css"></head><body><div id="root"></div><script src="assets/js/app.js"></script></body></html>');
            Storage::disk('local')->put("applications/$application->id/.htaccess", "<IfModule mod_rewrite.c>\n\tRewriteEngine On\n\tRewriteBase /\n\n\tRewriteCond %{REQUEST_FILENAME} !-f\n\tRewriteCond %{REQUEST_FILENAME} !-d\n\n\tRewriteRule ^ index.html [L]\n</IfModule>");
            Storage::disk('local')->copy("default_assets/favicon.ico", "applications/$application->id/favicon.ico");
            Storage::disk('local')->put("applications/$application->id/assets/css/style.css", '');
            Storage::disk('local')->put("applications/$application->id/assets/js/app.js", "const pages = {/*new_page*/};const layouts = {/*new_layout*/};const navigateTo = (url) => {history.pushState(null, null, url);router()};const router = () => {const path = location.pathname;const route = pages[path] || pages['/*'] || {title: 'Not Found',template: '<div>NOT FOUND</div>'};document.title = route.title;let content = route.template;if (route.layout && layouts[route.layout]) {const {header, footer} = layouts[route.layout];if (header) content = header + content;if (footer) content = content + footer};document.getElementById('root').innerHTML = content};document.addEventListener('DOMContentLoaded', () => {document.body.addEventListener('click', e => {if (e.target.matches('[data-link]')) e.preventDefault();navigateTo(e.target.getAttribute('href'))});router()});window.addEventListener('popstate', router);");
        }
        return redirect()->route('application', Crypt::encryptString($application->id))->with('success','New application created successfully');
    }

}
