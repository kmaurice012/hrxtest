<template>
  <v-container>
    <v-card-title primary-title class="green text-h4 white--text">
      {{ complianceType }} Reports for the year 2022
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
        "Jan",
        "Feb",
        "Mar",
        "Apr",
        "May",
        "Jun",
        "Jul",
        "Aug",
        "Sep",
        "Oct",
        "Nov",
        "Dec",
      ],
      datasets: [
        {
          label: "Complied in %",
          borderWidth: 1,
          backgroundColor: "green",
          borderColor: "white",
          data: [40,15,0,0,0,0,0,0,0,0,0,0],
        },
        {
          label: "Not Complied in %",
          borderWidth: 1,
          backgroundColor: "crimson",
          borderColor: "black",
          data: [80,25,0,0,0,0,0,0,0,0,0,0],
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
            barPercentage: 0.7,
          },
        ],
      },
      legend: {
        display: true,
      },
      responsive: true,
      maintainAspectRatio: false,
    },
    complianceType: "",
  }),

  methods: {
    getComplianceType() {
      this.complianceType = localStorage.getItem("compliance_code_title");
    },
  },

  mounted() {
    this.getComplianceType();
  },
  created() {
    // this.chartdata.labels = [localStorage.getItem("compliance_type").toString()];
  },
};
</script>
