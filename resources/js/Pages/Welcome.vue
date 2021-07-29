<template>
    <my-app>
        <div class="container mx-auto px-4 pt-16">
            <div class="popular-movies">
                <h2 class="uppercase tracking-wider text-yellow-500 text-lg font-semibold">Popular Movies</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                    <!-- @foreach ($popularMovies as $movie) -->
                    <movie-card :movies="popMovies" :genres="genres" />
                    <!-- @endforeach -->

                </div>
            </div> <!-- end pouplar-movies -->

            <div class="now-playing-movies py-24">
                <h2 class="uppercase tracking-wider text-yellow-500 text-lg font-semibold">Now Playing</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">

                    <movie-card :movies="nowPlayingMovies" :genres="genres" />

                </div>
            </div> <!-- end now-playing-movies -->
        </div>
    </my-app>
</template>

<script>
    import myApp from '@/Layouts/Myapp'
    import movieCard from './Movie/movieCard'

    export default {
        components: {
            myApp,
            movieCard
        },
        props: {
            popMovies: Object,
            nowPlayingMovies: Object,
            genres: Object
        }
    }

</script>
