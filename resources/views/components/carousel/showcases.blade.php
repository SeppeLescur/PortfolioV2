<div class="showcases" id="showcases-{{$key}}">
@foreach($showcases as $showcaseKey => $showcases)
    <div class='item'>
    <h1>{{$showcases['title']}}</h1>
    @foreach($showcases['svgs'] as $svg)
        <svg fill="#000000" width="100px" height="100px" viewBox="{{$svg['viewbox']}}" version="1.1" xmlns="http://www.w3.org/2000/svg">

        @if(isset($svg['ellipse']))
            @foreach($svg['ellipse'] as $ellipse)
            <ellipse fill=#FAF  {{$ellipse}}></ellipse>
            @endforeach
        @endif

        @foreach($svg['path'] as $path)
        <path fill=#FAF d='{{$path}}'></path>
        @endforeach
        </svg>
    @endforeach
    </div>
@endforeach
</div>