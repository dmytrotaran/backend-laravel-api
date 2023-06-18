<?php

namespace App\Http\Controllers;

use App\Models\Preference;
use Illuminate\Http\Request;

class PreferenceController extends Controller
{
    // Create Preference Method ================================
    public function createPreference(Request $request)
    {
        // return $request->all();
        $validatedData = $request->validate([
            'sources' => 'string',
            'categories' => 'string',
            'countries' => 'string',
            'languages' => 'string',
            'sortBy' => 'string',
            'user_id' => 'integer'
        ]);

        // link to the user model
        $validatedData['user_id'] = auth()->id();
        
        $created = Preference::create($validatedData);

        // return required fields only 
        $preference = [
            'sources' => $created->sources,
            'categories' => $created->categories,
            'countries' => $created->countries,
            'languages' => $created->languages,
            'sortBy' => $created->sortBy,
            // 'user_id' => $created->user_id
        ];
        
        return $preference;
    }

    // Get Preference Method ==================================
    public function getPreference()
    {

        // $preference = Preference::where('user_id', auth()->id())->get();
        $fetched = auth()->user()->userPreference()->latest()->first();

        // return required fields only
        $preference = [
            'sources' => $fetched->sources,
            'categories' => $fetched->categories,
            'countries' => $fetched->countries,
            'languages' => $fetched->languages,
            'sortBy' => $fetched->sortBy,
            // 'user_id' => $preference->user_id
        ];
        
        return $preference;
    }
}
