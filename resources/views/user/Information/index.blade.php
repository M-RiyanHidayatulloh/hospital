@include('home.css')
@include('home.header')


<head>
    <!-- Tambahkan CSS Slick -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Tambahkan JS Slick -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

    <style>
        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .search-bar {
            margin-top: 5%;
            position: relative;
            flex: 1;
            margin-right: 20px;
        }

        .search-bar input[type="text"] {
            padding: 10px;
            width: 100%;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .search-results {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background-color: #fff;
            border: 1px solid #ccc;
            border-top: none;
            border-radius: 0 0 4px 4px;
            z-index: 1000;
            display: none;
        }

        .search-results ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .search-results li {
            padding: 10px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .search-results li:hover {
            background-color: #f0f0f0;
        }

        .content-row {
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }

        .slider-container,
        .scrollable-content {
            flex: 1;
            min-width: 300px;
            margin-right: 10px;
        }

        .slider-container {
            overflow: hidden;
        }

        .slides {
            display: flex;
            transition: transform 0.5s ease;
        }

        .slides img {
            width: 50%;
            height: auto;
            object-fit: cover;
        }

        .scrollable-content {
            height: 300px;
            overflow-y: auto;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }

        .scrollable-content .article {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .scrollable-content .article img {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 50%;
            margin-right: 10px;
        }

        .scrollable-content .article h3 {
            margin: 0;
            font-size: 1.2rem;
            color: #333;
        }

        .scrollable-content .article p {
            margin: 5px 0;
            color: #666;
        }

        .articles {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
        }

        .article {
            background-color: #f9f9f9;
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .article img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 8px 8px 0 0;
        }

        .article-content {
            padding: 10px;
        }

        .article h2 {
            margin-top: 10px;
            font-size: 1.2rem;
            color: #333;
        }

        .article-content h2 {
            margin-top: 10px;
            font-size: 1.2rem;
            color: #333;
        }

        .article p {
            margin-bottom: 0;
            color: #666;
        }

        .article:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .article a {
            color: inherit;
            text-decoration: none;
            display: block;
        }

        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 2%;
            margin-bottom: 5%;
        }

        .pagination button {
            padding: 10px 20px;
            background-color: #115739;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .pagination button:hover {
            background-color: #172e14;
        }

        .category-label {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 4px;
            background-color: #55585c;
            color: #fff;
            font-size: 0.8rem;
            margin-bottom: 10px;
        }

        h2 {
            margin-top: 4rem;
            margin-bottom: 4rem;
            font-size: 2rem;
            font-weight: bold;
            position: relative;
            display: inline-block;
        }

        h2 span {
            color: #12ba3c;
        }

        h2::after {
            content: '';
            position: absolute;
            bottom: -0.5rem;
            left: 0;
            width: 100%;
            height: 2px;
            background-color: #000;
        }

        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                align-items: stretch;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="search-bar">
                <input type="text" class="form-control" id="searchInput" placeholder="Search...">
                <div class="search-results" id="searchResults"></div>
            </div>
        </div>

        <h2 class="mt-4 mb-4">Featured <span>Health</span> Information</h2>

        <div class="content-row">
            <div class="slider-container">
                <div class="auto-slider">
                    <div class="slides">
                        @foreach ($health_informations as $health_information)
                            <img src="{{ asset('storage/informations/' . $health_information->image) }}"
                                alt="{{ $health_information->title }}">
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="scrollable-content">
                @foreach ($health_informations as $health_information)
                    <div class="article">
                        <img src="{{ asset('storage/informations/' . $health_information->image) }}"
                            alt="{{ $health_information->title }}">
                        <div>
                            <h3>{{ $health_information->title }}</h3>
                            <span class="category-label">{{ $health_information->category }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <h2 class="mt-4 mb-4">Latest <span>Health</span> Information</h2>

        <div class="articles">
            @foreach ($health_informations as $health_information)
                <div class="article">
                    <a href="{{ route('user.information.show', $health_information->id) }}">
                        <img src="{{ asset('storage/informations/' . $health_information->image) }}"
                            alt="Article Image">
                        <div class="article-content">
                            <h3>{{ $health_information->title }}</h3>
                            <span class="category-label">{{ $health_information->category }}</span>
                            <p>{!! substr($health_information->content, 0, 50) !!} {!! strlen($health_information->content) > 50 ? '...' : '' !!}</p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        <div class="pagination">
            <button class="btn btn-primary btn-prev" disabled><i class="bi bi-chevron-left"></i></button>
            <button class="btn btn-primary btn-next"><i class="bi bi-chevron-right"></i></button>
        </div>


    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> --}}
    <script>
        $(document).ready(function() {
            $('#searchInput').on('input', function() {
                var query = $(this).val().toLowerCase().trim();
                var results = [];

                if (query.length > 0) {
                    results = @json($health_informations->toArray());

                    results = results.filter(function(info) {
                        return info.title.toLowerCase().includes(query);
                    });
                }

                displayResults(results);
            });

            function displayResults(results) {
                var resultsContainer = $('#searchResults');
                resultsContainer.empty();

                if (results.length > 0) {
                    var ul = $('<ul></ul>');

                    results.forEach(function(info) {
                        var li = $('<li></li>').text(info.title);
                        li.on('click', function() {
                            window.location.href = '/information/' + info.id;
                        });
                        ul.append(li);
                    });

                    resultsContainer.append(ul);
                    resultsContainer.show();
                } else {
                    resultsContainer.hide();
                }
            }

            $(document).on('click', function(event) {
                if (!$(event.target).closest('.search-bar').length) {
                    $('#searchResults').hide();
                }
            });
        });

        let currentIndex = 0;
        const slides = document.querySelectorAll('.slides img');
        const totalSlides = slides.length;

        function showSlide(index) {
            const sliderWidth = slides[0].clientWidth;
            const offset = -sliderWidth * index;
            document.querySelector('.slides').style.transform = `translateX(${offset}px)`;
        }

        function nextSlide() {
            currentIndex = (currentIndex + 1) % totalSlides;
            showSlide(currentIndex);
        }

        setInterval(nextSlide, 3000);

        $(document).ready(function() {
            var currentPage = 1;
            var articlesPerPage = 5;
            var totalArticles = {{ $health_informations->count() }};
            var totalPages = Math.ceil(totalArticles / articlesPerPage);

            function displayArticles(page) {
                var start = (page - 1) * articlesPerPage;
                var end = start + articlesPerPage;


                $('.articles .article').hide();

                $('.articles .article').slice(start, end).fadeIn();

                $('.btn-prev').prop('disabled', page === 1);
                $('.btn-next').prop('disabled', page === totalPages);

                updatePageNumbers(page);
            }

            displayArticles(currentPage);

            function updatePageNumbers(currentPage) {
                $('.page-numbers').empty();
                var startPage = Math.max(1, currentPage - 1);
                var endPage = Math.min(totalPages, startPage + 2);

                for (var i = startPage; i <= endPage; i++) {
                    var btnClass = (i === currentPage) ? 'btn-primary active' : 'btn-secondary';
                    var btn = $('<button></button>').addClass('btn ' + btnClass).text(i);

                    btn.click(function(page) {
                        return function() {
                            currentPage = page;
                            displayArticles(currentPage);

                            $('html, body').animate({
                                scrollTop: $('.articles').offset().top
                            }, 800);
                        };
                    }(i));

                    $('.page-numbers').append(btn);
                }
            }

            $('.btn-next').click(function() {
                if (currentPage < totalPages) {
                    currentPage++;
                    displayArticles(currentPage);

                    $('html, body').animate({
                        scrollTop: $('.articles').offset().top
                    }, 800);
                }
            });

            $('.btn-prev').click(function() {
                if (currentPage > 1) {
                    currentPage--;
                    displayArticles(currentPage);

                    $('html, body').animate({
                        scrollTop: $('.articles').offset().top
                    }, 800);
                }
            });
        });
    </script>
</body>

</html>

@include('home.info')
@include('home.footer')
