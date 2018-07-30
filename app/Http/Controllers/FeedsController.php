<?php namespace App\Http\Controllers;

use App\Feed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FeedsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
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

//        $feed->image_post = $file;
//        $feed->save();

        return response()->json(['status' => 'success', 'result' => 'success']);
    }
}
