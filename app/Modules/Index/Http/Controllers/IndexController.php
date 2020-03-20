<?php

namespace App\Modules\Index\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index() {
        return redirect()->route('projects.index');
    }


}
