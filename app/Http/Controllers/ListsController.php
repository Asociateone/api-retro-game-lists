<?php

namespace App\Http\Controllers;

use App\Http\Requests\ListRequest;
use App\Http\Resources\ListResource;
use App\Models\Lists;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ListsController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return ListResource::collection(auth()->user()->retroList()->get());
    }

    public function store(ListRequest $request): ListResource
    {
        return ListResource::make(auth()->user()->retroList()->create($request->validated()));
    }

    public function show(Lists $list): ListResource
    {
        if(auth()->user()->id === $list->user_id){
            return ListResource::make($list);
        } else {
            abort(403,'you are not allowed to do this!');
        }
    }

    public function update(ListRequest $request, Lists $list)
    {
        if(auth()->user()->id === $list->user_id){
            $list->update($request->validated());
        } else {
            abort(403,'you are not allowed to do this!');
        }

        return ListResource::make($list);
    }

    public function destroy(Lists $list)
    {
        if(auth()->user()->id === $list->user_id){
            $list->delete();
        } else {
            abort(403,'you are not allowed to do this!');
        }

        return response()->json(['message' => 'The list has been deleted']);
    }
}
