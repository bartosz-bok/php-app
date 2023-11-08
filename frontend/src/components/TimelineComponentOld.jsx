// import Chart from 'react-apexcharts';

// const options = {
//   chart: {
//     height: 350,
//     type: 'rangeBar',
//     events: {
//       // markerClick: function(event, chartContext, { seriesIndex, dataPointIndex, config}) {
//       dataPointSelection: (...args) => {
//         console.log(args);
//       },
//       // click: (...args) => {
//       //   console.log(args);
//       // },
//     },
//   },
//   plotOptions: {
//     bar: {
//       horizontal: true,
//     },
//   },
//   dataLabels: {
//     enabled: true,
//     formatter: function (val, opts) {
//       return opts.w.globals.labels[opts.dataPointIndex];
//     },
//   },
//   fill: {
//     type: 'gradient',
//     gradient: {
//       shade: 'light',
//       type: 'vertical',
//       shadeIntensity: 0.25,
//       gradientToColors: undefined,
//       inverseColors: true,
//       opacityFrom: 1,
//       opacityTo: 1,
//       stops: [50, 0, 100, 100],
//     },
//   },
//   xaxis: {
//     type: 'datetime',
//   },
//   legend: {
//     position: 'top',
//   },
// };

// const series = [
//   {
//     name: 'Bob',
//     data: [
//       {
//         x: 'Design',
//         y: [new Date('2019-03-05').getTime(), new Date('2019-03-08').getTime()],
//       },
//       {
//         x: 'Code',
//         y: [new Date('2019-04-08').getTime(), new Date('2019-05-11').getTime()],
//       },
//       {
//         x: 'Code',
//         y: [new Date('2019-03-08').getTime(), new Date('2019-03-11').getTime()],
//       },
//       {
//         x: 'Test',
//         y: [new Date('2019-03-11').getTime(), new Date('2019-03-16').getTime()],
//       },
//     ],
//   },
//   {
//     name: 'Joe',
//     data: [
//       {
//         x: 'Design',
//         y: [new Date('2019-03-02').getTime(), new Date('2019-03-05').getTime()],
//       },
//       {
//         x: 'Code',
//         y: [new Date('2019-03-06').getTime(), new Date('2019-03-09').getTime()],
//       },
//       {
//         x: 'Test',
//         y: [new Date('2019-03-10').getTime(), new Date('2019-03-19').getTime()],
//       },
//     ],
//   },
//   {
//     name: 'Joe',
//     data: [
//       {
//         x: 'Design',
//         y: [new Date('2019-03-02').getTime(), new Date('2019-03-05').getTime()],
//       },
//       {
//         x: 'Code',
//         y: [new Date('2019-03-06').getTime(), new Date('2019-03-09').getTime()],
//       },
//       {
//         x: 'Test',
//         y: [new Date('2019-03-10').getTime(), new Date('2019-03-19').getTime()],
//       },
//     ],
//   },
// ];
// export const TimelineComponent = () => {
//   return (
//     <>
//       <div>siema</div>
//       <Chart options={options} series={series} type="rangeBar" />
//     </>
//   );
// };
