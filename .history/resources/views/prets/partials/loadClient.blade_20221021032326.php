<div class="form-group">
    <label for="exampleInputPassword1">Classe <span class="text-danger">*</span></label>
    <select class="form-control" name="client" id="mySelect4" style="width: 100%">
        <option value="">--Veuillez choisir--</option>
        @foreach ($clients as $client)
            <option value="{{ $client->id }}">{{ $client->{{ $client->commission_averse }} }}</option>
        @endforeach
    </select>

    <input readonly type="text" class="form-control"
        value=" {{ $client->commission_averse }}" name="client">
    <span class="client_err error text-danger"></span>
</div>

<script>
    jQuery(function($) {
        $("#mySelect4").select2();
    });
</script>
