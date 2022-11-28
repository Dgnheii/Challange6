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

require_once "C:/VertrigoServ/www/blog/vendor/autoload.php";

class WebsiteListController extends Controller
{
    public function index()
    {
        return view('website.websiteList');
    }

    public function importForm()
    {
        return view('website.websiteList');
    }

    public function uploadFile(Request $request) {
        $user = Auth::user();
        $file = $request->file('file');
        $filename = $file->getClientOriginalName();
        $file->storeAs('\public\websiteUpload', time().'.'.$filename);
        $data = File::get(storage_path('app\public\websiteUpload\\'.time().'.'.$filename));
        $hosts = @fopen(storage_path('app\public\websiteUpload\\'.time().'.'.$filename), 'r');
        while (!feof($hosts)) {
            $host = fgets($hosts);
            $data2 = new WebStatus;
            $data2->user_id = $user->id;
            $host = trim($host);
            $data2->website = $host;
            $replace = ['http://', 'https://', 'www.', '/', ':', '\n'];
            $host = str_replace($replace, '', $host);
            if (!empty($host)) {
                $ipl = gethostbynamel($host);
                $datastatus = array();
                $ip = array();
                $ip = "not found";
                if ($ipl) {
                    foreach ($ipl as $ip) {
                        $ipexplode = explode('.', $ip)[0];
                        if ($ipexplode !== '127' && $ipexplode !== '0') {
                            $data2->ip = $ip;
                            exec("ping -n 4 " . $ip, $output, $status);
                            // $ip = str_replace('.', '-', $ip);
                            if ($status === 0) {
                                $datastatus = 'active';
                                exec("nmap -F ".$ip, $outputnmap, $status);
                                $port = "";
                                // echo var_dump($outputnmap);
                                foreach ($outputnmap as $line) {
                                    // echo $outputnmap;
                                    if (strpos($line, 'open') !== false) {
                                        $a = explode('/', $line);
                                        $port .= $a[0]." ";
                                    }
                                }
                                $data2->port = $port;
                            } else {
                                $datastatus = 'inactive';
                                $port = array();
                                array_push($port, "null");
                            }
                            unset($outputnmap);
                        }
                    }
                } else {
                    $data['port'][$ip] = array();
                    $datastatus = 'inactive';
                    array_push($data['ip'][$host], "not found");
                    array_push($data['port'][$ip], "null");
                }
            }
            
            $data2->status = $datastatus;
            $data2->save();
        }
            
        return back();
    }

    public function viewFile()
    {      
        $user = Auth::user();
        $collection = WebStatus::all();
        // foreach($collection as $col){
        //     return view('website.viewFile', ['website'=>$col->website, 'status'=>$col->status, 'ip'=>$col->ip, 'port'=>$col->port]);
        // }
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
        
        // foreach($collection as $col){
        //     return view('website.viewFile', ['website'=>$col->website, 'status'=>$col->status, 'ip'=>$col->ip, 'port'=>$col->port]);
        // }
        return view('website.myFile', ['websites'=>$collection, 'userID'=>$user->id]);
    }
   
    public function deleteFile($filename, User $user)
    {
        if(is_file(storage_path('app\public\websiteUpload\\'.$filename)))
        {
            unlink(storage_path('app\public\websiteUpload\\'.$filename));
            return back()->with('message', 'File Deleted Successfully.');
        }
        else {
            return back()->with('message', 'File does not exist.');
        }
    }

    public function EditWeb($id, User $user)
    {
        
        $collection = WebStatus::find($id);
        return view('website.editWeb', ['website'=>$collection]);
    }

    public function updateWebsite(Request $request)
    {
        $collection = WebStatus::find($id);
            $request->website = $collection->website;
            $request->status = $collection->status;
            $request->ip = $collection->ip;
            $request->port = $collection->port;
            $collection->save();
            return view('website.viewFile')->with('message', 'Website Updated Successfully.');
    }

    public function deleteWeb($id)
    {
        $collection = WebStatus::find($id);
            $collection->delete();
            return back()->with('message', 'Website Deleted Successfully.');
    }

    public function __construct() {
        $this->middleware('auth');
    }
}
