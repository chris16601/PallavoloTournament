<div>
    <div>
        <section class="content-info">
            <div class="container paddings-mini">
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover result-point">
                                <thead class="point-table-head">
                                    <tr>
                                        <th class="text-left"></th>
                                        <th class="text-left" wire:click="sortByField('team')">
                                            TEAM
                                            @if ($sortBy === 'team')
                                                <i
                                                    class="fa-solid fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></i>
                                            @else
                                                <i class="fa-solid fa-sort"></i>
                                            @endif
                                        </th>
                                        <th class="text-left" wire:click="sortByField('girone')">
                                            GIRONE
                                            @if ($sortBy === 'girone')
                                                <i
                                                    class="fa-solid fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></i>
                                            @else
                                                <i class="fa-solid fa-sort"></i>
                                            @endif
                                        </th>
                                        <th class="text-left" wire:click="sortByField('citta')">
                                            CITTA
                                            @if ($sortBy === 'citta')
                                                <i
                                                    class="fa-solid fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></i>
                                            @else
                                                <i class="fa-solid fa-sort"></i>
                                            @endif
                                        </th>
                                    </tr>

                                </thead>
                                <tbody class="text-center">
                                    @foreach ($squadre as $squadra)
                                        <tr>
                                            <td>
                                                <button class="fa-solid fa-pen-to-square btn btn-primary"></button>
                                                <button wire:click="deleteSquad({{ $squadra->id_squadra }})"
                                                    class="fa-solid fa-trash btn btn-danger"></button>
                                            </td>
                                            <td>{{ $squadra->nome }}</td>
                                            <td>
                                                @if ($squadra->girone)
                                                    {{ $squadra->girone->nome ?: 'Girone non assegnato' }}
                                                @else
                                                    Girone non assegnato
                                                @endif
                                            </td>
                                            <td>{{ $squadra->citta }}</td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex mt-4">

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
