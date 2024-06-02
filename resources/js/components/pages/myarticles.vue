<template>
    <main class="mn-myarticle">
        <MDBTable variant="light">
            <thead>
                <tr>
                    <th scope="col">#id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Text</th>
                    <th scope="col">
                        <MDBBtn color="dark" aria-controls="ModalCreateTitle" @click="modalCreate">Create</MDBBtn>
                    </th>
                </tr>
             </thead>
            <tbody>
                <tr v-for="article in articles">
                    <th scope="row">{{ article.id }}</th>
                    <td>{{ article.title }}</td>
                    <td>{{ article.text }}</td>
                    <td>
                        <MDBBtn class="mb-2" color="dark" aria-controls="ModalDeleteEdit" @click="modalEdit(article)">Edit</MDBBtn>
                        <MDBBtn color="dark" aria-controls="ModalDeleteTitle" @click="modalDelete(article)">Delete</MDBBtn>
                    </td>
                </tr>
            </tbody>
        </MDBTable>

        <MDBModal class="modal fade" tabindex="-1" labelledby="ModalCreateTitle" v-model="ModalCreate" >
            <MDBModalHeader>
                <MDBModalTitle id="ModalCreateTitle">Create Article #0</MDBModalTitle>
            </MDBModalHeader>

            <MDBModalBody>
                <MDBInput type="text" label="Title" v-model="currenArticle.title" wrapperClass="mb-4" />
                <MDBInput type="text" label="Text"  v-model="currenArticle.text" wrapperClass="mb-4" />
            </MDBModalBody>

            <MDBModalFooter>
                <MDBBtn color="secondary" @click="ModalCreate = false"> Close </MDBBtn>
                <MDBBtn color="primary" @click="create"> Create </MDBBtn>
            </MDBModalFooter>
        </MDBModal>

        <MDBModal class="modal fade" tabindex="-1" labelledby="ModalDeleteTitle" v-model="ModalDelete" >
            <MDBModalHeader>
                <MDBModalTitle id="ModalDeleteTitle">Delete Article #{{ currenArticle.id }}?</MDBModalTitle>
            </MDBModalHeader>

            <MDBModalBody>{{ currenArticle.title }}</MDBModalBody>

            <MDBModalFooter>
                <MDBBtn color="secondary" @click="ModalDelete = false"> No </MDBBtn>
                <MDBBtn color="primary" @click="delet"> Yes </MDBBtn>
            </MDBModalFooter>
        </MDBModal>

        <MDBModal class="modal fade" tabindex="-1" labelledby="ModalEditTitle" v-model="ModalEdit" >
            <MDBModalHeader>
                <MDBModalTitle id="ModalEditTitle">Edit Article #{{ currenArticle.id }}</MDBModalTitle>
            </MDBModalHeader>

            <MDBModalBody>
                <MDBInput type="text" label="Title" v-model="currenArticle.title" wrapperClass="mb-4" />
                <MDBInput type="text" label="Text"  v-model="currenArticle.text" wrapperClass="mb-4" />
            </MDBModalBody>

            <MDBModalFooter>
                <MDBBtn color="secondary" @click="ModalEdit = false"> No </MDBBtn>
                <MDBBtn color="primary" @click="edit"> Yes </MDBBtn>
            </MDBModalFooter>
        </MDBModal>
    </main>
  </template>

<script>
    import {
        MDBTable, MDBBtn, MDBModal, MDBModalHeader,
        MDBModalTitle, MDBModalBody, MDBModalFooter, MDBInput
    } from 'mdb-vue-ui-kit';
    import { ref } from 'vue';

    export default {
        components: {
            MDBTable, MDBBtn, MDBModal, MDBModalHeader,
            MDBModalTitle, MDBModalBody, MDBModalFooter, MDBInput
        },
        setup() {
            const ModalDelete = ref(false);
            const ModalEdit = ref(false);
            const ModalCreate = ref(false);
            return {
                ModalEdit,
                ModalDelete,
                ModalCreate
            };
        },
        data() {
            return {
                articles: [],
                currenArticle: {
                    title: '',
                    text: '',
                },
            }
        },
        mounted() {
            setTimeout(() => {
                axiosAuth.post('api/article/my')
                .then((data) => {
                    if (data.data.status == 200) {
                        this.articles = data.data.articles;
                    }
                });
            }, 300);
        },
        methods: {
            modalCreate() {
                this.ModalCreate = true;
                this.currenArticle = {};
            },
            modalEdit(article) {
                this.ModalEdit = true;
                this.updateCurrentArticle(article);
            },
            modalDelete(article) {
                this.ModalDelete = true;
                this.updateCurrentArticle(article);
            },

            updateCurrentArticle(article) {
                this.currenArticle = {
                    id: article.id,
                    title: article.title,
                    text: article.text,
                };
            },

            create() {
                this.currenArticle.user_id = this.$root.user.id;
                axiosAuth.post('api/article/create', this.currenArticle)
                .then((data) => {
                    if (data.data.status == 200) {
                        this.articles = data.data.articles;
                        this.ModalCreate = false;
                    }
                });
            },
            delet() {
                axiosAuth.post('api/article/delete', this.currenArticle)
                .then((data) => {
                    if (data.data.status == 200) {
                        this.articles = data.data.articles;
                        this.ModalDelete = false;
                    }
                });
            },
            edit() {
                axiosAuth.post('api/article/edit', this.currenArticle)
                .then((data) => {
                    if (data.data.status == 200) {
                        this.articles = data.data.articles;
                        this.ModalEdit = false;
                    }
                });
            }
        }
    }
</script>
