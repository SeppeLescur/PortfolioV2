<div class="articles" id="articles-{{$key}}">
@foreach($articles as $articleKey => $article)
    <article>
        @if(isset($article['title']))
        <h1>{{$article['title']}}</h1>
        @endif
        @if(isset($article['content']))
        <div>{{$article['content']}}</div>
        @endif
        @if(isset($article['link']))
        <cite><a href="{{$article['link']}}" target="_blank">{{$article['link']}}</a></cite>
        @endif
    </article>
@endforeach
</div>