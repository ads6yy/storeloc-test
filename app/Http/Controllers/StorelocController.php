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
        $params = $request->validate([
            'n' => 'nullable|numeric|min:-90|max:90',
            's' => 'nullable|numeric|min:-90|max:90',
            'w' => 'nullable|numeric|min:-180|max:180',
            'e' => 'nullable|numeric|min:-180|max:180',
            'services' => 'exists:services,id',
        ]);

        $stores = Store::query()
            ->when($params['n'], fn ($query) => $query->where('lat', '<=', $params['n']))
            ->when($params['s'], fn ($query) => $query->where('lat', '>=', $params['s']))
            ->when($params['w'], fn ($query) => $query->where('lng', '>=', $params['w']))
            ->when($params['e'], fn ($query) => $query->where('lng', '<=', $params['e']))
            ->whereHas('services', fn ($query) => $query->whereIn('id', $params['services']))
            ->orderBy('name')
            ->with('services')
            ->get();

        return view('results', [
            'stores' => $stores,
        ]);
    }
}
