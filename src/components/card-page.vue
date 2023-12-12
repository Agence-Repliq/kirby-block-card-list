<template>
    <div @dblclick="open">
        <div v-for="(item, index) in content[sourceField]"  class="block-card-wrapper" :key="index" >
            <div class="k-block-card-copy">
                <h1>{{item.title}}</h1>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        computed: {
            sourceField() {
                return this.content.card_template;
            },
        },
        watch: {
        
        }
    }
</script>

<style lang="scss">

    .block-card-wrapper {
        max-width: 15rem;
        border-radius: var(--rounded);
        overflow: hidden;
        box-shadow: var(--shadow);
        background: var(--color-gray-100);

        .k-block-card-copy {
            padding: var(--spacing-2) var(--spacing-3);
        }
        .k-block-card-copy-heading {
            font-size: var(--text-base);
        }
        .k-block-card-copy-text {
            font-size: var(--text-base);
        }
    }
</style>