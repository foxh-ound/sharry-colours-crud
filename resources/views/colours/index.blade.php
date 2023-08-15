<!DOCTYPE html>
<html>
<title>Sharry CRUD - Colours - List</title>
<!-- I am not splitting templates on purpose. I am only focusing on CRUD -->
<body>

<h1>Colours</h1>

@if (request()->get('error_saving'))
    @if (request()->get('error_saving') == 'yes')
        <p style="color: red;">Error. Could not save new Colour.</p>
    @elseif (request()->get('error_saving') == 'no')
        <p style="color: darkgreen;">Success. Your new Colour has been saved.</p>
    @endif
@endif

@if (request()->get('error_deleting'))
    @if (request()->get('error_deleting') == 'yes')
        <p style="color: red;">Error. Could not remove the Colour.</p>
    @elseif (request()->get('error_deleting') == 'no')
        <p style="color: darkgreen;">Success. The Colour has been removed.</p>
    @endif
@endif

<a href="{{ route('colours.edit', 0) }}" style="-webkit-appearance: button;-moz-appearance: button;appearance: button;text-decoration: none;color: initial; border: 1px solid #000000; padding: 4px;">+ Add new</a>

<table cellpadding="8" cellspacing="8" style="text-align: center;">
    <thead>
        <th>&nbsp;</th>
        <th width="120px">HEX</th>
        <th>Actions</th>
    </thead>
    <tbody>
    @foreach($colours as $colour)
        <tr>
            <td><div style="width: 20px; height: 20px; background-color: #{{ $colour->hex }}; border: 1px solid #000000;">&nbsp;</div></td>
            <td style="font-family: monospace;">#{{ $colour->hex }}</td>
            <td>
                <a href="{{ route('colours.edit', $colour->id) }}">Edit</a>
                 |
                <a href="{{ route('colours.remove', $colour->id) }}">Remove</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</body>
</html>
