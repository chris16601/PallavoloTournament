<div>
    <div class="container paddings-mini">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-4">
                        <button wire:click="generatePDF" class="btn btn-secondary pdf-hidden-button">SCARICA PDF</button>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-hover result-point">
                        <thead class="point-table-head">
                            <tr>
                                <th class="text-left">Utente</th>
                                <th class="text-left">Azione effettuata</th>
                                <th class="text-left">Data</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($logs as $log)
                                <tr>
                                    <td>{{ $log->utente->name }}</td>
                                    <td>{{ $log->azione }}</td>
                                    <td>{{ $log->updated_at }}</td>
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
</div>
