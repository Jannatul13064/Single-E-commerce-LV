
@extends('user_temp.layouts.user_profile_temp')
@section('profile-content')

<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{session()->get('message')}}
        </div>
    @endif
</div>
@endsection
