@extends('layout.layout')
@section('content')
    <div class="container mt-1">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Codeplateau Test</h1>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-12">
                <form action="{{ route('upload') }}" class="dropzone" id="file-dropzone" method="post"
                    enctype="multipart/form-data">
                    @csrf
                </form>
                <div class="d-flex justify-content-between mt-1">
                    {{-- <div class="form-label dropzone-valid-label">only .csv | max:50mb</div> --}}
                    <div class="w-100"><button class="btn btn-primary w-100" id="upload-button">Upload</button></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>sr no</th>
                            <th>Name</th>
                            <th>Certificate Name</th>
                            <th>Cource Code</th>
                        </tr>
                    </thead>
                    <tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
