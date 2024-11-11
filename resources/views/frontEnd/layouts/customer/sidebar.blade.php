<div class="customer-auth">
    <div class="customer-img">
        <img src="{{asset(Auth::guard('customer')->user()->image)}}" alt="">
    </div>
    <div class="customer-name">
        <p><small>Hello</small></p>
        <p>{{Auth::guard('customer')->user()->name}}</p>
    </div>
</div>
<ul>
    <li><a href="{{route('customer.account')}}" class="m-2 btn btn-primary {{request()->is('customer/account')?'active':''}}"><i data-feather="user"></i>{{ __('messages.account') }}</a></li>
    <li><a href="{{route('customer.orders')}}" class="m-2 btn btn-primary {{request()->is('customer/orders')?'active':''}}"><i data-feather="database"></i>{{ __('messages.order') }}</a></li>
    <li><a href="{{route('customer.profile_edit')}}" class="m-2 btn btn-primary {{request()->is('customer/profile-edit')?'active':''}}"><i data-feather="edit"></i>{{ __('messages.profile_update') }}</a></li>
    <li><a href="{{route('customer.change_pass')}}" class="m-2 btn btn-primary {{request()->is('customer/change-password')?'active':''}}"><i data-feather="lock"></i>{{ __('messages.change_pass') }}</a></li>
    <li><a class="m-2 btn btn-primary" href="{{ route('customer.logout') }}"
        onclick="event.preventDefault();
        document.getElementById('logout-form').submit();"><i data-feather="log-out"></i>{{ __('messages.logout') }}</a></li>
    <form id="logout-form" action="{{ route('customer.logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</ul>