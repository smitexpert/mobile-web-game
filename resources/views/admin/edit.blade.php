@extends('master')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
              Edit Challenge
            </div>
            <div class="card-body">
                <form action="{{ route('challenge.update', ['id' => $challenge->id]) }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="">Title</label>
                            <input type="text" name="title" class="form-control" value="{{ $challenge->title }}" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Challenge</label>
                            <input type="text" name="challenge" class="form-control" value="{{ $challenge->challenge }}" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Difficulty</label>
                            <input type="number" name="difficulty" class="form-control" value="{{ $challenge->difficulty }}" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <button class="btn btn-success btn-sm">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
