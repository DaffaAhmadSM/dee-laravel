<?php

namespace App\Http\Controllers;

use App\Models\Suggestion;
use App\Models\SuggestionDislike;
use App\Models\SuggestionLike;
use Illuminate\Http\Request;

class SuggestController extends Controller
{
    public function index()
    {
        $suggest = Suggestion::with('user')->with(['suggestionLike' => function($query){
            $query->where('user_id', auth()->user()->id);
        }])->withCount('suggestionLike')->with(['suggestionDislike' => function($query){
            $query->where('user_id', auth()->user()->id);
        }])->withCount('suggestionDislike')->with('replies.user')->where('reply_id', null)->orderBy('created_at', 'desc')->get();
        // return json_encode($suggest);
        return view('suggest',[
            'active' => 'suggestion',
            'suggestions' => $suggest,
            'title' => 'suggestion'
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'suggest' => 'required'
        ]);

        $suggest = Suggestion::create([
            'suggest' => $request->suggest,
            'user_id' => auth()->user()->id
        ]);

        return redirect('/suggestion')->with('success', 'Terima kasih atas saran anda');
    }

    public function destroy($id)
    {
        $suggest = Suggestion::find($id);
        $suggest->delete();

        return redirect('/suggest')->with('success', 'Saran berhasil dihapus');
    }

    public function like($id)
    {
        try{
            $suggest = SuggestionLike::create([
                'user_id' => auth()->user()->id,
                'suggestion_id' => $id,
                'like' => true
            ]);
            // check if dislike exist
            $dislike = SuggestionDislike::where('user_id', auth()->user()->id)->where('suggestion_id', $id)->where('dislike', true)->first();
            if ($dislike) {
                $dislike->delete();
            }
        } catch (\Exception $e) {
            return redirect('/suggestion')->with('error', 'like gagal');
        }

        return redirect('/suggestion')->with('success', 'like berhasil');
    }

    public function unlike($id)
    {
        try{
            $suggest = SuggestionLike::where('user_id', auth()->user()->id)->where('suggestion_id', $id)->where('like', true)->first();
            $suggest->delete();
        } catch (\Exception $e) {
            return redirect('/suggestion')->with('error', 'unlike gagal');
        }

        return redirect('/suggestion')->with('success', 'unlike berhasil');
    }

    public function dislike($id)
    {
        try{
            $suggest = SuggestionDislike::create([
                'user_id' => auth()->user()->id,
                'suggestion_id' => $id,
                'dislike' => true
            ]);
            // check if like exist
            $like = SuggestionLike::where('user_id', auth()->user()->id)->where('suggestion_id', $id)->where('like', true)->first();
            if ($like) {
                $like->delete();
            }
        } catch (\Exception $e) {
            return redirect('/suggestion')->with('error', 'dislike gagal');
        }

        return redirect('/suggestion')->with('success', 'dislike berhasil');
    }

    public function undislike($id)
    {
        try{
            $suggest = SuggestionDislike::where('user_id', auth()->user()->id)->where('suggestion_id', $id)->where('dislike', true)->first();
            $suggest->delete();
        } catch (\Exception $e) {
            return redirect('/suggestion')->with('error', 'undislike gagal');
        }

        return redirect('/suggestion')->with('success', 'undislike berhasil');
    }

    public function reply(Request $request, $id)
    {
        $this->validate($request, [
            'reply' => 'required'
        ]);

        $suggest = Suggestion::create([
            'suggest' => $request->reply,
            'user_id' => auth()->user()->id,
            'reply_id' => $id
        ]);

        return redirect('/suggestion')->with('success', 'Terima kasih atas saran anda');
    }


}
