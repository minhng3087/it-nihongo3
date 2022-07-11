<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pages;

class PagesController extends Controller
{
   	public function getListPages()
	{
		$data = Pages::orderBy('created_at', 'DESC')->get();
		return view('backend.pages.list', compact('data'));
	}

	public function postCreatePages(Request $request)
	{
		$input = $request->all();
		Pages::create($input);		
        toastr()->success('Thêm mới thành công.');
		return redirect()->back();
	}



    public function getBuildPages(Request $request)
    {
    	$type = $request->page;
    	$data = Pages::where('type', $type)->firstOrFail();
        if(view()->exists('backend.pages.layout.'.$type)){
            return view('backend.pages.layout.'.$type, compact('data'));
        }
    	return view('backend.pages.layout.default', compact('data'));
    }

    public function postBuildPages(Request $request)
    {
		$type = $request->page;
    	$data = Pages::where('type', $type)->firstOrFail();
    	$data->content = !empty($request->content) ? json_encode($request->content) : null;
    	$data->image = $request->image;
        $data->banner = $request->banner;
    	$data->save();
		toastr()->success('Thêm mới thành công.');
    	return back();
    }
}
