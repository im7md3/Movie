<template>
    <my-app>
        <div class="container mx-auto px-4 py-16">
            <div class="popular-actors">
                <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Popular Actors</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                    <div v-for="actor in popularActors" :key="actor.id" class="actor mt-8" >
                        <inertia-link :href="route('actors.show', actor.id)">
                            <img :src="'https://image.tmdb.org/t/p/w500/'+actor.profile_path" alt="profile image" class="hover:opacity-75 transition ease-in-out duration-150">
                        </inertia-link>
                        <div class="mt-2">
                            <inertia-link :href=" route('actors.show', actor.id) " class="text-lg hover:text-gray-300">{{ actor.name }}</inertia-link>
                            <div class="text-sm truncate text-gray-400">
                                <span v-for="(movie,index) in actor.known_for" :key="movie.id" >
                                    <span v-if="index<3">{{movie.original_title}}</span>
                                    <span v-if="index<3">,</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end popular-actors -->

            <div class="page-load-status my-8">
                <div class="flex justify-center">
                    <div class="infinite-scroll-request spinner my-8 text-4xl">&nbsp;</div>
                </div>
                <p class="infinite-scroll-last">End of content</p>
                <p class="infinite-scroll-error">Error</p>
            </div>

            <inertia-link :href="route('actors.page',this.page-1)" v-if="this.page>1">prev</inertia-link>
            <inertia-link :href="route('actors.page',1+parseInt(this.page))">next</inertia-link>
        </div>
    </my-app>
</template>

<script>
    import myApp from '@/Layouts/Myapp'
    export default {
        props: {
            popularActors: Object,
            page: Number,
        },
        components: {
            myApp,
        },
        methods:{
            
        }
    }

</script>
