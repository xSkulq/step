@extends('layouts.app_own_column')

@section('content')
<account-edit :user="{{$user->toJson()}}"></account-edit>
@endsection
