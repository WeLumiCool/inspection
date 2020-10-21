<?php

namespace App\Http\Controllers;

use App\Build;
use App\History;
use App\Services\PdfUploader;
use App\Services\SetHistory;
use App\Type;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
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
        return view('admin.builds.index', ['types' => Type::all()]);
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

    public function isp_create()
    {
        return view('project_build.create', ['types' => Type::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        self::general_store($request);
        return redirect()->route('admin.builds.index');
    }

    public function isp_store(Request $request)
    {
        self::general_store($request);
        return redirect()->route('main');

    }

    public static function general_store($request)
    {
        $build = Build::create($request->except('statement', 'apu', 'project', 'solution', 'act', 'legality', 'district'));
        $build->legality = $request->exists('legality');
        if ($request->category != 'Незаконный') {
            //Заявлении
            if ($request->hasFile('statement')) {
                $statements = [];
                foreach ($request->file('statement') as $file) {
                    $filePath = PdfUploader::upload($file, 'statements', 'document');
                    $statements[$file->getClientOriginalName()] = $filePath;
                }
                $build->statement = json_encode($statements);
            }
            if ($request->hasFile('apu')) {
                $apus = [];
                foreach ($request->file('apu') as $file) {
                    $filePath = PdfUploader::upload($file, 'apus', 'apu');
                    $apus[$file->getClientOriginalName()] = $filePath;
                }
                $build->apu = json_encode($apus);
            }

            if ($request->hasFile('project')) {
                $projects = [];
                foreach ($request->file('project') as $file) {
                    $filePath = PdfUploader::upload($file, 'projects', 'project');
                    $projects[$file->getClientOriginalName()] = $filePath;
                }
                $build->project = json_encode($projects);
            }

            if ($request->hasFile('solution')) {
                $solutions = [];
                foreach ($request->file('solution') as $file) {
                    $filePath = PdfUploader::upload($file, 'solutions', 'solution');
                    $solutions[$file->getClientOriginalName()] = $filePath;
                }
                $build->solution = json_encode($solutions);
            }

            if ($request->hasFile('act')) {
                $acts = [];
                foreach ($request->file('act') as $file) {
                    $filePath = PdfUploader::upload($file, 'acts', 'act');
                    $acts[$file->getClientOriginalName()] = $filePath;
                }
                $build->act = json_encode($acts);
            }

        }
        $build->district = Auth::user()->district;

        SetHistory::save('Добавил', $build->id, null);
        $build->save();
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
        if ($request->hasFile('statement')) {
            if (!is_null($build->statement)) {
                foreach (json_decode($build->statement) as $img_path) {
                    Storage::disk('public')->delete("/files/" . $img_path);
                }
            }
            $statements = [];
            foreach ($request->file('statement') as $file) {
                $filePath = PdfUploader::upload($file, 'statements', 'document');
                $statements[$file->getClientOriginalName()] = $filePath;
            }
            $build->statement = json_encode($statements);
        }

        if ($request->hasFile('apu')) {
            if (!is_null($build->apu)) {
                foreach (json_decode($build->apu) as $img_path) {
                    Storage::disk('public')->delete("/files/" . $img_path);
                }
            }
            $apus = [];
            foreach ($request->file('apu') as $file) {
                $filePath = PdfUploader::upload($file, 'apus', 'document');
                $apus[$file->getClientOriginalName()] = $filePath;
            }
            $build->apu = json_encode($apus);
        }

        if ($request->hasFile('act')) {
            if (!is_null($build->act)) {
                foreach (json_decode($build->act) as $img_path) {
                    Storage::disk('public')->delete("/files/" . $img_path);
                }
            }
            $acts = [];
            foreach ($request->file('act') as $file) {
                $filePath = PdfUploader::upload($file, 'acts', 'document');
                $acts[$file->getClientOriginalName()] = $filePath;
            }
            $build->act = json_encode($acts);
        }

        if ($request->hasFile('project')) {
            if (!is_null($build->project)) {
                foreach (json_decode($build->project) as $img_path) {
                    Storage::disk('public')->delete("/files/" . $img_path);
                }
            }
            $projects = [];
            foreach ($request->file('project') as $file) {
                $filePath = PdfUploader::upload($file, 'projects', 'document');
                $projects[$file->getClientOriginalName()] = $filePath;
            }
            $build->project = json_encode($projects);
        }

        if ($request->hasFile('solution')) {
            if (!is_null($build->solution)) {
                foreach (json_decode($build->solution) as $img_path) {
                    Storage::disk('public')->delete("/files/" . $img_path);
                }
            }
            $solutions = [];
            foreach ($request->file('solution') as $file) {
                $filePath = PdfUploader::upload($file, 'solutions', 'document');
                $solutions[$file->getClientOriginalName()] = $filePath;
            }
            $build->solution = json_encode($solutions);
        }

        if ($request->hasFile('certificate')) {
            if (!is_null($build->certificate)) {
                foreach (json_decode($build->certificate) as $img_path) {
                    Storage::disk('public')->delete("/files/" . $img_path);
                }
            }
            $certificates = [];
            foreach ($request->file('certificate') as $file) {
                $filePath = PdfUploader::upload($file, 'certificates', 'document');
                $certificates[$file->getClientOriginalName()] = $filePath;
            }
            $build->certificate = json_encode($certificates);
        }

        $build->update($request->except('statement', 'apu', 'act', 'project', 'solution', 'certificate', 'legality'));
        $build->district = $request->district;
        $build->legality = $request->exists('legality');
        SetHistory::save('Обновил', $build->id, null);
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
        if (!is_null($build->statement)) {
            foreach (json_decode($build->statement) as $img_path) {
                Storage::disk('public')->delete("/files/" . $img_path);
            }
        }
        if (!is_null($build->apu)) {
            foreach (json_decode($build->apu) as $img_path) {
                Storage::disk('public')->delete("/files/" . $img_path);
            }
        }
        if (!is_null($build->act)) {
            foreach (json_decode($build->act) as $img_path) {
                Storage::disk('public')->delete("/files/" . $img_path);
            }
        }
        if (!is_null($build->project)) {
            foreach (json_decode($build->project) as $img_path) {
                Storage::disk('public')->delete("/files/" . $img_path);
            }
        }
        if (!is_null($build->solution)) {
            foreach (json_decode($build->solution) as $img_path) {
                Storage::disk('public')->delete("/files/" . $img_path);
            }
        }
        if (!is_null($build->certificate)) {
            foreach (json_decode($build->certificate) as $img_path) {
                Storage::disk('public')->delete("/files/" . $img_path);
            }
        }
        foreach ($build->stages as $stage) {
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
        }
        $histories = History::all();
        foreach ($histories as $history)
        {
            if ($build->id == $history->object_id)
            {
                $history->delete();
            }
        }
        $build->delete();

        return redirect()->route('admin.builds.index');
    }

    public function inspector_show($id)
    {
        $build = Build::find($id);
        $history = History::where('object_id', $id)->where('action', 'Добавил')->first();

        return view('project_build.show', ['build' => $build, 'user' => $history->user->name, 'histories' => History::all()]);
    }

    public function map()
    {

        return view('project_build.maps', ['builds' => Build::all()]);
    }

    public function map_ajax(Request $request)
    {
        if ($request->district === 'Все') {
            $builds = Build::all();
        } else {
            $builds = Build::where('district', $request->district)->get();
        }

        $view = view('blocks.maps', ['builds' => $builds])->render();
        return response()->json([
            'view' => $view,
        ]);

    }

    public function datatableData()
    {
        return DataTables::of(Build::query())
            ->addColumn('actions', function (Build $build) {
                return view('admin.actions', ['type' => 'builds', 'model' => $build]);

            })
            ->editColumn('type_id', function (Build $build) {
                $type = Type::find($build->type_id);
                return $type['name'];
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
            ->editColumn('legality', function (Build $build) {
                if ($build->legality) {
                    return '<i class="fas fa-check fa-lg text-success"></i>';
                } else {
                    return '<i class="fas fa-ban fa-lg text-danger"></i>';
                }
            })
            ->rawColumns(['legality'])
            ->addIndexColumn()
            ->make(true);
    }

    public function central()
    { //Список объектов добавленные сотрудниками Центрального аппарата

        return view('admin.departments.index', ['types' => Type::all()]);
    }

    public function centralDatatableData()
    {
        $users = User::where('department', 'Центральный аппарат')->get();
        $history_builds = collect();
//
//        foreach($users as $user)
//        {
//            foreach ($user->histories as $history) {
//                $history_builds->push($history->build);
//            }
//        }
//        dd($history_builds->unique('object_id'));

        $centrals = self::getUsers($users);

        return DataTables::of($centrals)
            ->addColumn('actions', function (Build $build) {
                return view('admin.actions', ['type' => 'builds', 'model' => $build]);

            })
            ->editColumn('type_id', function (Build $build) {
                $type = Type::find($build->type_id);
                return $type['name'];
            })
            ->make(true);
    }

    public function city()
    {  //Список объектов добавленные сотрудниками Межрегионального управления

        return view('admin.departments.city', ['types' => Type::all()]);
    }

    public function cityDatatableData()
    {
        $users = User::where('department', 'Межрегиональное управление')->get();

        $cities = self::getUsers($users);

        return DataTables::of($cities)
            ->addColumn('actions', function (Build $build) {
                return view('admin.actions', ['type' => 'builds', 'model' => $build]);

            })
            ->editColumn('type_id', function (Build $build) {
                $type = Type::find($build->type_id);
                return $type['name'];
            })
            ->make(true);
    }

    public function getUsers($request)
    {
        $cities = [];
        foreach ($request as $key => $user) {
            $histories = History::where('user_id', $user->id)->where('action', 'Добавил')->get();
            foreach ($histories as $history) {
                $cities[] = $history->build;
            }
        }
        $cities = array_unique($cities);

        return $cities;
    }

}
