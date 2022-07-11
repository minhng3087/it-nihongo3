<?php 
namespace App\Http\Controllers\Admin;
//use App\Http\Requests;
use App\Http\Requests\ProductRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Products;
use App\Images;
use Input, File;
use Validator;
use Auth;
class IndexController extends Controller
{
    public function getIndex()
    {
        return view('backend.index');
    }

    public function getLayOut(Request $request) {
        $index = $request->index;
    	$type = $request->type;
    	if(view()->exists('backend.repeater.row-'.$type)){
		    return view('backend.repeater.row-'.$type, compact('index'))->render();
		}
		return '404';

    }
}
