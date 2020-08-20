<?php

namespace App\Http\Controllers;

use App\Build;
use App\Services\PdfUploader;
use App\Type;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BuildController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.builds.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.builds.create', ['types' => Type::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

//        dd($request);
        $build = Build::create($request->all());
        $build->statement = PdfUploader::upload(request('statement'), 'statements', 'statement');
        $build->apu = PdfUploader::upload(request('apu'), 'apu', 'apu');
        $build->act = PdfUploader::upload(request('act'), 'acts', 'act');
        $build->project = PdfUploader::upload(request('project'), 'projects', 'project');
        $build->solution = PdfUploader::upload(request('solution'), 'solutions', 'solution');

        $build->save();

        return redirect()->route('admin.builds.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Build $build
     * @return \Illuminate\Http\Response
     */
    public function show(Build $build)
    {
        return view('admin.builds.show', ['build' => $build]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Build $build
     * @return \Illuminate\Http\Response
     */
    public function edit(Build $build)
    {
        return view('admin.builds.edit', ['build' => $build, 'types' => Type::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Build $build
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Build $build)
    {
        $build->update($request->all());
        return redirect()->route('admin.builds.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Build $build
     * @return \Illuminate\Http\Response
     */
    public function destroy(Build $build)
    {
        //
    }

    public function datatableData()
    {
        return DataTables::of(Build::query())
            ->addColumn('actions', function (Build $build) {
                return view('admin.actions', ['type' => 'builds', 'model' => $build]);
            })
            ->make(true);
    }
}
