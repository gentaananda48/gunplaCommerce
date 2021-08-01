<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\API\ResponseFormatter;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    //fungsi Query API Transaksi
    public function get(Request $request, $id)
    {
        $product = Transaction::with(['details.product'])->find($id);

        if($product)
            return ResponseFormatter::success($product, 'Data wes dijukut!!');
        else
            return ResponseFormatter::error(null, 'Datane Laka Cookk!!', 404);
    }
}
