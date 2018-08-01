<?php namespace App\Http\Controllers;

use App\Feed;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FeedsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function all()
    {
        $feeds = Feed::orderBy('created_at', 'desc')->get();
//        $feeds = Feed::all();
        foreach ($feeds as &$feed) {
            $user = User::find($feed->user_id);
//            $image_post = 'http://127.0.0.1:8030/' . $feed->image_post;
            $image_post = 'http://192.168.0.183:8030/' . $feed->image_post;
            $feed->image_post = $image_post;
            $feed->user = $user;
            $feed->user->name = $user->name . ' ' . $user->lastname;
        }
        return response()->json(['status' => 'success', 'result' => $feeds]);
    }

    public function add(Request $request)
    {
        $user = Auth::user();
        $feed = Feed::create([
            'title' => $request->get('title'),
            'user_id' => $request->get('user_id')
        ]);

        $dest = 'feed/' . $user->id . '/post/';
        $time = microtime();
        $file = $dest . $time . '.jpg';
        $file = str_replace(' ', '', $file);
        Storage::disk('public')->put($file, file_get_contents($request->get('image_post')));

        $feed->image_post = $file;
        $feed->save();

        return response()->json(['status' => 'success', 'result' => 'success']);
    }
}
