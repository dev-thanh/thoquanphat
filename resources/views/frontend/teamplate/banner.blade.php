<section class="slide__banner">
    <div class="slick__banner">
    	@foreach($slider as $item)
        <div class="slide__item">
            <a href="https://google.com" class="frame">
            <img class="frame--image" data-lazy="{{url('/')}}/{{ $item->image }}" />
            </a>
        </div>
        @endforeach
        <!-- <div class="slide__item">
            <a href="https://google.com" class="frame">
            <img class="frame--image" data-lazy="images/slide__1.jpg" />
            </a>
        </div>
        <div class="slide__item">
            <a href="https://google.com" class="frame">
            <img class="frame--image" data-lazy="images/slide__1.jpg" />
            </a>
        </div> -->
    </div>
</section>