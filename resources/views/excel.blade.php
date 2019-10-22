<table>
    <thead>
        <tr>
            <th><b>Name</b></th>
            <th><b>Country</b></th>
            <th><b>Gender</b></th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->CustomerName }}</td>
            <td>{{ $user->Country }}</td>
            <td>{{ $user->Gender }}</td>
        </tr>
        @endforeach
    </tbody>
</table>