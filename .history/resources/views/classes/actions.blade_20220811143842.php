<button onclick="editRecord('{{route('cities.edit', $cities->id)}}')" class="btn btn-outline-primary btn-sm"><span class="flaticon-edit"></span></button>
<button onclick="deleteRecordConfirm('{{route('cities.destroy', $cities->id)}}')" class="btn btn-outline-danger btn-sm"><span class="flaticon2-trash"></span></button>
