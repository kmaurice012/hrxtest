<template>
    <v-footer
    app
      inset
      padless
      class="font-weight-medium red accent-2"
    >
      <v-card flat tile width="100%" class="red lighten-1 text-center">
        <v-card-text class="red accent-2">
          &copy; Copyright {{ new Date().getFullYear() }} —
          <strong> Software Technologies Ltd. All rights reserved.</strong>
        </v-card-text>
      </v-card>
    </v-footer>
</template>
