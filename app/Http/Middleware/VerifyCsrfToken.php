<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;
use Illuminate\Support\Facades\Log;

class VerifyCsrfToken extends Middleware
{
    protected function tokensMatch($request)
    {
        $tokensMatch = parent::tokensMatch($request);
        if (!$tokensMatch) {
            Log::warning('CSRF token mismatch', [
                'session_token' => $request->session()->token(),
                'request_token' => $request->input('_token'),
            ]);
        }
        return $tokensMatch;
    }
}