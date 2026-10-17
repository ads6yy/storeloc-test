<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Store;
use Illuminate\Http\Request;

class StorelocController extends Controller
{
    public function index()
    {
        return view('index', [
            'services' => Service::all(),
        ]);
    }

    public function results(Request $request)
    {
        $params = $request->all();

        $stores = Store::query()
            ->when($params['n'], fn ($query) => $query->where('lat', '<=', $params['n']))
            ->when($params['s'], fn ($query) => $query->where('lat', '>=', $params['s']))
            ->when($params['w'], fn ($query) => $query->where('lng', '>=', $params['w']))
            ->when($params['e'], fn ($query) => $query->where('lng', '<=', $params['e']))
            ->orderBy('name')
            ->get();

        return view('results', [
            'stores' => $stores,
        ]);
    }
}
