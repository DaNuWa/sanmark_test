@extends('layouts.welcome')

@section('content')
    <div class="container">

    <div class="row">

        <div class="col-md-12 mt-5">

            <div class="row">

                <div class="col-md-12 text-center">

                    <h3><strong>Runners Report</strong></h3>

                </div>

            </div>

            <table class="table table-bordered data-table">

                <thead>

                <tr>


                    <th width="50">Runner Name</th>

                    <th>Speed</th>

                    <th>Radius</th>

                    <th width="100px">Start time</th>
                    <th width="100px">End time</th>
                    <th width="100px">Duration</th>
                    <th width="100px">Number of laps</th>


                </tr>

                </thead>

                <tbody>

                </tbody>

            </table>

        </div>

    </div>

    </div>

@endsection

@section('js')
    <script type="text/javascript">
        $(document).ready(function() {
            $(".table").DataTable({
                serverSide: true,
                "dom": 'r<"datatable-header"fBl>t<"datatable-footer"ip>',
                "buttons": {
                    dom: {
                        button: {
                            className: 'btn btn-mini btn-default'
                        }
                    },

                },
                ajax: {
                    url: '{{route('records.report.ajax')}}',
                },
                searching: true,

                columns: [
                    {data: "name"},
                    {data: "radius"},
                    {data: "start_time"},
                    {data: "end_time"},
                    {data: "duration"},
                    {data: "laps"},

                ],
            });
        });
    </script>
@endsection
