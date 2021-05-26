@extends('layouts.master')

@section('content')

    <section class="container">
        <div class="row">
            <div class="col-lg-6 d-flex align-items-center">
                <div>
                    <h1 class="display-1 text-primary text-shadow">Roulette</h1>
                    <p class="text-white text-shadow"><strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</strong></p>
                    <p class="text-white text-shadow">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor
                        sit amet, consectetur adipisicing elit. Assumenda consequuntur delectus eveniet ex fugit ipsa
                        magnam molestiae, quasi repudiandae soluta. Autem cum nisi non numquam perspiciatis porro quae
                        quasi repudiandae.</p>
                </div>
            </div>
            <div class="col-lg-6 vh-100 d-flex align-items-center justify-content-center">
                <div class="menu">
                    <a href="#form" class="btn btn-primary px-4 py-3 rounded-pill box-shadow"><strong>Test voor u zelf!</strong></a>
                </div>
            </div>
        </div>
    </section>

    <livewire:roulette />
@stop
