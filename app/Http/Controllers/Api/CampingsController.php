<?php

namespace App\Http\Controllers\Api;

use App\Camping;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCampingRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class CampingsController extends Controller
{

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function update(Request $request, $id)
    {
        return Camping::findOrFail($id)->addRating($request->rating);
    }

    /**
     * @return JsonResponse
     */
    public function index(){
        return response()->json(Camping::with('tags')->orderBy('id', 'DESC')->get());
    }

}
