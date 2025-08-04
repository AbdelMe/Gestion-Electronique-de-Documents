<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Http\Requests\StoreLogRequest;
use App\Http\Requests\UpdateLogRequest;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function showUsersLog(Request $request)
    {
        if ($request->has('export')) {
            // No pagination if exporting
            $logs = Log::all();
        } else {
            // Regular paginated view
            $logs = Log::paginate(5);
        }

        return view('logs.showUsersLog', compact('logs'));
    }
}
