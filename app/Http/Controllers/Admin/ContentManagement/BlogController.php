<?php

namespace App\Http\Controllers\Admin\ContentManagement;

use App\Helpers\GeneralHelper;
use App\Http\Controllers\Controller;
use App\Models\ContentManagement\Blog;
use App\Models\General\LogActivity;
use App\Models\MasterData\CategoryBlog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.content-management.blog-management.blog.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [];
        $categories = CategoryBlog::get();
        return view('admin.content-management.blog-management.blog.form', ["data" => $data, "type" => 'create', "categories" => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $payload = $request->all();
            $payload['id'] = GeneralHelper::generateNanoId();
            $payload['slug'] = Str::slug($request->title);
            if ($request->file('image')) {
                $payload['image'] = GeneralHelper::uploadFile($request->file('image'), 'blog', 'upload/images/blog/');
            }

            $data = Blog::create($payload);
            return response()->json([
                'refference_id' => $payload['id'],
                'data' => $data,
                'message' => 'Berhasil menambahkan data Blog ' . $request->name,
                'activity' => 'Melakukan penambahan data Blog',
                'method' => 'POST',
                'module' => 'CMS Blog - Blog - Create',
                'request_body' => json_encode($request->except('_token'))
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Gagal menambahkan data: ' . $e->getMessage(),
                'status' => 400,
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            if ($id == 'data') {
                $data = Blog::with('category')->get();
                return view('admin.content-management.blog-management.blog.display', ["data" => $data]);
            } else {
                $data = Blog::findOrFail($id);
                $logActivity = LogActivity::where('refference_id', $id)->orderBy('created_at', 'DESC')->get();

                foreach ($logActivity as $la) {
                    $oldData = $la->old_data ? json_decode($la->old_data, true) : [];
                    $newData = $la->new_data ? json_decode($la->new_data, true) : [];
                    $differences = GeneralHelper::compareData($oldData, $newData);
                    $la->differences = $differences;
                }
                return view('admin.master-data.social-media.form', ["data" => $data, "logActivity" => $logActivity, "type" => 'detail', "target" => 'md-social-media']);
            }
        } catch (\Exception $e) {
            return response()->json([
                'method' => 'GET',
                'error_code' => 'MD-SOC-003',
                'message' => $e->getMessage(),
                'request_body' => []
            ], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Blog::findOrFail($id);
        $categories = CategoryBlog::get();
        return view('admin.content-management.blog-management.blog.form', ["data" => $data, "type" => 'edit', "categories" => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
