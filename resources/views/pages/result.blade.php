@extends('index')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4> Fetch data  </h4>
                </div>
                <div class="card-body">

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Image</th>
                         
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($zones as $zone)
                            <tr>
                                <td>{{ $zone->id }}</td>
                                <td>{{ $zone->name }}</td>
                                <td>{{ $zone->price }}</td>
                                <td> <img src="{{ Storage::url($zone->image) }}" height="75" width="75" alt="" /></td>
                                <td><form action="{{route('zones.destroy',$zone->id)}}" method="POST">
                                    <a class="btn btn-outline-primary" href="{{route('zones.update',$zone->id) }}">Update</a>
                                    @csrf
                                    @method('DELETE')

                                   <button class="btn btn-outline-danger" type="submit">Delete</button>
                                </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection