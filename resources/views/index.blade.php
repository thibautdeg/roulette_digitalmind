@extends('layouts.master')

@section('content')

    <section class="container">
        <div class="row">
            <div class="col-lg-6 vh-100 d-flex align-items-center">
                <div>
                    <h1 class="display-1 text-primary">Roulette</h1>
                    <p class="text-white"><strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</strong></p>
                    <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda consequuntur delectus eveniet ex fugit ipsa magnam molestiae, quasi repudiandae soluta. Autem cum nisi non numquam perspiciatis porro quae quasi repudiandae.</p>
                </div>
            </div>
            <div class="col-lg-6 vh-100 d-flex align-items-center justify-content-center">
                <div>
                    <button class="btn btn-primary px-4 py-3 rounded-pill"><strong>Test voor u zelf!</strong></button>
                </div>
            </div>
        </div>

    </section>
    <livewire:roulette />
@stop
