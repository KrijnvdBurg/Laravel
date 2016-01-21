<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\ArticleRequest;
use App\Article;
use App\Tag;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;

class ArticlesController extends Controller {

	public function __construct(){
		$this->middleware('auth' , ['only' => 'create', 'only'=> 'edit']);
	}

	public function index(){
		$articles = Article::orderBy('published_at', 'DESC')->orderBy('id', 'DESC')->latest('published_at')->get();
		$latest = Article::latest()->first();
		return view('articles.index', compact('articles', 'latest'));
	}

	public function show(Article $article){
		return view('articles.show', compact('article'));
	}

	public function create(){
		$tags = Tag::lists('name', 'id');
		return view('articles.create', compact('tags'));
	}

	public function store(ArticleRequest $request){
		$this->createArticle($request);
		flash('Your article has been created')->important();
		return redirect('Articles');
	}

	public function edit(Article $article){
		$tags = Tag::lists('name', 'id');
		return view('articles.edit', compact('article', 'tags'));
	}

	public function update(Article $article, ArticleRequest $request){
		$article->update($request->all()); 
		$this->syncTags($article, $request->input('tag_list'));
		return redirect('Articles');
	}

	private function createArticle(ArticleRequest $request){
		$article = Auth::user()->articles()->create($request->all());
		$this->syncTags($article, $request->input('tag_list'));
		return $article;
	}

	private function syncTags(Article $article, array $tags){
		$article->tags()->sync($tags);
	}

}
