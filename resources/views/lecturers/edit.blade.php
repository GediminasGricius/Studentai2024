@extends('layouts.app')

@section("content")
    <div class="container">
        <div  class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ __('Redaguojamas  dėstytojas') }}
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('lecturers.update', $lecturer) }}">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label class="form-label">Vardas:</label>
                                <input type="text" class="form-control" name="name" value="{{$lecturer->name}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Pavardė:</label>
                                <input type="text" class="form-control" name="surname" value="{{$lecturer->surname}}">
                            </div>
                            <button class="btn btn-success">Atnaujinti</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
