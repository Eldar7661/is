<template>
    <main class="mn-login">
        <div class="block">
            <MDBTabs v-model="form">
                <MDBTabNav pills justify tabsClasses="mb-3">
                    <MDBTabItem tabId="form-login" href="form-login">Login</MDBTabItem>
                    <MDBTabItem tabId="form-register" href="form-register">Register</MDBTabItem>
                </MDBTabNav>

                <MDBTabContent>

                    <MDBTabPane tabId="form-login">
                        <form>
                            <MDBInput type="email"    label="Email address" v-model="log_user.email" wrapperClass="mb-4" />
                            <MDBInput type="password" label="Password" v-model="log_user.password" wrapperClass="mb-4" />
                            <div class="mb-3 text-danger">{{ error_login }}</div>

                            <MDBBtn color="primary" block class="mb-4" @click="login"> Sign in </MDBBtn>
                        </form>
                    </MDBTabPane>


                    <MDBTabPane tabId="form-register">
                        <form>
                            <MDBRow class="mb-1">
                                <MDBCol>
                                    <MDBInput type="text" label="Name" v-model="reg_user.name" wrapperClass="mb-4" />
                                </MDBCol>
                                <MDBCol>
                                    <MDBInput type="text" label="SurName"v-model="reg_user.surname" wrapperClass="mb-4" />
                                </MDBCol>
                            </MDBRow>

                            <MDBInput type="email"    label="Email" v-model="reg_user.email" wrapperClass="mb-4" />
                            <MDBInput type="password" label="Password" v-model="reg_user.password" wrapperClass="mb-4" />
                            <MDBInput type="password" label="Repeat password" v-model="reg_user.password_confirm" wrapperClass="mb-4" />
                            <div class="mb-3 text-danger" v-for="error in errors">{{ error }}</div>

                            <MDBBtn color="primary" block class="mb-3" @click="registration"> Sign in </MDBBtn>
                        </form>
                    </MDBTabPane>

                </MDBTabContent>
            </MDBTabs>
        </div>
  </main>
</template>

<script>
    import {
        MDBInput, MDBCheckbox, MDBTextarea, MDBBtn, MDBTabs, MDBTabNav,
        MDBTabContent, MDBTabItem, MDBTabPane, MDBIcon, MDBRow, MDBCol
    } from "mdb-vue-ui-kit";
    import { ref } from "vue";

export default {
    components: {
        MDBInput, MDBCheckbox, MDBTextarea, MDBBtn, MDBTabs, MDBTabNav,
        MDBTabContent, MDBTabItem, MDBTabPane, MDBIcon, MDBRow, MDBCol
    },
    setup() {
        const form = ref("form-login");
        // const form = ref("form-register");
        return {form};
    },
    data() {
        return {
            reg_user: {
                name: '',
                surname: '',
                email: '',
                password: '',
                password_confirm: '',
            },
            log_user: {
                email: 'oliver.hughes@email.com',
                password: '12345678',
            },
            errors: '',
            error_login: '',
        }
    },
    methods: {
        login() {
            axios.post('api/auth/login', this.log_user
            ).then( data => {
                localStorage.setItem('token', data.data.access_token);
                this.$root.refreshUser();
                this.$router.push({ path: '/myarticles'});
            }).catch( data => {
                if (data.response.data.error == 'Unauthorized') {
                    this.error_login = 'Incorrect login or password';
                }
            });
        },
        registration() {
            if (this.reg_user.password == this.reg_user.password_confirm) {
                this.errors = [];
                axios.post('api/auth/registration', this.reg_user)
                .then((data) => {
                    this.log_user = {
                        email: data.data.email,
                        password: this.reg_user.password,
                    }
                    this.login();
                }).catch((data) => {
                    this.errors = data.response.data.errors;
                });
            } else {
                this.errors = ['Incorrect confirm password'];
            }
        },
    }
};
</script>
