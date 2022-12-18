<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PetTypeRequest;
use App\Http\Resources\PetTypeResource;
use App\Models\PetType;

class PetTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PetTypeResource::collection(
            PetType::all()
        );
    }

    /**
     * Store a newly created resource in storage.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(PetTypeRequest $request)
    {
        return new PetTypeResource(
            PetType::create($request->validated())
        );
    }
}
