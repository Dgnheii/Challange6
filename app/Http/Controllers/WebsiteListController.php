<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\WebStatus;
use App\User;
use App\Post;
use File;
use App\Imports\WebsiteImport;
use Excel;
use MongoDB\Client;
use Auth;
use App\Traits\WebsiteStatus;

require_once "C:/VertrigoServ/www/blog/vendor/autoload.php";

class WebsiteListController extends Controller
{
    use WebsiteStatus;
    public function index()
    {
        return view('website.websiteList');
    }

    public function importForm()
    {
        return view('website.websiteList');
    }

    public function uploadFile(Request $request) {
        WebsiteStatus::uploadFile($request);
        return back();
    }

    public function viewFile()
    {
        $user = Auth::user();
        $collection = WebStatus::all();
        return view('website.viewFile', ['websites'=>$collection]);
    }

    public function myFile()
    {
        $user = Auth::user();
        if($user->admin == 1){
            $collection = WebStatus::all();
        }
        else{
            $collection = WebStatus::where('user_id', '=', $user->id)->get();
        }
        return view('website.myFile', ['websites'=>$collection, 'userID'=>$user->id]);
    }

    public function EditWeb($id, User $user)
    {
        $collection = WebStatus::find($id);
        return view('website.editWeb', ['website'=>$collection]);
    }

    public function updateWebsite(Request $request)
    {
        WebsiteStatus::updateWebsite($request);
        return view('website.viewFile')->with('message', 'Website Updated Successfully.');
    }

    public function deleteWeb($id)
    {
        $collection = WebStatus::find($id);
            $collection->delete();
            return back()->with('message', 'Website Deleted Successfully.');
    }

    // public function __construct() {
    //     $this->middleware('auth');
    // }
}
