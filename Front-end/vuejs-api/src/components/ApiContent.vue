<template>
  <h1>LE TECNOLOGIE</h1>
  <ul>
    <li v-for="technology in technologies" :key="technology.id">
      <h4>{{ technology.technology_name }}</h4>
      <p></p>
    </li>
  </ul>
</template>

<script>
import axios from "axios";

export default {
  name: "ApiContent",
  data() {
    return {
      technologies: [],
    };
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
