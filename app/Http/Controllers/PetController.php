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

        return redirect()->route('pets.find')->withErrors(['error' => 'Pet not found']);
    }

    public function createPet(Request $request)
    {
        $response = Http::post("{$this->apiUrl}/pet", $request->all());

        if ($response->successful()) {
            return redirect('/pets')->with('success', 'Pet added successfully');
        }

        return redirect('/pets/add');
    }

    public function updatePetForm($id)
    {
        $response = Http::get("{$this->apiUrl}/pet/{$id}");
        if ($response->successful()) {
            return view('update-pet', ['pet' => $response->json()]);
        }

        return redirect()->route('pets.find')->withErrors(['error' => 'Pet not found']);
    }


    public function updatePet(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'category' => 'required|string|max:255',
        ]);
        $id = $request->input('id');
        $data = [
            'id' => $id,
            'name' => $request->input('name'),
            'status' => $request->input('status'),
            'category' => ['name' => $request->input('category')],
        ];
    
        $response = Http::put("{$this->apiUrl}/pet", $data);
    
        if ($response->successful()) {
            return redirect('/pets')->with('success', 'Pet updated successfully');
        }
    
        return redirect('/pets/find')->with('error', 'Failed to update pet');
    }
    

    public function deletePet($id)
    {
        $response = Http::delete("{$this->apiUrl}/pet/{$id}");

        if ($response->successful()) {
            return redirect()->route('pets.find')->with('success', 'Pet deleted successfully');
        }

        return redirect()->route('pets.find')->with('error', 'Pet not found');
    }
}
