<?php

namespace App\Http\Controllers;

use App\Http\Requests\RetroListRequest;
use App\Http\Resources\RetroListResource;
use App\Models\RetroLists;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class RetroListsController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return RetroListResource::collection(auth()->user()->retroList()->get());
    }

    public function store(RetroListRequest $request): RetroListResource
    {
        return RetroListResource::make(auth()->user()->retroList()->create($request->validated()));
    }

    public function update(RetroListRequest $request, RetroLists $list)
    {
        if(auth()->user()->id === $list->user_id){
            $list->update($request->validated());
        } else {
            abort(403,'you are not allowed to do this!');
        }
        
        return RetroListResource::make($list);
    }
}
