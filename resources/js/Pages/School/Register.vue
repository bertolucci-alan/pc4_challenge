<template>
    <layout>
        <div class="edit-student-container">
            <div class="box-edit-student-container">
                <div class="form-edit-student-container">
                    <form action="" class="form-edit-student">
                        <div class="input-container-edit-student">
                            <label for="name">Nome: </label>
                            <input type="text" name="name">
                        </div>
                        <div class="input-container-edit-student">
                            <label for="street">Endereço: </label>
                            <input type="text" name="street">
                        </div>

                        <p>TURMAS: </p>
                        <form action="" class="form-remove-student">
                                <div class="box-students-class">
                                    <div class="align-students-class">
                                        <Link href="/editar-turma" class="student-link-class">3 ano - médio - noturno - 2020</Link>
                                    </div>
                                </div>
                        </form>
                        <button class="save-informations-edit-student">Salvar alterações</button>
                        <Link href="/escolas" class="back-to-students">Voltar</Link>
                    </form>
                </div>
            </div>
        </div>
    </layout>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';
import Layout from '../../Layouts/App.vue';
export default {
    layout: Layout,
    components: {
        Link,
    }

};
</script>