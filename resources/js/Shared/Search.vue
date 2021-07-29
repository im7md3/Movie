<template>
    <div class="relative mt-3 md:mt-0 " >
        <input type="text" v-model="form.search" @keyup="this.showResult" @click="showResult"
            class="bg-gray-800 text-sm rounded-full w-64 px-4 pl-8 py-1 focus:outline-none focus:shadow-outline"
            placeholder="Search (Press '/' to focus)">
        <div class="absolute top-0">
            <svg class="fill-current w-4 text-gray-500 mt-2 ml-2" viewBox="0 0 24 24">
                <path class="heroicon-ui"
                    d="M16.32 14.9l5.39 5.4a1 1 0 01-1.42 1.4l-5.38-5.38a8 8 0 111.41-1.41zM10 16a6 6 0 100-12 6 6 0 000 12z" />
                </svg>
        </div>
        <div class="spinner top-0 right-0 mr-4 mt-3"></div>

        <div class="z-50 absolute bg-gray-800 text-sm rounded w-64 mt-0 " v-show="$page.props.openSearch">
                <ul v-if="results.length>0"  >
                        <li v-for="result in results" :key="result.id" class="border-b border-gray-700">
                            <inertia-link
                                :href="route('movies.show', result.id) " class="block hover:bg-gray-700 px-3 py-3 flex items-center transition ease-in-out duration-150">
                                <img v-if="result.poster_path" :src="'https://image.tmdb.org/t/p/w92/'+result.poster_path " alt="poster" class="w-8">
                                <img v-else :src="'https://via.placeholder.com/50x75'" alt="poster" class="w-8"> 
                            <span class="ml-4">{{result.title}}</span> 
                        </inertia-link>
                        </li>
                </ul>
                <div v-else class="px-3 py-3" v-show="form.search.length>0">No results for search {{this.form.search}}</div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                form:{
                    search:''
                },
                results:[],
            }
        },
        methods:{
            showResult(){
                if(this.form.search.length>0){
                    axios.post(route('search'),this.form).then(res=>{
                        this.results=res.data;
                    this.$page.props.openSearch=true;
                }) 
                }
            },
        },
    }

</script>
