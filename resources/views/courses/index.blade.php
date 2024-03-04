@extends('layouts.app')

@section("content")
    <div class="container">
        <div  class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{route('courses.create') }}" class="btn btn-info">Pridėti naują kursą</a>
                        <hr>
                      <table class="table">
                          <thead>
                          <tr>
                              <th>Pavadinimas</th>
                              <th>Dėstytojas</th>
                              <th colspan="2"></th>
                          </tr>
                          </thead>
                          <tbody>
                          @foreach($courses as $course)
                          <tr>
                              <td>{{ $course->title }}</td>
                              <td>{{ $course->lecturer->name }} {{ $course->lecturer->surname }}</td>
                              <td style="width: 100px;">
                                  <a href="{{ route('courses.edit', $course) }}" class="btn btn-success">Redaguoti</a>

                              </td>
                              <td style="width: 100px;">
                                 <form method="post" action="{{ route('courses.destroy', $course) }}">
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
