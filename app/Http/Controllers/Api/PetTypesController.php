<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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
}
