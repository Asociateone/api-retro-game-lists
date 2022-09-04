<?php

namespace App\Http\Controllers;

use App\Http\Requests\RetroListRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RetroListsController extends Controller
{
    public function index()
    {
        return "test world";
    }

    public function store(RetroListRequest $request)
    {
        return auth()->user()->retroList()->create($request->validated());
    }
}
