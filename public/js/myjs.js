    //

    window.onload = function () {

    };

      function getChartData (even) {


          $(".tt").text($(even).text()+"图表分析");

          $(".lchart").css('display','');
          $('.Chartjs').remove();
          $(".danwei").text(" 单位: "+$(even).data('unit')).append('<canvas class="Chartjs"></canvas>');
          $(".pchart").css('display','none');
          $(".tishi").css('display','none');
          $(".tchart").css('display','none');
          $(".bchart").css('display','none');

          var arr =['LEU','NIT','PRO','GLU','KET','UBG','BLD','BIL','COL','TURB','MS','EC','FATTY','CRYSTAL'];
          if($.inArray($(even).data('column'),arr)>0){
              $(".linss").attr('disabled','true');
              $(".barss").attr('disabled','true');
          }else{

              $(".linss").removeAttr('disabled').addClass('active').css('color','#040404').data('route',$(even).data('route')).data('max',$(even).data('max')).data('min',$(even).data('min'));
              $(".barss").removeAttr('disabled').removeClass('active').css('color','#97a0b3').data('route',$(even).data('route'));
          }

          $(".piess").removeClass('active').css('color','#97a0b3').data('route',$(even).data('route')+'\\'+$(even).data('max')+'\\'+$(even).data('min'));
          $(".moyan").removeClass('active').removeClass('text-black');
          $(".tabless").removeClass('active').css('color','#97a0b3').data('route',$(even).data('route')).data('max',$(even).data('max')).data('min',$(even).data('min'));



          $.ajax({
              url:$(even).data('route'),
              type: "GET",
              error: function(){
                  alert('Error loading XML document');
              },
              success:function(data){
                var Data = JSON.parse(data);
                  line(Data,$(even).data('max'),$(even).data('min'));
              }
          });
    }

    function getPieChartData(even){

        $(".lchart").css('display','none');
        $(".bchart").css('display','none');
        $(".tishi").css('display','none');
        $(".tchart").css('display','none');
        $(".pchart").css('display','');
        // $(".pChartjs").remove();
        // $(".ptishi").append('<canvas class="pChartjs" style="width: 100%; min-height: 30%"></canvas>');

        $(".linss").removeClass('active').css('color','#97a0b3');
        $(".tabless").removeClass('active').css('color','#97a0b3');
        $(".barss").removeClass('active').css('color','#97a0b3');
        $(".moyanss").removeClass('active').css('color','#97a0b3');
        $(".piess").addClass('active').css('color','#040404');

        $.ajax({
            url:$(even).data('route'),
            type:'GET',
            error:function () {
               alert('异常')
            },
            success:function (data) {
                var datas = JSON.parse(data);
                // console.log(datas);
                $(".ptishi").html("<em style='color: #ac2925'> 红色超出 </em>"+(datas.abnormalityMax)+"<em style='color: #4EE6FA'> 正常  </em>"+(datas.normal)+"<em style='color: #949FB1'> 小于正常 </em>"+(datas.abnormalityMin));

                pie(datas);
            }
        });
    }
    function getBarChartData(even){

        $(".lchart").css( 'display','none');
        $(".bchart").css( 'display','');
        $('.bChartjs').remove();
        $(".danweii").append('<canvas class="bChartjs" style="width: 100%; min-height: 30%"></canvas>');
        $(".tishi").css(  'display','none');
        $(".tchart").css( 'display','none');
        $(".pchart").css( 'display','none');

        $(".linss").removeClass('active').css('color','#97a0b3');
        $(".tabless").removeClass('active').css('color','#97a0b3');
        $(".barss").addClass('active').css('color','#040404');
        $(".moyanss").removeClass('active').css('color','#97a0b3');
        $(".piess").removeClass('active').css('color','#97a0b3');

        $.ajax({
            url:$(even).data('route'),
            type: "GET",
            error: function(){
                alert('Error loading XML document');
            },
            success:function(data){
                var Data = JSON.parse(data);
                bar(Data);
            }
        });
    }
    function getLineChartData(even){
        $(".lchart").css('display','');
        $(".bchart").css('display','none');
        $(".tishi").css('display','none');
        $(".tchart").css('display','none');
        $(".pchart").css('display','none');

        $(".tabless").removeClass('active').css('color','#97a0b3');
        $(".barss").removeClass('active').css('color','#97a0b3');
        $(".moyanss").removeClass('active').css('color','#97a0b3');
        $(".piess").removeClass('active').css('color','#97a0b3');
        $(".linss").addClass('active').css('color','#040404');
        $.ajax({
            url:$(even).data('route'),
            type: "GET",
            error: function(){
                alert('Error loading XML document');
            },
            success:function(data){
                var Data = JSON.parse(data);
                line(Data,$(even).data('max'),$(even).data('min'));
            }
        });
    }

    function getTable(even) {

        $(".lchart").css('display','none');
        $(".bchart").css('display','none');
        $(".tishi").css('display','none');
        $(".tchart").css('display','');
        $(".pchart").css('display','none');

        $(".tabless").addClass('active').css('color','#040404');
        $(".barss").removeClass('active').css('color','#97a0b3');
        $(".moyanss").removeClass('active').css('color','#97a0b3');
        $(".piess").removeClass('active').css('color','#97a0b3');
        $(".linss").removeClass('active').css('color','#97a0b3');

        var max = $(even).data('max');
        var min = $(even).data('min');

        $.ajax({
            url:$(even).data('route')+'/yuan',
            type: "GET",
            error: function(){
                alert('Error loading XML document');
            },
            success:function(data){
                var Data = JSON.parse(data);
                var str ='';
                $.each(Data,function (i,obj) {
                    if (obj.value != null){
                    if (obj.value>max || obj.value <min){
                        str +="<tr>"+"<td>"+obj.check_time+"</td>"+"<td style='color: #ac2925;font-weight: bold;'>"+obj.value+"</td></tr>"
                    }else{
                        str +="<tr>"+"<td>"+obj.check_time+"</td>"+"<td>"+obj.value+"</td></tr>"
                    }
                    }
                });
                $(".ttishi").text("参考范围是  : "+min+" ~ "+max);
                $("#tbody-result").html(str);
            }
        });

    }

    function getMoyan() {

        $(".lchart").css('display','none');
        $(".bchart").css('display','none');
        $(".tishi").css('display','');
        $(".tchart").css('display','none');
        $(".pchart").css('display','none');

        $(".tabless").removeClass('active').css('color','#97a0b3');
        $(".barss").removeClass('active').css('color','#97a0b3');
        $(".moyanss").addClass('active').css('color','#040404');
        $(".piess").removeClass('active').css('color','#97a0b3');
        $(".linss").removeClass('active').css('color','#97a0b3');
    }


    function pie(datas){

        // alert(datas.abnormalityMin);
        var pieChartData=[];
        var normalData={};
        normalData.value =datas.normal;
        normalData.color ="#4EE6FA";
        normalData.highlight = "#B0FAF5";
        normalData.label = '正常';
        var abnormalityDataMin={};
        abnormalityDataMin.value = datas.abnormalityMin;
        abnormalityDataMin.color = "#949FB1";
        abnormalityDataMin.highlight ="#AFBCCE";
        abnormalityDataMin.label = '小于正常';
        var abnormalityDataMax={};
        abnormalityDataMax.value = datas.abnormalityMax;
        abnormalityDataMax.color ="#F7464A";
        abnormalityDataMax.highlight ="#FA7C7C";
        abnormalityDataMax.label = '超出';

        pieChartData.push(abnormalityDataMax);
        pieChartData.push(normalData);
        pieChartData.push(abnormalityDataMin);

        var options ={
            //是否显示每段行程（即环形区，不为true则无法看到后面设置的边框颜色）
            segmentShowStroke: true,
            //设置每段行程的边框颜色
            segmentStrokeColor: "#fff",
            //设置每段环形的边框宽度
            segmentStrokeWidth: 2,
            //图标中心剪切圆的比例（0为饼图，接近100则环形宽度越小）
            percentageInnerCutout: 50,
            //是否执行动画
            animation: true,
            //执行动画时间
            animationSteps: 100,
            //动画特效
            animationEasing: "easeOutBounce",
            //是否旋转动画
            animateRotate: true,
            //是否缩放图表中心
            animateScale: true
            //动画完成时的回调函数
//                      onAnimationComplete: null
        };

        var pieChartCanvas  = $(".pChartjs").get(0).getContext('2d');
         new Chart(pieChartCanvas).Doughnut(pieChartData,options)

    }

    function  line(data,max,min) {
     if (data.length == null || data.length ==0)  return ;


     var lineChartData={};
        lineChartData.labels=[];
        lineChartData.datasets=[];

     var temChartData = {};

        temChartData.fillColor = "rgba(151,187,205,0.7)";
        temChartData.strokeColor = "rgba(151,187,205,1)";
        temChartData.pointColor="#5DFA15";
        temChartData.pointStrokeColor= "#FFF"; //数据点边框颜色
        temChartData.pointhighlightFill ="#fff";
        temChartData.pointhighlightStroke ='rgba(60,141,188,1)';
        temChartData.data=[];

        var maxChartData = {};

        maxChartData.strokeColor = "rgba(250,35,192,0.5)";
        maxChartData.fillColor = "rgba(6,250,164,0.1)";
        maxChartData.data=[];

        var minChartData = {};

        minChartData.strokeColor = "rgba(151,187,205,1)";
        minChartData.fillColor = "rgba(255,255,255,0.1)";
        minChartData.data=[];

     for (var i =0;i<data.length;i++){
         minChartData.data.push(min);
         maxChartData.data.push(max);
         if(data[i].value != null){
             lineChartData.labels.push(data[i].check_time);
             temChartData.data.push(data[i].value)
         }

     }
        lineChartData.datasets.push(maxChartData);
        lineChartData.datasets.push(temChartData);
        lineChartData.datasets.push(minChartData);//封装一个规定格式的ChartData

        var lineOptions = {
            // Y/X轴的颜色
            // scaleOverride :true ,   //是否用硬编码重写y轴网格线
            // scaleSteps : 5,        //y轴刻度的个数
            // scaleStepWidth : 4,   //y轴每个刻度的宽度
            // scaleStartValue : 0,    //y轴的起始值
            // 是否使用贝塞尔曲线? 即:线条是否弯曲
            bezierCurve:true,

            //每个点的半径以像素为单位
            pointDotRadius          : 2,

            // showTooltips: false, // 是否显示提示,这里需要设置为false
            // 是否执行动画
            animation: true,
            // 动画的时间
            animationSteps: 60,

            // onAnimationComplete: function() {//动画完成后显示对应的数据
            //     var lineCharCanvas = this.chart.ctx;
            //     lineCharCanvas.font = this.scale.font;
            //     lineCharCanvas.fillStyle = this.scale.textColor;
            //     lineCharCanvas.textAlign = 'center';
            //     lineCharCanvas.textBaseline = 'bottom';
            //     this.datasets.forEach(function(dataset) {
            //         dataset.bars.forEach(function(bar) {
            //             ctx.fillText(bar.value);
            //         });
            //     });
            // },
            //是否使图表响应窗口大小调整
            responsive: true
        };

        var lineCharCanvas = $(".Chartjs").get(0).getContext('2d');

        var lineChart      = new Chart(lineCharCanvas).Line(lineChartData,lineOptions);



    }

    function  bar(data) {

        if (data.length == null || data.length ==0)  return ;

        var barChartData={};
        barChartData.labels=[];
        barChartData.datasets=[];

        var temChartData = {};
        temChartData.fillColor = "rgba(151,187,205,0.7)";
        temChartData.strokeColor = "rgba(151,187,205,1)";
        temChartData.data=[];

        for (var i =0;i<data.length;i++){
            if (data[i].value != null){
                barChartData.labels.push(data[i].check_time);
                temChartData.data.push(data[i].value)
            }

        }

        barChartData.datasets.push(temChartData);//封装一个规定格式的ChartData

        // var barOptions = {
        //     // scaleLabel: "$"+"<%=value%>",
        //     //是否绘制柱状条的边框
        //     barShowStroke: true,
        //     //柱状条边框的宽度
        //     barStrokeWidth: 2,
        //     //柱状条组之间的间距(过大或过小会出现重叠偏移错位的效果，请控制合理数值)
        //     barValueSpacing: 5,
        //     //每组柱状条组中柱状条之间的间距
        //     barDatasetSpacing: 5,
        //     // responsive: true
        // };

        var barCharCanvas = $(".bChartjs").get(0).getContext('2d');
        barCharCanvas.height = barCharCanvas.height;
        var lineChart      = new Chart(barCharCanvas).Bar(barChartData);

    }


$(function () {

    /*
     登录
     */
    $(".mlogin").click(function () {
        $.get("{{route('manage.login')}}",function (data) {
            $("#admin-content").html(data);
        });
    });

    /*
     删除
     */
    $('#admin-content').on('click','.mydelete',function (even) {
        even.preventDefault();
//        alert($(this).attr('href'));
        if (confirm('你确定删除吗？')) {
            if ($(this).attr('href') != '#') {
                $.ajax({
                    url: $(this).attr('href'),
                    type: 'GET',
                    success: function (data) {
                        $('#admin-content').html(data);
                    }
                })
            }

        }
    });

    /*
    为所有在 class admin-content 里面 class = ajaxa 的《a》 元素进行ajax提交
     */

    $('#admin-content').on('click','.ajaxa',function (even) {
        even.preventDefault();
//        alert($(this).attr('href'));

            if ($(this).attr('href') != '#') {
                $.ajax({
                    url: $(this).attr('href'),
                    type: 'GET',
                    success: function (data) {
                        $('#admin-content').html(data);
                    }
                })
            }

        });

    /*
     项目的隐藏和显示
     */
    $("#admin-content").on('click','.dongz',function () {
        $(".yinchang").toggle();
    });

    /*
    检测 class = myinput 的输入变化  赋值给 class updateMenu元素的  data-value
     */
    $('.myinput').on('input propertychange', function() {
        $('.updateMenu').data('value',$(this).val());
    });


    /*
    上传图片
     */
    // $("#uploadForm").on('submit', function(e){
    //     e.preventDefault();
    //     $.ajax({
    //         url: $('#uploadForm').attr('action'),
    //         type: "POST",
    //         data:  new FormData(this),
    //         contentType: false,
    //         cache: false,
    //         processData: false,
    //         // 显示加载图片
    //         // beforeSend: function () {
    //         //     $('.loading-shadow').addClass('active');
    //         // },
    //         success: function (data) {
    //
    //         },
    //         error: function(){}
    //     });
    // });





});

/*
  分页 提交ajax
 */
    function page(page){
        $.get("{{route('manage.article')}}", { pages:page},function(msg){
            //替换整个页面
            $("#admin-content").html(msg)
        } );
    }

/*
    查询书签方法
 */
    function searchbookmark(){
        $.ajax({
        type:'POST',
            url:"{{route('manage.bookmark.search')}}",
            data: $('.searchBookmark').serialize(),
            success:function (data) {
            $('#admin-content').html(data);
        },
        error:function () {
            alert('查询书签异常');
        }
    });
    }

/*
 用ajax post 方法更新菜单  提交数据
 */
    function myupdate(obj){

        $.post($(obj).data('url'),{'_token':$(obj).data('token'),'id':$(obj).data('id'),'values':$(obj).data('value')},  function(data){
            $(".myadmin").html(data);
        })
    }



/*
 提交表单
 */
    function submitForm(){

        if ($("#checkTime").val() ==''){
            alert('你需要填写检查时间哟！亲爱滴朋友');
            return false;
        }else{
        $.ajax({
            type:'POST',
            url:$('.myform').attr('action'),
            data: $('.myform').serialize(),
            success:function (data) {
                $('#admin-content').html(data);
            },
            error:function () {
                alert('异常');
            }
        });
        }
    }

    /*
    ajac 验证图片 上传图片
     */
    function fsubmit() {
        var animateimg = $("#filess").val(); //获取上传的图片名 带//
        var imgarr=animateimg.split('\\'); //分割
        var myimg=imgarr[imgarr.length-1]; //去掉 // 获取图片名
        var houzui = myimg.lastIndexOf('.'); //获取 . 出现的位置
        var ext = myimg.substring(houzui, myimg.length).toUpperCase();  //切割 . 获取文件后缀

        // var file = $('#f').get(0).files[0]; //获取上传的文件
        // var fileSize = file.size;           //获取上传的文件大小
        // var maxSize = 1048576;              //最大1MB
        if(ext !='.PNG' && ext !='.GIF' && ext !='.JPG' && ext !='.JPEG' && ext !='.BMP'){
            alert('文件类型错误,请上传图片类型');
            return false;
        }else{
        var form = document.getElementById('uploadForm');
        $.ajax({
            type: 'POST',
            url: $('#uploadForm').attr('action'),
            data: new FormData(form),
            processData: false,// 告诉jQuery不要去处理发送的数据
            contentType: false,//告诉jQuery不要去设置Content-Type请求头
            success: function (json) {
                // alert(json);
                $('#admin-content').html(json);
            },
            error: function (err) {

            }
        });
    }
    }
    // Line.defaults = {
    //     //网格线是否在数据线的上面
    //     scaleOverlay : false,
    //
    //     //是否用硬编码重写y轴网格线
    //     scaleOverride : false,
    //
    //     //** Required if scaleOverride is true **
    //     //y轴刻度的个数
    //     scaleSteps : null,
    //
    //     //y轴每个刻度的宽度
    //     scaleStepWidth : 20,
    //
    //     // Y 轴的起始值
    //     scaleStartValue : null,
    //     // Y/X轴的颜色
    //     scaleLineColor: "rgba(0,0,0,.1)",
    //     // X,Y轴的宽度
    //     scaleLineWidth: 1,
    //     // 刻度是否显示标签, 即Y轴上是否显示文字
    //     scaleShowLabels: true,
    //     // Y轴上的刻度,即文字
    //     scaleLabel: "<%=value%>",
    //     // 字体
    //     scaleFontFamily: "'Arial'",
    //     // 文字大小
    //     scaleFontSize: 16,
    //     // 文字样式
    //     scaleFontStyle: "normal",
    //     // 文字颜色
    //     scaleFontColor: "#666",
    //     // 是否显示网格
    //     scaleShowGridLines: true,
    //     // 网格颜色
    //     scaleGridLineColor: "rgba(0,0,0,.05)",
    //     // 网格宽度
    //     scaleGridLineWidth:2,
    //     // 是否使用贝塞尔曲线? 即:线条是否弯曲
    //     bezierCurve: true,
    //     // 是否显示点数
    //     pointDot: true,
    //     // 圆点的大小
    //     pointDotRadius:5,
    //     // 圆点的笔触宽度, 即:圆点外层白色大小
    //     pointDotStrokeWidth: 2,
    //     // 数据集行程(连线路径)
    //     datasetStroke: true,
    //     // 线条的宽度, 即:数据集
    //     datasetStrokeWidth: 2,
    //     // 是否填充数据集
    //     datasetFill: true,
    //     // 是否执行动画
    //     animation: true,
    //     // 动画的时间
    //     animationSteps: 60,
    //     // 动画的特效
    //     animationEasing: "easeOutQuart",
    //     // 动画完成时的执行函数
    //     /*onAnimationComplete: null*/
    // }
