<?php

namespace App\Http\Controllers\Admin\MasterData;

use App\Helpers\GeneralHelper;
use App\Http\Controllers\Controller;
use App\Models\General\LogActivity;
use App\Models\MasterData\SocialMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Image;

class SocialMediaController extends Controller
{
    public function index()
    {
        return view('admin.master-data.social-media.index');
    }

    public function create()
    {
        $data = [];
        return view('admin.master-data.social-media.form', ["data" => $data, "type" => 'create']);
    }

    private function convertAndCompressImage($inputPath, $outputPath)
    {
        try {
            $image = Image::make($inputPath)->encode('webp', 90); // 90 is the compression quality
            $image->save($outputPath);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }


    public function store(Request $request)
    {
        try {
            $id = GeneralHelper::generateNanoId();
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $extensionTypeSplit = explode('/', $file->getMimeType());
                $extensionType = $extensionTypeSplit[1];
                $filename = 'social-media-' . uniqid() . '.' . $extensionType;
                $file->move(public_path('upload/images/social-media'), $filename);
                $request->merge([
                    'image' => $filename
                ]);
            }
            $request->merge([
                'id' => $id,
                'created_by' => GeneralHelper::getAuthInfo(),
                'updated_by' => json_encode([]),
            ]);
            $data = SocialMedia::create($request->all());
            return response()->json([
                'refference_id' => $id,
                'data' => $data,
                'message' => 'Berhasil menambahkan data Social Media ' . $request->name,
                'activity' => 'Melakukan penambahan data Social Media',
                'method' => 'POST',
                'module' => 'Master Data - Social Media - Create',
                'request_body' => json_encode($request->except('_token'))
            ], 200);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json([
                'method' => 'POST',
                'error_code' => 'MD-SOC-001',
                'message' => $e->getMessage(),
                'request_body' => json_encode($request->except('_token'))
            ], 409);
        }
    }

    public function show(string $id)
    {
        if ($id == 'data') {
            $data = SocialMedia::get();
            return view('admin.master-data.social-media.display', ["data" => $data]);
        } else {
            $data = SocialMedia::findOrFail($id);
            $logActivity = LogActivity::where('refference_id', $id)->orderBy('created_at', 'DESC')->get();
            foreach ($logActivity as $la) {
                $oldData = $la->old_data ? json_decode($la->old_data, true) : [];
                $newData = $la->new_data ? json_decode($la->new_data, true) : [];
                $differences = GeneralHelper::compareData($oldData, $newData);
                $la->differences = $differences;
            }
            return view('admin.master-data.social-media.form', ["data" => $data, "logActivity" => $logActivity, "type" => 'detail']);
        }
    }

    public function edit(string $id)
    {
        $data = SocialMedia::findOrFail($id);
        return view('admin.master-data.social-media.form', ["data" => $data, "type" => 'edit']);
    }

    public function update(Request $request, string $id)
    {
        try {
            $data = SocialMedia::findOrFail($id);
            $oldData = $data->toJson();

            $request->merge([
                'updated_by' => GeneralHelper::getAuthInfo()
            ]);

            $data->update($request->all());

            return response()->json([
                'refference_id' => $id,
                'data' => $data,
                'message' => 'Berhasil mengubah data social-media ' . $request->name,
                'activity' => 'Melakukan perubahan data social-media',
                'method' => 'PATCH',
                'module' => 'Master Data - social-media - Update',
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
