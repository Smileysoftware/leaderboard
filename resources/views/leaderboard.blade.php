@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-8 col-mg-offset-2">
                <h1>Leaderboard</h1>
            </div>
        </div>

        <div class="row" id="newTime">
            <div class="col-md-8 col-mg-offset-2">
                <div class="alert alert-info" role="alert">
                    <strong>Yay!</strong> A new time has been entered
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Today's Times</div>

                    <div class="panel-body" id="leaderboard">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{--Times table--}}
                        @if ( count( $times ) > 0 )
                            <?php
                                $i = 1;
                            ?>
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Pos.</th>
                                    <th>Firstname</th>
                                    <th>Surname</th>
                                    <th>Time</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach( $times as $time )

                                    <tr id="time_{{ $time->id }}">
                                        <td># {{ $i }}</td>
                                        <td>{{ $time->runner['firstname'] }}</td>
                                        <td>{{ $time->runner['surname'] }}</td>
                                        <td>{{ $time->time }}</td>
                                    </tr>
                                    <?php
                                        $i++;
                                    ?>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <p class="alert alert-warning">There are no times recorded</p>
                        @endif


                    </div>
                </div>




            </div>
        </div>
    </div>

    <script src="https://js.pusher.com/4.1/pusher.min.js"></script>
    <script>



    </script>


@endsection
