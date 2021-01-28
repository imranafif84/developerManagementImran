<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Developer;
use App\Http\Resources\DeveloperResource;

class DeveloperController extends Controller
{

    public function index()
    {
        $developers = Developer::all()->toArray();
        return array_reverse($developers);
    }
    
    public function add(Request $request)
    {
        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'email', 
            'phoneno' => 'numeric'
        ]);

        $developer = new Developer([
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'email' => $request->input('email'),
            'phoneno' => $request->input('phoneno'),
            'address' => $request->input('address'),
            'image' => $request->input('image'),
        ]);

        $developer->save();
 
        return response()->json('The developer successfully added');
    }

    public function edit($id)
    {
        $developer = Developer::findOrFail($id);
        return response()->json($developer);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'email', 
            'phoneno' => 'numeric'
        ]);

        $developer = Developer::findOrFail($id);
        $developer->update($request->all());
 
        return response()->json('The developer successfully updated');
    }

    public function delete($id)
    {
        $developer = Developer::findOrFail($id);

        $developer->delete();

        return response()->json('The developer successfully deleted');
    }

    public function delete_user($id)
    {
       $developers = explode(',' , $id);

       foreach($developers as $id) {
           Developer::findOrFail($id)->delete();
       }

       return response()->json('The developers successfully deleted');

    }

}
