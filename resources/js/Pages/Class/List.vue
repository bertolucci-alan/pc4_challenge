<template>
    <layout>
        <div class="container-students">
            <div class="search-students-container">
                <form @submit.prevent="searchClasses">
                    <input type="text" class="input-search-students" v-model="forms.search" placeholder="Pesquise a turma pelo ano...">
                    <button type="submit" class="button-search-students">Pesquisar</button>
                    <Link href="/registrar-turma" class="create-link-students">Registrar nova turma</Link>
                </form>
            </div>
            <div class="table-students-container">
                <table class="table-students">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Ano da turma</th>
                            <th>Nível de ensino</th>
                            <th>Série</th>
                            <th>Turno</th>
                            <th>Escola</th>
                            <th>Alunos</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="clasS in classes" :key=clasS.id>
                            <td>{{ clasS.id }}</td>
                            <td>{{ clasS.year }}</td>
                            <td>{{ clasS.level }}</td>
                            <td>{{ clasS.grade }}</td>
                            <td>{{ clasS.day }}</td>
                            <td>{{ clasS.school.name }}</td>
                            <td>{{ clasS.id }}</td>
                            <td>
                                <form action="">
                                    <div  class="form-action-students">
                                        <button class="button-remove-student">Excluir</button>
                                        <Link :href="link + clasS.id" class="link-edit-student">Editar</Link>
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
import { Link } from '@inertiajs/inertia-vue3';
import Layout from '../../Layouts/App.vue';
export default {
    data() {
        return {
            forms: {
                search: null,
            },
            classes: {},
            link: "/editar-turma/",
        }
    },

    methods: {
        searchClasses() {
            this.valid = true;
            
            if(!this.forms.search) {
                return axios.get('api/classes').then((response) => {
                    this.classes = response.data.classes;
                })
            }

            if(this.valid) {
                axios.post('/api/search-classes', this.forms).then((response) => {
                    // this.classes = response.data.classes;
                    console.log(response);
                });
            }
        }
    },

    mounted() {
        axios.get('api/classes').then((response) => {
            this.classes = response.data.classes;
        })
    },

    components: {
        Link,
        Layout
    }

};
</script>