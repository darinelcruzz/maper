<template lang="html">
    <tr>
        <td>
            <div class="form-group">
                <select class="form-control" name="routes[]" v-model="route_id">
                    <option value="" selected>Elija ruta</option>
                    <optgroup label="Local general">
                        <option v-if="route.type == 'localG'" v-for="route in routes" :value="route.id">{{ route.name }}</option>
                    </optgroup>
                    <optgroup label="Local corporaciones">
                        <option v-if="route.type == 'localC'" v-for="route in routes" :value="route.id">{{ route.name }}</option>
                    </optgroup>
                    <optgroup label="Ruta 1">
                        <option v-if="route.type == 'Ruta 1'" v-for="route in routes" :value="route.id">{{ route.name }}</option>
                    </optgroup>
                    <optgroup label="Ruta 2">
                        <option v-if="route.type == 'Ruta 2'" v-for="route in routes" :value="route.id">{{ route.name }}</option>
                    </optgroup>
                    <optgroup label="Ruta 3">
                        <option v-if="route.type == 'Ruta 3'" v-for="route in routes" :value="route.id">{{ route.name }}</option>
                    </optgroup>
                    <optgroup label="Ruta 4">
                        <option v-if="route.type == 'Ruta 4'" v-for="route in routes" :value="route.id">{{ route.name }}</option>
                    </optgroup>
                    <optgroup label="Ruta 5">
                        <option v-if="route.type == 'Ruta 5'" v-for="route in routes" :value="route.id">{{ route.name }}</option>
                    </optgroup>
                </select>
            </div>
        </td>

        <td>$ {{ moto }}</td>
        <td>$ {{ car }}</td>
        <td>$ {{ ton3 }}</td>
        <td>$ {{ ton5 }}</td>
        <td>$ {{ ton10 }}</td>
    </tr>
</template>

<script>
export default {
    data() {
        return {
            route_id: '',
            moto: 0,
            car: 0,
            ton3: 0,
            ton5: 0,
            ton10: 0,
        };
    },
    props: ['routes', 'num'],
    watch: {
        route_id: function (val, oldVal) {
            if(val == "") {
                this.moto = 0;
                this.car = 0;
                this.ton3 = 0;
                this.ton5 = 0;
                this.ton10 = 0;
            } else {
                this.moto = this.routes[val - 1].moto;
                this.car = this.routes[val - 1].car;
                this.ton3 = this.routes[val - 1].ton3;
                this.ton5 = this.routes[val - 1].ton5;
                this.ton10 = this.routes[val - 1].ton10;
            }

            this.$emit('prices', this.num, this.moto, this.car, this.ton3, this.ton5, this.ton10);
        },
    },
    created() {
        this.moto = this.routes[this.route_id - 1].moto;
        this.car = this.routes[this.route_id - 1].car;
        this.ton3 = this.routes[this.route_id - 1].ton3;
        this.ton5 = this.routes[this.route_id - 1].ton5;
        this.ton10 = this.routes[this.route_id - 1].ton10;
    }
}
</script>
