<?php

namespace App\Services\Impl;

use App\Models\Token;
use App\Services\TokenService;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class TokenServiceImpl implements TokenService
{
    public function all(): Collection
    {
        return Token::all();
    }

    public function create(): string|null
    {
        $token = new Token([
            'token' => Str::uuid()->toString(),
        ]);

        return $token->save() ? $token->token : null;
    }

}
