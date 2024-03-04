@extends('layouts.app')

@section("content")
    <div class="container">
        <div  class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Pridėti naują kursą
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('courses.store') }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Pavadinimas:</label>
                                <input type="text" class="form-control" name="title">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Dėstytojas:</label>
                                <select name="lecturer_id" class="form-select">
                                    @foreach($lecturers as $lecturer)
                                        <option value="{{ $lecturer->id }}">{{ $lecturer->name }} {{ $lecturer->surname }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button class="btn btn-success">Pridėti</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
