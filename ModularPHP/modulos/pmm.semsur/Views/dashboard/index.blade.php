@extends('pmm@semsur::dashboard.layout')


@section('sidebar')

  @include('pmm@semsur::dashboard.desktop-sidebar')

  @include('pmm@semsur::dashboard.mobile-sidebar')

@stop

    
@section('header')
  @include('pmm@semsur::dashboard.header')
@stop

@section('main')
  @include('pmm@semsur::dashboard.main')
@stop
        










