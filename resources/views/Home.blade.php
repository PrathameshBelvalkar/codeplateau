@extends('layout.layout')
@section('content')
    <div class="container mt-1">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Codeplateau Test</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="text-center">This is a simple Laravel application that demonstrates how to use Laravel with
                    Bootstrap.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="text-center">You can find the source code for this application on </p>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-12">
                <form action="{{ route('upload') }}" class="dropzone" id="file-dropzone" method="post"
                    enctype="multipart/form-data">
                    @csrf
                </form>
                <div class="d-flex justify-content-between mt-1">
                    <div class="form-label dropzone-valid-label">only .csv | max:50mb</div>
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
                            <th>Course Name</th>
                            <th>Cource Code</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- <tr>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>61</td>
                            <td>2011-04-25</td>
                            <td>$320,800</td>
                        </tr>
                        <tr>
                            <td>Garrett Winters</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>63</td>
                            <td>2011-07-25</td>
                            <td>$170,750</td>
                        </tr> --}}
                </table>
            </div>
        </div>
    </div>
@endsection
