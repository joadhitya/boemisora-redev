<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\GeneralHelper;
use App\Http\Controllers\Controller;
use App\Models\General\LogActivity;
use App\Models\General\LogError;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function index()
    {
        return view('admin.general.log-record.activity');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $logData = $request->data;
        $logData['id'] = GeneralHelper::generateNanoId();
        $logData['user'] = GeneralHelper::getAuthInfo();
        $logData['uri'] = $request->uri;
        $logData['new_data'] = $logData['request_body'];
        if ($request->type == 'success') {
            LogActivity::create($logData);
        } else {
            $logData['http_code'] = '409';
            LogError::create($logData);
        }
        return response()->json(['message' => 'Log entry created successfully'], 200);
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
