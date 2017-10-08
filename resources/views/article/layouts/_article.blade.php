<a href="/article/{{ $article->id }}">{{ $article->title }}</a>
	<div class="btn-group pull-right">
   <span class="label label-success">最新</span>
     </div>
<p>
	{{ str_limit(strip_tags($article->content),200) }}
</p>

<hr>