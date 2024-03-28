let timerInterval;

$(document).ready(function() {

    console.log(localStorage.getItem("check_in"));
    console.log(localStorage.getItem("check_out"));
    console.log(localStorage.getItem("resume"));
    console.log(localStorage.getItem("break"));
    console.log(localStorage.getItem("start"));

    if(localStorage.getItem("check_in") == 'true'){
        $(".check_in").removeClass('d-none');
    } 
    if(localStorage.getItem("check_out") == 'true'){
        $(".check_out").removeClass('d-none');
        $(".check_in").addClass('d-none');
    } 
    if(localStorage.getItem("resume") == 'true'){
        $(".resume").removeClass('d-none');
    } 
    if(localStorage.getItem("break") == 'true'){
        $(".break").removeClass('d-none');
    }
    if(localStorage.getItem("start") == 'true'){
        // Update the timer every second
        timerInterval = setInterval(updateTimer, 1000);

        // Initial update
        updateTimer();
    }
    
});

// attendance Doughnut chart data

        // Doughnut chart data
        const data = {
            datasets: [{
                data: [30, 30, 40],
                backgroundColor: ["red", "blue", "#F3E3AA"],
                borderWidth: 0, // Set border width to 0 to make it transparent
                hoverBorderWidth: 0, // Set hover border width to 0
            }]
        };

        // Doughnut chart options with custom plugin
        const options = {
            responsive: true,
            cutoutPercentage: 80, // Adjust inner radius for doughnut chart
            animation: {
                animateRotate: true, // Disable rotation animation
                animateScale: true // Disable scale animation
            },
            plugins: {
                textInside: { // Define the plugin directly within the options
                    beforeDraw: function(chart) {
                        const ctx = chart.ctx;
                        const width = chart.width;
                        const height = chart.height;
                        const fontSize = (height / 110).toFixed(2);

                        ctx.restore();
                        ctx.font = "bold " + fontSize + "em Arial"; // Set text as bold
                        ctx.fillStyle = "#000000"; // Set text color to black
                        ctx.textBaseline = "middle";
                        ctx.textAlign = "center";

                        const total = data.datasets[0].data.reduce((acc, curr) => acc + curr, 0);
                        const text = "100%";
                        const textX = width / 2;
                        const textY = height / 2;
                        
                        ctx.fillText(text, textX, textY);
                        ctx.save();
                    }
                }
            }
        };

        // Create doughnut chart
        const doughnutChart = new Chart(document.getElementById("doughnutChart"), {
            type: "doughnut",
            data: data,
            options: options // Apply the options with the custom plugin to this specific chart
        });
// attendance chart data

//Report Chart Bar chart data

const data1 = {
    labels: ["January", "February", "March", "April", "May", "June"],
    datasets: [{
        label: "Reports",
        data: [65, 59, 80, 81, 56, 55],
        backgroundColor: "rgba(75, 192, 192, 0.2)",
        borderColor: "rgba(75, 192, 192, 1)",
        borderWidth: 1
    }]
};

// Bar chart options
const options1= {
    responsive: true,
    scales: {
        y: {
            beginAtZero: true
        }
    }
};

// Create bar chart
const barChart = new Chart(document.getElementById("barChart"), {
    type: "bar",
    data: data1,
    options: options1
});
//Report Chart

// check in time data
    function updateTimer() {
        const now = new Date();
        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');
        const seconds = String(now.getSeconds()).padStart(2, '0');
        document.getElementById('timer').innerHTML = hours + '&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;' + minutes + '&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;' + seconds + '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hrs';

    }

    $(".check_in").on("click", function() {
        localStorage.setItem("start", true); 
        localStorage.setItem("check_out", true); 
        localStorage.setItem("check_in", false);
        localStorage.setItem("break", true);  
        $(".check_in").addClass('d-none');
        $(".resume").addClass('d-none');
        $(".check_out").removeClass('d-none');
        $(".break").removeClass('d-none');

        // Update the timer every second
        timerInterval = setInterval(updateTimer, 1000);

        // Initial update
        updateTimer();

        console.log(localStorage.getItem("check_out")); 
    });
    
    $(".check_out").on("click", function() {
        localStorage.setItem("start", false); 
        localStorage.setItem("check_out", false); 
        localStorage.setItem("check_in", true); 
        localStorage.setItem("resume", false);
        localStorage.setItem("break", false); 
        $(".check_out").addClass('d-none');
        $(".resume").addClass('d-none');
        $(".break").addClass('d-none');
        $(".check_in").removeClass('d-none');

        clearInterval(timerInterval);

        console.log(localStorage.getItem("check_out")); 
    });
  
    $(".resume").on("click", function() {
        localStorage.setItem("break", true); 
        localStorage.setItem("resume", false);
        $(".resume").addClass('d-none');
        $(".break").removeClass('d-none'); 
        console.log(localStorage.getItem("check_out")); 
    });

    $(".break").on("click", function() {
        localStorage.setItem("break", false); 
        localStorage.setItem("resume", true); 
        $(".break").addClass('d-none');
        $(".resume").removeClass('d-none');

        clearInterval(timerInterval);

        console.log(localStorage.getItem("check_out")); 
    });
    // check in time data
    
    // Set values for each chart for leaves
    const values = [0, 2, 1, 0];
    const maxNumber = 2; // Set the maximum number dynamically
    const charts = document.querySelectorAll('.chart');
    const texts = document.querySelectorAll('.text');
    
    charts.forEach((chart, index) => {
      const value = values[index];
      const percentage = (value / maxNumber) * 100;
      const offset = (100 - percentage) / 100 * 125.6;
      const circle = chart.querySelector('circle:nth-child(2)');
      circle.setAttribute('stroke-dasharray', `${percentage}, 125.6`);
      circle.setAttribute('stroke-dashoffset', offset);
      
      texts[index].textContent = value > 0 ? value : '0'; // Set value to '0' if it's less than or equal to 0
      circle.setAttribute('stroke', value > 0 ? '#4CAF50' : '#ccc'); // Set color to green if value is greater than 0, otherwise gray
    });
    // Set values for each chart for leaves
    
    document.addEventListener('DOMContentLoaded', function () {
        var ctx = document.getElementById("myChart").getContext("2d");
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
                datasets: [{
                    label: 'Sample Data',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
    });
    