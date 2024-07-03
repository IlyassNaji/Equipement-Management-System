<?php

namespace App\Http\Controllers;

use App\Models\equipement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; 
use Illuminate\Support\Facades\Auth;


class EquipementController extends Controller
{
    public function index()
    {
        $Equipement = collect();
    
        if (Auth::user()->usertype == '1') {
            $Equipement = Equipement::all();
        } else if (Auth::user()->usertype == '2' || Auth::user()->usertype == '0') {
            $Equipement = Equipement::where('user_id', Auth::user()->id)->get();
            
        }
    
        return view('equipements.list_equipement', ['equip' => $Equipement]);
    }
    public function indexv(){
        $EquipValable=Equipement::where('valable', '1')->get();
        return view('equipements.list_equipementv', ['equipv'=>$EquipValable]);   
    }
    
    
    public function valable($id){
     $Equipement=Equipement::findOrFail($id);
     $Equipement->valable='1';
     $Equipement->save();
     return redirect()->route('equipement.index')->with('message', 'Equipement now is available');
    }
    
    public function affecter(Request $request,$id){
        $Equipement=Equipement::findOrFail($id);
        $Equipement->num_bureau=$request->num_bureau;
        $Equipement->user_id=$request->user_id;
        $Equipement->valable='0';
        $Equipement->save();
        return redirect()->route('equipement.index')->with('message', 'Equipement assigned successfully');
       }
    public function emplacement($place) {
     $Equipement = Equipement::where('num_bureau', $place)->get();
      return view('equipements.list_equipement', ['equip' => $Equipement]);
    }
    public function search(Request $request)
    {
        $Equipement = collect();
        $query = $request->input('query');
        $Equipement = Equipement::where('nom', 'like', "%{$query}%")->paginate(10);
        return view('equipements.search', ['equip' => $Equipement]);
    }


    public function create()
    {
        return view('equipements.add_equipement');
    }
    public function assign($equipement)
    {
        $bureau = Equipement::select('num_bureau')->where('id_equipement', $equipement)->first();
        $user= Equipement::select('user_id')->where('id_equipement', $equipement)->first();
        return view('equipements.affect', compact('equipement', 'bureau','user'));
    }
    

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string',
            'categorie' => 'string',
            'marque' => 'required|string',
            'modele' => 'required|string',
            'numero_serie' => 'required|string',
            'date_achat' => 'required|date',
            'état' => 'nullable|numeric',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Define image validation rules
            'num_bureau'=>'string',
        ]);
        

        // Handle image upload (assuming public storage)
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->storeAs('equipements', $imageName, 'public'); // Store in public/equipements

            $validatedData['image'] = $imageName;
        }
        $validatedData['user_id'] = Auth::user()->id;
        Equipement::create($validatedData);

        return redirect()->route('equipement.index')->with('message', 'Stored Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($equipement)
    {
        $Equipement = Equipement::findOrFail($equipement);
        return view('equipements.details', ['equip' => $Equipement]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($equipement)
    {
        $Equipement = Equipement::findOrFail($equipement);
        return view('equipements.edit', ['equip' => $Equipement]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $equipement)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string',
            'categorie' => 'string',
            'marque' => 'required|string',
            'modele' => 'required|string',
            'numero_serie' => 'required|string',
            'date_achat' => 'required|date',
            'état' => 'nullable|numeric',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
            'num_bureau'=>'string',
        ]);
        

        $existingEquipement = Equipement::findOrFail($equipement);

        // Handle image upload (assuming public storage)
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->storeAs('equipements', $imageName, 'public'); // Store in public/equipements

            $validatedData['image'] = $imageName;

            // If updating image, consider deleting the old image (optional)
            if ($existingEquipement->image) {
                Storage::disk('public')->delete('equipements/' . $existingEquipement->image);
            }
        }
        $validatedData['id_equipement'] =$request->id_equipement;
        $validatedData['user_id'] = Auth::user()->id;
        $existingEquipement->update($validatedData);

        return redirect()->route('equipement.index')->with('message', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($equipement)
    {
        $Equipement = Equipement::findOrFail($equipement);

        // If the equipment has an image, delete it from storage
        if ($Equipement->image) {
            Storage::disk('public')->delete('equipements/' . $Equipement->image);
        }

        $Equipement->delete();
        return redirect()->route('equipement.index')->with('message', 'deleted Successfully');

    }}
