<?php

namespace App\Http\Controllers\Api;

use App\Camping;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TopRatedCampingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return string
     */
    public function index()
    {
        return response()->json(Camping::with('tags')->orderBy('created_at', 'ASC')->get());
    }
}
