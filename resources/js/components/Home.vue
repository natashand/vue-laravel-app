<template>
    <ion-content>
        <toolbar/>
        <ion-list>
            <ion-item button v-for="(file, i) in files" :key="i">
                <ion-icon slot="start" :name="file.icon" :style="`color: ${file.color}`"></ion-icon>
                <router-link :to="{name: 'files', params: {typeFiles: file.title}}">
                    <ion-label color="dark">{{ file.title }}</ion-label>
                </router-link>
            </ion-item>
        </ion-list>
    </ion-content>
</template>

<script>
    import Toolbar from "./Toolbar";

    export default {
        name: 'Home',
        components: {Toolbar},
        data() {
            return {
                files: [
                    {title: 'Images6', icon: 'images', color: '#F46529'},
                    {title: 'Documents', icon: 'document', color: '#0CA9EA'},
                    {title: 'Archives', icon: 'folder', color: '#78BD43'},
                ]
            }
        },
        methods: {
        }
    }
</script>
