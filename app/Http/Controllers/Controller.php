<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;



class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * 
     * @params lat1, lon1 = Latitude and Longitude of point 1 (in decimal degrees)
     * @params lat2, lon2 = Latitude and Longitude of point 2 (in decimal degrees)
     * @params unit = the unit you desire for results                              
     *         where: 'M' is statute miles (default)                         
     *                  'K' is kilometers                                     
     *                 'N' is nautical miles   
    */
    public function getDistance($lat1, $lon1, $lat2, $lon2, $unit= "") {

        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        $unit = $unit ? strtoupper($unit) : "";
        
        $distance;
        if ($unit == "K") {
            $distance = ($miles * 1.609344);
        } else if ($unit == "N") {
            $distance = ($miles * 0.8684);
        } else {
            $distance = $miles;
        }

        return view("my-first",compact('distance'));
    }

    public function getName(){
        return view("my-first", ['name' => 'James']);
    }

    public function saveMyTest(Request $request) {
        $input = $request->all();
        $data["name"] = $request->name;
        $data["email"] = $request->email;
        $data["password"] = Hash::make($request->password);
        $data["mobile"] = $request->mobile;
        if (!empty($request->file('image'))) {
            $path = Storage::putFile('image', $request->file('image'));
            $data['image'] =  $path;
        }
        User::create($data);
        return redirect('/form');
    }

    public function getUsers(Request $request) {
        $users = User::all();
        return view("user-list",compact('users'));
    }
    public function exportCSV(Request $request) {
        $users= User::all();
        if(count($users) > 0){ 
            $delimiter = ","; 
            $filename = "user-detail_" . date('Y-m-d') . ".csv"; 
            $f = fopen('php://memory', 'w'); 
            $fields = array('Name', 'Eamil', 'Mobile'); 
            fputcsv($f, $fields, $delimiter); 
            foreach($users as $row){ 
                $lineData = array($row['name'],  $row['email'], $row['mobile']); 
                fputcsv($f, $lineData, $delimiter); 
            } 
            fseek($f, 0); 
            header('Content-Type: text/csv'); 
            header('Content-Disposition: attachment; filename="' . $filename . '";'); 
            fpassthru($f); 
        } 
        exit; 
    }
}
