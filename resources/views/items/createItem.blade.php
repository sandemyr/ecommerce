@extends('layouts.user_app')

@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            <a href="/showStocks/{{ $stock->id }}" class="btn btn-secondary mt-2"><i class="fa fa-arrow-left"></i> Go back</a>
            <h1 class="my-4">{{ $stock->deno_name }}</h1>

            {!! Form::open(['action' => 'ItemsController@storeItem', 'method' => 'POST', 'class' => 'd-inline', 'enctype' => 'multipart/form-data', 'id' => 'signupForm']) !!}
                @csrf
                
                <input type="hidden" name="prod_id" value="{{ $stock->prod_id }}">
                <input type="hidden" name="deno_name" value="{{ $stock->deno_name }}">
                <input type="hidden" name="stock_id" value="{{ $stock->id }}">
                {{-- <input type="hidden" name="price" value="{{ $stock->price }}">
                <input type="hidden" name="currency" value="{{ $stock->currency }}"> --}}
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 mt-2">
                                <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                            <th>Serial/Code</th>
                                            <th>
                                                <a class="btn btn-primary text-light add_item"><i class="fa fa-plus"></i></a>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="item_body">
                                        <tr>
                                            <td><input type="text" class="form-control" name="code[]"></td>
                                            <td><a class="btn btn-danger remove_item text-light"><i class="fa fa-close"></i></a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <input class="btn btn-primary mb-4" type="submit" value="Save">
            {!! Form::close() !!}
        </div>
    </div>
@endsection