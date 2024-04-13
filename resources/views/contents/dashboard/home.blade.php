@extends('layouts.app')

@push('styles')
@endpush

@section('css')
<style>
    .amcharts-amexport-item.amcharts-amexport-item-level-0 {
        opacity: 0.8 !important;
    }

    .amchart-export {
        background: #1b3f63;
        padding: 5px;
        color: #fcc51e;
    }

    a.amcharts-amexport-label.amcharts-amexport-label-level-1.amcharts-amexport-item-blank {
        color: #1b3f63;
        background: #fcc51e;
    }
</style>
@endsection

@section('contents')
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="alert bg-primary-bold" role="alert">
                        <h3 class="text-center  mb-0">Beranda Sistem Informasi Kaderisasi</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @if (session('role_id') == 2)
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12 align-self-center">
                            <div class="text-lg-center mt-4 mt-lg-0">
                                <div class="row">
                                    <div class="col-3">
                                        <div>
                                            <p class="text-truncate mb-2">Perguruan Tinggi</p>
                                            <h4 class="mb-0">{{$perguruanTinggi}}</h4>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div>
                                            <p class="text-truncate mb-2">Fakultas</p>
                                            <h4 class="mb-0">{{$fakultas}}</h4>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div>
                                            <p class="text-truncate mb-2">Program Studi</p>
                                            <h4 class="mb-0">{{$prodi}}</h4>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div>
                                            <p class="text-truncate mb-2">Kader</p>
                                            <h4 class="mb-0">{{$kader}}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <div class="col-lg-12">
            <div class="card">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-0">Grafik Jumlah Kader</h4><br>
                                <h6 class="card-title mb-0">Perguruan Tinggi</h6>
                                <div id="perguruanTinggi" style="width: 100%;height: 450px;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title mb-0">Fakultas</h6>
                                <div id="fakultas" style="width: 100%;height: 450px;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title mb-0">Program Studi</h6>
                                <div id="prodi" style="width: 100%;height: 450px;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title mb-0">Komisariat</h6>
                                <div id="komisariat" style="width: 100%;height: 450px;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title mb-0">Immawan / Immawati</h6>
                                <div id="immawan" style="width: 100%;height: 450px;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title mb-0">Perkaderan Utama</h6>
                                <div id="perkaderanUtama" style="width: 100%;height: 450px;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title mb-0">Perkaderan Khusus</h6>
                                <div id="PerkaderanKhusus" style="width: 100%;height: 450px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<!-- Resources -->
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>



<!-- Chart Kampus -->
<script>
    am5.ready(function() {
    var root = am5.Root.new("perguruanTinggi");
    root.setThemes([
        am5themes_Animated.new(root)
    ]);

    var chart = root.container.children.push(am5xy.XYChart.new(root, {
        panX: false,
        panY: false, // Disable Y-axis panning
        wheelX: "panX",
        wheelY: "zoomX",
        pinchZoomX: false,
        paddingLeft: 0,
        paddingRight: 1
    }));

    var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {}));
    cursor.lineY.set("visible", false);

    var xRenderer = am5xy.AxisRendererX.new(root, {
        minGridDistance: 30,
        minorGridEnabled: false
    });

    xRenderer.labels.template.setAll({
        rotation: 0,
        centerY: am5.p50,
        centerX: am5.p50,
        paddingRight: 0
    });

    xRenderer.grid.template.setAll({
        location: 1
    })

    var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
        maxDeviation: 0.3,
        categoryField: "universitas",
        renderer: xRenderer,
        tooltip: am5.Tooltip.new(root, {})
    }));

    var yRenderer = am5xy.AxisRendererY.new(root, {
        strokeOpacity: 0.1
    })

    var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
        maxDeviation: 0.3,
        renderer: yRenderer,
    }));

    var series = chart.series.push(am5xy.ColumnSeries.new(root, {
        name: "Series 1",
        xAxis: xAxis,
        yAxis: yAxis,
        valueYField: "total",
        sequencedInterpolation: false,
        categoryXField: "universitas",
        tooltip: am5.Tooltip.new(root, {
            labelText: "{valueY}"
        })
    }));

    series.columns.template.setAll({ cornerRadiusTL: 5, cornerRadiusTR: 5, strokeOpacity: 0 });
    series.columns.template.adapters.add("fill", function (fill, target) {
        return chart.get("colors").getIndex(series.columns.indexOf(target));
    });

    series.columns.template.adapters.add("stroke", function (stroke, target) {
        return chart.get("colors").getIndex(series.columns.indexOf(target));
    });

    var data = {!! $chartKampus !!};

    xAxis.data.setAll(data);
    series.data.setAll(data);

    series.appear(1000);
    chart.appear(1000, 100);
});
</script>

<!-- Chart FAkultas -->
<script>
    am5.ready(function() {
        var root = am5.Root.new("fakultas");
        root.setThemes([
        am5themes_Animated.new(root)
        ]);

        var chart = root.container.children.push(am5xy.XYChart.new(root, {
        panX: true,
        panY: true,
        wheelX: "panX",
        wheelY: "zoomX",
        pinchZoomX: true,
        paddingLeft:0,
        paddingRight:1
        }));

        var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {}));
        cursor.lineY.set("visible", false);

        var xRenderer = am5xy.AxisRendererX.new(root, {
        minGridDistance: 30,
        minorGridEnabled: true
        });

        xRenderer.labels.template.setAll({
        rotation: 0,
        centerY: am5.p50,
        centerX: am5.p50,
        paddingRight: 0
        });

        xRenderer.grid.template.setAll({
        location: 1
        })

        var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
        maxDeviation: 0.3,
        categoryField: "fakultas",
        renderer: xRenderer,
        tooltip: am5.Tooltip.new(root, {})
        }));

        var yRenderer = am5xy.AxisRendererY.new(root, {
        strokeOpacity: 0.1
        })

        var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
        maxDeviation: 0.3,
        renderer: yRenderer
        }));

        var series = chart.series.push(am5xy.ColumnSeries.new(root, {
        name: "Series 1",
        xAxis: xAxis,
        yAxis: yAxis,
        valueYField: "total",
        sequencedInterpolation: true,
        categoryXField: "fakultas",
        tooltip: am5.Tooltip.new(root, {
            labelText: "{valueY}"
        })
        }));

        series.columns.template.setAll({ cornerRadiusTL: 5, cornerRadiusTR: 5, strokeOpacity: 0 });
        series.columns.template.adapters.add("fill", function (fill, target) {
        return chart.get("colors").getIndex(series.columns.indexOf(target));
        });

        series.columns.template.adapters.add("stroke", function (stroke, target) {
        return chart.get("colors").getIndex(series.columns.indexOf(target));
        });

        var data = {!! $chartFakultas !!};

        xAxis.data.setAll(data);
        series.data.setAll(data);

        series.appear(1000);
        chart.appear(1000, 100);

    });
</script>

<!-- Chart Prodi -->
<script>
    am5.ready(function() {
        var root = am5.Root.new("prodi");
        root.setThemes([
        am5themes_Animated.new(root)
        ]);

        var chart = root.container.children.push(am5xy.XYChart.new(root, {
        panX: true,
        panY: true,
        wheelX: "panX",
        wheelY: "zoomX",
        pinchZoomX: true,
        paddingLeft:0,
        paddingRight:1
        }));

        var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {}));
        cursor.lineY.set("visible", false);

        var xRenderer = am5xy.AxisRendererX.new(root, {
        minGridDistance: 30,
        minorGridEnabled: true
        });

        xRenderer.labels.template.setAll({
        rotation: 0,
        centerY: am5.p50,
        centerX: am5.p50,
        paddingRight: 0
        });

        xRenderer.grid.template.setAll({
        location: 1
        })

        var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
        maxDeviation: 0.3,
        categoryField: "prodi",
        renderer: xRenderer,
        tooltip: am5.Tooltip.new(root, {})
        }));

        var yRenderer = am5xy.AxisRendererY.new(root, {
        strokeOpacity: 0.1
        })

        var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
        maxDeviation: 0.3,
        renderer: yRenderer
        }));

        var series = chart.series.push(am5xy.ColumnSeries.new(root, {
        name: "Series 1",
        xAxis: xAxis,
        yAxis: yAxis,
        valueYField: "total",
        sequencedInterpolation: true,
        categoryXField: "prodi",
        tooltip: am5.Tooltip.new(root, {
            labelText: "{valueY}"
        })
        }));

        series.columns.template.setAll({ cornerRadiusTL: 5, cornerRadiusTR: 5, strokeOpacity: 0 });
        series.columns.template.adapters.add("fill", function (fill, target) {
        return chart.get("colors").getIndex(series.columns.indexOf(target));
        });

        series.columns.template.adapters.add("stroke", function (stroke, target) {
        return chart.get("colors").getIndex(series.columns.indexOf(target));
        });

        var data = {!! $chartProdi !!};

        xAxis.data.setAll(data);
        series.data.setAll(data);

        series.appear(1000);
        chart.appear(1000, 100);

    });
</script>

<!-- Chart Komisariat -->
<script>
    am5.ready(function() {
        var root = am5.Root.new("komisariat");
        root.setThemes([
        am5themes_Animated.new(root)
        ]);

        var chart = root.container.children.push(am5xy.XYChart.new(root, {
        panX: true,
        panY: true,
        wheelX: "panX",
        wheelY: "zoomX",
        pinchZoomX: true,
        paddingLeft:0,
        paddingRight:1
        }));

        var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {}));
        cursor.lineY.set("visible", false);

        var xRenderer = am5xy.AxisRendererX.new(root, {
        minGridDistance: 30,
        minorGridEnabled: true
        });

        xRenderer.labels.template.setAll({
        rotation: 0,
        centerY: am5.p50,
        fakultascenterX: am5.p50,
        paddingRight: 15
        });

        xRenderer.grid.template.setAll({
        location: 1
        })

        var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
        maxDeviation: 0.3,
        categoryField: "komisariat",
        renderer: xRenderer,
        tooltip: am5.Tooltip.new(root, {})
        }));

        var yRenderer = am5xy.AxisRendererY.new(root, {
        strokeOpacity: 0.1
        })

        var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
        maxDeviation: 0.3,
        renderer: yRenderer
        }));

        var series = chart.series.push(am5xy.ColumnSeries.new(root, {
        name: "Series 1",
        xAxis: xAxis,
        yAxis: yAxis,
        valueYField: "total",
        sequencedInterpolation: true,
        categoryXField: "komisariat",
        tooltip: am5.Tooltip.new(root, {
            labelText: "{valueY}"
        })
        }));

        series.columns.template.setAll({ cornerRadiusTL: 5, cornerRadiusTR: 5, strokeOpacity: 0 });
        series.columns.template.adapters.add("fill", function (fill, target) {
        return chart.get("colors").getIndex(series.columns.indexOf(target));
        });

        series.columns.template.adapters.add("stroke", function (stroke, target) {
        return chart.get("colors").getIndex(series.columns.indexOf(target));
        });

        var data = {!! $chartKomisariat !!};

        xAxis.data.setAll(data);
        series.data.setAll(data);

        series.appear(1000);
        chart.appear(1000, 100);

    });
</script>

<!-- Chart Immawan Immawati -->
<script>
    am5.ready(function() {
        var root = am5.Root.new("immawan");
        root.setThemes([
        am5themes_Animated.new(root)
        ]);

        var chart = root.container.children.push(am5xy.XYChart.new(root, {
        panX: true,
        panY: true,
        wheelX: "panX",
        wheelY: "zoomX",
        pinchZoomX: true,
        paddingLeft:0,
        paddingRight:1
        }));

        var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {}));
        cursor.lineY.set("visible", false);

        var xRenderer = am5xy.AxisRendererX.new(root, {
        minGridDistance: 30,
        minorGridEnabled: true
        });

        xRenderer.labels.template.setAll({
        rotation: 0,
        centerY: am5.p50,
        fakultascenterX: am5.p50,
        paddingRight: 15
        });

        xRenderer.grid.template.setAll({
        location: 1
        })

        var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
        maxDeviation: 0.3,
        categoryField: "label",
        renderer: xRenderer,
        tooltip: am5.Tooltip.new(root, {})
        }));

        var yRenderer = am5xy.AxisRendererY.new(root, {
        strokeOpacity: 0.1
        })

        var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
        maxDeviation: 0.3,
        renderer: yRenderer
        }));

        var series = chart.series.push(am5xy.ColumnSeries.new(root, {
        name: "Series 1",
        xAxis: xAxis,
        yAxis: yAxis,
        valueYField: "total",
        sequencedInterpolation: true,
        categoryXField: "label",
        tooltip: am5.Tooltip.new(root, {
            labelText: "{valueY}"
        })
        }));

        series.columns.template.setAll({ cornerRadiusTL: 5, cornerRadiusTR: 5, strokeOpacity: 0 });
        series.columns.template.adapters.add("fill", function (fill, target) {
        return chart.get("colors").getIndex(series.columns.indexOf(target));
        });

        series.columns.template.adapters.add("stroke", function (stroke, target) {
        return chart.get("colors").getIndex(series.columns.indexOf(target));
        });

        var data = {!! $chartImmawan !!};

        xAxis.data.setAll(data);
        series.data.setAll(data);

        series.appear(1000);
        chart.appear(1000, 100);

    });
</script>

<!-- Chart Perkaderan Utama -->
<script>
    am5.ready(function() {
        var root = am5.Root.new("perkaderanUtama");
        root.setThemes([
        am5themes_Animated.new(root)
        ]);

        var chart = root.container.children.push(am5xy.XYChart.new(root, {
        panX: true,
        panY: true,
        wheelX: "panX",
        wheelY: "zoomX",
        pinchZoomX: true,
        paddingLeft:0,
        paddingRight:1
        }));

        var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {}));
        cursor.lineY.set("visible", false);

        var xRenderer = am5xy.AxisRendererX.new(root, {
        minGridDistance: 30,
        minorGridEnabled: true
        });

        xRenderer.labels.template.setAll({
        rotation: 0,
        centerY: am5.p50,
        fakultascenterX: am5.p50,
        paddingRight: 15
        });

        xRenderer.grid.template.setAll({
        location: 1
        })

        var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
        maxDeviation: 0.3,
        categoryField: "kegiatan_perkaderan",
        renderer: xRenderer,
        tooltip: am5.Tooltip.new(root, {})
        }));

        var yRenderer = am5xy.AxisRendererY.new(root, {
        strokeOpacity: 0.1
        })

        var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
        maxDeviation: 0.3,
        renderer: yRenderer
        }));

        var series = chart.series.push(am5xy.ColumnSeries.new(root, {
        name: "Series 1",
        xAxis: xAxis,
        yAxis: yAxis,
        valueYField: "total",
        sequencedInterpolation: true,
        categoryXField: "kegiatan_perkaderan",
        tooltip: am5.Tooltip.new(root, {
            labelText: "{valueY}"
        })
        }));

        series.columns.template.setAll({ cornerRadiusTL: 5, cornerRadiusTR: 5, strokeOpacity: 0 });
        series.columns.template.adapters.add("fill", function (fill, target) {
        return chart.get("colors").getIndex(series.columns.indexOf(target));
        });

        series.columns.template.adapters.add("stroke", function (stroke, target) {
        return chart.get("colors").getIndex(series.columns.indexOf(target));
        });

        var data = {!! $chartPerkaderanUtama !!};

        xAxis.data.setAll(data);
        series.data.setAll(data);

        series.appear(1000);
        chart.appear(1000, 100);

    });
</script>

<!-- Chart Perkaderan Khusus -->
<script>
    am5.ready(function() {
        var root = am5.Root.new("PerkaderanKhusus");
        root.setThemes([
        am5themes_Animated.new(root)
        ]);

        var chart = root.container.children.push(am5xy.XYChart.new(root, {
        panX: true,
        panY: true,
        wheelX: "panX",
        wheelY: "zoomX",
        pinchZoomX: true,
        paddingLeft:0,
        paddingRight:1
        }));

        var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {}));
        cursor.lineY.set("visible", false);

        var xRenderer = am5xy.AxisRendererX.new(root, {
        minGridDistance: 30,
        minorGridEnabled: true
        });

        xRenderer.labels.template.setAll({
        rotation: 0,
        centerY: am5.p50,
        fakultascenterX: am5.p50,
        paddingRight: 15
        });

        xRenderer.grid.template.setAll({
        location: 1
        })

        var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
        maxDeviation: 0.3,
        categoryField: "kegiatan_pimpinan",
        renderer: xRenderer,
        tooltip: am5.Tooltip.new(root, {})
        }));

        var yRenderer = am5xy.AxisRendererY.new(root, {
        strokeOpacity: 0.1
        })

        var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
        maxDeviation: 0.3,
        renderer: yRenderer
        }));

        var series = chart.series.push(am5xy.ColumnSeries.new(root, {
        name: "Series 1",
        xAxis: xAxis,
        yAxis: yAxis,
        valueYField: "total",
        sequencedInterpolation: true,
        categoryXField: "kegiatan_pimpinan",
        tooltip: am5.Tooltip.new(root, {
            labelText: "{valueY}"
        })
        }));

        series.columns.template.setAll({ cornerRadiusTL: 5, cornerRadiusTR: 5, strokeOpacity: 0 });
        series.columns.template.adapters.add("fill", function (fill, target) {
        return chart.get("colors").getIndex(series.columns.indexOf(target));
        });

        series.columns.template.adapters.add("stroke", function (stroke, target) {
        return chart.get("colors").getIndex(series.columns.indexOf(target));
        });

        var data = {!! $chartPerkaderanKhusus !!};

        xAxis.data.setAll(data);
        series.data.setAll(data);

        series.appear(1000);
        chart.appear(1000, 100);

    });
</script>
@endpush

