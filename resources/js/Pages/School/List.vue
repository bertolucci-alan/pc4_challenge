<template>
    <layout>
        <div class="container-students">
            <div class="search-students-container">
                <form action="">
                    <input type="text" class="input-search-students" placeholder="Digite o nome da escola...">
                    <button type="submit" class="button-search-students">Pesquisar</button>
                    <Link href="/registrar-escola" class="create-link-students">Registrar nova escola</Link>
                </form>
            </div>
            <div class="table-students-container">
                <table class="table-students">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome da escola</th>
                            <th>Endereço</th>
                            <th>Turmas</th>
                            <th>Alunos</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="school in schools" :key="school.id">
                            <td>{{school.id}}</td>
                            <td>{{school.name}}</td>
                            <td>{{school.street}}</td>
                            <td>{{school.id}}</td>
                            <td>{{school.id}}</td>
                            <td>
                                <form action="">
                                    <button class="button-remove-student">Excluir</button>
                                    <Link :href="link + school.name.split(' ').join('-').toLowerCase() + '/' + school.id" class="link-edit-student">Editar</Link>
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
            schools: {},
            link: "/editar-escola/",
        }
    },

    mounted() {
        axios.get('api/schools').then((response) => {
            this.schools = response.data.schools;
        })
    },

    components: {
        Link,
        Layout,
    }

};
</script>