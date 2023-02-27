@extends('master')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
              Upload Challenge
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('challenge') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputEmail1">Select CSV File</label>
                      <input type="file" name="file" accept=".csv" class="form-control">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </form>
                <br>

                <div class="btn-group">
                    <form onsubmit="return confirm('Are you sure?')" action="{{ route('challenge.remove') }}" method="POST">
                        @csrf
                        <button class="btn btn-danger">REMOVE ALL</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
              List of Challenges
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Challenge</th>
                            <th>Difficulty</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($challenges as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->challenge }}</td>
                                <td>{{ $item->difficulty }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $challenges->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
