@extends('dashboard.layouts')
@section('content')
<div class="container-fluid">

    <h1 class="mt-4 mabo64">Content</h1>
    <div class="row mt-4">
        @if(Auth::user()->role == 99)
        <div class="col-12 col-md-6">
            <form class="px-4 py-3" action="/addContent" method="POST" enctype="multipart/form-data">
                @csrf
                @include('inc.messages')
                <div class="form-group">
                    <label for="exampleDropdownFormEmail1">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleDropdownFormEmail1" placeholder="Week 1">
                </div>
                <div class="form-group">
                    <label for="exampleDropdownFormPassword1">Description</label>
                    <textarea name="desc" id="" cols="30" rows="5" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleDropdownFormEmail1">Content</label>
                    <textarea class="ckeditor form-control" name="content"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleDropdownFormEmail1">File</label>
                    <input type="file" name="file" class="form-control" id="exampleDropdownFormEmail1">
                </div>
                <div class="form-group">
                    <label for="exampleDropdownFormEmail1">Link 1</label>
                    <input type="url" name="link1" class="form-control" id="exampleDropdownFormEmail1">
                </div>
                <div class="form-group">
                    <label for="exampleDropdownFormEmail1">Link 2</label>
                    <input type="url" name="link2" class="form-control" id="exampleDropdownFormEmail1">
                </div>
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </form>
        </div>
        @endif
        <div class="col-12 col-md-6">
            <h3>{{count($contents)}} Content(s)</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Link 1</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contents as $cont)
                    <tr>
                        <th scope="row">{{$loop->index + 1}}</th>
                        <td>{{$cont->name}}</td>
                        <td>{{$cont->description}}</td>
                        <td>{{$cont->link1}}</td>
                        <td>{{$cont->status == 1 ? "Active" : "Pending"}}</td>
                        <td>

                            @if(Auth::user()->role == 99)
                            <a href="/contentDetails/{{$cont->id}}" class="material-icons" style="font-size: 14px">remove_red_eye</a>
                            @if($cont->status == 1)
                            <a href="/contentPending/{{$cont->id}}" class="material-icons" style="font-size: 14px">pause</a>
                            @else
                            <a href="/contentPlay/{{$cont->id}}" class="material-icons" style="font-size: 14px">play_arrow</a>
                            @endif
                            <a href="/contentDelete/{{$cont->id}}" class="material-icons" style="font-size: 14px">delete</a>
                            </span>
                            @else
                            <a href="/contentDetails/{{$cont->id}}" class="material-icons" style="font-size: 14px">remove_red_eye</a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection