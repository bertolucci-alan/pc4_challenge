<template>
    <layout>
        <div class="container-students">
            <div class="search-students-container">
                <form @submit.prevent="searchStudent">
                    <input type="text" v-model="forms.search" class="input-search-students" placeholder="Digite o nome do aluno...">
                    <button type="submit" class="button-search-students">Pesquisar</button>
                    <Link href="/registrar-aluno" class="create-link-students">Registrar novo aluno</Link>
                </form>
            <p v-if="errors.search" class="message-error">{{ errors.search }}</p>
            </div>
            <div class="table-students-container">
                <table class="table-students">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome completo</th>
                            <th>E-mail</th>
                            <th>Nascimento</th>
                            <th>Telefone</th>
                            <th>Turmas</th>
                            <th>Escola</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="student in students" :key="student.id">
                            <td>{{ student.id }}</td>
                            <td>{{ student.name }}</td>
                            <td>{{ student.email }}</td>
                            <td>{{ student.birth }}</td>
                            <td>{{ student.phone }}</td>
                            <td>{{ student.id }}</td>
                            <td>{{ student.id }}</td>
                            <td>
                                <form action="">
                                    <div  class="form-action-students">
                                        <button class="button-remove-student">Excluir</button>
                                        <Link :href="link + student.name.split(' ').join('-').toLowerCase() + '/' + student.id" class="link-edit-student">Editar</Link>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </layout>
</template>

<script>
import Layout from '../../Layouts/App.vue';
import { Link } from '@inertiajs/inertia-vue3';

export default {

    data() {
        return {
            forms: {
                search: null,
            },
            students: {},
            link: "/editar-aluno/",
            errors: {},
            valid: null,
            studentsSearch: {},
        }
    },

    mounted() {
        axios.get('api/students').then((response) => {
            this.students = response.data.students;
        })
    },

    methods: {
        searchStudent() {
            this.valid = true;
            
            if(!this.forms.search) {
                this.valid = false,
                this.errors.search = "Preencha o campo para pesquisar.";
            }

            if(this.valid) {
                axios.post('/api/search-students', this.forms).then((response) => {
                    this.students = response.data.students;
                });
            }
        }
    },

    components: {
        Link,
        Layout,
    }

};
</script>