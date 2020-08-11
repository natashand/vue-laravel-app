<template>
    <div>
        <ion-header translusent no-border>
            <ion-toolbar>
                <ion-title text-center>Profile</ion-title>
            </ion-toolbar>
        </ion-header>
        <ion-content>
            <ion-card class="ios hydrated">
                <img src="https://ionicframework.com/docs/demos/api/card/madison.jpg">
                <ion-card-header class="ion-inherit-color ios hydrated">
                    <ion-card-subtitle role="heading" aria-level="3" class="ion-inherit-color ios hydrated">Destination</ion-card-subtitle>
                    <ion-card-title role="heading" aria-level="2" class="ion-inherit-color ios hydrated">Madison, WI</ion-card-title>
                </ion-card-header>
                <ion-card-content class="ios card-content-ios hydrated">
                    Founded in 1829 on an isthmus between Lake Monona and Lake Mendota, Madison was named the capital of the Wisconsin Territory in 1836.
                </ion-card-content>
            </ion-card>
        </ion-content>
    </div>
</template>

<script>
    export default {
        name: "SimpleModal",
        props: ["timeStamp"],
        data() {
            return {
                noteInfo: {
                    title: "",
                    description: ""
                }
            };
        },
        methods: {
            modalClose: function(success) {
                let response = {
                    success,
                    noteInfo: success ? this.noteInfo : null
                };
                this.$ionic.modalController.dismiss(response);
            }
        },
    };
</script>

<style scoped>
</style>
