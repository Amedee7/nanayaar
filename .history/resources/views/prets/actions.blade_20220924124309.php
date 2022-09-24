<button onclick="editRecord('{{route('client.show', $clients->id)}}')" title="Détails"  class="btn btn-sm btn-outline-primary"><span class="flaticon-eye"></span></button>
<button onclick="editRecord('{{route('client.edit', $clients->id)}}')" title="Modifier" class="btn btn-sm btn-outline-warning"><span class="flaticon-edit"></span></button>
<button onclick="deleteRecordConfirm('{{route('clients.destroy', $clients->id)}}')" title="Supprimer"  class="btn btn-outline-danger btn-sm"><span class="flaticon2-trash"></span></button>

