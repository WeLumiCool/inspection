<?php

namespace App\Http\Controllers;

use App\Services\PdfUploader;
use App\Services\SetHistory;
use App\Stage;
use App\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        SetHistory::save('Добавление', $stage->build->id, $stage->id);
        $stage->save();
        return redirect()->route('admin.builds.show', $stage->build);
    }



    public function isp_store(Request $request)
    {
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
        SetHistory::save('Добавление', $stage->build->id, $stage->id);
        $stage->save();
        return redirect()->route('show', $request->build_id);
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

        return view('admin.stages.edit', compact('stage'));
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
        if ($request->exists('images')) {
            $old_images = json_decode($stage->images);
            if (!is_null($old_images)) {
                foreach ($old_images as $image_path) {
                    Storage::disk('public')->delete("/files/" . $image_path);
                }
            }
            $images = [];
            foreach ($request->file('images') as $file) {
                $filename = PdfUploader::upload($file, 'stage', 'image');
                $images[] = $filename;
            }
            $stage->images = json_encode($images);
        }

        if ($request->exists('document_scan')) {
            $old_documents = json_decode($stage->document_scan);
            if (!is_null($old_documents)) {
                foreach ($old_documents as $doc_path) {
                    Storage::disk('public')->delete("/files/" . $doc_path);
                }
            }
            $documents = [];
            foreach ($request->file('document_scan') as $file) {
                $filename = PdfUploader::upload($file, 'stage', 'document');
                $documents[] = $filename;
            }
            $stage->document_scan = json_encode($documents);
        }
        $stage->update($request->except(['document_scan', 'images']));
        SetHistory::save('Обновление', $stage->build->id, $stage->id);
        $stage->save();
        return redirect()->route('admin.builds.show', $stage->build);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Stage $stage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stage $stage)
    {
        if (!is_null($stage->images)) {
            foreach (json_decode($stage->images) as $img_path) {
                Storage::disk('public')->delete("/files/" . $img_path);
            }
        }
        if (!is_null($stage->document_scan)) {
            foreach (json_decode($stage->document_scan) as $doc_path) {
                Storage::disk('public')->delete("/files/" . $doc_path);
            }
        }
        $stage->delete();
        SetHistory::save('Удаление', $stage->build->id, $stage->id);
        return redirect()->route('admin.builds.show', $stage->build);
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
