@extends('master')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
              Visitors
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <td>Today</td>
                        <td>:</td>
                        <td>{{ $today }}</td>
                    </tr>
                    <tr>
                        <td>Today Unique</td>
                        <td>:</td>
                        <td>{{ $today_unique->count() }}</td>
                    </tr>
                    <tr>
                        <td>Total</td>
                        <td>:</td>
                        <td>{{ $total }}</td>
                    </tr>
                    <tr>
                        <td>Total Unique</td>
                        <td>:</td>
                        <td>{{ $total_unique->count() }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
