<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function index(): View
    {
        return view('pages.public.contact', [
            'title' => 'Contact - How to Reach Us',
        ]);
    }
}
