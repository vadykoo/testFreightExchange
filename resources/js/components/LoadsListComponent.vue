<template>
    <div class="container">
        <router-link :to="{name: 'list', params: { locale: $i18n.locale }}" class="btn btn-success">{{ $t('message.name') }}</router-link>

        <h1>{{ $t('message.name') }}</h1>
        <div class="row">
                <div class="col-md-12">
                    <div class="card" v-for="(load, index) in loads">
                            <div class="card-header" v-on:click="setCurrent(index)">
                                <div class="row">
                                    <div class="col-8 font-weight-bold">{{load.city_from.name[$i18n.locale]}} - {{load.city_to.name[$i18n.locale]}}</div>
                                    <div class="col-4 text-right">{{load.volume}}T</div>
                                </div>
                            </div>

                        <div class="card-body" v-if="index === currentLoad">
                            <div class="row">
                                <div class="col">
                                <h2 class="font-weight-bold">{{load.name[$i18n.locale]}}</h2>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6"><img :src="load.photo" alt=""></div>
                                <div class="col-6">
                                    <iframe width="100%" height="" frameborder="0" v-bind:src="src(load.city_from.slug, load.city_to.slug)"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "LoadsListComponent",
        data: function () {
            return {
                loads: [],
                currentLoad: -1,
                url: 'https://www.google.com/maps/embed/v1/directions?key=AIzaSyDRcYekiNSpo3SbEUfZA2G71lDEd6Kk_WI',
            }
        },
        created() {
            this.fetchLoads(this.$route.params.city_from);
        },
        methods: {
            fetchLoads(city_from) {
                let page_url = '/api/loads';
                if(city_from) {
                    page_url = page_url + '/'+ city_from
                }
                fetch(page_url)
                    .then(res => res.json())
                    .then(res => {
                        this.loads = res.data;
                    })
                    .catch(err => console.log(err));

            },
            setCurrent(index) {
                if(this.currentLoad === index){
                    this.currentLoad = -1
                } else {
                    this.currentLoad = index
                }
                console.log(index);
                console.log(this.loads);
            },
            src:function (origin, destination) {
                return this.url+"&origin="+origin+"&destination="+destination ;
            }
        }
    }
</script>

<style scoped>
    img {
        max-width: 100%;
    }
</style>