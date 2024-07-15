@extends('layouts.main')

@section('container')
    @if(session()->has('savedToDatabase'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('savedToDatabase') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <a href="/dashboard" class="btn btn-primary">See your table</a>
            </div>
        @endif
    <div class="d-flex flex-row justify-content-center align-items-center">
        <h2>Select type of data : </h2>
        @include('partials.checkbox')
    </div>
    <div id="divButton" class="text-center" style="display:none">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Save to database
        </button>
    </div>
    <div id="weatherContent"></div>

    @include("partials.saveToDatabase")

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const checkboxes = document.querySelectorAll('input[name="parameter[]"]');
            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function () {
                    const form = document.querySelector('#weatherForm');
                    const formData = new FormData(form);
                    const url = form.getAttribute('action');

                    fetch(url, {
                        method: 'POST',
                        body: formData
                    })
                        .then(response => response.text())
                        .then(html => {
                            document.getElementById('weatherContent').innerHTML = html;
                            const tableExists = html.includes('<table class="table table-bordered">');

                            const divButton = document.getElementById('divButton');
                            if (tableExists) {
                                divButton.style.display = 'block';
                            } else {
                                divButton.style.display = 'none';
                            }
                        })
                        .catch(error => console.error('Error submitting form: ', error));
                });
            });
        });
    </script>
@endsection
