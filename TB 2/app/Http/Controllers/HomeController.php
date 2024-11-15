<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\User;
use ArielMejiaDev\LarapexCharts\Facades\LarapexChart;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        {
            $isAdmin = Auth::user()->role === 'admin';

            $produkPerHariQuery = Product::selectRaw('DATE(created_at) as date, COUNT(*) as total')
                ->groupBy('date')
                ->orderBy('date', 'asc');

            if (!$isAdmin) {
                $produkPerHariQuery->where('user_id', Auth::id());
            }

            // Execute the query to get results
            $produkPerHari = $produkPerHariQuery->get();

            $dates = [];
            $totals = [];

            foreach ($produkPerHari as $item) {
                $dates[] = Carbon::parse($item->date)->format('Y-m-d');
                $totals[] = $item->total;
            }

            $chart = LarapexChart::barChart()
                ->setTitle('Produk Ditambahkan Per Hari')
                ->setSubtitle('Data Penambahan Produk Harian')
                ->addData('Jumlah Produk', $totals)
                ->setXAxis($dates);

            $totalProductsQuery = Produk::query();
            if ($isAdmin) {
                // Jika admin, hitung semua pengguna terdaftar
                $registeredUsers = User::count();
            } else {
                // Jika bukan admin, hitung hanya pengguna yang sedang login
                $registeredUsers = User::where('id', Auth::id())->count();
            }
            $data = [
                'totalProducts' => $totalProductsQuery->count(),
                'salesToday' => 130,
                'totalRevenue' => 'Rp 75.000.000',
                'registeredUsers' => $registeredUsers,
                'chart' => $chart,
            ];

            return view('component.home', $data);
    }
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
