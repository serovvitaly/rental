@extends('base.layout')

@section('layout')

  <div class="row-fluid profile-title">
    <div class="span10 pft-title"><h4>{{$profile_title}}</h4></div>
    <div class="span2 pft-actions"></div>
  </div>
  
  <div class="row-fluid profile-header">
    <div class="span3">
      <img src="http://behance.vo.llnwd.net/profiles25/468591/80dceeae5e6fb82c8f57f5a8c3ec88dd.jpg" alt="">
    </div>
    <div class="span9">
    
    </div>
  </div>

  <div class="row-fluid">
    <div class="span3">
      <!-- LEFT COLUMN -->
      LEFT COLUMN
    </div>
    <div class="span9">
      {{$content}}
    </div>
  </div>

@stop