<template>
<div @click="[$page.props.openSearch=false]">
    <my-nav></my-nav>
    <div class="container mx-auto px-28 my-10">
        <slot></slot>
    </div>

    <footer class="border border-t border-gray-800">
        <div class="container mx-auto px-28 my-10">
            <div class="container mx-auto text-sm px-4 text-center">
                Powered by <a href="https://www.themoviedb.org/documentation/api"
                    class="underline hover:text-gray-300">TMDb API</a>
            </div>
        </div>
    </footer>
</div>
</template>

<script>
    import myNav from '@/Shared/Nav'
    export default {
        components: {
            myNav
        }
    }

</script>
