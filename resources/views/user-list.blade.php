<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>

<h2>User Details</h2>

<a href="{{url('export-csv')}}" type="submit">Import CSV</a>

<table>
  <tr>
    <th>Name</th>
    <th>E-mail</th>
    <th>Mobile</th>
  </tr>
  @if (isset($users))
    @foreach($users as $user)
        <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->mobile}}</td>
        </tr>
    @endforeach
  @endif
  
  
</table>

</body>
</html>

