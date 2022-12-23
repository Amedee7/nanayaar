
                @permission('permission-modifier')

<button onclick="editRecord('{{route('permissions.edit', $permissions->id)}}')" title="Modifier" class="btn btn-outline-warning btn-sm mb-1"><span class="flaticon-edit"></span></button>
@endpermission

@permission('permission-supprimer')

<button onclick="deleteRecordConfirm('{{route('permissions.destroy', $permissions->id)}}')" title="Supprimer"  class="btn btn-outline-danger btn-sm "><span class="flaticon2-trash"></span></button>

@end