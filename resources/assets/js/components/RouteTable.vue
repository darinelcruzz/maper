<template lang="html">
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th v-for="head in header" :style="head.width">{{ head.name }}</th>
                </tr>
            </thead>
            <tbody>
                <route-row :routes="routes" :type="type"></route-row>
                <route-row :routes="routes" :type="type"></route-row>
                <route-row :routes="routes" :type="type"></route-row>
                <route-row :routes="routes" :type="type"></route-row>
            </tbody>
            <tfoot>
                <tr>
                    <td><b>Total:</b></td>
                    <td colspan="4"></td>
                    <td>$ {{ total }}</td>
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
                { name:'Moto', width: 'width: 12%' },
                { name:'Carro', width: 'width: 12%' },
                { name:'3 T', width: 'width: 12%' },
                { name:'5 T', width: 'width: 12%' },
                { name:'10 T', width: 'width: 12%' },
            ],
            total: 0,
        };
    },
    props: ['routes', 'type'],

    methods: {
        addToTotal(total, num) {
            this.subtotals[num - 1] = total;

            this.total = this.subtotals.reduce(function (total, value) {
                return total + value;
            }, 0);
        }
    },
}
</script>
