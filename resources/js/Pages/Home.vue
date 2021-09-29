<template>
    <layout>
        <div class="container-home">    
            <div class="box-home">
                <div class="options-home">
                    <div class="img-container-home">
                        <img src="assets/students.jpg" alt="" class="img-home">
                    </div>
                    <p class="title-home">Alunos</p>
                </div>

                <div class="options-home">
                    <div class="img-container-home">
                        <img src="assets/class.jpg" alt="" class="img-home">
                    </div>
                    <p class="title-home">Turmas</p>
                </div>

                <div class="options-home">
                    <div class="img-container-home">
                        <img src="assets/school.jpg" alt="" class="img-home">
                    </div>
                    <p class="title-home">Escolas</p>
                </div>
            </div>
        </div>    
    </layout>
</template>

<script>
import Layout from "../Layouts/App.vue";

export default{
      layout: Layout,
}
</script>