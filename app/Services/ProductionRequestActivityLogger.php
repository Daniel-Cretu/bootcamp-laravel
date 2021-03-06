<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductionRequestActivityLogger extends AbstractRequestActivityLogger
{
    protected function collectRequestData(Request $request): array
    {
        return ["IP" => $request->ip(), "Url" => $request->fullUrl() ,"Time" => Carbon::now()];
    }
}
