<template>
  <v-container>
    <v-card-title primary-title class="green text-h4 white--text">
      {{complianceType}} Reports for the period &nbsp;<span class="">2022-01 to 2022-12</span>
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
          data: [10,55,20,89,0,0,0,0,0,0,0,0],
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

    complianceType: "",
  }),

  methods: {
    getComplianceType() {
      this.complianceType = localStorage.getItem("compliance_type");
      
    },
  },

  mounted() {
    this.getComplianceType();
  },
};
</script>
