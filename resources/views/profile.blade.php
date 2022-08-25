@extends('layouts.master')
@section('content')

<div class="container" style="margin-left: 350px; margin-top:200px">
    <div class="row">
        <div class="col-sm-6" >
            <h3 style= "text-align=center">Logged In User Details</h3>
        </div>

        <table class="table table-hover">
     
            <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Name</th>
                  <th scope="col">Email</th>
                </tr>
              </thead>
              @if(isset(Auth::User()->email))
              <tbody>
                <tr>
                  <td> {{(Auth::User()->id)}}</td>
                <td> {{(Auth::User()->name)}}</td>
                <td>{{(Auth::User()->email)}}</td>
                </tr>
              </tbody>

    
@else
    
@endif
        </table>

</div>
    </div>
    @endsection