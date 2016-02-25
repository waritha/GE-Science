<ul class="nav navbar-top-links navbar-right">
	<li class="dropdown">
		<a class="dropdown-toggle" data-toggle="dropdown" href="#">
			<i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
		</a>
<ul class="dropdown-menu dropdown-user">
	<li><a href="{{url('admin/detailuser')}}"><i class="fa fa-user fa-fw"></i> Username</a>
	</li>
<li><a href="{{url('admin/setuser')}}"><i class="fa fa-gear fa-fw"></i> ตั้งค่าบัญชีผู้ใช้</a>
</li>
</li>
<li><a href="{{url('admin/manualuser')}}"><i class="glyphicon glyphicon-book"></i> คู่มือการใช้งาน</a>
</li>
<li class="divider"></li>
<li><a href="{{url('admin/logoutuser')}}"><i class="fa fa-sign-out fa-fw"></i> ออกจากระบบ</a>
</li>
</ul>
<!-- /.dropdown-user -->
</li>
<!-- /.dropdown -->
</ul>
