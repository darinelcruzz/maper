<template lang="html">
    <div>
        <div v-if="ser == 'corp'" class="row">
            <div class="col-md-4">
                <slot name="releaser"></slot>
            </div>
        </div>

        <div class="box-header with-border">
            <h3 class="box-title">Pago
                <i class="fa fa-dollar" aria-hidden="true"></i>
            </h3>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div id="field_amount" class="form-group">
                    <label for="amount" class="control-label">Arrastre</label>
                    <div class="controls">
                        <input min="0" class="form-control" v-model="vamount" id="amount" name="amount" type="number">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div id="field_maneuver" class="form-group">
                    <label for="maneuver" class="control-label">Maniobra</label>
                    <div class="controls">
                        <input min="0" class="form-control" id="maneuver" name="maneuver" type="number" v-model="vmaneuver">
                    </div>
                </div>
            </div>
            <div v-if="ser == 'gen'" class="col-md-4">
                <div id="field_others" class="form-group">
                    <label for="others" class="control-label">Otros</label>
                    <div class="controls">
                        <input min="0" class="form-control" id="others" name="others" type="number" v-model="vothers">
                    </div>
                </div>
            </div>
            <div v-else class="col-md-4">
                <div id="field_pension" class="form-group">
                    <label for="pension" class="control-label">Pension</label>
                    <div class="controls">
                        <input min="0" class="form-control" id="pension" disabled name="pension" type="number" v-model="vpension">
                    </div>
                </div>
            </div>
        </div>

        <div v-if="ser == 'corp'">
            <div class="row">
                <div class="col-md-8"></div>
                <div class="col-md-4">
                   <h4><B>Subtotal $ {{ subtotal }}</B></h4>
               </div>
            </div>
            <div class="row">
                <div  class="col-md-4"></div>
                <div class="col-md-4">
                    <slot name="reason"></slot>
                </div>
                <div class="col-md-4">
                    <div id="field_discount" class="form-group">
                        <label for="discount" class="control-label">Descuento</label>
                        <div class="controls">
                            <input min="0" class="form-control" id="discount" name="discount" type="number" v-model="vdiscount">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <slot name="select"></slot>
            </div>
            <div class="col-md-4"></div>
            <div class="col-md-4">
               <h3><B>Total $ {{ total }}</B></h3>
           </div>
        </div>

    </div>
</template>

<script>
export default {
    data() {
        return {
            vamount: 0,
            vmaneuver: 0,
            vothers: 0,
            vpension: 0,
            vdiscount: 0,
        }
    },
    props: ['ser', 'amount', 'maneuver', 'others', 'pension', 'discount'],
    computed: {
        subtotal: function () {
            return parseInt(this.vamount) + parseInt(this.vothers) + parseInt(this.vmaneuver) + parseInt(this.vpension);
        },
        total: function () {
            return parseInt(this.vamount) + parseInt(this.vothers) + parseInt(this.vmaneuver) + parseInt(this.vpension) - parseInt(this.vdiscount);
        },
    },
    created() {
        this.vamount = this.amount;
        this.vmaneuver = this.maneuver;
        this.vothers = this.others;
        this.vpension = this.pension;
        this.vdiscount = this.discount;
    }
}
</script>

<style lang="css">
</style>
