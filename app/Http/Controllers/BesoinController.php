<?php

namespace App\Http\Controllers;

use App\Models\besoin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class BesoinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user=Auth::user();
        $Besoin=collect();
        if($user->usertype=="1"){
        $Besoin=Besoin::all();
    }
        else{
            $Besoin=Besoin::where('user_id',$user->id)->get();
        }
        return view('besoins.list_besoin',compact('Besoin'));
    }
    public function search(Request $request)
    {
        $Besoin = collect();
        $query =$request->input('query');
        $Besoin = Besoin::where('type_besoin', 'like', "%{$query}%")->paginate(10);
        return view('besoins.search',compact('Besoin'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        return view('besoins.add_besoin',compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,$id)
    {
        
            Besoin::create([
                'user_id' => Auth::user()->id,
                'type_besoin' => $request->type_besoin,
                'date_besoin_besoin' => $request->date_besoin,
                'description' => $request->description,
                'id_equipement'=>$id
            ]);
    
            return redirect()->route('besoin.index')->with('message', 'Stored Successfully');
      
    }

    /**
     * Display the specified resource.
     */
    public function show( $besoin)
    {
        $Besoin=Besoin::findOrFail($besoin);
        return view('besoins.details',compact('Besoin'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $besoin)
    {
        $Besoin=Besoin::findOrFail($besoin);
        return view('besoins.edit',compact('Besoin'));        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $besoin)
    {
        $Besoin=Besoin::findOrFail($besoin);
        $Besoin->id_equipement=$request->id_equipement;
        $Besoin->user_id=$request->user_id;
        $Besoin->type_besoin=$request->type_besoin;
        $Besoin->date_besoin=$request->date_besoin;
        $Besoin->description=$request->description;
        $Besoin->status=$request->status;
        $Besoin->save();
        return redirect()->route('besoin.index')->with('message','Updated Successfuly');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($besoin)
    {
        $Besoin = Besoin::findOrFail($besoin);

        $Besoin->delete();

        return redirect()->route('besoin.index')->with('message', 'Deleted Successfuly');
    }
    public function accept($id){
        $Besoin=Besoin::findOrFail($id);
        $Besoin->status='Accepted';
        $Besoin->save();
        return redirect()->back();
        }
        public function refuse($id){
          $Besoin=Besoin::findOrFail($id);
          $Besoin->status='Refused';
          $Besoin->save();
          return redirect()->back();
        }
}