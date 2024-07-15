<!DOCTYPE html>
<html>
<head>
    

    <!-- Add jQuery JavaScript -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>    
    <!-- DataTables JavaScript & CSS -->
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">
    


    <!-- Our Employee table initialization code -->
    <script>
        $(document).ready(function() {
        // Check if the DataTable instance already exists
        if ($.fn.DataTable.isDataTable('#employeesTable')) {
            // If the table is already initialized, destroy it first
            $('#employeesTable').DataTable().destroy();
        }
        $(document).ready(function() {
            $('#employeesTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('employees.index') }}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'position', name: 'position' },
                    { data: 'birth_date', name: 'birth_date' },
                    { data: 'hired_on', name: 'hired_on' }
                ],
                responsive: true
            });
        });
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h1 class="mt-4">Employee Directory</h1>
    <table id="employeesTable" class="table table-striped nowrap" style="width:100%">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Position</th>
            <th>Birth Date</th>
            <th>Hired On</th>
        </tr>
        </thead>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>