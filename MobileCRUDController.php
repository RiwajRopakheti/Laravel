<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Mobile;


class MobileCRUDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $data['mobiles'] = Mobile::orderBy('id', 'desc')->paginate(5);
        return view('mobiles.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mobiles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'modelname' => 'required',
            'version' => 'required',
            'os'=>'required',
            'osversion'=>'required',
            'storage' => 'required'

        ]);
        $mobile = new Mobile;
        $mobile->modelname = $request->modelname;
        $mobile->version = $request->version;
        $mobile->os=$request->os;
        $mobile->osversion=$request->osversion;
        $mobile->storage = $request->storage;

        $mobile->save();
        return redirect()->route('mobiles.index')
            ->with('success', 'Mobile has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\mobile $mobile
     * @return \Illuminate\Http\Response
     */
    public function show(Mobile $mobile)
    {
        return view('mobiles.show', compact('mobile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Mobile $mobile
     * @return \Illuminate\Http\Response
     */
    public function edit(Mobile $mobile)
    {
        return view('mobiles.edit', compact('mobile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\mobile $mobile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'modelname' => 'required',
            'version' => 'required',
            'os'=>'required',
            'osversion'=>'required',
            'storage' => 'required'

        ]);
        $mobile = Mobile::find($id);
        $mobile->modelname = $request->modelname;
        $mobile->version = $request->version;
        $mobile->os = $request->os;
        $mobile->osversion = $request->osversion;
        $mobile->storage = $request->storage;

        $mobile->save();
        return redirect()->route('mobiles.index')
            ->with('success', 'Mobile Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Mobile $mobile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mobile $mobile)
    {
        $mobile->delete();
        return redirect()->route('mobiles.index')
            ->with('success', 'Mobile has been deleted successfully');
    }

}
