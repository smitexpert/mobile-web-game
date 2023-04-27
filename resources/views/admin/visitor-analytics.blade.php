@extends('master')

@section('content')
<div class="row">
    <div class="col-md-12 mb-4">
        {{-- <div class="float-right">
            <a href="{{ route('visitor.download') }}" class="btn btn-success">Download</a>
        </div> --}}
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
              Select Date Range
            </div>
            <div class="card-body">
                <form id="filter" action="{{ route('visitor.analytics') }}">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Select Date</label>
                                <input type="text" name="daterange" class="form-control" value="{{ $start_date }} - {{ $end_date }}" />
                                <input type="hidden" id="start_date" name="start_date">
                                <input type="hidden" id="end_date" name="end_date">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <br>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Analytics
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>Total Played</th>
                        <td>:</td>
                        <td>{{ $total_play->count() }}</td>
                    </tr>
                    <tr>
                        <th>Total Unique</th>
                        <td>:</td>
                        <td>{{ $total_play->groupBy('ip')->count() }}</td>
                    </tr>
                    <tr>
                        <th>Total Insta</th>
                        <td>:</td>
                        <td>{{ $visits->where('type', 'insta')->count() }}</td>
                    </tr>
                    <tr>
                        <th>Total Unique Insta</th>
                        <td>:</td>
                        <td>{{ $visits->where('type', 'insta')->groupBy('ip')->count() }}</td>
                    </tr>
                    <tr>
                        <th>Total TikTok</th>
                        <td>:</td>
                        <td>{{ $visits->where('type', '!=', 'insta')->count() }}</td>
                    </tr>
                    <tr>
                        <th>Total Unique TikTok</th>
                        <td>:</td>
                        <td>{{ $visits->where('type', '!=', 'insta')->groupBy('ip')->count() }}</td>
                    </tr>
                    <tr>
                        <th>From Home Total</th>
                        <td>:</td>
                        <td>{{ $visits_home->count() }}</td>
                    </tr>
                    <tr>
                        <th>From Home Unique Total</th>
                        <td>:</td>
                        <td>{{ $visits_home->groupBy('ip')->count() }}</td>
                    </tr>
                    <tr>
                        <th>From PopUp Total</th>
                        <td>:</td>
                        <td>{{ $visits_play->count() }}</td>
                    </tr>
                    <tr>
                        <th>From PopUp Unique Total</th>
                        <td>:</td>
                        <td>{{ $visits_play->groupBy('ip')->count() }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@endpush

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<script>
    $(function() {
      $('input[name="daterange"]').daterangepicker({
        opens: 'left'
      }, function(start, end, label) {
        console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
        $("#start_date").val(start.format('DD/MM/YYYY'));
        $("#end_date").val(end.format('DD/MM/YYYY'));
        $("#filter").submit();
      });
    });
</script>
@endpush
