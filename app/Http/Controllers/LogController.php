<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class LogController extends Controller
{
    public static function logPost(string $data)
    {
        Log::info('POST payload:', ['Post Data' => $data]);
    }
}
