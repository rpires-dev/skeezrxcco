@extends('layouts.index')
@section('page_title', '| 404 Error ')
@section('container')

<div class="text-center">
    <h1 class="mt-30" style="margin-top: 3em;margin-bottom: 3em;"> Well , this is akward</h1>
    <h1 class="mt-30" style="margin-top: 3em;margin-bottom: 8em;"> 404 error could not find what you were looking for
        <br>
        please go
        <a href="{{url('/')}}">Back</a> </h1>
</div>


@stop
