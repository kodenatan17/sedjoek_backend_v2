<?php

namespace App\Http\Controllers;

class NotFoundController extends Controller
{
    public function index()
    {
        return view('notfound');
    }
}
