<button onclick="editRecord('{{route('prets.show', $prest->id)}}')" title="Détails"  class="btn btn-sm btn-outline-primary"><span class="flaticon-eye"></span></button>
<button onclick="editRecord('{{route('prets.edit', $prest->id)}}')" title="Modifier" class="btn btn-sm btn-outline-warning"><span class="flaticon-edit"></span></button>
<button onclick="deleteRecordConfirm('{{route('clients.destroy', $prest->id)}}')" title="Supprimer"  class="btn btn-outline-danger btn-sm"><span class="flaticon2-trash"></span></button>

