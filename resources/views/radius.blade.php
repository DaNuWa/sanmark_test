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
        <form action="{{route('radius.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label>Radius</label>
                <input type="number" class="form-control" name="radius" placeholder="meters">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection

