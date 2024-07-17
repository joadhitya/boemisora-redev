<?php

namespace App\Http\Controllers\Admin\ContentManagement;

use App\Helpers\GeneralHelper;
use App\Http\Controllers\Controller;
use App\Models\ContentManagement\ContentDetail;
use App\Models\ContentManagement\ContentMaster;
use App\Models\MasterData\SocialMedia;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index(Request $request)
    {
        $target = $request->segment(count($request->segments()));
        $data = ContentMaster::where('code', $target)->first();
        return view('admin.content-management.pages.homepage.index', compact('target', 'data'));
    }

    public function create()
    {
        $data = [];
        return view('admin.master-data.social-media.form', ["data" => $data, "type" => 'create']);
    }

    public function store(Request $request)
    {
    }

    public function show(string $id, Request $request)
    {
        $target = $request->segment(3);
        // PREVIEW
        if ($id == 'data') {
        } else if ($id == 'preview') {
            return view('admin.content-management.pages.homepage.preview');
        } else if ($id == 'manage') {
            $master = ContentMaster::where('code', $target)->first();
            $data = ContentDetail::where('id_master', $master->id)->get();
            return view('admin.content-management.pages.homepage.display', compact('master', 'data'));
        } else {
            $data = ContentDetail::where('id', $id)->first();
            return view('admin.content-management.pages.homepage.form', compact('data'));
        }
    }

    public function edit(string $id)
    {
        $data = ContentDetail::where('id', $id)->first();
        return view('admin.content-management.pages.homepage.form', compact('data'));
    }

    public function update(Request $request, string $id)
    {
        try {
            $data = ContentDetail::findOrFail($id);
            $oldData = $data->toJson();

            $request->merge([
                'updated_by' => GeneralHelper::getAuthInfo()
            ]);

            $data->update($request->all());

            return response()->json([
                'refference_id' => $id,
                'data' => $data,
                'message' => 'Berhasil mengubah data konten' . $request->name,
                'activity' => 'Melakukan perubahan data konten homepage',
                'method' => 'PATCH',
                'module' => 'CMS Homepage - ' . $request->name . ' - Update',
                'request_body' => json_encode($request->except('_token')),
                'old_data' => $oldData
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'method' => 'PATCH',
                'error_code' => 'MD-SOC-002',
                'message' => $e->getMessage(),
                'request_body' => json_encode($request->except('_token'))
            ], 500);
        }
    }

    public function destroy(string $id)
    {
        try {
            $data = SocialMedia::findOrFail($id);
            $data->delete();
            return response()->json([
                'data' => $data,
                'message' => 'Successfully deleted data social-media',
                'status' => 200,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to delete data social-media',
                'status' => 400,
                'error' => $e->getMessage(),
            ]);
        }
    }
}
