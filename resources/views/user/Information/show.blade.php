@include('home.css')
@include('home.header')

<head>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" /> --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" />
    <style>
        h1 {
            color: #025044;
        }

        .container {
            max-width: 1100px;
            margin: auto;
            padding-top: 20px;
        }

        .article-header {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
        }

        .article-image {
            max-height: 700px;
            overflow: hidden;
            border-radius: 5px;
        }


        .article-image img {
            width: 100%;
            height: auto;
        }

        .card {
            border: none;
        }

        .card-header {
            background-color: #025044;
            color: white;
            font-weight: bold;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }

        a {
            color: #ffffff;
        }

        a:hover {
            color: #0056b3;
        }


        h6 {
            color: #000000;
        }

        h6:hover {
            color: #0056b3;
        }

        #searchResults {
            display: none;
            position: absolute;
            background-color: white;
            border: 1px solid #ddd;
            width: 100%;
            z-index: 1000;
        }

        #searchResults ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        #searchResults ul li {
            padding: 10px;
            cursor: pointer;
        }

        #searchResults ul li:hover {
            background-color: #f8f9fa;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8">
                <article>
                    <header class="article-header mb-4">
                        <h1 class="fw-bolder mb-1">{{ $health_information->title }}</h1>
                        <div class="text-muted fst-italic mb-2">update {{ $health_information->created_at }}</div>
                        <a class="badge bg-secondary text-decoration-none link-light" href="#!">
                            {{ $health_information->category }}</a>
                    </header>
                    <figure class="article-image mb-4">
                        <img class="img-fluid rounded"
                            src="{{ asset('storage/informations/' . $health_information->image) }}" alt="..." />
                    </figure>
                    <section class="mb-5">
                        <p class="fs-5 mb-4">{!! $health_information->content !!}</p>
                    </section>
                </article>
            </div>
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-header">Search</div>
                    <div class="card-body position-relative">
                        <div class="input-group">
                            <input type="text" class="form-control" id="searchInput" placeholder="Search..."
                                aria-label="Enter search term..." aria-describedby="button-search" />
                            <button class="btn btn-primary" id="button-search" type="button"><i
                                    class="fas fa-search"></i> Go!</button>
                        </div>
                        <div id="searchResults"></div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">Categories</div>
                    <div class="card-body">
                        <div class="row">
                            @php
                                $half = ceil(count($health_informations) / 2);
                                $first_half = $health_informations->slice(0, $half);
                                $second_half = $health_informations->slice($half);
                            @endphp

                            <div class="col-sm-6">
                                <ul class="list-unstyled mb-0">
                                    @foreach ($first_half as $item)
                                        <li>
                                            <a href="{{ route('user.information.show', $item->id) }}">
                                                <h6>{{ $item->category }}</h6>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-sm-6">
                                <ul class="list-unstyled mb-0">
                                    @foreach ($second_half as $item)
                                        <li>
                                            <a href="{{ route('user.information.show', $item->id) }}">
                                                <h6>{{ $item->category }}</h6>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            var healthInformations = @json($health_informations);

            $('#searchInput').on('input', function() {
                var query = $(this).val().toLowerCase().trim();
                var results = [];

                if (query.length > 0) {
                    results = healthInformations.filter(function(info) {
                        return info.title.toLowerCase().includes(query);
                    });
                }

                displayResults(results);
            });

            $('#button-search').on('click', function() {
                var query = $('#searchInput').val().toLowerCase().trim();
                var results = [];

                if (query.length > 0) {
                    results = healthInformations.filter(function(info) {
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
                if (!$(event.target).closest('.card-body').length) {
                    $('#searchResults').hide();
                }
            });
        });
    </script>
</body>

</html>
@include('home.info')
@include('home.footer')
