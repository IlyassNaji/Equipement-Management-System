<?php

namespace App\Http\Controllers;
use App\Models\Maintenance;
use App\Models\Equipement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage; 
class MaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   $Maintenance = collect();
        $user=Auth::user();
        if($user->usertype=="1" || $user->usertype=="2"){
        $Maintenance = Maintenance::all();
        }
        else{
        $Maintenance= Maintenance::where('user_id', $user->id)->get();
    }
        return view('maintenance.list_maintenance', compact('Maintenance'));
    }

    public function search(Request $request)
    {
        $maintenance=collect();
        $query = $request->input('query');
        $maintenance = Maintenance::where('type_maintenance', 'like', "%{$query}%")->paginate(5);
        return view('maintenance.search', compact('maintenance'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id_equipement)
    {
        return view('maintenance.add_maintenance', compact('id_equipement'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'user_id' => Auth::user()->id,
            'id_equipement' => $request->id_equipement,
            'cout_maintenance' => $request->cout_maintenance,
            'status_maintenance' => $request->status_maintenance,
            'date_maintenance' => $request->date_maintenance,
            'type_maintenance' => $request->type_maintenance,
            'description' => $request->description,
        ];
        
        // Handle image upload (assuming public storage)
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->storeAs('maintenance', $imageName, 'public'); // Store in public/maintenance
            $data['image'] = $imageName;
        }
        Maintenance::create($data);
        return redirect()->route('maintenance.index')->with('message', 'Created Successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show($maintenance)
    {
        $maintenance = Maintenance::findOrFail($maintenance);
        return view('maintenance.details', compact('maintenance'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($maintenance)
    {
        $maintenance = Maintenance::findOrFail($maintenance);
        return view('maintenance.edit', compact('maintenance'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $maintenance)
    {
        $validatedData = $request->validate([
            'user_id' => 'integer|required',
            'cout_maintenance' => 'required',
            'status_maintenance' => 'required',
            'date_maintenance' => 'required|date',
            'type_maintenance' => 'required',
            'description' => 'nullable|string',
            'id_equipement' => 'integer|required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
        ]);

        $maintenance = Maintenance::findOrFail($maintenance);
        $maintenance->update($validatedData);

        // Handle image upload (assuming public storage)
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->storeAs('maintenance', $imageName, 'public'); // Stockez dans le répertoire public/maintenance

            // Supprimez l'ancienne image s'il en existe une
            if ($maintenance->image) {
                Storage::disk('public')->delete('maintenance/' . $maintenance->image);
            }

            $maintenance->image = $imageName;
            $maintenance->save();
        }

        return redirect()->route('maintenance.index')->with('message', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($maintenance)
    {
        $Maintenance = Maintenance::findOrFail($maintenance);

        // Si la maintenance a une image, supprimez-la du stockage
        if ($Maintenance->image) {
            Storage::disk('public')->delete('maintenance/' . $Maintenance->image);
        }

        $Maintenance->delete();
        return redirect()->route('maintenance.index')->with('message', 'Deleted Successfully');
    }

    public function fix($maintenance)
    {
        $Maintenance = Maintenance::findOrFail($maintenance);
        $Maintenance->status = 'Accepted';
        $Maintenance->save();
        return redirect()->route('maintenance.index')->with('message', 'fixed successfully');
    }
}
