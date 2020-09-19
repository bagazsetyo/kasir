<table>
	<tr>
		<td>id</td>
	</tr>
	<tbody>
		@foreach($items as $i)
        <tr>
            <td>{{$i->id}}</td>
            <td>
                <form action="{{url('tes.destroy',$i->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <button value="submit" name="submit">submit</button>
                </form>
            </td>
        </tr>
		@endforeach
	</tbody>
</table>