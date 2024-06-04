<?php

namespace App\Services\Impl;

use App\Models\Token;
use Illuminate\Support\Str;

class TokenServiceImpl implements TokenService
{

    public function create(): bool
    {
        $token = new Token([
            'token' => Str::uuid()->toString(),
        ]);

        return $token->save();
    }

}
