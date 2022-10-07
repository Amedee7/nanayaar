<form class="form">
    <div class="card-body">
        <div class="form-group row">
            <div class="col-lg-4">
                <label for=""><strong>NUMERO UNIQUE</strong></label>
                <input name="numb_cli" type="text" class="form-control " id="id-form-field-1">
                <span class="name_err error text-danger"></span>
            </div>
            <div class="col-lg-4">
                <label for=""><strong>NOM</strong></label>
                <input name="nom" type="text" class="form-control " id="id-form-field-1">
                <span class="name_err error text-danger"></span>
            </div>
            <div class="col-lg-4">
                <label>PRENOM:</label>
                <div class="input-group">
                    <div class="input-group-prepend"><span class="input-group-text"><i class="la la-user"></i></span>
                    </div>
                    <input name="prenom" type="text" class="form-control " id="id-form-field-1">
                </div>
                <span class="form-text text-muted">Please enter your username</span>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-4">
                <label>Contact 1:</label>
                <input name="first_phone" type="text" class="form-control " id="id-form-field-1">
                <span class="name_err error text-danger"></span>
            </div>
            <div class="col-lg-4">
                <label>Fax:</label>
                <div class="input-group">
                    <div class="input-group-prepend"><span class="input-group-text"><i
                                class="la la-info-circle"></i></span></div>
                    <input type="text" class="form-control" placeholder="Fax number" />
                </div>
                <span class="form-text text-muted">Please enter fax</span>
            </div>
            <div class="col-lg-4">
                <label>Address:</label>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Enter your address" />
                    <div class="input-group-append"><span class="input-group-text"><i
                                class="la la-map-marker"></i></span></div>
                </div>
                <span class="form-text text-muted">Please enter your address</span>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-4">
                <label>Postcode:</label>
                <div class="input-group">
                    <div class="input-group-append"><span class="input-group-text"><i
                                class="la la-bookmark-o"></i></span></div>
                    <input type="text" class="form-control" placeholder="Enter your postcode" />
                </div>
                <span class="form-text text-muted">Please enter your postcode</span>
            </div>
            <div class="col-lg-4">
                <label>User Group:</label>
                <div class="radio-inline">
                    <label class="radio radio-solid">
                        <input type="radio" name="example_2" checked="checked" value="2" />
                        <span></span>
                        Sales Person
                    </label>
                    <label class="radio radio-solid">
                        <input type="radio" name="example_2" value="2" />
                        <span></span>
                        Customer
                    </label>
                </div>
                <span class="form-text text-muted">Please select user group</span>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-8">
                <button type="reset" class="btn btn-primary mr-2">Submit</button>
                <button type="reset" class="btn btn-secondary">Cancel</button>
            </div>
        </div>
    </div>
</form>