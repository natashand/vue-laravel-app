<template>
    <ion-content fullscreen>
        <toolbar :is-home="false"></toolbar>
        <div style="margin-top: 40px">
            <ion-fab horizontal="end" vertical="top" slot="fixed" margin-top>
                <ion-fab-button color="secondary">
                    <ion-icon name="add"></ion-icon>
                </ion-fab-button>
            </ion-fab>
        </div>
        <ion-card v-for="(item, index) in images" :key="index">
            <img src="http://placekitten.com/200/100" @click="onShowContent(item.id)">
            <ion-card-header>
                <ion-card-subtitle>
                    <ion-label>{{(timeStamp +"").split('(')[0]}}</ion-label>
                </ion-card-subtitle>
                <ion-card-title>{{ item.title + item.id }}</ion-card-title>
            </ion-card-header>
            <ion-card-content>
                <ion-row>
                    <ion-col>
                        <ion-button color="success" expand="block" @click="">Download</ion-button>
                    </ion-col>
                    <ion-col>
                        <ion-button expand="block" color="danger" @click="">Delete</ion-button>
                    </ion-col>
                </ion-row>
            </ion-card-content>
        </ion-card>
    </ion-content>
</template>

<script>
    import Toolbar from "./Toolbar";

    export default {
        name: "ImagesList",
        components: {Toolbar},
        props: {
            typeFiles: {
                type: String
            }
        },
        data() {
            return {
                timeStamp: new Date(),
                images: [
                    {id: 1, title: 'Name ', show: false},
                    {id: 2, title: 'Name ', show: false},
                    {id: 3, title: 'Name ', show: false},
                    {id: 4, title: 'Name ', show: false},
                    {id: 5, title: 'Name ', show: false},
                    {id: 6, title: 'Name ', show: false},
                ]
            }
        },
        methods: {
            onShowContent(id) {
                let image = this.images.find((item) => {
                    return item.id === +id
                });
                image.show !== image.show;
            }
        }
    }
</script>

<style scoped>

</style>
