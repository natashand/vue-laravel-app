<template>
    <ion-heder translucent margin-vertical>
        <ion-toolbar color="dark">
            <ion-buttons slot="start">
                <ion-button v-if="isHome" @click="onOpenModal">
                    <ion-icon name="contact"></ion-icon>
                </ion-button>
                <ion-button v-else>
                    <router-link to="/"><ion-icon name="arrow-back" style="zoom: 2.0; color: #ffffff"></ion-icon></router-link>
                </ion-button>
            </ion-buttons>
            <ion-title text-center>Ionic Vue</ion-title>
            <ion-buttons slot="end">
                <ion-button>
                    <router-link to="/login">
                        <ion-label color="light">Log</ion-label>
                    </router-link>
                </ion-button>
                <ion-button>
                    <router-link to="/register">
                        <ion-label color="light">Reg</ion-label>
                    </router-link>
                </ion-button>
            </ion-buttons>
        </ion-toolbar>
    </ion-heder>
</template>

<script>
    import ProfileModal from "./ProfileModal";
    export default {
        name: "Navbar",
        props: {
            isHome: {
                type: Boolean,
                default: true
            }
        },
        methods: {
            async onOpenModal() {
                let modal = await this.$ionic.modalController.create({
                    component: ProfileModal,
                    componentProps: {
                        parent: this,
                        propsData: {
                            timeStamp: new Date()
                        }
                    }
                });

                await modal.present();
                let modalResponse = await modal.onDidDismiss();
                modalResponse.data && this.modalCloseHandler({...modalResponse.data})
            }
        }
    }
</script>

<style scoped>

</style>
