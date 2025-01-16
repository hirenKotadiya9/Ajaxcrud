<?php
namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Database\QueryException;


class CountryController extends Controller
{
    /* public function index()
    {
        $countries = Country::all();
        return view('myweb.ajax.country', compact('countries'));
    } */

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Country::select(['id', 'name', 'code']);
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$row->id.'" class="btn btn-primary btn-sm editProduct"><i class="fas fa-edit"></i>" Edit</a>';
                    $btn .= '<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$row->id.'" class="btn btn-danger btn-sm deleteProduct"><i class="fa fa-trash"></i> Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('myweb.ajax.country');
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'code' => 'required|numeric',
    ]);

    try {
        Country::create([
            'name' => $request->input('name'),
            'code' => $request->input('code'),
        ]);

        return response()->json(['success' => true, 'message' => 'Country added successfully!']);

    } catch (QueryException $e) {
        if ($e->getCode() == 23000) {
            return response()->json(['success' => false, 'message' => 'Country code already exists.']);
        }
        return response()->json(['success' => false, 'message' => 'An error occurred while adding the country.']);
    }
}
}
