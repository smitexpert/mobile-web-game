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
              Social Visits
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <td>Insta Total</td>
                        <td>:</td>
                        <td>{{ $visits->where('type', 'insta')->count() }}</td>
                    </tr>
                    <tr>
                        <td>Insta Total Unique</td>
                        <td>:</td>
                        <td>{{ $visits->where('type', 'insta')->groupBy('ip')->count() }}</td>
                    </tr>
                    <tr>
                        <td>TikTok Total</td>
                        <td>:</td>
                        <td>{{ $visits->where('type', '!=', 'insta')->count() }}</td>
                    </tr>
                    <tr>
                        <td>TikTok Unique</td>
                        <td>:</td>
                        <td>{{ $visits->where('type', '!=', 'insta')->groupBy('ip')->count() }}</td>
                    </tr>
                    <tr>
                        <td>From Home Total</td>
                        <td>:</td>
                        <td>{{ $fromHome->count() }}</td>
                    </tr>
                    <tr>
                        <td>From Home Unique</td>
                        <td>:</td>
                        <td>{{ $fromHome->groupBy('ip')->count() }}</td>
                    </tr>
                    <tr>
                        <td>From PopUp Total</td>
                        <td>:</td>
                        <td>{{ $fromPopUP->count() }}</td>
                    </tr>
                    <tr>
                        <td>From PopUp Unique</td>
                        <td>:</td>
                        <td>{{ $fromPopUP->groupBy('ip')->count() }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
