<?php 
require_once AFP_PLUGIN_INCLUDE_PATH . "payment.php";
use Plugin\Afp_Payment;
?>
<form method="post">
<div class="row">
    <?php 
        if(isset($_GET["paymentId"])){
            $complete = new Afp_Payment();
            $complete->PaypalStatus($_GET["paymentId"], $_GET["PayerID"], $_GET["token"]);
        }
    ?>
    <div class="col-md-6">
        <div class="form-group">
            <label for="form-title">Tu pregunta para nuestros abogados *</label>
            <textarea class="form-control" name="form-description" id="form-description" aria-describedby="help-decrp" cols="10" rows="17" maxlength="3000" style="height: 370px;" required></textarea>
        </div>
    </div>    
    <div class="col-md-6">
        <div class="form-group">
            <label for="select1">Que tan rapido necesitas tu respuesta?</label>
            <select class="form-control" id="select1">
                <option value="24 Horas">24 Horas</option>
                <option value="2 días">2 días</option>
                <option value="3 días">3 días</option>
                <option value="5 días">5 días</option>
            </select>
        </div>
        <div class="form-group">
            <label for="select2">Con cual profundidad podemos ayudar?</label>
            <select class="form-control" id="select2">
                <option value="Una Explicación breve">Una Explicación breve</option>
                <option value="Una Consulta detallada">Una Consulta detallada</option>
                <option value="Mucho profundidad y detalle">Mucho profundidad y detalle</option>
            </select>
        </div>
        <div class="form-group">
            <label for="form-name">Nombre y apellidos</label>
            <input type="text" class="form-control" name="form-name"  id="form-name"  required>
        </div>
        <div class="form-group">
            <label for="form-name">Correo electronico *</label>
            <input type="text" class="form-control" name="form-name"  id="form-name" required>
        </div>
        <div class="form-group">
            <label for="form-name">Sube un archivo adicional</label>
            <input type="file" class="form-control" name="form-name"  id="form-name" required>
        </div>
    </div>
</div>
<div class="row">
    <div class="main-check">    
        <label><input type="checkbox" name="acceptance-1" value="1" aria-invalid="false"><span class="">He leído y aceptado los <a target="_blank" href="/terminos-y-condiciones/">terminos y condiciónes</a></span></label>
        <label><input type="checkbox" name="acceptance-2" value="1" aria-invalid="false"><span class="">He leído y aceptado la <a target="_blank" href="/aviso-de-privacidad/">politica de privacidad</a></span></label>
    </div>
</div>
<div class="row">
    <div class="col-md-8">
        <input type="hidden" name="afp_price" id="afp_price">
        <button type="submit" class="btn btn-primary">Send</button><br>
    </div>
    <div class="col-md-4">
        <span class="afp_price-label float-right">€ 24,80</span>
    </div>
</div>
</form>
<?php 
    if(isset($_POST["form-name"])){
        $pay = new Afp_Payment($_POST["afp_price"],$_POST["form-name"]);
        $pay->PayPaypal();
    }
?>