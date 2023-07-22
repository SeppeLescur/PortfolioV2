<!--  -->
<div class="title-section">
        <h2>{{$titleSection['title']}}</h2>

    @if(isset($titleSection['content']))
        <p>{{$titleSection['content']}}</p>
    @endif
    
    @if(isset($titleSection['img']))
        <img src={{$titleSection['img']}}/>
    @endif
    
    <a class='more' href='#articles-{{$key}}' onclick="clearInterval(autoscroll)">« View more »</a>
</div>