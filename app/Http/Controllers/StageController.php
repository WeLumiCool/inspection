<?php

namespace App\Http\Controllers;

use App\Services\PdfUploader;
use App\Stage;
use App\Type;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class StageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.stages.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->exists('images'));
        $stage = Stage::create($request->except(['document_scan', 'images']));
        if ($request->exists('images')) {
            $images = [];
            foreach ($request->file('images') as $file) {
                $filename = PdfUploader::upload($file, 'stage', 'image');
                $images[] = $filename;
            }
        $stage->images = json_encode($images);
        }

        if ($request->exists('document_scan')) {
            $document = [];
            foreach ($request->file('document_scan') as $file) {
                $filename = PdfUploader::upload($file, 'stage', 'document');
                $document[] = $filename;
            }
        $stage->document_scan = json_encode($document);
        }
        $stage->save();
        return redirect()->route('admin.builds.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Stage $stage
     * @return \Illuminate\Http\Response
     */
    public function show(Stage $stage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Stage $stage
     * @return \Illuminate\Http\Response
     */
    public function edit(Stage $stage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Stage $stage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stage $stage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Stage $stage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stage $stage)
    {
        //
    }

    public function datatableData()
    {
        return DataTables::of(Stage::query())
            ->addColumn('actions', function (Stage $stage) {
                return view('admin.actions', ['type' => 'stages', 'model' => $stage]);
            })
            ->make(true);
    }
}
