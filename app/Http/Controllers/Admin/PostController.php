<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Posts;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\PostCategory;
use Carbon\Carbon;
use File;

class PostController extends Controller
{

    private $type = 'blog';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected function module(){
        return [
            'name' => 'Bài viết',
            'module' => 'posts',
        ];
    }
    public function index(Request $request)
    {
        return view('backend.posts.list');
    }

    public function anyData(Request $request) {
        $list_post = Posts::where('type', $request->type)->orderBy('created_at', 'DESC')->get();
        return Datatables::of($list_post)
            ->addColumn('checkbox', function ($data) {
                return '<input type="checkbox" name="chkItem[]" value="' . $data->id . '">';
            })->addColumn('image', function ($data) {
            return '<img src="' . asset($data->image) . '" class="img-thumbnail" width="50px" height="50px">';
        })->addColumn('name', function ($data) {
            if ($data->type == 'blog') {
                return $data->name . ' <br><a href="' . asset('tin-tuc/' . $data->slug) . '" target="_black">
                    <i class="fa fa-hand-o-right" aria-hidden="true"></i> Link:
                    ' . asset('tin-tuc/' . $data->slug) . '
                    </a>';
            }
        })->addColumn('status', function ($data) {
            if ($data->status == 1) {
                $status = ' <span class="label label-success">Hiển thị</span>';
            }elseif ($data->status == 2) {
                $status = ' <span class="label label-danger">Bản nháp</span>';
            } else {
                $status = ' <span class="label label-danger">Chờ duyệt</span>';
            }
            if ($data->hot) {
                $status = $status . ' <span class="label label-success">Nổi bật</span>';
            }
            return $status;
        })->addColumn('action', function ($data) {
            return '<a href="' . route('posts.edit', ['id' => $data->id, 'type' => $data->type]) . '" title="Sửa">
                        <i class="fa fa-pencil fa-fw"></i> Sửa
                    </a> &nbsp;
                        <a href="javascript:;" class="btn-destroy"
                        data-href="' . route('posts.destroy', $data->id) . '"
                        data-toggle="modal" data-target="#confim">
                        <i class="fa fa-trash-o fa-fw"></i> Xóa</a>
                    ';
        })->rawColumns(['checkbox', 'image', 'status', 'action', 'name', 'author'])
            ->addIndexColumn()
            ->make(true);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['module'] = $this->module();
        $data['categories'] = Categories::where('type', 'post_category')->get();
        return view("backend.{$this->module()['module']}.create-edit", $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
            [
                'name'  => 'required',
                'image' => 'required',
                'type'  => 'required',
                'category' => 'required',
            ],
            [
                'name'           => 'Bạn chưa nhập tên bài viết',
                'image.required' => 'Bạn chưa chọn ảnh',
                'type'           => 'Sai định dạng.',
                'category.required' => 'Bạn chưa chọn danh mục',
            ]
        );
        if($request->time_published == 2){
            $input = @$request['time']['month'].'/'.@$request['time']['date'].'/'.@$request['time']['year'];
            $date = Carbon::createFromFormat('m/d/Y',$input)->format('Y-m-d');
        }else {
            $date = Carbon::now()->format('Y-m-d');
        }
        $input = $request->all();
        $input['hot'] = $request->hot == 1 ?? null;
        $input['published_at'] = $date;
        $input['view_count'] = 0;
        $input['slug'] = $this->createSlug(str_slug($request->name));
        $post = Posts::create($input);
        if(!empty($request->category)){
            foreach ($request->category as $item) {
                PostCategory::create(['id_category'=> $item, 'id_post'=> $post->id]);
            }
        }
        toastr()->success('Thêm mới thành công.');
        return redirect()->route('posts.index', ['type' => $request->type]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['module'] = array_merge($this->module(), [
            'action' => 'update'
        ]);
        $data['data'] = Posts::findOrFail($id);
        $data['categories'] = Categories::where('type', 'post_category')->get();

        return view("backend.{$this->module()['module']}.create-edit", $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,
            [
                'name'  => 'required',
                'type'  => 'required',
            ],
            [
                'name.required'  => 'Bạn chưa nhập tên bài viết',
                'type'           => 'Sai định dạng.',
            ]
        );
        $post = Posts::findOrFail($id);
        if($request->time_published == 2){
            $input = @$request['time']['month'].'/'.@$request['time']['date'].'/'.@$request['time']['year'];
            $date = Carbon::createFromFormat('m/d/Y',$input)->format('Y-m-d');
        }else {
            $date = $post->published_at;
        }
        $input = $request->all();
        $input['hot'] = $request->hot == 1 ?? null;
        $input['published_at'] = $date;
        $post = $post->update($input);
        if(!empty($request->category)){
            PostCategory::where('id_post', $id)->delete();
            foreach ($request->category as $item) {
                PostCategory::create(['id_category'=> $item, 'id_post'=> $id ]);
            }
        }
        toastr()->success('Cập nhật thành công.');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Posts::findOrFail($id);
        Posts::destroy($id);
        toastr()->success('Xóa thành công.');
        return redirect()->back();
    }

    public function deleteMuti(Request $request)
    {
        if ($request->has('chkItem')) {
            foreach ($request->chkItem as $id) {
                $item = Posts::findOrFail($id);
                Posts::destroy($id);
            }
            toastr()->success('Xóa thành công.');
            return redirect()->back();
        } else {
            toastr()->error('Bạn chưa chọn dữ liệu để xóa.');
            return redirect()->back();
        }
    }

    public function getAjaxSlug(Request $request)
    {
        $slug       = str_slug($request->slug);
        $id         = $request->id;
        $post       = Posts::find($id);
        $post->slug = $this->createSlug($slug, $id);
        $post->save();
        return $this->createSlug($slug, $id);
    }

    public function createSlug($slugPost, $id = null)
    {
        $slug     = $slugPost;
        $index    = 1;
        $baseSlug = $slug;
        while ($this->checkIfExistedSlug($slug, $id)) {
            $slug = $baseSlug . '-' . $index++;
        }

        if (empty($slug)) {
            $slug = time();
        }

        return $slug;
    }

    public function checkIfExistedSlug($slug, $id = null)
    {
        $type = $this->type;
        if ($id != null) {
            $count = Posts::where('type', $type)->where('id', '!=', $id)->where('slug', $slug)->count();
            return $count > 0;
        } else {
            $count = Posts::where('type', $type)->where('slug', $slug)->count();
            return $count > 0;
        }
    }
}
