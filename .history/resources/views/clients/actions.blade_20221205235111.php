
<button onclick="editRecord('{{ route('clients.show', $clients->id) }}')" title="Détails"
    class="btn btn-sm btn-outline-primary"><span class="flaticon-eye"></span></button>
<button onclick="editRecord('{{ route('clients.montant.updete', $clients->id) }}')" title="Modifier"
    class="btn btn-sm btn-outline-warning"><span class="flaticon-edit"></span></button>
<button onclick="deleteRecordConfirm('{{ route('clients.destroy', $client->id) }}')" title="Supprimer"
    class="btn btn-outline-danger btn-sm"><span class="flaticon2-trash"></span></button>

    {{-- <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
        <a class="dropdown-item btn" onclick="editRecord('{{route('users.edit', $users->id)}}')"><span class="flaticon-edit-1 mr-2"></span> Modifier</a>
        @if(Auth::user()->id != $users->id)
            <a class="dropdown-item btn" onclick="statusConfirm('{{route('users.status', $users->id)}}')"><span class="flaticon2-{{$users->status=='Actif'?'cancel':'check-mark'}} mr-2"></span> {{$users->status=='Actif'?'Désactiver':'Activer'}}</a>
        @endif
    </div> --}}

{{-- <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
    @if ($clients->status == 1)
        <a href="{{ route('clients.change-status', $clients->id) }}"
            onclick="return confirm('Voulez vous changer le status?')" class="btn btn-sm btn-success">Active</a>
    @else
        <a href="{{ route('clients.change-status', $clients->id) }}"
            onclick="return confirm('Voulez vous changer le status?')" class="btn btn-sm btn-danger">Inactive</a>
    @endif
</div> --}}

@if ($clients->status == 1)
        <a href="{{ route('clients.change-status', $clients->id) }}"
            onclick="return confirm('Voulez vous changer le status?')" class="btn btn-sm btn-success">Active</a>
    
            @else
            <a href="{{ route('clients.change-status', $clients->id) }}"
                onclick="return confirm('Voulez vous changer le status?')" class="btn btn-sm btn-danger">Inactive</a>
    
@endif
        <a href="{{ route('clients.change-status', $clients->id) }}"
            onclick="return confirm('Voulez vous changer le status?')" class="btn btn-sm btn-danger">Inactive</a>
