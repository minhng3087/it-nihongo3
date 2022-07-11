<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CategoryMenu;
use App\Models\Menu;

class CategoryMenuController extends Controller
{
    public function getList(Request $request)
    {
    	$parent_id = $request->parent_id;
        $type = $request->type;
        $data = CategoryMenu::where('parent_id', $parent_id)->whereType($type)->orderBy('position', 'asc')->get();
    	return view('backend.menu-category.create-edit', compact('data'));
    }


    public function postAddItem(Request $request)
    {
        $input = $request->all();
        $input['position'] = 0;
        CategoryMenu::create($input);
        toastr()->success('Thêm mới thành công.');
        return back();
    }

    public function postUpdateMenu(Request $request)
    {
        $jsonMenu = json_decode($request->jsonMenu);
        $this->saveMenu($jsonMenu);
        if (!$request->ajax()) {
            toastr()->success('Cập nhật thành công. ');
            return back();
        }
    }
    public function saveMenu($jsonMenu)
    {
        $count = 0;
        foreach ($jsonMenu as $item) {
            $menu = CategoryMenu::find($item->id);
            if ($menu) {
                $menu->position  = $count;
                $menu->save();
                if (!empty($item->children)) {
                    $this->saveMenu($item->children, $menu->id);
                }
            }
            $count++;
        }
    }


    public function getDelete($id)
    {
        CategoryMenu::destroy($id);
        toastr()->success('Xóa thành công');
        return back();
    }


    public function getEditItem($id)
    {
        $menu = CategoryMenu::find($id);
        if(isset($menu)) {
            $data = [
                'status' => 'success',
                'data' => $menu
            ];
        }else {
            $data = [
                'status' => 'error',
            ];
        }
        return response()->json($data);
    }


    public function postEditItem(Request $request)
    {
        $input = $request->all();
        CategoryMenu::findOrFail($request->id)->update($input);
        toastr()->success('Cập nhật thành công.');
        return back();
    }



}
