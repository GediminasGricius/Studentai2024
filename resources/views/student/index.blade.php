@extends('layouts.app')

@section("content")
    <div class="container">
        <div  class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                      <table class="table">
                          <thead>
                          <tr>
                              <th>{{ __("Vardas") }}</th>
                              <th>{{ __("Pavardė") }}</th>
                              <th>{{ __("Telefonas") }}</th>
                              <th></th>
                          </tr>
                          </thead>
                          <tbody>
                          @foreach($students as $student)
                          <tr>
                              <td>{{ $student->name }}</td>
                              <td>{{ $student->surname }}</td>
                              <td>{{ $student->phone }}</td>
                              <td>
                                  <a class="btn btn-info" href="{{ route('student.edit', $student->id) }}">Redaguoti</a>
                                  <a class="btn btn-danger" href="{{ route('student.delete', $student->id) }}">Ištrinti</a>
                              </td>
                          </tr>
                          @endforeach
                          </tbody>
                      </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
