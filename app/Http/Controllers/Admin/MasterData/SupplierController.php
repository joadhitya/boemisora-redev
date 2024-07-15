<?php

namespace App\Http\Controllers\Admin\MasterData;

use App\Http\Controllers\Controller;
use App\Models\MasterData\Supplier;
use Illuminate\Http\Request;
use App\Helpers\GeneralHelper;
use App\Models\General\LogActivity;
use Illuminate\Support\Facades\Log;

class SupplierController extends Controller
{
    public function index()
    {
        return view('admin.master-data.supplier.index');
    }

    public function create()
    {
        $data = [];
        return view('admin.master-data.supplier.form', ["data" => $data, "type" => 'create']);
    }

    public function store(Request $request)
    {
        try {
            $id = GeneralHelper::generateNanoId();
            $request->merge([
                'id' => $id,
                'created_by' => GeneralHelper::getAuthInfo(),
                'updated_by' => json_encode([]),
            ]);
            $data = Supplier::create($request->all());
            return response()->json([
                'refference_id' => $id,
                'data' => $data,
                'message' => 'Berhasil menambahkan data supplier ' . $request->supplier_name,
                'activity' => 'Melakukan penambahan data Supplier',
                'method' => 'POST',
                'module' => 'Master Data - Supplier - Create',
                'request_body' => json_encode($request->except('_token'))
            ], 200);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json([
                'method' => 'POST',
                'error_code' => 'MD-SUP-001',
                'message' => $e->getMessage(),
                'request_body' => json_encode($request->except('_token'))
            ], 409);
        }
    }

    public function show(string $id)
    {
        if ($id == 'data') {
            $data = Supplier::get();
            return view('admin.master-data.supplier.display', ["data" => $data]);
        } else {
            $data = Supplier::findOrFail($id);
            $logActivity = LogActivity::where('refference_id', $id)->orderBy('created_at', 'DESC')->get();
            foreach ($logActivity as $la) {
                $oldData = $la->old_data ? json_decode($la->old_data, true) : [];
                $newData = $la->new_data ? json_decode($la->new_data, true) : [];
                $differences = GeneralHelper::compareData($oldData, $newData);
                $la->differences = $differences;
            }
            return view('admin.master-data.supplier.form', ["data" => $data, "logActivity" => $logActivity, "type" => 'detail']);
        }
    }

    public function edit(string $id)
    {
        $data = Supplier::findOrFail($id);
        return view('admin.master-data.supplier.form', ["data" => $data, "type" => 'edit']);
    }
    
    public function update(Request $request, string $id)
    {
        try {
            $data = Supplier::findOrFail($id);
            $oldData = $data->toJson();

            $request->merge([
                'updated_by' => GeneralHelper::getAuthInfo()
            ]);

            $data->update($request->all());

            return response()->json([
                'refference_id' => $id,
                'data' => $data,
                'message' => 'Berhasil mengubah data supplier ' . $request->name,
                'activity' => 'Melakukan perubahan data Supplier',
                'method' => 'PATCH',
                'module' => 'Master Data - Supplier - Update',
                'request_body' => json_encode($request->except('_token')),
                'old_data' => $oldData
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'method' => 'PATCH',
                'error_code' => 'MD-SUP-002',
                'message' => $e->getMessage(),
                'request_body' => json_encode($request->except('_token'))
            ], 500);
        }
    }

    public function destroy(string $id)
    {
        try {
            $data = Supplier::findOrFail($id);
            $data->delete();
            return response()->json([
                'data' => $data,
                'message' => 'Successfully deleted data Supplier',
                'status' => 200,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to delete data Supplier',
                'status' => 400,
                'error' => $e->getMessage(),
            ]);
        }
    }
}
