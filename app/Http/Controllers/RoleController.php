<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function __construct()
    // {
    //   $this->middleware('jwt.verify');
    // }
    public function index()
    {
        $role = Role::orderBy('id', 'desc')->get();

        return response()->json([
            'message' => 'User created.',
            'user' => $role
        ]);


        // return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'code' =>  'required|string|email|max:255|unique:role',
            'status' => 'required',
        ]);
        if ($validate->fails()) {
         
            return layoutJsonResponseValidate($validate->errors());
        }
        try {
            Role::create([
                'name' => $request->input('name'),
                'code' => $request->input('code'),
                'status' => 1,
            ]);

            return response()->json(['message' => 'Successfully Insert']);
        } catch (\Exception $e) {
            // notification("Failed Insert Role",$e);
            return response()->json(
                layoutJsonResponse([
                    'message' => 'Failed Insert Role.',
                ]),
                400
            );
        }

        // return redirect()->route('companies.index')->with('success','Company has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view('companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);

        $company->fill($request->post())->save();

        return redirect()->route('companies.index')->with('success', 'Company Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('companies.index')->with('success', 'Company has been deleted successfully');
    }
}
