<!DOCTYPE html>
<html lang="en">

<style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 10px;
    }

    th,
    td {
        border: 1px solid #000;
        padding: 8px;
    }

    th {
        background-color: #f2f2f2;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }
</style>




<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log</title>
</head>

<body>
    <div class="container paddings-mini">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
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
                                    <td>{{ $log->utente->name }} / {{ $log->utente->email }}</td>
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
</body>

</html>
