<template>
            <ul>
                <li v-for="locale in locales" :key="locale" @click="switchLocale(locale)">
                    {{locale}}
                </li>
            </ul>
</template>

<script>
    export default {
        name: 'LocaleSwitcher',
        methods: { // <---------------------------
            switchLocale(locale) {
                if (this.$i18n.locale !== locale && locale !== this.$i18n.locale ) {
                    this.$i18n.locale = locale;
                    const to = this.$router.resolve({ params: {locale} })
                    this.$router.push(to.location)
                }
            }
        },
        data() {
            return {
                locales: ['en', 'uk']
            }
        }
    }
</script>

<style scoped>
    li {
        text-decoration: underline;
        color: #459CE7;
        cursor: pointer;
    }
</style>