@extends('dashboard.layouts')
@section('content')
<div class="container-fluid">

    <h1 class="mt-4 mabo64">Content</h1>
    <div class="row mt-4">

        <div class="col-12 col-md-8">
            @foreach($content as $cont)
            <h1 class="my-4">
                {{$cont->name}}
            </h1>
            <!-- Portfolio Item Row -->
            <div class="row">

                <div class="col-md-8">
                    <h3 class="my-3">Project Description</h3>
                    <p>{{$cont->description}}</p>
                    <h3 class="my-3">Content</h3>
                    <div>
                        {!! $cont->content !!}
                    </div>

                    <p><a href="/contentFiles/{{$cont->file}}">Download Content</a></p>
                    <p>
                        <iframe width="560" height="315" src="{{$cont->link1}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </p>
                    <p>
                        <iframe width="560" height="315" src="{{$cont->link2}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </p>
                </div>



            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection