<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Layout with Bootstrap</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom CSS for styling */
        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .search-bar {
            flex: 1;
            margin-right: 20px;
            position: relative;
        }

        .heading_container {
            text-align: right;
            flex: 1;
        }

        .heading_container .heading {
            margin: 0;
            font-size: 1.5rem;
            color: #333;
        }

        .content-row {
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }

        .slider-container, .scrollable-content {
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
            width: 100%;
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
            display: flex;
            align-items: center;
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
            margin-top: 20px;
        }

        .pagination button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .pagination button:hover {
            background-color: #0056b3;
        }

        .category-label {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 4px;
            background-color: #007bff;
            color: #fff;
            font-size: 0.8rem;
        }

        .search-results {
            position: absolute;
            top: calc(100% + 5px);
            left: 0;
            width: 100%;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            z-index: 1;
            display: none;
        }

        .search-results div {
            padding: 10px;
            cursor: pointer;
            text-align: left;
        }

        .search-results div:hover {
            background-color: #f1f1f1;
        }

        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                align-items: stretch;
            }

            .heading_container .heading {
                text-align: center;
            }

            .search-bar {
                margin-right: 0;
                margin-bottom: 10px;
            }

            .content-row {
                flex-direction: column;
            }

            .articles {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 576px) {
            .articles {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="search-bar">
                <input type="text" class="form-control" id="search-input" placeholder="Search...">
                <div class="search-results" id="search-results"></div>
            </div>
            <div class="heading_container">
                <h1 class="heading">Your Heading</h1>
            </div>
        </div>

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
                    <img src="{{ asset('storage/informations/' . $health_information->image) }}" alt="{{ $health_information->title }}">
                    <div>
                        <h3>{{ $health_information->title }}</h3>
                        <p>{{ $health_information->description }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="articles">
            @foreach ($health_informations as $health_information)
            <div class="article">
                <a href="{{ url('health-information/' . $health_information->id) }}">
                    <img src="{{ asset('storage/informations/' . $health_information->image) }}" alt="Article Image">
                    <div class="article-content">
                        <h2>{{ $health_information->title }}</h2>
                        <p>{{ $health_information->description }}</p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>

        <div class="pagination">
            <button class="btn btn-primary">1</button>
        </div>
    </div>

    <!-- Bootstrap JS dan jQuery (jika diperlukan) -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // JavaScript untuk slider otomatis
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

        setInterval(nextSlide, 3000); // Ganti slide setiap 3 detik

        $('#search-input').on('input', function() {
            let query = $(this).val();

            if (query.length > 0) {
                $.ajax({
                    url: '{{ route('search') }}',
                    method: 'GET',
                    data: { query: query },
                    success: function(data) {
                        let searchResults = $('#search-results');
                        searchResults.empty();

                        if (data.length > 0) {
                            data.forEach(item => {
                                searchResults.append(`
                                    <div>
                                        <a href="{{ url('health-information/') }}/${item.id}">${item.title}</a>
                                    </div>
                                `);
                            });
                            searchResults.show();
                        } else {
                            searchResults.append('<div>No results found</div>');
                            searchResults.show();
                        }
                    }
                });
            } else {
                $('#search-results').hide();
            }
        });
    </script>
</body>
</html>
