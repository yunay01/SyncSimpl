<!DOCTYPE html>
<html lang="en">
<head>
<?php include(dirname(__FILE__).'/components/header.php'); ?>
<style>
       <?php include(dirname(__FILE__).'/assets/css/dashboard.css'); ?>
</style>
</head>
<body>

<?php include(dirname(__FILE__).'/components/dashboard.php'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <div class="section1">
                <canvas id="doughnutChart" ></canvas> <!-- Canvas for the doughnut chart -->
                <div class="legend">
                    <div class="legend-item">
                        <div class="legend-color bg-red" ></div>
                        <div class="legenditem"><b>Attendance</b></div>
                    </div>
                    <div class="legend-item">
                        <div class="legend-color bg-blue" ></div>
                        <div class="legenditem"><b>Attendance</b></div>
                    </div>
                    <div class="legend-item">
                        <div class="legend-color bg-yellow" ></div>
                        <div class="legenditem"><b>Attendance</b></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="section2">
                <div class="red-box"><p id="timer">&nbsp;&nbsp; 00   &nbsp;&nbsp; :&nbsp;&nbsp; 00 &nbsp;&nbsp; :    &nbsp;&nbsp; 00 <span class="time-space">&nbsp;&nbsp;&nbsp;&nbsp; </span>Hrs</p></div>
                <div class="line-container">
                    <div class="start-line"></div>
                    <div class="start-time"><b>09:00</b></div>
                    <div class="line"></div>
                    <div class="arrow"></div>
                    <div class="gray-line"></div> 
                    <div class="end-line"></div>
                    <div class="end-time"><b>06:00</b></div>
                </div>

                <div class="row check">
                    <button class="btn btn-primary c-btn check_in"><b>Check In</b></button>
                    <button class="btn btn-secondary c-btn check_out d-none"><b>Check Out</b></button>
                    <button class="btn btn-secondary c-btn resume d-none"><b>Resume</b></button>
                    <button class="btn btn-secondary c-btn break d-none"><b>Break</b></button>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="section3">
                <button class="btn btn-primary buttons project_report"><b>Projects Report</b></button>
                <button class="btn btn-primary buttons attendance"><b>Attendance Report</b></button>
                <button class="btn btn-primary buttons leaves"><b>Leaves</b></button>
                <button class="btn btn-primary buttons policies"><b>Policies</b></button>
                <button class="btn btn-primary buttons repository"><b>Repository</b></button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="section_container2">
              <div class="card1">
                  <p><b>Leave Report</b></p>
                <hr>
                <div class="card-content">
                  <div class="column">
                    <svg class="chart" viewBox="0 0 50 50">
                      <circle cx="25" cy="25" r="20" stroke="#ccc" stroke-width="5" fill="none" />
                      <circle cx="25" cy="25" r="20" stroke="#4CAF50" stroke-width="5" fill="none"
                        stroke-dasharray="0, 125.6"
                        stroke-dashoffset="0"></circle>
                      <text x="50%" y="50%" text-anchor="middle" alignment-baseline="middle" class="text">1</text>
                    </svg>
                    <p>Absent</p>
                  </div>
                  <hr>
                  <div class="column">
                    <svg class="chart" viewBox="0 0 50 50">
                      <circle cx="25" cy="25" r="20" stroke="#ccc" stroke-width="5" fill="none" />
                      <circle cx="25" cy="25" r="20" stroke="#4CAF50" stroke-width="5" fill="none"
                        stroke-dasharray="0, 125.6"
                        stroke-dashoffset="0"></circle>
                      <text x="50%" y="50%" text-anchor="middle" alignment-baseline="middle" class="text">2</text>
                    </svg>
                    <p>Casual Leave</p>
                  </div>
                  <hr>
                  <div class="column">
                    <svg class="chart" viewBox="0 0 50 50">
                      <circle cx="25" cy="25" r="20" stroke="#ccc" stroke-width="5" fill="none" />
                      <circle cx="25" cy="25" r="20" stroke="#4CAF50" stroke-width="5" fill="none"
                        stroke-dasharray="0, 125.6"
                        stroke-dashoffset="0"></circle>
                      <text x="50%" y="50%" text-anchor="middle" alignment-baseline="middle" class="text">0</text>
                    </svg>
                    <p>Sick Leave</p>
                  </div>
                  <hr>
                  <div class="column">
                    <svg class="chart" viewBox="0 0 50 50">
                      <circle cx="25" cy="25" r="20" stroke="#ccc" stroke-width="5" fill="none" />
                      <circle cx="25" cy="25" r="20" stroke="#4CAF50" stroke-width="5" fill="none"
                        stroke-dasharray="0, 125.6"
                        stroke-dashoffset="0"></circle>
                      <text x="50%" y="50%" text-anchor="middle" alignment-baseline="middle" class="text">0</text>
                    </svg>
                    <p>Compensatory</p>
                  </div>
                </div>
              </div>

              <div class="card2">
                <p><b>Report</b></p>
                <hr>
                <div class="card-content">
                  <canvas id="barChart"></canvas>
                </div>
              </div>

              <div class="card3">
                <div class="header">
                    <p><b>Announcement</b></p>
                    <p class="count"><b>3</b></p>
                </div>
                <hr>
                <div class="card-content-ann">
                    <img class="notification_image" src="http://localhost/SyncSimpl/assets/img/logo.jpg" alt="Image">
                    <div id="notificationTimer">
                    <p>Hey Team ,New Announcement from Yunay</p>
                    <p class="notifi-time">10:00 AM</p>
                    </div>
                </div>
                <hr>
                <div class="card-content-ann">
                    <img class="notification_image" src="http://localhost/SyncSimpl/assets/img/logo.jpg" alt="Image">
                    <div id="notificationTimer">
                    <p>Hey Team ,New Announcement from Yunay</p>
                    <p class="notifi-time">10:00 AM</p>
                    </div>
                </div>
                <hr>
                <div class="card-content-ann">
                    <img class="notification_image" src="http://localhost/SyncSimpl/assets/img/logo.jpg" alt="Image">
                    <div id="notificationTimer">
                    <p>Hey Team ,New Announcement from Yunay</p>
                    <p class="notifi-time">10:00 AM</p>
                    </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>

<?php include(dirname(__FILE__).'/components/script.php'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>

<script>
    <?php include(dirname(__FILE__).'/assets/js/dashboard.js'); ?>
</script>

</body>
</html>
