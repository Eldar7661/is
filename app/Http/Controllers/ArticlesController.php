<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Article;
use App\Http\Requests\article\FindRequest;
use App\Http\Requests\article\CreateRequest;

class ArticlesController extends Controller
{
    public function all() {
        $articles = Article::all();

        foreach($articles as $article) {
            $article['text'] = substr($article['text'], 0, 97) . '...';
        }

        return response()->json($articles);
    }

    public function find(FindRequest $id) {
        $article = Article::find($id);

        try {
            $respons = $article[0];
        } catch (\Throwable $th) {
            $respons = [
                'title' => 'Not found article',
                'text'  => ':/'
            ];
        }
        return response()->json($respons);
    }

    public function my() {
        $article = Article::where('user_id', auth()->user()->id)->get();

        return response()->json([
            'status' => 200,
            'articles' => $article
        ]);
    }
    public function create(CreateRequest $article) {
        Article::create([
            'title' => $article['title'],
            'text'  =>  $article['text'],
            'user_id'  => $article['user_id'],
        ]);

        return $this->my();
    }

    public function edit(Request $article) {
        Article::find($article['id'])->update([
            'title' => $article['title'],
            'text'  =>  $article['text'],
        ]);

        return $this->my();
    }

    public function delete(Request $article) {

        if (Article::find($article['id'])->delete()) {
            return $this->my();
        }
    }

}
