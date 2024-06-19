{{-- <section class="book_section layout_padding">
    <div class="container">
        <div class="row">
            @auth
                @if (Auth::user()->usertype == 'user')
                    <div class="col">
                        <h4>
                            ULASANnn
                        </h4>
                        <div class="card-body">

                            @if ($message = Session::get('success'))
                                <div class="alert alert-success mt-2">
                                    {{ $message }}
                                </div>
                            @endif
                            <form action="{{ route('set-review') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="my-3 p-3 bg-body rounded shadow-sm">
                                    <div class="mb-3">
                                        <label for="name" name="user_id" id="name" class="form-label">Name</label>
                                        <div class="col-sm-11">
                                            @if (Auth::check())
                                                {{ Auth::user()->name }}
                                            @else
                                                <p>Pengguna belum terautentikasi.</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Ulasan</label>
                                        <textarea type="text" class="form-control" name="review" id="content" required></textarea>
                                        <x-input-error :messages="$errors->get('content')" class="mt-2" />
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>

                                </div>
                            </form>
                        </div>
                    </div>
                @endif
            @endauth

        </div> --}}
{{-- <div class="btn-box">
                                    <button type="submit" class="btn">Submit Now</button>
                                </div> --}}

{{-- </div>
    </div>
    </div>
    </div>
    </div>
</section> --}}
