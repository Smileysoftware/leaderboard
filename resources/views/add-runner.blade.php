@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-8 col-mg-offset-2">
            <h1>Add a runner</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Leaderboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{--Runners table--}}
                        @if ( count( $runners ) > 0 )
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Firstname</th>
                                <th>Surname</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach( $runners as $runner )
                                    <tr>
                                        <td>{{ $runner->firstname }}</td>
                                        <td>{{ $runner->surname }}</td>
                                        <td>
                                            <a href="/delete-runner/{{ $runner->id }}" class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                            <p class="alert alert-warning">There are no runners</p>
                        @endif



                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Add Runner</div>

                <div class="panel-body">

                    {{ Form::open() }}

                    <p class="form-group">
                        <label for="firstname">Firstname</label>
                        <input type="text" id="firstname" name="firstname" class="form-control" value="{{ old('firstname') }}" placeholder="e.g. Joe">
                    </p>

                    <p class="form-group">
                        <label for="surname">Surname</label>
                        <input type="text" id="surname" name="surname" class="form-control" value="{{ old('surname') }}" placeholder="e.g. Blogs">
                    </p>

                    <p class="form-group">
                        <label for="dob">Date Of Birth</label>
                        <input type="text" id="dob" name="dob" class="form-control" value="{{ old('dob') }}" placeholder="e.g. 20/1/1967">
                    </p>

                    <p class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="e.g. joe.blogs@gmail.com">
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
