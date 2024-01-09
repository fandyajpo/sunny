<!DOCTYPE html>
<html>

<head>
  <style>
    #customers {
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    #customers td,
    #customers th {
      border: 1px solid #ddd;
      padding: 8px;
    }

    #customers tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    #customers tr:hover {
      background-color: #ddd;
    }

    #customers th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #04AA6D;
      color: white;
    }
  </style>
</head>

<body>

  <h1>SUNNY</h1>
  <table id="customers">
    <tr>
      <td>Nama Barang</td>
      <td>Category</td>
      <td>Supplier</td>
      <td>Stock</td>
      <td>Price</td>
    </tr>
    @foreach ($data as $d)
    <tr>
      <td>{{ $d->name }}</td>
      <td>{{ $d->CategoryRelationship->name ?? 'No category' }}</td>
      <td>{{ $d->SupplierRelationship->name ?? 'No Supplier' }}</td>
      <td>{{ $d->stock }}</td>
      <td>{{ $d->price }}</td>
    </tr>
    @endforeach
  </table>

</body>

</html>