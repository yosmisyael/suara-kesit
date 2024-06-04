<?php

use App\Services\TokenService;

describe('TokenService', function() {
    beforeEach(function () {
        $this->tokenService = app()->make(TokenService::class);
    });

    it('should be able to generate token.', function () {
        expect($this->tokenService->create())->toBeString();
    });
});

