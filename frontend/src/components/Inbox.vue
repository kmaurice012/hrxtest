<template>
  <v-container>
    <v-sheet color="#50af60"  height="5"></v-sheet>
    <div class="d-flex">
        <v-icon color="green" >mdi-inbox-arrow-down</v-icon>
    <v-card-title primary-title class="text-h6 green--text"  > My Inbox </v-card-title>
    </div>
    <v-card>
    <v-card-title>
      <v-text-field
        v-model="search"
        append-icon="mdi-magnify"
        label="Search"
        single-line
        hide-details
        width="40%"
      ></v-text-field>
    </v-card-title>
    <v-data-table
      :headers="headers"
      :items="items"
      :search="search"
    ></v-data-table>
  </v-card>
  </v-container>
</template>

<script>
export default {
    data: () => ({
        headers: [
           { 
               text: "No.",
               value: "no",
               class: "font-weight-bold green white--text text-uppercase",
           },
           { 
               text: "Name",
               value: "name",
               class: "font-weight-bold green white--text text-uppercase",
           },
           { 
               text: "Size",
               value: "size",
               class: "font-weight-bold green white--text text-uppercase",
           },
           { 
               text: "Created On",
               value: "created_on",
               class: "font-weight-bold green white--text text-uppercase",
           },
        ]
    }),
}
</script>
