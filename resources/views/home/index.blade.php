<!DOCTYPE html>
<html>

<head>

    @include('home.css')

</head>

<body>

    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->
        <!-- slider section -->

        @include('home.slider')
        <!-- end slider section -->
    </div>

    <!-- book section -->

    @include('home.book')

    <!-- end book section -->

    <!-- about section -->

    @include('home.about')

    <!-- end about section -->


    <!-- treatment section -->

    {{-- @include('home.treatment') --}}

    <!-- end treatment section -->

    <!-- team section -->

    @include('home.team')

    <!-- end team section -->


    <!-- client section -->
    @include('home.client')
    <!-- end client section -->

    <!-- contact section -->
    @include('home.contact')
    <!-- end contact section -->

    <!-- info section -->
    @include('home.info')
    <!-- end info_section -->


    <!-- footer section -->

    @include('home.footer')

</body>

</html>
