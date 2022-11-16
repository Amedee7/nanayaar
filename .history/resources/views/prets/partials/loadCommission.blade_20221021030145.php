<div class="form-group">
    <label for="exampleInputPassword1">Classe <span
        class="text-danger">*</span></label>
        <select class="form-control" name="classe" id="mySelect4" style="width: 100%">
            <option value="">--Veuillez choisir--</option>
            @foreach ($clients as $client)
                <option value="{{ $client->id }}">{{ $client->name }}</option>
            @endforeach
        </select>
<span class="classe_err error text-danger"></span>
</div>

<script>
    jQuery(function($) {
        $("#mySelect4").select2();
    });
</script>