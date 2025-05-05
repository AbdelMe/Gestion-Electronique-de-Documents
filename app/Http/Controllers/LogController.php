<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Http\Requests\StoreLogRequest;
use App\Http\Requests\UpdateLogRequest;

class LogController extends Controller
{
    public function showUsersLog(){
        $logs = Log::paginate(5);
        return view('logs.showUsersLog',compact('logs'));
    }
}