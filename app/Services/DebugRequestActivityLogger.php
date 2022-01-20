<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Http\Request;

class DebugRequestActivityLogger extends AbstractRequestActivityLogger
{
    protected function collectRequestData(Request $request): array
    {
        return [
            "Method" => $request->method() ,"Url" => $request->fullUrl(),
            "Time" => Carbon::now(), "Request" => $request->except('_token')
        ];
    }
}
