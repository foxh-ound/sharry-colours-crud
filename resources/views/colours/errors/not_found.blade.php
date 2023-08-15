<!DOCTYPE html>
<html>
<title>Sharry CRUD - Colours - Error</title>
<!-- I am not splitting templates on purpose. I am only focusing on CRUD -->
<body>

<h1>Colours</h1>

<p>Error! A Colour record with ID {{$id}} not found.</p>
<a href="{{ route('colours.index') }}">>> Return to the colours list</a>

</body>
</html>
