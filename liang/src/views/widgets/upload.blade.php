

<div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel">
                <div class="panel-header panel-success">检查单</div>

                <div class="panel-body">
                    <form action="{{route('manage.upload.image')}}" class="form-inline" id="uploadForm"  onsubmit="return false">
                        {!! csrf_field() !!}

                        <div class="form-group">
                            <div class="col-md-6">
                                <input type="file" class="form-control" name="file" id="filess">

                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary" onclick="fsubmit()">
                                    文件上传
                                </button>
                            </div>
                        </div>
                    </form>
                    <p id="tishi">图片格式为<em style="color: #ac2925"> JPEG,GIF,PNG </em></p>
                </div>
            </div>
        </div>
    </div>

