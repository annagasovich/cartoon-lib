<?php

namespace App\Http\Controllers;

use App\Models\Cartoon;
use Illuminate\Http\Request;

class CartoonController extends Controller
{
    public function index($id) {
        $cartoon = Cartoon::where('url', $id)->firstOrFail();
        return view('cartoon.item', ['cartoon' => $cartoon]);
    }
}
