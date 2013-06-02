@extends('base.layout')

@section('layout')

  <div class="row">
    <div class="span3">
      <!-- LEFT COLUMN -->
      LEFT COLUMN
    </div>
    <div class="span6">
      {{$content}}
    </div>
    <div class="span3">
      <!-- LEFT RIGHT -->
      LEFT RIGHT
    </div>
  </div>

@stop