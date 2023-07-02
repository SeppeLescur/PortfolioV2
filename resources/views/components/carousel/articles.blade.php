<div class="articles" id="articles-{{$key}}">
@foreach($articles as $articleKey => $article)
    <article>
        <h1>{{$article['title']}}</h1>
        <div>{{$article['content']}}</div>
    </article>
@endforeach
</div>