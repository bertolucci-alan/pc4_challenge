<template>
    <layout>
        <div class="container-students">
            <div class="search-students-container">
                <form action="">
                    <input type="text" class="input-search-students" placeholder="Digite o nome do aluno...">
                    <button type="submit" class="button-search-students">Pesquisar</button>
                    <Link href="/registrar-aluno" class="create-link-students">Registrar novo aluno</Link>
                </form>
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
                                        <Link href="/editar-aluno" class="link-edit-student">Editar</Link>
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
            students: {}
        }
    },

    mounted() {
        axios.get('api/students').then((response) => {
            this.students = response.data.students;
            console.log(response);
        })
    },

    components: {
        Link,
        Layout,
    }

};
</script>