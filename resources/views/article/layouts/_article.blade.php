<a href="/article/{{ $article->id }}">{{ $article->title }}</a>
<p>
	{{ substr(strip_tags($article->content),0,20) }}
</p>
<div class="btn-group pull-right">
   <span class="label label-success">最新</span>
</div>