@extends('layouts.welcome')

@section('content')
    <div class="mt-8">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{route('records.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label >Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label>Radius</label>
                <input type="number" class="form-control" name="radius" placeholder="meters">
            </div>
            <div class="form-group">
                <label >Start time</label>
                <input type="time" class="form-control" name="start_time" >
            </div>
            <div class="form-group">
                <label >End time</label>
                <input type="time" class="form-control" name="end_time" >
            </div>
            <div class="form-group">
                <label >Laps</label>
                <input type="number" class="form-control"name="laps" >
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection

