<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FooterSetting extends Controller
{
    public function footer()
    {
        return view('admin.settings.setting');
    }
}
