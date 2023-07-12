<form 
id="formAdeudoCuenta"
>
<!-- method="post"
action="php/actions/adeudosCuentaSave.php" -->
    <div class="mx-1" id="content_5">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="SaldoCorriente" class="col-md-4 control-label">Saldo Corriente:</label>
                    <div class="col-md-8">
                        <input name="IdAdeudo" type="text" id="IdAdeudo" hidden>
                        <input name="SaldoCorriente" type="text" id="SaldoCorriente" class="form-control" placeholder="Ingresa un saldo corriente">
                    </div>
                </div>
                <div class="form-group">
                    <label for="SaldoRezago" class="col-md-4 control-label">Saldo Rezago:</label>
                    <div class="col-md-8">
                        <input name="SaldoRezago" type="text" id="SaldoRezago" class="form-control" placeholder="Ingresa un saldo rezago">
                    </div>
                </div>
                <div class="form-group">
                    <label for="SConvenioAgua" class="col-md-4 control-label">SConvenio Agua:</label>
                    <div class="col-md-8">
                        <input name="SConvenioAgua" type="text" id="SConvenioAgua" class="form-control" placeholder="Ingresa un sconvenio agua">
                    </div>
                </div>
                <div class="form-group">
                    <label for="RecargosConvenio" class="col-md-4 control-label">Recargos Convenio:</label>
                    <div class="col-md-8">
                        <input name="RecargosConvenio" type="text" id="RecargosConvenio" class="form-control" placeholder="Ingresa un recargo convenio">
                    </div>
                </div>
                <div class="form-group">
                    <label for="VencidoContrato" class="col-md-4 control-label">Vencido Contrato:</label>
                    <div class="col-md-8">
                        <input name="VencidoContrato" type="text" id="VencidoContrato" class="form-control" placeholder="Ingresa un recargo convenio">
                    </div>
                </div>
                <div class="form-group">
                    <label for="GastoEj" class="col-md-4 control-label">Gastos Ej:</label>
                    <div class="col-md-8">
                        <input name="GastoEj" type="text" id="GastoEj" class="form-control" placeholder="Ingresa un gasto ej">
                    </div>
                </div>
                <div class="form-group">
                    <label for="MultasOTros" class="col-md-4 control-label">Multas Otros:</label>
                    <div class="col-md-8">
                        <input name="MultasOTros" type="text" id="MultasOTros" class="form-control" placeholder="Ingresa una multa otros">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="Fomento" class="col-md-4 control-label">Fomento:</label>
                    <div class="col-md-8">
                        <input name="Fomento" type="text" id="Fomento" class="form-control" placeholder="Ingresa un fomento">
                    </div>
                </div>
                <div class="form-group">
                    <label for="Recargos" class="col-md-4 control-label">Recargos:</label>
                    <div class="col-md-8">
                        <input name="Recargos" type="text" id="Recargos" class="form-control" placeholder="Ingresa un recargo">
                    </div>
                </div>
                <div class="form-group">
                    <label for="FechaUPago" class="col-md-4 control-label">Fecha de Ultimo Pago:</label>
                    <div class="col-md-8">
                        <div class="input-group form_datetime date" id="datetimepcker3" data-date-format="dd-MM-yyyy">
                            <input name="FechaUlPago" type="date" id="FechaUlPago" class="form-control" placeholder="Selecciona una Fecha">
                        </div>
                    </div>
                </div>
                <!-- <div class="form-group">
                    <label for="Efectos" class="col-md-4 control-label">Efectos:</label>
                    <div class="col-md-8">
                        <input name="EfectosA" type="text" id="EfectosA" class="form-control" placeholder="Ingresa un Efecto">
                    </div>
                </div> -->
                <div class="form-group">
                    <label for="SaldoAtraso" class="col-md-4 control-label">Saldo Atraso:</label>
                    <div class="col-md-8">
                        <input name="SaldoAtraso" type="text" id="SaldoAtraso" class="form-control" placeholder="Ingresa un saldo atraso">
                    </div>
                </div>
                <div class="form-group">
                    <label for="RecargosAcum" class="col-md-4 control-label">Recargos Acum:</label>
                    <div class="col-md-8">
                        <input name="RecargosAcum" type="text" id="RecargosAcum" class="form-control" placeholder="Ingresa un recargo acumulado">
                    </div>
                </div>
                <div class="form-group">
                    <label for="VencidoConvenio" class="col-md-4 control-label">Vencido Convenio:</label>
                    <div class="col-md-8">
                        <input name="VencidoConvenio" type="text" id="VencidoConvenio" class="form-control" placeholder="Ingresa un vencido convenio">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="SConvenioObra" class="col-md-4 control-label">SConvenio Obra:</label>
                    <div class="col-md-8">
                        <input name="SConvenioObra" type="text" id="SConvenioObra" class="form-control" placeholder="Ingresa un sconvenio obra">
                    </div>
                </div>
                <div class="form-group">
                    <label for="RecargosContrato" class="col-md-4 control-label">Recargos Contrato:</label>
                    <div class="col-md-8">
                        <input name="RecargosContrato" type="text" id="RecargosContrato" class="form-control" placeholder="Ingresa un recargo contrato" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="Multas" class="col-md-4 control-label">Multas:</label>
                    <div class="col-md-8">
                        <input name="Multas" type="text" id="Multas" class="form-control" placeholder="Ingresa una multa">
                    </div>
                </div>
                <div class="form-group">
                    <label for="Impuesto" class="col-md-4 control-label">Impuesto:</label>
                    <div class="col-md-8">
                        <input name="Impuesto" type="text" id="Impuesto" class="form-control" placeholder="Ingresa un impuesto" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="Actualizacion" class="col-md-4 control-label">Actualizacion:</label>
                    <div class="col-md-8">
                        <input name="Actualizacion" type="text" id="Actualizacion" class="form-control" placeholder="Ingresa una actualizacion">
                    </div>
                </div>
                <div class="form-group">
                    <label for="FechaAct" class="col-md-4 control-label">Fecha de Actualizacion:</label>
                    <div class="col-md-8">
                        <div class="input-group form_datetime date" id="datetimepcker4" data-date-format="dd-MM-yyyy">
                            <input name="FechaAct" type="date" id="FechaAct" class="form-control" placeholder="Selecciona una Fecha">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Total" class="col-md-4 control-label">Total:</label>
                    <div class="col-md-8">
                        <input name="Total" type="text" id="Total" class="form-control" placeholder="Ingresa un total" >
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
<script src="js/form/formAdeudosCuenta.js"></script>