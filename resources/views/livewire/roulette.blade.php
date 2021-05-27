<div>
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
    <section id="form" class="container">
        <div class="row">
            <div class="col-lg-5 d-flex align-items-center">

            </div>
            <div class="col-lg-7 vh-100 d-flex align-items-center justify-content-center flex-column">
                <h2 class="text-primary text-shadow text-overlay display-4">from voor roulette</h2>
                <div class="card bg-secondary box-shadow border-0">
                    <div class="card-body p-4 mt-3">
                        <form class="row g-3" wire:submit.prevent="submitForm" enctype="multipart/form-data">
                            <div class="col-sm-6 form-group">
                                <label>totaal bedrag:</label>
                                <input type="number" name="total" id="total" wire:model="total" class="form-control" value="" placeholder="400">
                                @error('total') <div class="alert-danger border border-danger my-2">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>inzet bedrag:</label><br>
                                <input type="number" name="bet" id="bet" wire:model="bet" class="form-control" value="" placeholder="2">
                                @error('bet') <div class="alert-danger border border-danger my-2">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>kleur:</label>
                                <select class="form-select form-control" name="color" wire:model="color" id="color">
                                    <option value="">-- Select One --</option>
                                    <option value="Red">Rood</option>
                                    <option value="Black">Zwart</option>
                                </select>
                                @error('color') <div class="alert-danger border border-danger my-2">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Aantal keer draaien aan het rad:</label><br>
                                <input type="number" name="times" id="bet" wire:model="times" class="form-control" value="" placeholder="2">
                                @error('times') <div class="alert-danger border border-danger my-2">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-sm-12 form-group">
                                <label>plafond:</label><br>
                                <input type="number" name="plafond" id="bet" wire:model="plafond" class="form-control" value="" placeholder="2">
                                @error('plafond') <div class="alert-danger border border-danger my-2">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>tijd per spel in minuten:</label><br>
                                <input type="number" name="minutes" id="bet" wire:model="minutes" class="form-control" value="" placeholder="2">
                                @error('minutes') <div class="alert-danger border border-danger my-2">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>personeel loon per uur:</label><br>
                                <input type="number" name="hourly" id="hourly" wire:model="hourly" class="form-control" value="" placeholder="2/uur">
                                @error('hourly') <div class="alert-danger border border-danger my-2">{{ $message }}</div> @enderror
                            </div>


                            <button type="submit" class="btn btn-primary w-100 h-100 py-3 rounded-0"><strong>Test voor u zelf!</strong></button>
                        </form>
                    </div>
                    <div class="card-footer p-0">

                    </div>
                </div>

            </div>
        </div>
    </section>
    @if(isset($data))
        <section id="games" class="container">
            <div class="row  g-4">
                @foreach($data as $item)
                    <div class="p-4 col-12 col-lg-6">
                        <div class="card  bg-secondary box-shadow border-0 mt-5">
                            <div class="card-body p-4 d-flex align-items-center justify-content-between">
                                <p><strong>total saldo: {{$item->total}}</strong></p>
                                <p><strong>start bedrag: {{$item->bet}}</strong></p>
                            </div>
                            <div class="card-body p-4">
                                <div class="table-responsive">
                                    <!-- Projects table -->
                                    <table class="table align-items-center table-flush">
                                        <thead class="thead-light">
                                        <tr>
                                            <th scope="col">Color</th>
                                            <th scope="col">Number</th>
                                            <th scope="col">bet</th>
                                            <th scope="col">subtotaal</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($item->games as $game)
                                            <tr>
                                                <th scope="row">
                                                    <p class="{{$game->color}}" >{{$game->color}}</p>
                                                </th>
                                                <td>
                                                    <p>{{$game->number}}</p>
                                                </td>
                                                <td>
                                                    <p>{{$game->bet}}</p>
                                                </td>
                                                <td class="text-right">
                                                    <p class="{{$game->type}}">{{$game->subtotal}}</p>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="d-flex justify-content-between align-items-center w-100">
                                    <p class="Red"><strong>red: {{number_format( $item->red_procent ,2)}} %</strong></p>
                                    <p><strong>black: {{number_format($item->black_procent,2)}} %</strong></p>
                                    <p><strong>personeels kost: {{number_format($item->hourly,2)}}</strong></p>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
        </section>
    @endif

</div>
