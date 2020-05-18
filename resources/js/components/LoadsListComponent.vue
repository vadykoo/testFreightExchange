<template>
    <div class="container">
        <a href="/api/generate" target="_blank" class="btn btn-success">Згенерувати вантаж для перевірки роботи вебхук </a>
        <h1>{{ $t('message.name') }}</h1>
        <div class="row">
                <div class="col-md-12">
                    <div v-if="loads === false" class="row">
                        <h2 class="col text-center">{{ $t('message.loads_not_found') }}</h2>
                    </div>
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
                                    <iframe width="100%" height="100%" frameborder="0" v-bind:src="src(load.city_from.slug, load.city_to.slug)"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</template>

<script>
    import Pusher from 'pusher-js' // import Pusher

    export default {
        name: "LoadsListComponent",
        data: function () {
            return {
                loads: [],
                currentLoad: -1,
                url: 'https://www.google.com/maps/embed/v1/directions?key=' + process.env.MIX_APP_GOOGLE_MAPS_KEY + '&language=' + this.$i18n.locale,
            }
        },
        created() {
            this.fetchLoads(this.$route.params.city_from);
        },
        mounted(){
            let pusher = new Pusher(process.env.MIX_PUSHER_APP_KEY, { cluster: process.env.MIX_PUSHER_APP_CLUSTER })
            pusher.subscribe('newLoadChannel')
            pusher.bind('newLoadEvent', data => {
                if(!this.$route.params.city_from) {
                    this.loads.unshift(data.load);
                }
            })
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
                    .catch(err => {
                        console.log(err);
                        this.loads = false;
                    });

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