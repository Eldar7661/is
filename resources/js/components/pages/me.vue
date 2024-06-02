<template>
    <main class="mn-me">
        <MDBCard style="width: 18rem">
            <MDBCardBody>
                <div class="me-row">
                    <div class="me-col me-col-title">Name</div>
                    <div class="me-col">{{ this.$root.user.name }}</div>
                </div>

                <div class="me-row">
                    <div class="me-col me-col-title">Surname</div>
                    <div class="me-col">{{ this.$root.user.surname }}</div>
                </div>

                <div class="me-row">
                    <div class="me-col me-col-title">Email</div>
                    <div class="me-col">{{ this.$root.user.email }}</div>
                </div>

                <div class="me-row">
                    <div class="me-col me-col-title">Password</div>
                    <div class="me-col">*********</div>
                </div>

                <div class="me-row">
                    <MDBBtn outline="primary" @click="modal">Change</MDBBtn>
                </div>
            </MDBCardBody>
        </MDBCard>


        <MDBModal id="ModalToggle1" tabindex="-1" labelledby="ModalToggle1Label" v-model="ModalToggle1">
            <MDBModalHeader>
                <MDBModalTitle id="ModalToggle1Label">New data</MDBModalTitle>
            </MDBModalHeader>

            <MDBModalBody>
                <MDBInput type="name" label="Name" v-model="new_user.name" wrapperClass="mb-4" />
                <MDBInput type="surname" label="Surname" v-model="new_user.surname" wrapperClass="mb-4" />
                <MDBInput type="password" label="Password" v-model="new_user.password" wrapperClass="mb-4" />
                <MDBInput type="password" label="Repeat Password" v-model="new_user.password_confirm" wrapperClass="mb-4" />
            </MDBModalBody>

            <MDBModalFooter>
                <MDBBtn color="primary" @click="openSecondModal">Chenge my data</MDBBtn>
            </MDBModalFooter>
        </MDBModal>

        <MDBModal id="ModalToggle2" tabindex="-1" labelledby="ModalToggle2Label" v-model="ModalToggle2">
            <MDBModalHeader>
                <MDBModalTitle id="ModalToggle2Label">Confirm</MDBModalTitle>
            </MDBModalHeader>

            <MDBModalBody>
                <MDBInput type="password" label="Old Password" v-model="new_user.password_old" wrapperClass="mb-4" />
                <div class="mb-3 text-danger" v-for="error in errors">{{ error }}</div>
            </MDBModalBody>

            <MDBModalFooter>
                <MDBBtn color="primary" @click="openFirstModal">back</MDBBtn>
                <MDBBtn color="primary" @click="update">Change</MDBBtn>
            </MDBModalFooter>
        </MDBModal>
    </main>
</template>

<script>
    import {
        MDBModal, MDBModalHeader, MDBModalTitle, MDBModalBody,
        MDBModalFooter, MDBBtn, MDBCard, MDBCardBody, MDBInput
    } from "mdb-vue-ui-kit";
    import { ref } from 'vue';

    export default {
        components: {
            MDBModal, MDBModalHeader, MDBModalTitle, MDBModalBody,
            MDBModalFooter, MDBBtn, MDBCard, MDBCardBody, MDBInput
        },
        setup() {
            const ModalToggle1 = ref(false);
            const ModalToggle2 = ref(false);
            const openFirstModal = () => {
                ModalToggle2.value = false;
                setTimeout(() => {
                    ModalToggle1.value = true;
                }, 200);
            };

            return {
                ModalToggle1,
                ModalToggle2,
                openFirstModal
            }
        },
        data() {
            return {
                new_user: {
                    id: 0,
                    name: '',
                    surname: '',
                    password: '********',
                    password_confirm: '',
                    password_old: '',
                },
                errors: '',
            }
        },
        methods: {
            modal() {
                this.new_user = {
                    id: this.$root.user.id,
                    name: this.$root.user.name,
                    surname: this.$root.user.surname,
                    password: '********',
                    password_confirm: '********',
                    password_old: '',
                };
                this.ModalToggle1 = true;
            },
            update() {
                if (this.new_user.password == this.new_user.password_confirm) {
                    axios.post('api/auth/update', this.new_user)
                    .then( (data) => {
                        if (data.data.status == 200) {
                            this.$root.user = data.data.user;
                            this.ModalToggle1 = false;
                            this.ModalToggle2 = false;
                        } else {
                            this.errors = [data.data.message];
                        }
                    })
                    .catch( (data) => {
                        this.errors = [data.response.data.message];
                    });
                } else {
                    this.errors = ['Incorrect confirm password'];
                }
            },
            openSecondModal() {
                this.errors = [];
                this.ModalToggle1 = false;
                setTimeout(() => {
                    this.ModalToggle2 = true;
                }, 200);
            },
        }
    }
</script>
