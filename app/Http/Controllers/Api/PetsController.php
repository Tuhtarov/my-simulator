<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PetResource;
use App\Models\Pet;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PetResource::collection(
            Pet::with('petType')->get()
        );
    }

    public function activate($id)
    {
        $pet = Pet::with('petType')->findOrFail($id);
        $pet->is_active = true;
        $pet->save();

        return new PetResource($pet);
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function deactivate($id)
    {
        $pet = Pet::with('petType')->findOrFail($id);
        $pet->is_active = false;
        $pet->save();

        return new PetResource($pet);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $petTypeId = (int)$request->post('pet_type_id');
        $name = (string)$request->post('name');

        $pet = new Pet();
        $pet->name = $name;
        $pet->pet_type_id = $petTypeId;
        $pet->is_active = true;

        if ($pet->save()) {
            // подгружаем поля присвоенные базой по умолчанию
            return new PetResource(
                Pet::with('petType')->findOrFail($pet->id)
            );
        }

        abort(Response::HTTP_NOT_ACCEPTABLE, 'Питомец не создан');
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
            Pet::with('petType')->findOrFail($id)
        );
    }
}
