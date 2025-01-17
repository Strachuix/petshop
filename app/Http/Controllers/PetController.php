<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PetController
{
    protected $apiUrl = 'https://petstore.swagger.io/v2';

    public function getPets()
    {
        $response = Http::get("{$this->apiUrl}/pet/findByStatus", [
            'status' => 'available'
        ]);

        if ($response->successful()) {
            $pets = collect($response->json());
            $perPage = 10; // Liczba elementów na stronę
            $page = request('page', 1); // Aktualna strona
            $paginator = new \Illuminate\Pagination\LengthAwarePaginator(
                $pets->forPage($page, $perPage),
                $pets->count(),
                $perPage,
                $page,
                ['path' => request()->url()]
            );

            return view('pets', ['pets' => $paginator]);
        }

        return view('pets');
    }



    public function getPet($id)
    {
        $response = Http::get("{$this->apiUrl}/pet/{$id}");

        if ($response->successful()) {
            return view('find-pet', ['pet' => $response->json()]);
        }

        return redirect()->route('find-pet')->withErrors(['error' => 'Pet not found']);
    }



    public function createPet(Request $request)
    {
        $response = Http::post("{$this->apiUrl}/pet", $request->all());

        if ($response->successful()) {
            return redirect('/pets')->with('success', 'Pet added successfully');
        }

        return redirect('/pets/add');
    }


    public function updatePet(Request $request, $id)
    {
        $response = Http::put("{$this->apiUrl}/pet", $request->all());

        return response()->json($response->json(), $response->status());
    }

    public function deletePet($id)
    {
        $response = Http::delete("{$this->apiUrl}/pet/{$id}");

        if ($response->successful()) {
            return response()->json(['message' => 'Pet deleted successfully']);
        }

        return response()->json(['error' => 'Pet not found'], 404);
    }
}
