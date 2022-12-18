<?php

namespace App\Http\Controllers\Api;

use App\Contracts\IPetAgingMachine;
use App\Http\Controllers\Controller;
use App\Http\Requests\PetRequest;
use App\Http\Resources\PetResource;
use App\Models\Pet;

class PetsController extends Controller
{
    public function __construct(
        private IPetAgingMachine $petAging
    )
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PetResource::collection(
            Pet::all()
        );
    }

    public function actives()
    {
        return PetResource::collection(
            Pet::where('is_active', '=', true)->get()
        );
    }

    public function activate($id)
    {
        $pet = Pet::findOrFail($id);
        $pet->is_active = true;
        $pet->save();

        return new PetResource($pet);
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function deactivate($id)
    {
        $pet = Pet::findOrFail($id);
        $pet->is_active = false;
        $pet->save();

        return new PetResource($pet);
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function getOld($id)
    {
        /** @var Pet $pet */
        $pet = Pet::with('petType')->findOrFail($id);
        $pet = $this->petAging->ageIt($pet);

        return new PetResource($pet);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(PetRequest $request)
    {
        return new PetResource(
            Pet::create($request->validated())
        );
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new PetResource(
            Pet::findOrFail($id)
        );
    }
}
