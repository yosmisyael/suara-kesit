<?php

describe('PublicController', function() {
    it('should be able to access home page', function () {
        $this->get(route('public.home'))
            ->assertOk()
            ->assertViewIs('pages.public.home');
    });

    it('should be able to access about page', function () {
        $this->get(route('public.about'))
            ->assertOk()
            ->assertViewIs('pages.public.about');
    });

    it('should be able to access contact page', function () {
        $this->get(route('public.contact'))
            ->assertOk()
            ->assertViewIs('pages.public.contact');
    });

    it('should be able to access posts page', function () {
        $this->get(route('public.posts'))
            ->assertOk()
            ->assertViewIs('pages.public.posts');
    });

    it('should be able to access post page', function () {
        $this->get(route('public.post', ['id' => 'test']))
            ->assertOk()
            ->assertViewIs('pages.public.post');
    });
});
