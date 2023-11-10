<template>
    <div @dblclick="open" class="block-card-wrapper">
        <k-aspect-ratio
            class="k-block-card-image"
            cover="true"
            ratio="3/2"
            v-if="image.url"
        >
            <img
                :src="image.url"
                alt=""
            >
        </k-aspect-ratio>
        <div class="k-block-card-copy">
            <h2 class="k-block-card-copy-heading">{{ heading }}</h2>
            <div class="k-block-card-copy-text" v-html=text></div>
            <a class="k-block-card-copy-text" :href=url >{{ url }}</a>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                text: "No text value"
            };
        },
        computed: {
            cardType() {
                return this.content.cardtype;
            },
            heading() {
                return (this.cardType === 'manual') ? this.content.heading : this.page.text;
            },
            image() {
                if(this.cardType === 'manual') {
                    return this.content.image[0] || {};
                } else {
                    return this.page.image || {}
                }
            },
            pageId() {
                return this.page ? this.page.id : '';
            },
            page() {
                return this.content.page[0] || {};
            },
            url(){
                return (this.cardType === 'manual') ? this.content.link : this.page.url;
            }
        },
        watch: {
            "cardType": {
            handler (value) {
                if(value === 'page' && this.pageId) {
                    this.$api.get('pages/' + this.pageId.replaceAll('/', '+')).then(page => {
                    this.text = page.content.seo_description.replace(/(<([^>]+)>)/gi, "") || this.text;
                    });
                } else if(value === 'manual') {
                    this.text = this.content.text || this.text;
                }
            },
            immediate: true
            },
            "page": {
                handler (value) {
                if(this.cardType === 'page' && this.pageId) {
                    this.$api.get('pages/' + this.pageId.replaceAll('/', '+')).then(page => {
                    this.text = page.content.seo_description.replace(/(<([^>]+)>)/gi, "") || this.text;
                    });
                } else if(value === 'manual') {
                    this.text = this.content.text || this.text;
                }
                },
                immediate: true
            }
        
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