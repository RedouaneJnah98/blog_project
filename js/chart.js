// Chart js
const ctx = document.getElementById("myChart").getContext("2d");

let delayed;

// Gradient Fill
let gradient = ctx.createLinearGradient(0, 0, 0, 400);
gradient.addColorStop(0, "rgba(58,123,213,1)");
gradient.addColorStop(1, "rgba(0,210,255,0.3)");

const labels = ["Users", "Posts", "Likes", "Comments"];

const data = {
  labels,
  datasets: [
    {
      data: [1584, 5014, 4523, 2540],
      label: "Blogger Activity",
      // fill: true,
      borderWidth: 2,
      borderRadius: 5,
      borderSkipped: false,
      backgroundColor: "#1da1f2",
      // borderColor: "#1da1f2",
    },
  ],
};

// const config = {
//   type: "line",
//   data: data,
//   options: {
//     radius: 5,
//     hitRadius: 30,
//     hoverRadius: 12,
//     responsive: true,
//     animation: {
//       onComplete: () => {
//         delayed = true;
//       },
//       delay: (context) => {
//         let delay = 0;
//         if (context.type === "data" && context.mode === "default" && !delayed) {
//           delay = context.dataIndex * 300 + context.datasetIndex * 100;
//         }
//         return delay;
//       },
//     },
//   },
// };

const config = {
  type: "bar",
  data: data,
  options: {
    responsive: true,
    plugins: {
      legend: {
        position: "top",
      },
      title: {
        display: true,
        text: "Chart.js Bar Chart",
      },
    },
  },
};

const myChart = new Chart(ctx, config);
