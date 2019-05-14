@extends('layouts.app')

@section('content')
                <resume-component :user="{{ Auth::user() }}"></resume-component>
@endsection
