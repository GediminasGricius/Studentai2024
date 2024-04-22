@extends('layouts.app')

@section("content")
    <div class="container">
        <div  class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Redaguojamas  studentas
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('student.save', $student->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Vardas:</label>
                                <input type="text" class="form-control" name="name" value="{{ $student->name }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Pavardė:</label>
                                <input type="text" class="form-control" name="surname" value="{{ $student->surname }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Telefonas:</label>
                                <input type="text" class="form-control" name="phone" value="{{ $student->phone }}">
                            </div>

                            @if ($student->document_file!=null)
                            <div class="mb-3 alert alert-info">

                                Dokumentas:
                                <a href="{{  route('student.document', $student->id) }}">
                                {{ $student->document_name }}
                                </a>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="{{  route('student.documentDelete', $student->id) }}" class="btn btn-danger btn-sm ">Ištrinti</a>

                            </div>
                            @endif

                            <div class="mb-3">
                                <label class="form-label">Dokumentai</label>
                                <input type="file" class="form-control" name="document" >
                            </div>
                            <button class="btn btn-success">Pridėti</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
