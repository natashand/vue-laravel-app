<template>
    <ion-content>
        <ion-grid>
            <ion-row>
                <ion-col size-md="6" offset-md="3">
                    <ion-card>
                        <ion-card-header>
                            <ion-card-title>Login</ion-card-title>
                        </ion-card-header>

                        <ion-card-content>
                            <ion-item>
                                <ion-label position="floating">Name</ion-label>
                                <ion-input type="text"></ion-input>
                            </ion-item>
                            <ion-item>
                                <ion-label position="floating">Email</ion-label>
                                <ion-input type="email"></ion-input>
                            </ion-item>
                            <ion-item>
                                <ion-label position="floating">Password</ion-label>
                                <ion-input type="password"></ion-input>
                            </ion-item>
                            <div margin-vertical>
                                <ion-button expand="block" color="success" @click="onRegistration">
                                    <ion-icon slot="start" name="checkmark"></ion-icon>
                                    Register
                                </ion-button>
                            </div>
                        </ion-card-content>
                    </ion-card>
                </ion-col>
            </ion-row>
        </ion-grid>
    </ion-content>
</template>

<script>
    export default {
        name: "Register",
        data() {
            return {}
        },
        methods: {
            async onRegistration() {
                const alertController = document.querySelector('ion-alert-controller');
                await alertController.componentOnReady();

                const alert = await alertController.create({
                    header: 'Alert',
                    subHeader: 'Subtitle',
                    message: 'This is an alert message.',
                    buttons: ['OK']
                });
                return await alert.present();
            }
        }
    }
</script>

<style scoped>
</style>
