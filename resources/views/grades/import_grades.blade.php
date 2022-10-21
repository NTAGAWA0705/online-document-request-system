@extends('layouts.base')

@section('main')
<main class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h2>Import student grades</h2>
            <a href="{{asset('marks_import_form.csv')}}" class="text-primary">Download a form</a>
    
            <form action="{{ route('import_grades') }}" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="import_grade"><i class="fas fa-file-excel"></i> input an CSV file</label>
                    <input type="file" name="import_grades" class="form-control" id="import_grade">
                </div>
                <div class="my-3">
                    <button class="btn btn-primary"> <i class="fas fa-upload"></i> Import</button>
                </div>
                @csrf
            </form>
            <div class="my-2">
                @if (session('message'))
                    {{ session('message') }}
                @endif
            </div>
        </div>
    </div>
</main>
@endsection