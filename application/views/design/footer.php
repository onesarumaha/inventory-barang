  <!-- footer -->
  <footer class="footer footer--ml-sidebar-width">
    <p class="mb-2 mb-sm-0"></p>
    <p>Version 1.0.1</p>
  </footer>

  <!-- jQuery first, then Bootstrap JS, and Reza Admin JS-->
    <script src="<?= base_url('assets/') ?>dist/js/jquery-3.5.1.slim.min.js"></script>
    <script src="<?= base_url('assets/') ?>dist/js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/') ?>dist/js/reza-admin.min.js"></script>

    <!-- Optional Javascript -->
    <script src="<?= base_url('assets/') ?>plugins/Chart.js/Chart.min.js"></script>
     <script src="<?= base_url('assets/') ?>js/dist/sweetalert2.all.min.js"></script>
    <script src="<?= base_url('assets/') ?>js/dist/myscript.js"></script>

  <script type="text/javascript">
    // visitor charts
    const visitorChart = document.querySelector("#visitor_chart").getContext('2d');
    let configVisitorChart = {
      type: 'line',
        data: {
            labels: ['Sunday, 11','Monday, 12','Tuesday, 13','Wednesday, 14','Thursday, 15','Friday, 16'],
            datasets: [{
                label: 'Visitors',
                data: [10,6,7,5,1,14],
                fill: 'origin',
                backgroundColor: 'rgba(37,151,224,.7)',
                borderColor: '#2597e0'
            }]
        },
        options: {
          maintainAspectRatio: false,
          legend: {
            display: false,
            },
            tooltips: {
                    titleFontFamily: 'sans-serif',
                    bodyFontFamily: 'sans-serif',
                    backgroundColor: '#fff',
                    titleFontColor: '#333',
                    bodyFontColor: '#333',
                    borderColor: '#e2e2e2',
                    borderWidth: '1',
                }
        }
    }
    new Chart(visitorChart, configVisitorChart);

    // browser usage
    const browserUsageChart = document.querySelector("#browser_usage_chart").getContext('2d');
    let configBrowserUsageChart = {
      type: 'pie',
        data: {
            labels: ['Chrome','Mozilla','Uc Browser','Opera Mini'],
            datasets: [{
                data: [10,6,7,5],
                backgroundColor: [
                  "#1bd741",
                      "#2597e0",
                      "#f9a022",
                      "#dd2525"
                ]
            }]
        },
        options: {
          maintainAspectRatio: false,
          legend: {
            display: true
            },
            tooltips: {
                    titleFontFamily: 'sans-serif',
                    bodyFontFamily: 'sans-serif',
                    backgroundColor: '#fff',
                    titleFontColor: '#333',
                    bodyFontColor: '#333',
                    borderColor: '#e2e2e2',
                    borderWidth: '1',
                }
        }
    }
    new Chart(browserUsageChart, configBrowserUsageChart);

    // show more btn
    const showMoreBtn = document.querySelector("a.show-more-btn");
    if(showMoreBtn !== null) {
      showMoreBtn.addEventListener('click', function(e) {
        // not aktifkan fungsi default link
        e.preventDefault();

        let targetShowBtnMore = e.target;
        if(!targetShowBtnMore.classList.contains("show-more-btn")) targetShowBtnMore = e.target.parentElement;
        if(targetShowBtnMore.classList.contains("show-more-btn")) {
          targetShowBtnMore.nextElementSibling.classList.remove("d-none");
          setTimeout(function(){
            targetShowBtnMore.nextElementSibling.classList.add("d-none");
          }, 1000);
        }
      });
    }
  </script>
</body>
</html>