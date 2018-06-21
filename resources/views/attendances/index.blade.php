@extends('master')
 
@section('content')
    <nav class="navbar navbar-findcond">
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="nav navbar-nav navbar-right">
                <li class="active">
                    <a href="{{ route('attend') }}">出席登録画面へ</a>
                </li>
            </ul>
        </div>
    </nav>
     
    <div class="row">
        <div class="col-md-12">
            <attendances></attendances> <!-- *1 -->
        </div>
    </div>
@endsection
