<template lang="html">
    <div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label"><b>Arrastre</b></label>
                    <div class="controls">
                        <input class="form-control" :value="vservice.amount" name="amount" type="number" disabled>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label"><b>Maniobra</b></label>
                    <div class="controls">
                        <input class="form-control" :value="vservice.maneuver" name="maneuver" type="number" disabled>
                    </div>
                </div>
            </div>
            <div v-if="corp" class="col-md-4">
                <div class="form-group">
                    <label class="control-label"><b>Pension</b></label>
                    <div class="controls">
                        <input class="form-control" :value="vpension" name="pension" type="number" disabled>
                    </div>
                </div>
            </div>
            <!-- <div v-else class="col-md-4">
                <div class="form-group">
                    <label class="control-label"><b>Otros</b></label>
                    <div class="controls">
                        <input min="0" class="form-control" :value="vservice.others" name="others" type="number" disabled>
                    </div>
                </div>
            </div> -->
        </div>

        <h4 v-if="corp" class="pull-right"><b>Subtotal:</b> $ {{ subtotal.toFixed(2) }}</h4 v-if="corp">

        <div v-if="corp" class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label"><b>Descuento</b></label>
                    <div class="controls">
                        <input min="0" class="form-control" name="discount" type="number" v-model="vservice.discount" step="0.01">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label"><b>Razón</b></label>
                    <div class="controls">
                        <input class="form-control" name="reason" type="text" v-model="vservice.reason">
                    </div>
                </div>
            </div>
        </div>

        <div v-else class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label"><b>Tipo</b></label>
                    <div class="controls">
                        <select class="form-control" name="deposit" v-model="deposit">
                            <option value selected>¿Abono?</option>
                            <option value="0">No</option>
                            <option value="1">Sí</option>
                        </select>
                    </div>
                </div>
            </div>
            <div v-if="deposit==1" class="col-md-4">
                <div class="form-group">
                    <label class="control-label"><b>Pago</b></label>
                    <div class="controls">
                        <input class="form-control" :max="total.toFixed(2)" name="payment" type="number" v-model="vservice.payment" step="0.01">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label"><b>Método</b></label>
                    <div class="controls">
                        <select class="form-control" name="pay" required>
                            <option value>¿Cómo pagó?</option>
                            <option value="Efectivo" :selected="vservice.pay == 'Efectivo'">Efectivo</option>
                            <option value="T. Debito" :selected="vservice.pay == 'T. Debito'">T. Debito</option>
                            <option value="T. Credito" :selected="vservice.pay == 'T. Credito'">T. Credito</option>
                            <option value="Transferencia" :selected="vservice.pay == 'Transferencia'">Transferencia</option>
                            <option value="Cheque" :selected="vservice.pay == 'Cheque'">Cheque</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <h3 class="pull-right"><b>Total:</b> <span style="color: green;">$ {{ total.toFixed(2) }}</span></h3>
            </div>
        </div>

    </div>
</template>

<script>
export default {
    data() {
        return {
            vpension: 0,
            deposit:'',
            vservice: {},
        }
    },
    props: {
        corp: {
            type: Boolean,
            default: null
        },
        pension: Number,
        service: Object
    },
    computed: {
        subtotal() {
            return this.vservice.amount + this.vservice.others + this.vservice.maneuver + this.vpension;
        },
        total() {
            return this.vservice.amount + this.vservice.others + this.vservice.maneuver + this.vpension - this.vservice.discount;
        },
    },
    created() {
        this.vpension = this.pension;
        this.vservice = this.service;
        this.vservice.discount = this.vservice.discount ? this.vservice.discount: 0;
        this.vservice.others = this.vservice.others ? this.vservice.others: 0;
        this.vservice.reason = this.vservice.reason ? this.vservice.reason: '';
        this.vservice.pay = !this.vservice.pay || this.vservice.pay != 'Credito' ? this.vservice.pay: '';
    }
}
</script>
