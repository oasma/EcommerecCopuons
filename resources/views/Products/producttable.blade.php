{{-- 
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js">
</script>
<table id="example" class="display" style="width:100%">
    <link rel="stylesheet" type="text/css" href="/DataTables/datatables.css">

<script type="text/javascript" charset="utf8" src="/DataTables/datatables.js"></script>
           
    <thead>
        <tr>
            <th>Name</th>
            <th>Price</th>
            <!-- Add more columns as needed -->
        </tr>
    </thead>
    <tbody>
        @foreach($products as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->price }}</td>
                <!-- Add more columns as needed -->
            </tr>
        @endforeach
    </tbody>
    
</table>


<script>
    $(document).ready(function() {
    $('#example').DataTable();
});

</script> --}}