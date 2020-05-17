import LoadList from '../components/LoadsListComponent.vue'

export const routes = [
    {
        path: '/:locale?',
        component: {
            template: "<router-view></router-view>"
        },
        children: [
            {
                path: '',
                name: 'list',
                component: LoadList,
            },
            {
                path: 'from/:city_from',
                name: 'from',
                component: LoadList
            },
            {
                path: 'to/:city_to',
                name: 'to',
                component: LoadList
            },
            {
                path:'*',
                component: LoadList
            },
        ],
    },
];