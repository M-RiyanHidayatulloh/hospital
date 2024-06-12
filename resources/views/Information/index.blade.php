@include('home.css')
@include('home.header')

<head>
    <style>
        .search-bar {
            margin: 20px auto;
            text-align: center;
        }
        .search-bar input[type="text"] {
            padding: 10px;
            width: 80%;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .slider-container {
            width: 80%;
            margin: 20px auto;
            display: flex;
            border: 1px solid #ddd;
            border-radius: 4px;
            overflow: hidden;
        }
        .auto-slider {
            flex: 1;
            position: relative;
            overflow: hidden;
        }
        .slides {
            display: flex;
            transition: 0.5s;
        }
        .slides img {
            width: 100%;
        }
        .scrollable-content {
            flex: 1;
            overflow-y: auto;
            height: 300px;
            padding: 10px;
            box-sizing: border-box;
        }
        .scrollable-content .article {
            display: flex;
            border-bottom: 1px solid #ddd;
            padding: 10px 0;
            align-items: center;
        }
        .scrollable-content .article img {
            width: 50px;
            height: 50px;
            border-radius: 8px;
            margin-right: 20px;
        }
        .scrollable-content .article h3 {
            margin: 0;
            font-size: 1em;
        }
        .scrollable-content .article p {
            margin: 5px 0 0 0;
            color: #555;
        }
        .articles {
            width: 80%;
            margin: 20px auto;
        }
        .articles .article {
            display: flex;
            border-bottom: 1px solid #ddd;
            padding: 10px 0;
            align-items: center;
        }
        .articles .article img {
            width: 100px;
            height: 100px;
            border-radius: 8px;
            margin-right: 20px;
        }
        .articles .article h2 {
            margin: 0;
            font-size: 1.2em;
        }
        .articles .article p {
            margin: 5px 0 0 0;
            color: #555;
        }
    </style>
</head>
{{-- <body>
    <div class="search-bar">
        <input type="text" placeholder="Cari artikel kesehatan...">
    </div>

    <div class="slider-container">
        <div class="auto-slider">
            <div class="slides">
                <img src="https://via.placeholder.com/800x300?text=Artikel+Populer+1" alt="Artikel Populer 1">
                <img src="https://via.placeholder.com/800x300?text=Artikel+Populer+2" alt="Artikel Populer 2">
                <img src="https://via.placeholder.com/800x300?text=Artikel Populer 3" alt="Artikel Populer 3">
            </div>
        </div>
        <div class="scrollable-content">
            <h2>Artikel Populer</h2>
            <div class="article">
                <img src="https://via.placeholder.com/50" alt="Judul Artikel Populer 1">
                <div>
                    <h3></h3>
                    <p>Ringkasan artikel populer 1...</p>
                </div>
            </div>

            <div class="article">
                <img src="https://via.placeholder.com/50" alt="Judul Artikel Populer 2">
                <div>
                    <h3>Judul Artikel Populer 2</h3>
                    <p>Ringkasan artikel populer 2...</p>
                </div>
            </div>
            <div class="article">
                <img src="https://via.placeholder.com/50" alt="Judul Artikel Populer 3">
                <div>
                    <h3>Judul Artikel Populer 3</h3>
                    <p>Ringkasan artikel populer 3...</p>
                </div>
            </div>
            <div class="article">
                <img src="https://via.placeholder.com/50" alt="Judul Artikel Populer 4">
                <div>
                    <h3>Judul Artikel Populer 4</h3>
                    <p>Ringkasan artikel populer 4...</p>
                </div>
            </div>
        </div>
    </div>

    <div class="articles">
        @foreach ($health_informations as $health_information)
            <div class="article">
                <img src="{{ asset('storage/informations/' . $health_information->image) }}" alt="{{ $health_information->title }}">
                <div>
                    <h2>{{ $health_information->title }}</h2>
                    <p>{!!$health_information->content !!}</p>
                </div>
            </div>
        @endforeach
    </div>

    <script>
        let currentSlide = 0;
        const slides = document.querySelector('.slides');
        const slideImages = document.querySelectorAll('.slides img');

        function showNextSlide() {
            currentSlide = (currentSlide + 1) % slideImages.length;
            slides.style.transform = `translateX(-${currentSlide * 100}%)`;
        }

        setInterval(showNextSlide, 3000);
    </script>
</body> --}}

<body>
    <div class="search-bar">
        <input type="text" placeholder="Cari artikel kesehatan...">
    </div>

    <div class="slider-container">
        <div class="auto-slider">
            <div class="slides">
                @foreach ($health_informations as $health_information)
                    <img src="{{ asset('storage/informations/' . $health_information->image) }}" alt="{{ $health_information->title }}">
                @endforeach
            </div>
        </div>
        <div class="scrollable-content">
            <h2>Artikel Populer</h2>
            @foreach ($health_informations as $health_information)
                <div class="article">
                    <img src="{{ asset('storage/informations/' . $health_information->image) }}" alt="{{ $health_information->title }}">
                    <div>
                        <h3>{{ $health_information->title }}</h3>
                        <p>{{ Str::limit(strip_tags($health_information->content), 100, '...') }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="articles">
        @foreach ($health_informations as $health_information)
            <div class="article">
                <img src="{{ asset('storage/informations/' . $health_information->image) }}" alt="{{ $health_information->title }}">
                <div>
                    <h2>{{ $health_information->title }}</h2>
                    <p>{!! $health_information->content !!}</p>
                </div>
            </div>
        @endforeach
    </div>

    <script>
        let currentSlide = 0;
        const slides = document.querySelector('.slides');
        const slideImages = document.querySelectorAll('.slides img');

        function showNextSlide() {
            currentSlide = (currentSlide + 1) % slideImages.length;
            slides.style.transform = `translateX(-${currentSlide * 100}%)`;
        }

        setInterval(showNextSlide, 3000);
    </script>
</body>
</html>

@include('home.info')
@include('home.footer')
