<template>
    <h1>LE TECNOLOGIE</h1>
    <form v-if="createFormActive" @submit.prevent="submitNewTechnology">
        <label for="name">Technology name: </label>
        <input
            type="text"
            name="name"
            id="name"
            v-model="newTechnology.technology_name"
        />
        <input type="submit" value="CREA" />
        <br />
    </form>
    <div v-else>
        <button @click="createNewTek">CREA NUOVA TECNOLOGIA</button>
        <ul>
            <li v-for="technology in technologies" :key="technology.id">
                <h4>{{ technology.technology_name }}</h4>
                <p></p>
            </li>
        </ul>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "ApiContent",
    data() {
        return {
            technologies: [],

            newTechnology: {
                technology_name: "",
            },

            createFormActive: false,
        };
    },
    methods: {
        createNewTek() {
            this.createFormActive = true;
        },
        submitNewTechnology() {
            // console.log("submit: ", this.newTechnology);

            axios
                .post(
                    "http://127.0.0.1:8000/api/v1/technologies",
                    this.newTechnology
                )
                .then((res) => {
                    const data = res.data;

                    if (data.status == "success") {
                        this.technologies.push(data.technology);
                        this.createFormActive = false;
                    }
                })
                .catch((err) => {
                    console.err(err);
                });
        },
    },
    mounted() {
        axios
            .get("http://127.0.0.1:8000/api/v1/technologies")
            .then((res) => {
                const data = res.data;

                if (data.status == "success") {
                    this.technologies = data.technologies;
                    console.log("tecs: ", this.technologies);
                }
            })
            .catch((err) => {
                console.err(err);
            });
    },
};
</script>
