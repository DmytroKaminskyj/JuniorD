@extends('layouts.app')

@section('content')

<button type="button" class="btn btn-primary" method="POST" value="DELETE" >Удалить</button>
<table>
    <H1>All posts in JuniorDeveloper Site</H1>
    @foreach ($items as $item)
    <tr>
        <td> {{$item ->id}} </td>
        <td> {{$item ->title}} </td>
        <td> {{$item ->created_at}} </td>
    </tr>
    @endforeach
</table>
@endsection
