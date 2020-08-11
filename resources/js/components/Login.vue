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
                                <ion-label position="floating">Email</ion-label>
                                <ion-input type="email"></ion-input>
                            </ion-item>
                            <ion-item>
                                <ion-label position="floating">Password</ion-label>
                                <ion-input type="password"></ion-input>
                            </ion-item>
                            <div margin-vertical>
                                <ion-button expand="block" color="success" @click="onLoginButton">
                                    <ion-icon name="person"></ion-icon>
                                    Login
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
        name: 'Modal',
        props: {
            title: {type: String, default: 'Super Modal'},
            closeMe: {
                type: Function, default: () => {
                }
            },
        },
        data() {
            return {
                content: 'Content',
            }
        },
        methods: {
            close() {
                this.$parent.$emit('close', {foo: 'bar'})
            },
            onLoginButton() {
                console.log('click button');
            }
        },
    }
</script>
