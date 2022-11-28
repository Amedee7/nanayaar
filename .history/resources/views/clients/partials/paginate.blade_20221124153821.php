<table
    class="table table-students font-weight-bolder table-bordered table-head-custom table-head-bg table-vertical-center">
    <thead>
        <tr>
            <th>Record ID</th>
            <th>Numero Client</th>
            <th>Nom & Prenom</th>
            <th>Telephones</th>
            <th>Montant</th>
            <th>L'agent commercial</th>
            <th>Status</th>
            <th>Date d'enregistrement</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($students as $item)
            <tr>
                <td>
                    <span style="width: 250px;">
                        <div class="d-flex align-items-center">
                            <div class="symbol symbol-40 symbol-sm flex-shrink-0">
                                <img src="{{ asset('custom/students/' . $item->photo . '') }}" alt="">
                            </div>
                            <div class="ml-4">
                                <div class="text-dark-75 font-weight-bolder font-size-lg mb-0">{{ $item->first_name }}
                                    {{ $item->last_name }}</div>
                                <a class="text-muted font-weight-bolder primary-color">Matricule: <span
                                        class="font-weight-boldest text-success">{{ $item->matricule }}</span></a>
                            </div>
                        </div>
                    </span>
                </td>

                <td>
                    <span style="width: 250px;">
                        <div class="d-flex align-items-center">
                            <div class="ml-0">
                                <div class="text-dark-75 font-weight-bolder font-size-lg mb-0">{{ $item->genre }}</div>
                            </div>
                        </div>
                    </span>
                </td>

                <td>
                    <span style="width: 250px;">
                        <div class="d-flex align-items-center">
                            <div class="ml-0">
                                <div class="text-dark-75 font-weight-bolder font-size-lg mb-0">Classe:
                                    {{ $item->classe[0]['name'] }}</div>
                                <a
                                    class="text-muted font-weight-bold text-hover-primary">{{ $item->niveau[0]['type'] }}</a>
                            </div>
                        </div>
                    </span>
                </td>

                <td>
                    <span style="width: 250px;">
                        <div class="d-flex align-items-center">
                            <div class="ml-0">
                                <div class="text-dark-75 font-weight-bolder font-size-lg mb-0">
                                    {{ $item->classe[0]->filiere[0]->name }}</div>
                            </div>
                        </div>
                    </span>
                </td>

                <td>
                    @if ($item->status == 'En attente')
                        <span
                            class="label font-weight-bolder label-lg label-primary label-inline">{{ $item->status }}</span>
                    @elseif($item->status === 'Accepté')
                        <span
                            class="label font-weight-bolder label-lg label-success label-inline">{{ $item->status }}</span>
                    @elseif($item->status === 'Rejeté')
                        <span
                            class="label font-weight-bolder label-lg label-danger label-inline">{{ $item->status }}</span>
                    @endif
                </td>

                <td>
                    <a href="{{ route('students.details', $item->uuid) }}" title="Détails"
                        class="btn btn-primary btn-sm">Détails</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<div class="d-flex justify-content-between align-items-center flex-wrap">
    <div class="d-flex flex-wrap py-2 mr-3">
        {{ $students->links() }}
    </div>
</div>
