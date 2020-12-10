@extends('dashboard.layouts')
@section('content')
<!-- Page Content -->
<div class="container">

    <!-- Portfolio Item Heading -->

    @foreach($medicine as $med)
    <h1 class="my-4">
        {{$med->name}}
    </h1>
    <!-- Portfolio Item Row -->
    <div class="row">

        <div class="col-md-8">
            <img class="img-fluid" src="/medicinePictures/{{$med->picture}}" alt="">
        </div>

        <div class="col-md-4">
            <h3 class="my-3">Project Description</h3>
            <p>{{$med->description}}</p>
            <h3 class="my-3">Project Details</h3>
            <ul>
                <li>Quantity: {{$med->qty}}</li>
                <li>Country: {{$med->origin}}</li>
                <li>Status: {{$med->status == 1 ? "Active" : "Pending"}}</li>
            </ul>
        </div>

    </div>
    @endforeach
    <!-- /.row -->

    <!-- Related Projects Row -->
    <h3 class="my-4">Other Products</h3>

    <div class="row">
        @foreach($medicines as $meds)
        <div class="col-md-3 col-sm-6 mb-4">
            <a href="/medDetails/{{$meds->id}}">
                <img class="img-fluid" src="/medicinePictures/{{$meds->picture}}" style="min-height: 100px;max-height: 100px;" alt="">
            </a>
            <h4>{{$meds->name}}</h4>
            <h6>{{$meds->qty}}</h6>
        </div>
        @endforeach

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->
@endsection