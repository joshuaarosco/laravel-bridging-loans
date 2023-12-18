<nav class="page-sidebar" data-pages="sidebar">
	<div class="sidebar-header">
		<label>{{config('app.name')}}</label>
	</div>
	<div class="sidebar-menu">
		<ul class="menu-items">
			<li class="m-t-30 {{in_array(request()->route()->getName(),['backoffice.index'])?'open active':''}}">
				<a class="" href="{{route('backoffice.index')}}">
                    <span class="title">Dashboard</span>
                </a>
                <span class="{{in_array(request()->route()->getName(),['backoffice.index'])?'bg-success':''}} icon-thumbnail">
                    <i class="pg-home"></i>
                </span>
			</li>

            @if(auth()->check() AND (auth()->user()->type == 'super_user' OR auth()->user()->type == 'admin'))
            <li class="{{Request::is('backoffice/user*')?'open active':''}}">
                <a href="javascript:;">
                    <span class="title">User</span>
                    <span class="arrow {{Request::is('backoffice/user*')?'open active':''}}"></span>
                </a>
                <span class="icon-thumbnail {{Request::is('backoffice/user*')?'bg-success':''}}">
                    <i class="fa fa-users"></i>
                </span>
                <ul class="sub-menu">
                    <li class="{{in_array(request()->route()->getName(),['backoffice.user.index'])?'open active':''}}">
                        <a href="{{route('backoffice.user.index')}}">Admins</a> <span class="icon-thumbnail">a</span>
                    </li>
                    <li class="{{in_array(request()->route()->getName(),['backoffice.user.member'])?'open active':''}}">
                        <a href="{{route('backoffice.user.member')}}">Members</a> <span class="icon-thumbnail">m</span>
                    </li>
                </ul>
            </li>
            @endif

            @if(auth()->check() AND (auth()->user()->type != 'member'))
            <li class="{{Request::is('backoffice/loan*')?'open active':''}}">
                <a href="javascript:;">
                    <span class="title">Loan</span>
                    <span class="arrow {{Request::is('backoffice/loan*')?'open active':''}}"></span>
                </a>
                <span class="icon-thumbnail {{Request::is('backoffice/loan*')?'bg-success':''}}">
                    <i class="fa fa-file-text"></i>
                </span>
                <ul class="sub-menu">
                    @if(auth()->check() AND in_array(auth()->user()->type, ['super_user', 'credit_committee']))
                    <li class="{{in_array(request()->route()->getName(),['backoffice.loan.list'])?'open active':''}}">
                        <a href="{{route('backoffice.loan.list')}}">Application List</a> <span class="icon-thumbnail">al</span>
                    </li>
                    @endif
                    @if(in_array(auth()->user()->type, ['super_user', 'admin']))
                    <li class="{{in_array(request()->route()->getName(),['backoffice.loan_type.index'])?'open active':''}}">
                        <a href="{{route('backoffice.loan_type.index')}}">Types</a> <span class="icon-thumbnail">t</span>
                    </li>
                    <li class="{{in_array(request()->route()->getName(),['backoffice.loan.report'])?'open active':''}}">
                        <a href="{{route('backoffice.loan.report')}}">Report</a> <span class="icon-thumbnail">r</span>
                    </li>
                    @endif
                </ul>
            </li>
            @else
			<li class="{{Request::is('backoffice/profile*')?'open active':''}}">
                <a href="javascript:;">
                    <span class="title">Profile</span>
                    <span class="arrow {{Request::is('backoffice/profile*')?'open active':''}}"></span>
                </a>
                <span class="icon-thumbnail {{Request::is('backoffice/profile*')?'bg-success':''}}">
                    <i class="fa fa-user"></i>
                </span>
                <ul class="sub-menu">
                    <li class="{{in_array(request()->route()->getName(),['backoffice.profile.loan.application'])?'open active':''}}">
                        <a href="{{route('backoffice.profile.loan.application')}}">Loan Application</a> <span class="icon-thumbnail">la</span>
                    </li>
                    <li class="{{in_array(request()->route()->getName(),['backoffice.profile.loan.current'])?'open active':''}}">
                        <a href="{{route('backoffice.profile.loan.current')}}">Current Loan</a> <span class="icon-thumbnail">cl</span>
                    </li>
                    <li class="{{in_array(request()->route()->getName(),['backoffice.profile.loan.history'])?'open active':''}}">
                        <a href="{{route('backoffice.profile.loan.history')}}">History</a> <span class="icon-thumbnail">h</span>
                    </li>
                    <li class="">
                        <a href="javascript:;" class=""><span class="title">Loan Types</span>
                        <span class="arrow"></span></a>
                        <span class="icon-thumbnail">lt</span>
                        <ul class="sub-menu">
                            @foreach($loanTypes as $index => $loanType)
                            <li>
                                <a href="{{ route('backoffice.profile.loan.application', ['type_id' => $loanType->id]) }}">{{$loanType->title}}</a>
                                <span class="icon-thumbnail">{{substr($loanType->title, 0, 1)}}</span>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
            </li>
            @endif
			<li class="{{Request::is('backoffice/product*')?'open active':''}}">
                @if(auth()->check() AND in_array(auth()->user()->type, ['super_user', 'admin']))
				<a class="" href="{{route('backoffice.product.index')}}">
                    <span class="title">Products</span>
                </a>
                @else
				<a class="" href="{{route('backoffice.product.grid')}}">
                    <span class="title">Products</span>
                </a>
                @endif
                <span class=" icon-thumbnail">
                    <i class="fa fa-tags"></i>
                </span>
			</li>
		</ul>
		<div class="clearfix"></div>
	</div>
</nav>