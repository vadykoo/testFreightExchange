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
                    let to;
                    if(locale === process.env.MIX_APP_I18N_LOCALE){
                        to = this.$router.resolve({ params: {locale: ''} })
                    } else {
                        to = this.$router.resolve({ params: {locale} })
                    }
                    this.$router.push(to.location)
                    this.$router.go(0);
                }
            }
        },
        data() {
            return {
                locales: process.env.MIX_APP_I18N_SUPPORTED_LOCALE.split(',')
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