<div class="row">
    <div class="col-6 text-center">
        @if(session()->has('massages'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>

                <strong> 成功!</strong> {{ session()->get('massages') }}

            </div>
        @endif
        @if(session()->has('errors'))
            <div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="关闭"><span>aria-hidden="true"&times;</span></button>
                <strong>失败！！</strong>{{session()->get('errors')}}
            </div>
            @endif
    </div>
</div>