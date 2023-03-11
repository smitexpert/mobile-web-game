@extends('master')

@section('content')
<div class="row">
    <div class="col-md-12 mb-4">
        <div class="float-right">
            <a href="{{ route('visitor.download') }}" class="btn btn-success">Download</a>
        </div>
    </div>
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
                        <td>Today Played</td>
                        <td>:</td>
                        <td>{{ $today_play }}</td>
                    </tr>
                    <tr>
                        <td>Today Unique</td>
                        <td>:</td>
                        <td>{{ $today_unique->count() }}</td>
                    </tr>
                    <tr>
                        <td>Weekly</td>
                        <td>:</td>
                        <td>{{ $week }}</td>
                    </tr>
                    <tr>
                        <td>Weekly Played</td>
                        <td>:</td>
                        <td>{{ $week_play }}</td>
                    </tr>
                    <tr>
                        <td>Last Weekly Unique</td>
                        <td>:</td>
                        <td>{{ $week_unique->count() }}</td>
                    </tr>
                    <tr>
                        <td>Monthly</td>
                        <td>:</td>
                        <td>{{ $month }}</td>
                    </tr>
                    <tr>
                        <td>Monthly Played</td>
                        <td>:</td>
                        <td>{{ $month_play }}</td>
                    </tr>
                    <tr>
                        <td>Last Monthy Unique</td>
                        <td>:</td>
                        <td>{{ $month_unique->count() }}</td>
                    </tr>
                    <tr>
                        <td>Total</td>
                        <td>:</td>
                        <td>{{ $total }}</td>
                    </tr>
                    <tr>
                        <td>Total Played</td>
                        <td>:</td>
                        <td>{{ $total_play }}</td>
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
