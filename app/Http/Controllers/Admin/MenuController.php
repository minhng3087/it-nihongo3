<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\MenuGroup;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function getListMenu()
    {
       $data = MenuGroup::all();
       return view('backend.menu.list-group', compact('data'));
    }

    public function getEditMenu($id)
    {
        $data = Menu::where('id_group', $id)->orderBy('position')->get();
        return view('backend.menu.menu-edit', compact('id', 'data'));
    }

    public function postAddItem(Request $request, $id)
    {
        $input = $request->all();
        $input['id_group'] = $id;
        $input['position'] = 0;
        Menu::create($input);
        toastr()->success('Thêm mới thành công.');
        return back();

    }

    public function postUpdateMenu(Request $request)
    {
        $jsonMenu = json_decode($request->jsonMenu);
        $this->saveMenu($jsonMenu);
        if (!$request->ajax()) {
            toastr()->success('Cập nhật thành công.');
            return back();
        }
    }

    public function saveMenu($jsonMenu, $parent_id = null)
    {
        $count = 0;
        foreach ($jsonMenu as $item) {
            $menu = Menu::find($item->id);
            if ($menu) {
                $menu->position  = $count;
                $menu->parent_id = $parent_id;
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
        Menu::destroy($id);
        toastr()->success('Xóa thành công.');
        return back();
    }

    public function postEditItem(Request $request)
    {
        $input = $request->all();
        Menu::findOrFail($request->id)->update($input);
        toastr()->success('Cập nhật thành công.');
        return back();
    }
    
    public function getEditItem($id)
    {
        $menu = Menu::find($id);
        if (isset($menu)) {
            $data = [
                'status' => 'success',
                'data'   => $menu,
            ];
        } else {
            $data = [
                'status' => 'error',
            ];
        }
        return response()->json($data);

    }
}
