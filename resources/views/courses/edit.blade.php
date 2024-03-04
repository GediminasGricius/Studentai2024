@extends('layouts.app')

@section("content")
    <div class="container">
        <div  class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Redaguojamas  kursas
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('courses.update', $course) }}">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label class="form-label">Pavadinimas:</label>
                                <input type="text" class="form-control" name="name" value="{{$course->title}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Pavardė:</label>
                                <input type="text" class="form-control" name="surname" value="">
                            </div>
                            <button class="btn btn-success">Atnaujinti</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
