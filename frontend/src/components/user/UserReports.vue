<template>
  <v-container>
      <v-card-title primary-title class="text-h4 green--text">
          Reports for the year 2022
      </v-card-title>
      <v-spacer></v-spacer>
      <v-spacer></v-spacer>
    <bar-chart :chartdata="chartdata" :options="options"> </bar-chart>
  </v-container>
</template>
<script>
import BarChart from "./Bar.vue";
export default {
  components: {
    BarChart,
  },
  data: () => ({
    chartdata: {
      labels: [
        "Listing Rules",
        "Late Submission of Audited Annual Accounts",
        "Annual financial statements",
        "Trading hours",
      ],
      datasets: [
        {
          label: "Complied",
          borderWidth: 1,
          backgroundColor: "green",
          borderColor: "white",
          data: [3, 2, 5, 3]
        },
        {
          label: "Not Complied",
          borderWidth: 1,
          backgroundColor: "crimson",
          borderColor: "black",
          data: [8, 2, 4, 7]
        },
      ],
    },
    options: {
      scales: {
        yAxes: [
          {
            ticks: {
              beginAtZero: true,
            },
            gridLines: {
              display: true,
            },
          },
        ],
        xAxes: [
          {
            gridLines: {
              display: false,
            },
            barPercentage: 0.4,
          },
        ],
      },
      legend: {
        display: true,
      },
      responsive: true,
      maintainAspectRatio: false,
    },
  }),
};
</script>
