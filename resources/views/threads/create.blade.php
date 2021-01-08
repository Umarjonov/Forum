@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create a New Thread</div>

                    <div class="card-body">
                        <form action="/threads" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="title">Title:</label>
                                <input type="text" class="form-group" name="title" id="title" placeholder="title" style="width: 100%">
                            </div>

                            <div class="form-group">
                                <label for="body">Body:</label>
                                <textarea name="body" class="form-group" id="body" style="width: 100%" rows="8"></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Publish </button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
