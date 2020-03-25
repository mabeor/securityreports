<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
</head>
<body>
	<header>
		@include('partials/nav')
	</header>

	<main>
		@yield('content')
	</main>

	<footer>

	</footer>
</body>
</html>