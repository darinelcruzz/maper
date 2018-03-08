<template lang="html">
    <div :class="['small-box bg-' + color]">
        <div class="inner">
            <slot></slot>
        </div>
        <div class="icon">
            <i :class="['fa fa-' + icon]"></i>
        </div>
    </div>
</template>

<script>
export default {
    props: ['color', 'icon']
}
</script>

<style lang="css">
</style>
