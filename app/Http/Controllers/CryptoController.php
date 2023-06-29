<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class CryptoController extends Controller
{
    public function index()
    {
        try {
            $response = Http::get('https://api.coingecko.com/api/v3/coins/markets', [
                'vs_currency' => 'usd',
                'order' => 'market_cap_desc',
                'per_page' => 100,
                'page' => 1,
                'sparkline' => false,
            ]);

            $cryptos = $response->json();

            $error = false;
        } catch (\Exception $e) {
            $cryptos = [];
            $error = true;
            Log::error('Failed to fetch data from API: ' . $e->getMessage());
            return view('error');
        }

        return view('crypto.list', compact('cryptos', 'error'));
    }

    public function show($id)
    {
        try {
            $response = Http::get("https://api.coingecko.com/api/v3/coins/$id");

            $crypto = $response->json();

            $error = false;
        } catch (\Exception $e) {
            $crypto = [];
            $error = true;
            Log::error('Failed to fetch data from API: ' . $e->getMessage());
            return view('error');
        }

        return view('crypto.details', compact('crypto', 'error'));
    }
}