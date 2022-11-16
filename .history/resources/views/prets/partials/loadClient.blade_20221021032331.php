<div class="form-group">
    <label for="exampleInputPassword1">Classe <span class="text-danger">*</span></label>
    <input readonly type="text" class="form-control"
        value=" {{ $client->commission_averse }}" name="client">
    <span class="client_err error text-danger"></span>
</div>

<script>
    jQuery(function($) {
        $("#mySelect4").select2();
    });
</script>
