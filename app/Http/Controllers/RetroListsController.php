<?php

namespace App\Http\Controllers;

use App\Http\Requests\RetroListRequest;
use Illuminate\Http\Request;

class RetroListsController extends Controller
{
    public function index()
    {
        return "test world";
    }

    public function store(RetroListRequest $request)
    {
        auth()->user()->
    }
}
