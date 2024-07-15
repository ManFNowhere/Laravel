@extends('layouts.main')

@section('container')
<div id="weatherContent">
    <table class="table table-bordered">
        <thead>
            <tr>
                @foreach($columnname as $name)
                    <th>{{ $name }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach($data as $d)
                <tr>
                    @foreach($columnname as $name)
                        <td>{{ $d->$name }}</td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-evenly">
        <a href="/delete-table/{{$table_name->table_name}}" class="btn  btn-danger">Delete</a>
    </div>
</div>

@endsection
