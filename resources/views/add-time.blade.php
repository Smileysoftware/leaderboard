@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-8 col-mg-offset-2">
                <h1>Add a time</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Today's Times</div>

                    <div class="panel-body">
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
                                    <th>&nbsp;</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach( $times as $time )

                                    @if ( $time->id == $latest->id )
                                        <tr class="latest">
                                    @else
                                        <tr>
                                    @endif
                                        <td># {{ $i }}</td>
                                        <td>{{ $time->runner['firstname'] }}</td>
                                        <td>{{ $time->runner['surname'] }}</td>
                                        <td>{{ $time->time }}</td>
                                        <td>
                                            <a href="/delete-time/{{ $time->id }}"
                                               class="btn btn-danger btn-sm">Delete</a>
                                        </td>
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

                <div class="panel panel-default">
                    <div class="panel-heading">Add Time</div>

                    <div class="panel-body">

                        {{ Form::open() }}

                        <p class="form-group">
                            <label for="time">Time</label>
                            <input type="text" id="time" name="time" class="form-control" value="{{ old('time') }}"
                                   placeholder="e.g. SSS:MM">
                        </p>

                        <p class="form-group">
                            <label for="runner">Runner</label>

                            @if ( count( $runners ) > 0 )
                                <select name="runner" id="runner" class="form-control">
                                    <option value=""> --Please Select--
                                    </option> {{-- Due to time constraints I shall not be following my own advice... I feel saddened by the whole experience... --}}

                                    @foreach( $runners as $runner )
                                        <option value="{{ $runner->id }}">{{ $runner->firstname }} {{ $runner->surname }}</option>
                                    @endforeach

                                </select>
                        @else
                            <p class="alert alert-warning">There are no runners configured, you should add some.</p>
                            @endif
                            </p>

                            <p class="form-group">
                                <button class="btn btn-primary">Save User</button>
                            </p>

                            @include('partials.errors')

                            {{ Form::close() }}
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
