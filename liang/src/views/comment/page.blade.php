<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script src="Js/jquery.min.js"></script>
</head>
<body>
<div id="box">
    <!-- 第一部分 -->
    <a href="javascript:void(0)" onclick="page(1)">首页</a>
    <a href="javascript:void(0)" onclick="page(<?php echo $prev ?>)">上一页</a>
    <a href="javascript:void(0)" onclick="page(<?php echo $next ?>)">下一页</a>
    <a href="javascript:void(0)" onclick="page(<?php echo $sums ?>)">尾页</a><br />
    <!-- 第二部分 -->
    @foreach($pp as $key=>$val)
        @if($val == $page)
            {{$val}}
        @else
            <a href="javascript:void(0)" onclick="page({{$val}})">{{$val}}</a>
    @endif
@endforeach
<!-- 表 -->
    <table border="1" id="">
        <tr>
            <td>序号</td>
            <td>名称</td>
            <td>时间</td>
        </tr>
        @foreach($data as $val)
            <tr>
                <td>{{$val->email_id}}</td>
                <td>{{$val->email_name}}</td>
                <td>{{$val->email_time}}</td>
            </tr>
        @endforeach
    </table>
</div>
<script>
    /*

     */
    function page(page){
        $.ajax({
            type:"get",
            url:"page_pro",
            data:{
                page:page
            },
            success:function(msg){
                if(msg){
                    $("#box").html(msg)
                }
            }
        })
    }
</script><span id="transmark" style="display: none; width: 0px; height: 0px;"></span>
</body>
</html>