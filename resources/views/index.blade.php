@extends('layouts.app')

@section('content')
<!-- Masthead -->
@include('inc.messages')
<header class="masthead text-white text-center">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-9 mx-auto">
                <h1 class="mb-5">Welcome to IM (Inventory Medicine)</h1>
                <h4 class="mb-5">Browse all the medicines</h4>
            </div>
            <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
                <form>
                    <div class="form-row">
                        <div class="col-12 col-md-9 mb-2 mb-md-0">
                            <input type="email" class="form-control form-control-lg" placeholder="Enter a product...">
                        </div>
                        <div class="col-12 col-md-3">
                            <button type="submit" class="btn btn-block btn-lg btn-primary">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</header>

<!-- Testimonials -->
<section class="testimonials bg-light">
    <div class="container">
        <h2 class="mb-5">{{count($medicines)}} Drug(s)</h2>
        <div class="row">
            @foreach($medicines as $med)
            <div class="col-lg-4 mabo32">
                <div class="card" style="width: 22rem;">
                    <img class="card-img-top" src="/medicinePictures/{{$med->picture}}" alt="Card image cap" style="min-height: 350px;max-height: 350px">
                    <div class="card-body">
                        <h5 class="card-title">{{$med->name}}</h5>
                        <p class="card-text">{{ \Illuminate\Support\Str::limit($med->description, 50, $end='...') }}</p>
                        <div class="input-group mb-3">
                            <input type="number" value="{{$med->qty}}" class="form-control" placeholder="Qty" aria-label="Recipient's username" aria-describedby="basic-addon2" disabled>
                            <div class="input-group-append">
                                <a href="/medDetails/{{$med->id}}" class="btn btn-primary" type="button">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection