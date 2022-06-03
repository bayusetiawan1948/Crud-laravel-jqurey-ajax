<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view("index");
    }

    public function read()
    {
        $data = product::all();
        return view('indexComponent/read')->with([
            'data' => $data
        ]);
    }

    public function create()
    {
        return view('indexComponent/create');
    }

    public function store(Request $request)
    {
        $data['name'] = $request->name;
        product::create($data);
    }

    public function edit($id)
    {
        $data = product::findOrFail($id);
        return view('indexComponent/edit', [
            'data' => $data
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = product::findOrFail($id);
        $data->name = $request->name;
        $data->update();
    }

    public function destroy($id)
    {
        $data = product::findOrFail($id);
        $data->delete();
    }
}
