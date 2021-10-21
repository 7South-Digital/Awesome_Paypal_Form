<div class="row">
    <div class="col-md-8">
        <form method="post">
            <div class="form-group">
                <label for="form-name">Paypal Client ID</label>
                <input type="text" class="form-control" name="paypal_clientid"  id="paypal_clientid" value="<?php echo $settings->getPaypal_clientid(); ?>" required>
                <small class="form-text text-muted">this text is the id of the form</small>
            </div>
            <div class="form-group">
                <label for="form-title">Paypal Secret</label>
                <input type="text" class="form-control" name="paypal_secret" id="paypal_secret" value="<?php echo $settings->getPaypal_secret(); ?>" required>
                <small class="form-text text-muted">this text will show in the popup</small>
            </div>
            <div class="form-group">
                <label for="form-title">Paypal Mode</label>
                <select class="form-control" id="paypal_mode" name="paypal_mode">
                    <option value="sandbox">SandBox</option>
                    <option value="live">Live</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
<?php
    if(isset($_POST["paypal_clientid"])){
        $settings->setPaypal_clientid($_POST['paypal_clientid']);
        $settings->setPaypal_secret($_POST['paypal_secret']);
        $settings->setPaypal_mode($_POST['paypal_mode']);
        $settings->Refresh();
    }
