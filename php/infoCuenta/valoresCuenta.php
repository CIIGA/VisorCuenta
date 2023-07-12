<form id="formValorCuenta">
    <div class="mx-5" id="content_4">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="SupTerrenoH" class="col-md-4 control-label">Superficie Terreno H:</label>
                    <div class="col-md-8">
                        <input name="SupTerrenoH" type="text" id="SupTerrenoH" class="form-control" placeholder="Ingresa una superficie terreno H" onkeypress="return soloDecimales(event);">
                    </div>
                </div>
                <div class="form-group">
                    <label for="SupConstruccionH" class="col-md-4 control-label">Superficie Construccion H:</label>
                    <div class="col-md-8">
                        <input name="SupConstruccionH" type="text" id="SupConstruccionH" class="form-control" placeholder="Ingresa una superficie construccion H" onkeypress="return soloDecimales(event);">
                    </div>
                </div>
                <div class="form-group">
                    <label for="ValTerrenoH" class="col-md-4 control-label">Valor Terreno H:</label>
                    <div class="col-md-8">
                        <input name="ValTerrenoH" type="text" id="ValTerrenoH" class="form-control" placeholder="Ingresa un valor terreno H" onkeypress="return soloDecimales(event);">
                    </div>
                </div>
                <div class="form-group">
                    <label for="ValConstruccionH" class="col-md-4 control-label">Valor Construccion H:</label>
                    <div class="col-md-8">
                        <input name="ValConstruccionH" type="text" id="ValConstruccionH" class="form-control" placeholder="Ingresa un valor construccion H" onkeypress="return soloDecimales(event);">
                    </div>
                </div>
                <div class="form-group">
                    <label for="ValCatastralH" class="col-md-4 control-label">Valor Catastral H:</label>
                    <div class="col-md-8">
                        <input name="ValCatastralH" type="text" id="ValCatastralH" class="form-control" placeholder="Ingresa un valor catastral H" onkeypress="return soloDecimales(event);">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="SupTerrenoV" class="col-md-4 control-label">Superficie Terreno Valuado:</label>
                    <div class="col-md-8">
                        <input name="SupTerrenoV" type="text" id="SupTerrenoV" class="form-control" placeholder="Ingresa una superficie terreno valuado" onkeypress="return soloDecimales(event);">
                    </div>
                </div>
                <div class="form-group">
                    <label for="SupConstruccionV" class="col-md-4 control-label">Superficie Construccion Valuado:</label>
                    <div class="col-md-8">
                        <input name="SupConstruccionV" type="text" id="SupConstruccionV" class="form-control" placeholder="Ingresa una superficie construccion valuado" onkeypress="return soloDecimales(event);">
                    </div>
                </div>
                <div class="form-group">
                    <label for="ValTerrenoV" class="col-md-4 control-label">Valor Terreno Valuado:</label>
                    <div class="col-md-8">
                        <input name="ValTerrenoV" type="text" id="ValTerrenoV" class="form-control" placeholder="Ingresa un valor terreno valuado" onkeypress="return soloDecimales(event);">
                    </div>
                </div>
                <div class="form-group">
                    <label for="ValConstruccionV" class="col-md-4 control-label">Valor Construccion Valuado:</label>
                    <div class="col-md-8">
                        <input name="ValConstruccionV" type="text" id="ValConstruccionV" class="form-control" placeholder="Ingresa un valor construccion valuado" onkeypress="return soloDecimales(event);">
                    </div>
                </div>
                <div class="form-group">
                    <label for="ValCatastralV" class="col-md-4 control-label">Valor Catastral Valuado:</label>
                    <div class="col-md-8">
                        <input name="ValCatastralV" type="text" id="ValCatastralV" class="form-control" placeholder="Ingresa un valor catastral valuado" onkeypress="return soloDecimales(event);">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-2 button-center">
         <button type="submit" id="btnGuardar" class="btn btn-save">Guardar</button>
     </div>
</form>
<!-- script  -->
<script src="js/form/formValoresCuenta.js"></script>