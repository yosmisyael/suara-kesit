<?php

use App\Models\Token;
use App\Services\TokenService;

describe('TokenService', function() {
    beforeEach(function () {
        $this->tokenService = app()->make(TokenService::class);
    });

    it('should be able to generate token.', function () {
        expect($this->tokenService->create())->toBeString();
    });

    it('should be able to get all token.', function () {
        Token::factory()->count(5)->create();
        expect($this->tokenService->all()->count())->toBe(5);
    });
});

