
var graph_data = [];
var graph_labels = [];

var ctx = document.getElementById('myChart');
var myChart = false;

$().ready(function(){
    function loadJobApplications(){
        $.ajax({
            type: 'GET',
            url: '/employers/dashboard-data?csrf-token='+$('#csrf_token').attr('content'),
            success: function(response) {
              let g_data = response[0];
              let g_labels = response[1];

                for (var i = 0; i<g_data.length; i++) {
                    graph_data[graph_data.length] = g_data[i];
                    graph_labels[graph_labels.length] = g_labels[i];
                }

                myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: graph_labels,
                    datasets: [{
                        label: 'Number of Applications',
                        data: graph_data,
                        borderColor: 'rgb(232, 135, 37)',
                        // backgroundColor: 'rgba(253, 242, 232, 0.5)',
                        backgroundColor: 'rgba(0,0,0,0)',
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    },
                    title: {
                        display: true,
                        text: "Total Applications over the Past Week"
                    },
                    legend: {
                      boxWidth: 20,
                    },
                },
                maintainAspectRatio: false,
            });
            },
            error: function(e) {

                notify('Failed to Statistics', 'error');
            },
        });
    }
    function loadStats(){
        $.ajax({
            type: 'GET',
            url: '/employers/dashboard-stats?csrf-token='+$('#csrf_token').attr('content'),
            success: function(response) {
                $('#stats-field').children().remove();
                $('#stats-field').append(response);

            },
            error: function(e) {

                notify('Failed to Statistics', 'error');
            },
        });
    }
    loadJobApplications();
    loadStats();
    setInterval(loadStats,60000);
});