<div class="carousel" >
    @if(!empty($slides))
        @foreach($slides as $key => $slide)
        <div class="slide" id='slide-{{$key}}'>
            <div class="slide-content" >
                
                @if(isset($slide['titleSection']))
                    @include('components.carousel.title',['titleSection'=>$slide['titleSection']])
                @endif

                @if(isset($slide['form']))
                    @include('components.carousel.form',['form'=>$slide['form']])
                @endif

                @if(isset($slide['showcases']))
                    @include('components.carousel.showcases',['showcases'=>$slide['showcases']])
                @endif
                
                @if(isset($slide['articles']))
                    @include('components.carousel.articles',['articles'=>$slide['articles']])
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
            }
        }
        makeScrollList(sections);

        let slides = document.getElementsByClassName('slide-content');
        var slidesArray = Array.from(slides);
        slidesArray.forEach(slide => {
            
            slide.addEventListener("scroll", function() {
                console.log('scrolling');
                clearInterval(autoscroll)
            })
        });
    </script>
</div>