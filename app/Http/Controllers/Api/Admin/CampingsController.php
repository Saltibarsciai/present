<?php

namespace App\Http\Controllers\Api\Admin;

use App\Camping;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCampingRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CampingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param CreateCampingRequest $request
     * @return string
     */
    public function store(CreateCampingRequest $request)
    {
        return Camping::store($request);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        return Camping::findOrFail($id)->updateCamping($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Camping::findOrFail($id)->delete();
        return \response([], 200);
    }
}
