<div class="carousel" >
    @if(!empty($slides))
        @foreach($slides as $key => $slide)
        <div class="slide" id='slide-{{$key}}'>
            <div class="slide-content" >
                @if(isset($slide['titleSection']))
                <div class="titleSection">
                    @if(isset($slide['titleSection']['title']))
                    <h2>{{$slide['titleSection']['title']}}</h2>
                    @endif

                    @if(isset($slide['titleSection']['content']))
                    <p>{{$slide['titleSection']['content']}}</p>
                    @endif
                    
                    @if(isset($slide['titleSection']['img']))
                    <img src={{$slide['titleSection']['img']}}/>
                    @endif
                </div>
                @endif

                @if(isset($slide['articles']))
                    <a href='#articles-{{$key}}' onclick="clearInterval(autoscroll)">« View more »</a>
                    <div id="articles-{{$key}}">
                    @foreach($slide['articles'] as $articleKey => $article)
                        <article>
                            <h1>{{$article['title']}}</h1>
                            <div>{{$article['content']}}</div>
                        </article>
                    @endforeach
                    </div>
                @endif

            </div>
        </div>
        @endforeach
    @else
    <div class="slide">
        <div class="slide-content">Sorry, no content found!</div>
    </div>
    @endif
    <button class="carousel-control prev" onclick="previous()"><</button>
    <button class="carousel-control next" onclick="next(); clearInterval(autoscroll)">></button>
    
    <script>
        function scrollTo(hash) {
            location.hash = "#slide-" + (hash - 1);
        }
        // CONTENT NAV BUTTONS
        let index = 1;
        let sections = document.getElementsByClassName('slide').length;
        function next() {
            index += 1;
            if (index > sections) {
                index = 1;
            }
            scrollTo(index);
        }
        function previous() {
            index -= 1;
            if (index <= 0) {
                index = sections;
            }
            scrollTo(index);
            clearInterval(autoscroll);
        }
        let autoscroll = setInterval(next,5000);
        //index buttons slide
        let scrollIndex = 0;
        let scrollSection = document.getElementsByClassName('content');
        function makeScrollList(sections) {
            while (scrollIndex < sections) {
                scrollIndex++;
                let tab = document.createElement('i');
                
                if(scrollIndex == index){
                    tab.classList.add("fa-sharp","fa-solid","fa-circle");
                }
                else{
                    tab.classList.add("fa-sharp","fa-solid", "fa-circle");
                }
                scrollSection[0].append(tab);
            }
        }
        makeScrollList(sections);
    </script>
</div>