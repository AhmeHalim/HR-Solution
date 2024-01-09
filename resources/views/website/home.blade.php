@extends('layouts.app')
@section('meta')
    @php echo $metatags @endphp

    @php echo $schema @endphp
@endsection

@section('content')

    @include('website.home-partials.slider')

    @include('website.home-partials.search')
    
    @include('website.home-partials.categories')
    
    @include('website.home-partials.services')
    
    @include('website.home-partials.recommended_projects')

    @include('website.home-partials.brands')

    @include('website.home-partials.contact_form')

    @include('website.home-partials.blogs')

@endsection

@section('script')
    @if(count($projects) > 0)
        <script>
            $(document).ready(function () {
                if ($('.price-range-slider').length) {
                    var priceSlider = $(".price-range-slider");

                    priceSlider.slider({
                        range: true,
                        min: {{$projects->min('price')}},
                        max: {{$projects->max('price')}},
                        values: [{{$projects->min('price')}}, {{$projects->max('price')}}],
                        slide: function (event, ui) {
                            $("input.property-amount").val(" {{trans('home.from')}} : " + ui.values[0] + " {{trans('home.LE - To')}} : " + ui.values[1] + " {{trans('home.LE')}} ");
                            priceSlider.parent().find('.from').val(ui.values[0]);
                            priceSlider.parent().find('.to').val(ui.values[1]);
                        }
                    });
                    
                    $("input.property-amount").val(" {{trans('home.from')}} : " + priceSlider.slider("values", 0) + " {{trans('home.LE - To')}} : " + priceSlider.slider("values", 1) + " {{trans('home.LE')}} ");
                }
            });
        </script>
    @endif

    @if(Session::has('contact_message'))
        <script>
            $.alert({
                title: "{{trans('home.contact_us')}}",
                content: "{{Session::get('contact_message')}}",
                buttons: {
                    ok: {
                        text: "{{trans('home.OK')}}",
                        btnClass: 'btn main-btn',
                    },
                },
                columnClass: 'col-md-6'
            });
        </script>
    @endif
    @php
        Session::forget('contact_message')
    @endphp
@endsection    