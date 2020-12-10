@extends('dashboard.layouts')
@section('content')
<div class="container-fluid">

    <h1 class="mt-4 mabo64">Pharmacist</h1>
    <div class="row mt-4">
        @if(Auth::user()->role == 99)
        <div class="col-12 col-md-4">
            <form class="px-4 py-3" action="/addPharmacist" method="POST" enctype="multipart/form-data">
                @csrf
                @include('inc.messages')
                <div class="form-group">
                    <label for="exampleDropdownFormEmail1">Names</label>
                    <input type="text" name="name" class="form-control" id="exampleDropdownFormEmail1" placeholder="Acetaminophen">
                </div>
                <div class="form-group">
                    <label for="exampleDropdownFormPassword1">Email</label>
                    <input type="email" name="email" class="form-control" id="exampleDropdownFormPassword1" min="1" placeholder="example@domain.com">
                </div>
                <div class="form-group">
                    <label for="exampleDropdownFormPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleDropdownFormPassword1" min="1" placeholder="example@domain.com">
                </div>
                <div class="form-group">
                    <label for="exampleDropdownFormEmail1">Gender</label>
                    <select name="gender" id="" class="form-control">
                        <option value="Female">Female</option>
                        <option value="Male">Male</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </form>
        </div>
        @endif
        <div class="col-12 col-md-8">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Names</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pharmacists as $phar)
                    <tr>
                        <th scope="row">{{$loop->index + 1}}</th>
                        <td>{{$phar->name}}</td>
                        <td>{{$phar->email}}</td>
                        <td>phar</td>
                        <td>{{$phar->gender}}</td>
                        <td>
                            @if(Auth::user()->role == 99)
                            @if($phar->status == 1)
                            <a href="/pharPending/{{$phar->id}}" class="material-icons" style="font-size: 14px">pause</a>
                            @else
                            <a href="/pharPlay/{{$phar->id}}" class="material-icons" style="font-size: 14px">play_arrow</a>
                            @endif
                            <a href="/pharDelete/{{$phar->id}}" class="material-icons" style="font-size: 14px">delete</a>
                            </span>
                            @else
                            @if($phar->status == 1)
                            <a href="/pharPending/{{$phar->id}}" class="material-icons" style="font-size: 14px">pause</a>
                            @else
                            <a href="/pharPlay/{{$phar->id}}" class="material-icons" style="font-size: 14px">play_arrow</a>
                            @endif
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