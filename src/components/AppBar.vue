<template>
  <v-card class="mx-auto overflow-hidden">
    <v-app-bar elevation="1">
      <v-app-bar-nav-icon @click="drawer = true"></v-app-bar-nav-icon>

      <v-toolbar-title>Dashboard</v-toolbar-title>
    </v-app-bar>
  </v-card>
</template>

<script>
export default {
  data: () => ({
      drawer: false,
      group: null,
    }),
}
</script>
