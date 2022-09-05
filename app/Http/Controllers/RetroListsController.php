<?php

namespace App\Http\Controllers;

use App\Http\Requests\RetroListRequest;
use App\Http\Resources\RetroListResource;

class RetroListsController extends Controller
{
    public function index()
    {
        return RetroListResource::collection(auth()->user()->retroList()->get());
    }

    public function store(RetroListRequest $request)
    {
        return RetroListResource::make(auth()->user()->retroList()->create($request->validated()));
    }
}
