@extends('layouts.app')

@section('content')
 <div style="background-color: blue">
  <h1>hi from home</h1>
 </div>
@endsection

@section('topBar')
 <div style="background-color: red">
  <h1>topbar</h1>
 </div>
@endsection


@section('sideBar')
 @include('sideMenu.main')
@endsection
