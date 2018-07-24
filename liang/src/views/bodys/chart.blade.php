<div class="col-md-10">
    <br>
    <p class="lchart" style="display: none">提示:<em class="text-green">红线和绿线是参考氛围，不过不同性别和不同医院的标准不一样</em></p>
    <br>
    <div class="box  box-primary">
        <div class="box-header with-border">
            <h3 class="box-title text-blue tt">检查简单提示（<em class="text-red" style="font-size: x-small">注意以下提示都是大数据，个人的情况需要医生诊断</em>）</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool linss" type="button" onclick="getLineChartData(this)" data-route="">
                    <i class="fa fa-area-chart"></i>折线图
                </button>
                <button class="btn btn-box-tool barss" type="button" onclick="getBarChartData(this)" data-route="">
                    <i class="fa fa-cubes"></i>柱形图
                </button>
                <button class="btn btn-box-tool piess" type="button"  onclick="getPieChartData(this)" data-route="">
                    <i class="fa  fa-pie-chart"></i>饼行图
                </button>
                <button class="btn btn-box-tool tabless" type="button" onclick="getTable(this)">
                    <i class="fa  fa-table"></i>原生数据
                </button>
                <button class="btn btn-box-tool active text-black moyan" type="button" onclick="getMoyan()" >
                    <i class="fa  fa-ambulance"></i>提示
                </button>
            </div>
        </div>
        <div class="box-body" >
            @include('Liang::bodys.tishi',['table'=>$table])
            <div class="lchart" style="display: none">
                <p class="danwei"></p>
                <canvas class="Chartjs">

                </canvas>
            </div>
            <div class="bchart"  style="display: none;">
                <p class="danweii"></p>
                <canvas class="bChartjs" style="width: 100%; min-height: 30%">

                </canvas>
            </div>
            <div class="pchart" style="display: none;">
                <p class="ptishi"> 提示 : 红色区域是异常 绿色代表正常 </p>
                <canvas class="pChartjs" style="width: 100%; min-height: 30%">

                </canvas>
            </div>
            <div class="tchart" style="display:none">
                <br>
                <div class="ttishi"></div>
                <br>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>时间</th>
                        <th>数值</th>
                    </tr>
                    </thead>
                    <tbody id="tbody-result">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>