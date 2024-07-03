<?php

namespace App\Http\Controllers;

use App\Models\Maintenance;
use App\Models\User;
use App\Models\Besoin;
use App\Models\Equipement;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function redirect()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login'); // Redirect to login if user not authenticated
        }

        // Determine user type
        switch ($user->usertype) {
            case '0':
            case '2':
                return $this->handleRegularUser($user);
                break;
           case '1':
                return $this->handleAdminUser();
                break;
            default:
                return redirect()->back(); // Redirect back for unknown usertype
        }
    }

    protected function handleRegularUser($user)
    {
        $id = $user->id;
        $equipements = Equipement::where('user_id', $id)->count();
        $besoins = Besoin::where('user_id', $id)->count();
        $maintenances = Maintenance::where('user_id', $id)->count();
        $bureau = $user->num_bureau;
        
        $equipValable = Equipement::select('equipements.*')
            ->where('valable', '1')
            ->latest('equipements.created_at')
            ->take(5)
            ->get();

        return view('user.home', compact('besoins', 'maintenances', 'equipements', 'bureau', 'equipValable'));
    }

    protected function handleAdminUser()
    {
        $equipements = Equipement::count();
        $besoins = Besoin::count();
        $maintenances = Maintenance::count();
        $users = User::count()-1;
        $immo = Equipement::where('categorie', 'immobilier')->count();
        $inf = Equipement::where('categorie', 'materiel informatique')->count();
        $accs = $equipements - $immo - $inf;
        $corr = Maintenance::where('type_maintenance', 'corrective')->count();
        $prev = Maintenance::where('type_maintenance', 'preventive')->count();
        $autre = $maintenances - $corr - $prev;
        $besoinsDernierMois = Besoin::select('besoins.*', 'users.name as employee_name')
            ->join('users', 'besoins.user_id', '=', 'users.id')
            ->latest('besoins.created_at')
            ->take(8)
            ->get();
        $equipValable = Equipement::select('equipements.*')
            ->where('valable', '1')
            ->latest('equipements.created_at')
            ->take(5)
            ->get();

        return view('admin.home', compact('equipements', 'equipValable', 'besoins', 'maintenances', 'users', 'besoinsDernierMois', 'immo', 'inf', 'accs', 'corr', 'prev', 'autre'));
    }
}
