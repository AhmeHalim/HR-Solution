@if(count($sliders) > 0)
    <!-- banner-style-two -->
    <section class="banner-style-two centred">
        <div class="banner-carousel owl-theme owl-carousel owl-nav-none">
            @foreach ($sliders as $slider)
                <div class="slide-item">
                    <div class="image-layer" style="background-image:url('{{Helper::uploadedSliderImagesPath('home-sliders',$slider->image)}}')"></div>
                    <div class="container">
                        <div class="content-box">
                            <h2>{!! $slider->title !!}</h2>
                            <p>{!!$slider->text!!}</p>
                        </div> 
                    </div>
                </div>
            @endforeach    
        </div>
    </section>
    <!-- banner-style-two end -->
@endif