<?php

namespace App\Http\Controllers;

use App\Build;
use App\Services\PdfUploader;
use App\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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

    public function welcome()
    {
        return view('admin.blocks.main', ['types' => Type::all()]);
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
     * @param \Illuminate\Http\Request $request
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
        $build->certificate = PdfUploader::upload(request('certificate'), 'certificates', 'certificate');

        $build->save();

        return redirect()->route('admin.builds.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Build $build
     * @return \Illuminate\Http\Response
     */
    public function show(Build $build)
    {
        return view('admin.builds.show', ['build' => $build]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Build $build
     * @return \Illuminate\Http\Response
     */
    public function edit(Build $build)
    {
        return view('admin.builds.edit', ['build' => $build, 'types' => Type::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Build $build
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Build $build)
    {
        if ($request->hasFile('statement') || $request->hasFile('apu') ||
            $request->hasFile('act') || $request->hasFile('project') || $request->hasFile('solution') || $request->hasFile('certificate')) {
            Storage::disk('public')->delete("/files/" . $build->statement);
            Storage::disk('public')->delete("/files/" . $build->apu);
            Storage::disk('public')->delete("/files/" . $build->act);
            Storage::disk('public')->delete("/files/" . $build->project);
            Storage::disk('public')->delete("/files/" . $build->solution);
            Storage::disk('public')->delete("/files/" . $build->certificate);

            $build->statement = PdfUploader::upload(request('statement'), 'statements', 'statement');
            $build->apu = PdfUploader::upload(request('apu'), 'apu', 'apu');
            $build->act = PdfUploader::upload(request('act'), 'acts', 'act');
            $build->project = PdfUploader::upload(request('project'), 'projects', 'project');
            $build->solution = PdfUploader::upload(request('solution'), 'solutions', 'solution');
            $build->certificate = PdfUploader::upload(request('certificate'), 'certificates', 'certificate');
        }

        $build->update($request->except('statement', 'apu', 'act', 'project', 'solution', 'certificate'));
        $build->save();
        return redirect()->route('admin.builds.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Build $build
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

    public function datatableData2()
    {
        return DataTables::of(Build::query())
            ->editColumn('type_id', function (Build $build) {
                $type = Type::find($build->type_id);
                return $type['name'];
            })
            ->make(true);
    }

}
