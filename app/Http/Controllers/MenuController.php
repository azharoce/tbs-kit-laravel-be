<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MenuController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('jwt.verify');
    }
    public function data()
    {
        $data = Menu::data();
        $results = array();
        foreach ($data as $key => $value) {
            $value['child'] = Menu::dataChildMenu($value['id']);
            $value['status'] = ($value['status'] == 1) ? true : false;
            $results[] = $value;
        }
        return responseSuccess('success', $results);
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'code' =>  'required|unique:menu',
            'status' => 'required',
            'parent' => 'required',
        ]);

        if ($validate->fails()) {
            $responseError = $validate->errors()->messages();
            return layoutJsonResponseValidate($responseError['code'][0], false);
        }
        try {
            Menu::create([
                'name' => $request->input('name'),
                'code' => $request->input('code'),
                'status' => $request->input('status'),
                'parent' => $request->input('parent'),
            ]);

            return response()->json(['message' => 'Successfully Insert'], \OK);
        } catch (\Exception $e) {
            return response()->json(
                [
                    'message' => 'Failed Insert Menu.'
                ],
                \BAD_REQUEST
            );
        }

        // return redirect()->route('companies.index')->with('success','Company has been created successfully.');
    }
}
