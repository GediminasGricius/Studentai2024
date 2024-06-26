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
                              <th>{{ __("Dokumentai") }}</th>
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
                                  @if ($student->document_file!=null)
                                  <a href="{{  route('student.document', $student->id) }}" class="btn btn-primary" target="_blank">Atsiusti</a>
                                  @endif
                              </td>
                              <td>


                                  @can('edit-student')
                                      <a class="btn btn-info" href="{{ route('student.edit', $student->id) }}">Redaguoti</a>

                                  @endcan

                                  @can('delete-student')
                                      <a class="btn btn-danger" href="{{ route('student.delete', $student->id) }}">Ištrinti</a>
                                  @endcan
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
