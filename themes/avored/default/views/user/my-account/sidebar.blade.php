<div class="profile-sidebar">

    @if(!isset($user))
        @php
        $user = Auth::user()
        @endphp
    @endif

    <div class="profile-usermenu">
        <ul class="collection list-group">
            <li class="list-group-item">
            @if($user->image_path == "")
                <img src="http://placehold.it/250x250" class="img-responsive img-thumbnail" alt="">
                    <strong class="text-center">{{ $user->fullName }}</strong>
            @else
                <img src="{{ $user->image_path->smallUrl }}" class="img-responsive img-thumbnail" alt="">

            @endif
            </li>

            <a href="{{ route('my-account.home') }}" class="list-group-item list-group-item-action">

                概览 </a>

            <a href="{{ route('my-account.edit') }}" class="list-group-item list-group-item-action">

                修改资料</a>


            <a href="{{ route('my-account.upload-image') }}" class="list-group-item list-group-item-action">

                上传头像</a>
            <a href="{{ route('my-account.order.list') }}" class="list-group-item list-group-item-action">

                我的订单</a>
            <a href="{{ route('my-account.address.index') }}" class="list-group-item list-group-item-action">

                地址 </a>
            <a href="{{ route('wishlist.list') }}" class="list-group-item list-group-item-action">

                我的收藏</a>
            <a href="{{ route('my-account.change-password') }}" class="list-group-item list-group-item-action">

                更改密码</a>
            <a href="{{ route('logout') }}" class="list-group-item list-group-item-action">

                注销 </a>


        </ul>
    </div>

</div>