@extends('layouts.base')

@section('main')
    <h3>Make a new request</h3>
    <h4>Choose the document to request</h4>
    <a href="/requests/transcripts/new" class="btn btn-primary"> <i class="fas fa-file"></i> Transcript</a>
    <a href="/requests/transcripts/new" class="btn btn-primary"> <i class="fas fa-folder"></i> Payment</a>

@endsection