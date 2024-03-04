@extends('layouts.app')

@section("content")
    <div class="container">
        <div  class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{route('lecturers.create') }}" class="btn btn-info">Pridėti naują dėstytoją</a>
                        <hr>
                      <table class="table">
                          <thead>
                          <tr>
                              <th>Vardas</th>
                              <th>Pavardė</th>
                              <th>Dalykai</th>
                              <th colspan="2"></th>
                          </tr>
                          </thead>
                          <tbody>
                          @foreach($lecturers as $lecturer)
                          <tr>
                              <td>{{ $lecturer->name }}</td>
                              <td>{{ $lecturer->surname }}</td>
                              <td>
                                  @foreach( $lecturer->courses as $course)
                                      {{ $course->title }} <br>
                                  @endforeach
                              </td>
                              <td style="width: 100px;">
                                  <a href="{{ route('lecturers.edit', $lecturer) }}" class="btn btn-success">Redaguoti</a>

                              </td>
                              <td style="width: 100px;">
                                 <form method="post" action="{{ route('lecturers.destroy', $lecturer) }}">
                                     @csrf
                                     @method("delete")
                                     <button class="btn btn-danger">Ištrinti</button>
                                 </form>

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
