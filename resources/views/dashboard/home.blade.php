@extends('dashboard.layouts')
@section('content')
<div class="container-fluid">

    <h1 class="mt-4 mabo64">Medicine</h1>
    <div class="row mt-4">

        <div class="col-12 col-md-4">
            <form class="px-4 py-3" action="/addMedicine" method="POST" enctype="multipart/form-data">
                @csrf
                @include('inc.messages')
                <div class="form-group">
                    <label for="exampleDropdownFormEmail1">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleDropdownFormEmail1" placeholder="Acetaminophen">
                </div>
                <div class="form-group">
                    <label for="exampleDropdownFormPassword1">Quantity</label>
                    <input type="number" name="qty" class="form-control" id="exampleDropdownFormPassword1" min="1" placeholder="15">
                </div>
                <div class="form-group">
                    <label for="exampleDropdownFormPassword1">Description</label>
                    <textarea name="desc" id="" cols="30" rows="5" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleDropdownFormEmail1">Origin</label>
                    <input type="text" name="origin" class="form-control" id="exampleDropdownFormEmail1" placeholder="Pakistan">
                </div>
                <div class="form-group">
                    <label for="exampleDropdownFormEmail1">Picture</label>
                    <input type="file" name="pic" class="form-control" id="exampleDropdownFormEmail1">
                </div>
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </form>
        </div>
        <div class="col-12 col-md-8">
            <h3>{{count($medicines)}} Drugs</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Origin</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($medicines as $med)
                    <tr>
                        <th scope="row">{{$loop->index + 1}}</th>
                        <td>{{$med->name}}</td>
                        <td>{{$med->qty}}</td>
                        <td>{{$med->origin}}</td>
                        <td>{{$med->status == 1 ? "Active" : "Pending"}}</td>
                        <td>

                            @if(Auth::user()->role == 99)
                            <a href="/medDetails/{{$med->id}}" class="material-icons" style="font-size: 14px">remove_red_eye</a>
                            @if($med->status == 1)
                            <a href="/medPending/{{$med->id}}" class="material-icons" style="font-size: 14px">pause</a>
                            @else
                            <a href="/medPlay/{{$med->id}}" class="material-icons" style="font-size: 14px">play_arrow</a>
                            @endif
                            <a href="/medDelete/{{$med->id}}" class="material-icons" style="font-size: 14px">delete</a>
                            </span>
                            @else
                            <a href="/medDetails/{{$med->id}}" class="material-icons" style="font-size: 14px">remove_red_eye</a>
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