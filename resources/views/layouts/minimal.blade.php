<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<LINK REL="SHORTCUT ICON" HREF="/images/favicon.ico">
	<title>Inkbox @yield('title')</title>
	<link href='https://fonts.googleapis.com/css?family=Questrial' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

	{{ HTML::style('/css/bootstrap.css') }}
	{{ HTML::style('/css/helper-classes.css') }}
	{{ HTML::style('/css/main.css') }}
	{{ HTML::style('/css/style_topNav.css') }}
	{{ HTML::style('/css/font-awesome.min.css') }}
	{{ HTML::script('/js/jquery-3.1.1.min.js') }}
	{{ HTML::script('/js/bootstrap.min.js') }}

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<!-- Scripts -->
	<script>

		// Laravel Input Token
		$_token = "{{ csrf_token() }}";
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		// Google Analytics
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-58323977-1', 'auto');
		ga('send', 'pageview');

		// Fullstory Tracking
		window['_fs_debug'] = false;
		window['_fs_host'] = 'www.fullstory.com';
		window['_fs_org'] = '2D9AF';
		window['_fs_namespace'] = 'FS';
		(function(m,n,e,t,l,o,g,y){
		    if (e in m && m.console && m.console.log) { m.console.log('FullStory namespace conflict. Please set window["_fs_namespace"].'); return;}
		    g=m[e]=function(a,b){g.q?g.q.push([a,b]):g._api(a,b);};g.q=[];
		    o=n.createElement(t);o.async=1;o.src='https://'+_fs_host+'/s/fs.js';
		    y=n.getElementsByTagName(t)[0];y.parentNode.insertBefore(o,y);
		    g.identify=function(i,v){g(l,{uid:i});if(v)g(l,v)};g.setUserVars=function(v){g(l,v)};
		    g.identifyAccount=function(i,v){o='account';v=v||{};v.acctId=i;g(o,v)};
		    g.clearUserCookie=function(c,d,i){if(!c || document.cookie.match('fs_uid=[`;`]*`[`;`]*`[`;`]*`')){
		    d=n.domain;while(1){n.cookie='fs_uid=;domain='+d+
		    ';path=/;expires='+new Date(0).toUTCString();i=d.indexOf('.');if(i<0)break;d=d.slice(i+1)}}};
		})(window,document,window['_fs_namespace'],'script','user');

		// This is an example script - don't forget to change it!
		FS.identify('{{ Auth::id() }}', {
			displayName: '{{ Auth::user()->name }}',
			email: '{{ Auth::user()->email }}'
		});
	</script>
</head>

<body>

	<nav class="navbar">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<a class="navbar-brand" href="https://getinkbox.com">
				<div class="logoWhite_container">
					<div class="logoWhite"></div>
				</div>
			</a>
		</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav create_nav">
				<li class="create_logo">
					<a id="createNav" href="/create">
						<img class="img-responsive" style="width:130px;" src="/images/Create-Logo.svg">
					</a>
				</li>
			</ul>
		</div>
	</nav>

	<div class="container-fluid">
	@yield('content')
	</div>

</body>
</html>