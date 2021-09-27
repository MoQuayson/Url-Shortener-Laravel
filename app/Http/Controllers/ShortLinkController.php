<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ShortLinkController extends Controller
{
    public function index()
    {
        return view('shortlink.index',[
            'LinkDetails'=>DB::table('shortenlinks')->get()
        ]);
    }

    public function GenerateLink(Request $request)
    {
        $request->validate([
            'url'=>'required|url'
        ]);

        $url_code = Str::random(6);//random string values
        $url_link = $request->input('url');

        $query = DB::table('shortenlinks')->insert([
            'url_code'=>$url_code,
            'link'=>$url_link
        ]);

        if($query)
        {
            return back()->with('success', 'Shorten URL Generated Successfully');
        }
        else{
            return back()->with('fail', 'Something went wrong');
        }
    }

    public function ShortenLink($code)
    {
        $result = DB::table('shortenlinks')->where('url_code', $code)->first();
        return redirect($result->link);
    }
}
