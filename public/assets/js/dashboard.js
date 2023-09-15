$(function () {
  // =====================================
  // Propinsi
  // =====================================
    $.ajax({
        url: "/api/provcount",
        type: "GET",
        dataType: 'json',
        success: function (res) {

          let breakup = {
            color: "#adb5bd",
            series: res.map(item => item.record_count),
            labels: res.map(item => item.nm_prov),
            chart: {
              width: 180,
              type: "donut",
              fontFamily: "Plus Jakarta Sans', sans-serif",
              foreColor: "#adb0bb",
            },
            plotOptions: {
              pie: {
                startAngle: 0,
                endAngle: 360,
                donut: {
                  size: '75%',
                },
              },
            },
            stroke: {
              show: false,
            },

            dataLabels: {
              enabled: false,
            },

            legend: {
              show: false,
            },
            colors: ["#5D87FF", "#ecf2ff", "#F9F9FD"],

            responsive: [
              {
                breakpoint: 991,
                options: {
                  chart: {
                    width: 150,
                  },
                },
              },
            ],
            tooltip: {
              theme: "dark",
              fillSeriesColor: false,
            },
          };

          $(".count-prop").text(res.length)
          var chart = new ApexCharts(document.querySelector("#propinsi"), breakup);
          chart.render();
        }
    });

    // =====================================
    // Kabupaten
    // =====================================
    function chartKabupaten(uri) {
        //Reset Chart
        $("#kabupaten").html("");
        //Create Chart
        $.ajax({
            url: uri,
            type: "GET",
            dataType: 'json',
            success: function (res) {

                let breakup = {
                    color: "#adb5bd",
                    series: res.map(item => item.record_count),
                    labels: res.map(item => item.nama_kab),
                    chart: {
                        width: 180,
                        type: "donut",
                        fontFamily: "Plus Jakarta Sans', sans-serif",
                        foreColor: "#adb0bb",
                    },
                    plotOptions: {
                        pie: {
                            startAngle: 0,
                            endAngle: 360,
                            donut: {
                                size: '75%',
                            },
                        },
                    },
                    stroke: {
                        show: false,
                    },

                    dataLabels: {
                        enabled: false,
                    },

                    legend: {
                        show: false,
                    },
                    colors: ["#5D87FF", "#ecf2ff", "#F9F9FD"],

                    responsive: [
                        {
                            breakpoint: 991,
                            options: {
                                chart: {
                                    width: 150,
                                },
                            },
                        },
                    ],
                    tooltip: {
                        theme: "dark",
                        fillSeriesColor: false,
                    },
                };

                $(".count-kab").text(res.length)
                var chart = new ApexCharts(document.querySelector("#kabupaten"), breakup);
                chart.render();
            }
        });
    }
    if ($("#kabupaten").length > 0) {
        chartKabupaten("/api/kabcount");
    }

    // =====================================
    // Pengurus Cabang
    // =====================================
    function chartPC(uri) {
        //Reset Chart
        $("#pc").html("");
        //Create Chart
        $.ajax({
            url: uri,
            type: "GET",
            dataType: 'json',
            success: function (res) {

                let breakup = {
                    color: "#adb5bd",
                    series: res.map(item => item.record_count),
                    labels: res.map(item => item.nama_pc),
                    chart: {
                        width: 180,
                        type: "donut",
                        fontFamily: "Plus Jakarta Sans', sans-serif",
                        foreColor: "#adb0bb",
                    },
                    plotOptions: {
                        pie: {
                            startAngle: 0,
                            endAngle: 360,
                            donut: {
                                size: '75%',
                            },
                        },
                    },
                    stroke: {
                        show: false,
                    },

                    dataLabels: {
                        enabled: false,
                    },

                    legend: {
                        show: false,
                    },
                    colors: ["#5D87FF", "#ecf2ff", "#F9F9FD"],

                    responsive: [
                        {
                            breakpoint: 991,
                            options: {
                                chart: {
                                    width: 150,
                                },
                            },
                        },
                    ],
                    tooltip: {
                        theme: "dark",
                        fillSeriesColor: false,
                    },
                };

                $(".count-pc").text(res.length)
                var chart = new ApexCharts(document.querySelector("#pc"), breakup);
                chart.render();
            }
        });
    }

    if ($("#pc").length > 0) {
        chartPC("/api/pccount");
    }

    // =====================================
    // Jenjang Pendidikan
    // =====================================
    $.ajax({
        url: "/api/jenjangcount",
        type: "GET",
        dataType: 'json',
        success: function (res) {

            let breakup = {
                color: "#adb5bd",
                series: res.map(item => item.record_count),
                labels: res.map(item => item.nm_jenjang),
                chart: {
                    width: 180,
                    type: "donut",
                    fontFamily: "Plus Jakarta Sans', sans-serif",
                    foreColor: "#adb0bb",
                },
                plotOptions: {
                    pie: {
                        startAngle: 0,
                        endAngle: 360,
                        donut: {
                            size: '75%',
                        },
                    },
                },
                stroke: {
                    show: false,
                },

                dataLabels: {
                    enabled: false,
                },

                legend: {
                    show: false,
                },
                colors: ["#5D87FF", "#ecf2ff", "#F9F9FD"],

                responsive: [
                    {
                        breakpoint: 991,
                        options: {
                            chart: {
                                width: 150,
                            },
                        },
                    },
                ],
                tooltip: {
                    theme: "dark",
                    fillSeriesColor: false,
                },
            };

            $(".count-jp").text(res.length)
            var chart = new ApexCharts(document.querySelector("#jenjang-pendidikan"), breakup);
            chart.render();
        }
    });

    $("#chartSelectProv").on('change', function() {
        chartKabupaten("/api/kabcount/" + $(this).val());
    });

})
