const ctx = document.getElementById('graficoPastel').getContext('2d');

const plugin3D = {
  id: 'shadow3d',
  beforeDraw(chart) {
    const ctx = chart.ctx;
    ctx.save();
    ctx.shadowColor = 'rgba(0,0,0,0.3)';
    ctx.shadowBlur = 15;
    ctx.shadowOffsetX = 8;
    ctx.shadowOffsetY = 8;
  },
  afterDraw(chart) {
    chart.ctx.restore();
  }
};

new Chart(ctx, {
  type: 'pie',
  data: {
    labels: ['Entradas', 'Salidas'],
    datasets: [{
      data: [TOTAL_ENTRADAS, TOTAL_SALIDAS],
      backgroundColor: [
        'rgba(67, 97, 238, 0.92)',
        'rgba(230, 57, 70, 0.92)'
      ],
      borderWidth: 3,
      borderColor: '#fff',
      hoverOffset: 20,
      hoverBorderWidth: 4
    }]
  },
  options: {
    responsive: false,
    layout: {
      padding: 25
    },
    animation: {
      animateRotate: true,
      animateScale: true,
      duration: 1000,
      easing: 'easeInOutQuart'
    },
    plugins: {
      legend: {
        position: 'bottom',
        labels: {
          font: { size: 14 },
          padding: 20,
          usePointStyle: true,
          pointStyle: 'circle'
        }
      },
      tooltip: {
        callbacks: {
          label: function(context) {
            const total = context.dataset.data.reduce((a, b) => a + b, 0);
            const pct = ((context.raw / total) * 100).toFixed(1);
            return ` $${context.raw.toFixed(2)} (${pct}%)`;
          }
        }
      }
    }
  },
  plugins: [plugin3D]
});