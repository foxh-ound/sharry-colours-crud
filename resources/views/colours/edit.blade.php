<!DOCTYPE html>
<html>
<title>Sharry CRUD - Colours - Edit #{{$id}}</title>
<!-- I am not splitting templates on purpose. I am only focusing on CRUD -->
<body>

<h1>Colours</h1>

@if($id =='0')
    <p>Adding a new colour</p>
@else
    <p>Editing an existing colour</p>
@endif

@if ($errors->any())
    <div style="color: red;">
        <p>Error(s):</p>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('colours.save', [$id]) }}" method="POST" name="colour_edit_form">
    @csrf <!-- {{ csrf_field() }} -->
    <table>
        <tr>
            <td>HEX value:</td>
            @php
                $hexInputValue = '';
                if (old('hex')) {
                    $hexInputValue = old('hex');
                } elseif ($colour) {
                    $hexInputValue = $colour->hex;
                }
            @endphp

            <td>#<input type="text" name="hex" value="{{ $hexInputValue }}"></td>
        </tr>
    </table>
    <br/>
    <input type="submit" value="Save">
</form>

</body>
</html>
