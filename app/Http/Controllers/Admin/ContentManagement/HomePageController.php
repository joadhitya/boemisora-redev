<?php

namespace App\Http\Controllers\Admin\ContentManagement;

use App\Helpers\GeneralHelper;
use App\Http\Controllers\Controller;
use App\Models\ContentManagement\ContentDetail;
use App\Models\ContentManagement\ContentMaster;
use App\Models\ContentManagement\LayoutImage;
use App\Models\ContentManagement\LayoutMaster;
use App\Models\MasterData\SocialMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $payload = $request->all();
        $id = GeneralHelper::generateNanoId();
        if ($request->hasFile('image')) {
            if ($request->hasFile('image')) {
                $image = GeneralHelper::uploadFile($request->file('image'), 'homepage', 'upload/images/homepage/');
                $payload['image'] = $image;
            }
        }
        $payload['id'] = $id;
        $payload['created_by'] = GeneralHelper::getAuthInfo();
        $payload['updated_by'] = json_encode([]);
        $data = LayoutImage::create($payload);
        return response()->json([
            'refference_id' => $id,
            'data' => $data,
            'message' => 'Berhasil menambahkan data gambar Homepage ' . $request->name,
            'activity' => 'Melakukan penambahan data gambar Homepage',
            'method' => 'POST',
            'module' => 'CMS Homepage - Layout Image - Create',
            'request_body' => json_encode($request->except('_token'))
        ], 200);
    }

    public function show(string $id, Request $request)
    {
        $target = $request->segment(3);
        if ($id == 'data') {
        } else if ($id == 'preview') {
            return view('admin.content-management.pages.homepage.preview');
        } else if ($id == 'manage') {
            $master = ContentMaster::where('code', $target)->first();
            $data = ContentDetail::where('id_master', $master->id)->get();
            return view('admin.content-management.pages.homepage.display', compact('master', 'data'));
        } else if ($id == 'edit') {
            $data = ContentDetail::where('id', $id)->first();
            return view('admin.content-management.pages.homepage.form', compact('data'));
        } else if ($id == 'layout-image') {
            $master = LayoutMaster::where('code', 'homepage')->first();
            $data = LayoutImage::where('id_master', $master->id)->orderBy('sequence')->get();
            return view('admin.content-management.pages.homepage.layout-image', compact('master', 'data'));
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
            if ($request->form_type == 'content') {

                $data = ContentDetail::findOrFail($id);
                $oldData = $data->toJson();
                $payload = $request->all();
                if ($request->hasFile('image')) {
                    $image = GeneralHelper::uploadFile($request->file('image'), 'homepage', 'upload/images/content/');
                    $payload['image'] = $image;
                }

                $payload['updated_by'] = GeneralHelper::getAuthInfo();
                $data->update($payload);
                return response()->json([
                    'refference_id' => $id,
                    'data' => $data,
                    'message' => 'Berhasil mengubah data konten ' . $request->name,
                    'activity' => 'Melakukan perubahan data konten homepage',
                    'method' => 'PATCH',
                    'module' => 'CMS Homepage - ' . $request->name . ' - Update',
                    'request_body' => $request->except('_token'),
                    'old_data' => $oldData
                ], 200);
            } else if ($request->form_type == 'image') {
            }
        } catch (\Exception $e) {
            return response()->json([
                'method' => 'PATCH',
                'error_code' => 'MD-SOC-002',
                'message' => $e->getMessage(),
                'request_body' => $request->except('_token')
            ], 500);
        }
    }


    public function destroy(string $id)
    {
        try {
            $data = LayoutImage::findOrFail($id);
            $data->delete();
            return response()->json([
                'data' => $data,
                'message' => 'Successfully deleted data gambar Homepage',
                'status' => 200,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to delete data gambar Homepage',
                'status' => 400,
                'error' => $e->getMessage(),
            ]);
        }
    }

    public function layoutImage(Request $request)
    {
        if ($request->type == 'add') {
            $data = [];
            $master = LayoutMaster::where('code', $request->target)->first();
            $sequence = DB::table('layout_images')
                ->where('id_master', $master->id)
                ->orderBy('sequence', 'desc')
                ->value('sequence') + 1;
            return view('admin.content-management.pages.homepage.form-image', compact('data', 'sequence', 'master'));
        } else if ($request->type == 'edit') {
            $data = LayoutImage::where('id', $request->id)->first();
            return view('admin.content-management.pages.homepage.form-image', compact('data'));
        }
    }
}
