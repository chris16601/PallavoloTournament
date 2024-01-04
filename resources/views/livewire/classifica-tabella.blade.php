<div>
    <div>
        <section class="content-info">
            <div class="container paddings-mini">
                <div class="row">
                    <div class="col-lg-3">
                        @if($squadra != null)
                            <select wire:model="gironeScelto" wire:change="updateGirone" class="form-control mb-2">
                                @foreach ($gironi as $girone)
                                    <option value="{{ $girone->id_girone }}">GIRONE {{ $girone->nome }}</option>
                                @endforeach
                            </select>
                        @else
                            <a href=""><button class="btn btn-secondary"><i class="fas fa-volleyball fa-lg"></i> CREA CAMPIONATO</button></a>
                        @endif
                    </div>
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover result-point">
                                <thead class="point-table-head">
                                    <tr>
                                        <th class="text-left">{{ $nomeGirone }}</th>
                                        <th class="text-left">TEAM</th>
                                        <th class="text-center">P</th>
                                        <th class="text-center">W</th>
                                        <th class="text-center">D</th>
                                        <th class="text-center">L</th>
                                        <th class="text-center">GS</th>
                                        <th class="text-center">GA</th>
                                        <th class="text-center">+/-</th>
                                        <th class="text-center">PTS</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @php
                                        $number = 0;   
                                    @endphp
                                    @foreach ($squadre as $squadra)
                                        <tr>
                                            <td class="text-left number">{{ $number += 1 }}</td>
                                            <td class="text-left">
                                                <img src="http://html.iwthemes.com/sportscup/run/img/clubs-logos/bra.png" alt="Brasile">
                                                <span>{{ $squadra->nome }}</span>
                                            </td>
                                            <td>38</td>
                                            <td>26</td>
                                            <td>9</td>
                                            <td>3</td>
                                            <td>73</td>
                                            <td>32</td>
                                            <td>+41</td>
                                            <td class="text-center"><b>{{ $squadra->punteggio }}</b></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>    
</div>
