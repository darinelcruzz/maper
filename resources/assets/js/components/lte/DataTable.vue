<template lang="html">
    <row-woc :col="col">
        <solid-box :title="title" :color="color" :collapsed="collapsed" :button="button">
            <div class="table-responsive">
                <table :id="example" class="table table-bordered table-striped">
                    <thead>
                        <slot name="header"></slot>
                    </thead>
                    <tbody>
                        <slot name="body"></slot>
                    </tbody>
                    <tfoot>
                        <slot name="footer"></slot>
                    </tfoot>
                </table>
            </div>
        </solid-box>
    </row-woc>
</template>

<script>
export default {
    data() {
        return {
            isCollapsed: false,
            showButton: false,
            colorBox: 'box-',
        };
    },
    props: ['col', 'title', 'example', 'color', 'collapsed', 'button'],
    created() {
        this.isCollapsed = this.collapsed == '';
        this.showButton = this.button == '';
        this.colorBox += this.color;
    }
}
</script>
