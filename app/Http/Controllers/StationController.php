<?php

namespace App\Http\Controllers;

use App\Models\Station;
use App\Http\Requests\StoreStationRequest;
use App\Http\Requests\UpdateStationRequest;

class StationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Station::all();
    }

    public function addStation()
    {
        $s = new Station();
        $s->station_name = $request->station_name;
        $s->latitude = $request->latitude;
        $s->longitude = $request->longitude;
        $res = $s->save();
        if ($res) {
            return "registration success";;
        } else {
            return "registration failed";
        }
    }

   
}