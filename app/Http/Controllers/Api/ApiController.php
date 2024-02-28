<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Technology;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getTest(){

        return response() -> json([
            
            'status' => 'success',
            'message' => 'Testo di prova',
        ]);
    }

    public function getTechnologies(){

        $technologies = Technology :: all();

        return response()->json([
            'status' => 'success',
            'technologies' => $technologies
        ]);
    }

    public function createTechnologies(Request $request){

        $data = $request -> all();

        $technology = new Technology;
        $technology -> technology_name = $data['technology_name'];

        $technology -> save();

        return response()->json([
            'status' => 'success',
            'technology' => $technology,
        ]);

    }
}
