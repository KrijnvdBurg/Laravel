<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Article extends Model {

	protected $fillable = [
		'title',
		'body',
		'excerpt',
		'published_at'
	];

	public static function date_locker($published_at){
		if($published_at >= Carbon::now()){
			return 'locked';
		}
		else{
			return 'open';
		}
	}

	public static function ahref_locker($article){
		if($article->published_at >= Carbon::now()){
			return $article->title . '<span class="article_lockedSpan">Publishes: ' . $article->published_at->format('Y-m-d') . '</span>';
		}
		else{
			return '<a href="Articles/'. $article->id . '">'.$article->title.'</a>';
		}
	}


	public function scopeLatestArticles($query){
		$query->where('published_at', '<=', Carbon::now());
	}

	public function scopePublished($query){
		$query->where('published_at', '<=', Carbon::now());
	}

	public function scopeUnPublished($query){
		$query->where('published_at', '>=', Carbon::now());
	}

	public function setPublishedAtAttribute($date){
		$this->attributes['published_at'] = Carbon::parse($date);
	}

	public function getPublishedAtAttribute($date){
		return new Carbon($date);
	}

	public function user(){
		return $this->belongsTo('App\User');
	}

	public function tags(){
		return $this->belongsToMany('App\Tag')->withTimestamps();
	}

	public function getTagListAttribute(){
		return $this->tags->lists('id');
	}

	
}
