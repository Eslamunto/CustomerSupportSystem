<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;


use App\SocialProvider as SocialProvider;
use App\Status as Status;
use App\Priority as Priority;
use Illuminate\Support\Facades\Input;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $twitter_account = SocialProvider::where('provider', 'twitter')->get()->first();
        $statuses = Status::all();
        $priorities = Priority::all();

        return view('admin.adminSettings', compact('twitter_account', 'statuses', 'priorities'));
    }

    public function uploadLogo(Request $request) {
        $destinationPath = '/var/www/CustomerSupportSystem/backend/public/dist/img/';
        $fileName = 'logo.png';
//        dd(Input::get('fileToUpload'));
        if ($request->hasFile('fileToUpload')) {

            $request->file('fileToUpload')->move($destinationPath, $fileName);
            echo 'File copied successfully';
        }

        else {
            echo "Something went wrong with uploading the file";
        }

    }
}
