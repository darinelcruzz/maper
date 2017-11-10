<template lang="html">
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th v-for="head in header" :style="head.width">{{ head.name }}</th>
                </tr>
            </thead>
            <tbody>
                <route-row :routes="routes" :num="1" @prices="addToTotal"></route-row>
                <route-row :routes="routes" :num="2" @prices="addToTotal"></route-row>
                <route-row :routes="routes" :num="3" @prices="addToTotal"></route-row>
                <route-row :routes="routes" :num="4" @prices="addToTotal"></route-row>
            </tbody>
            <tfoot>
                <tr>
                    <td style="text-align:center;"><b>TOTAL</b></td>
                    <td>$ {{ totals[0].total }}</td>
                    <td>$ {{ totals[1].total }}</td>
                    <td>$ {{ totals[2].total }}</td>
                    <td>$ {{ totals[3].total }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
</template>

<script>
export default {
    data() {
        return {
            header: [
                { name:'Ruta', width: 'width: 40%' },
                { name:'Carro', width: 'width: 15%' },
                { name:'3 T', width: 'width: 15%' },
                { name:'5 T', width: 'width: 15%' },
                { name:'10 T', width: 'width: 15%' },
            ],
            totals: [
                { subtotals: [0, 0, 0, 0], total: 0},
                { subtotals: [0, 0, 0, 0], total: 0},
                { subtotals: [0, 0, 0, 0], total: 0},
                { subtotals: [0, 0, 0, 0], total: 0}
            ],
        };
    },
    props: ['routes'],

    methods: {
        addToTotal(num, car, ton3, ton5, ton10) {
            this.totals[0].subtotals[num - 1] = car;
            this.totals[1].subtotals[num - 1] = ton3;
            this.totals[2].subtotals[num - 1] = ton5;
            this.totals[3].subtotals[num - 1] = ton10;

            this.totals[0].total = this.totals[0].subtotals.reduce(function (total, value) {
                return total + value;
            }, 0);
            this.totals[1].total = this.totals[1].subtotals.reduce(function (total, value) {
                return total + value;
            }, 0);
            this.totals[2].total = this.totals[2].subtotals.reduce(function (total, value) {
                return total + value;
            }, 0);
            this.totals[3].total = this.totals[3].subtotals.reduce(function (total, value) {
                return total + value;
            }, 0);
        },
    },
}
</script>
