<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Laravel 5.8 - Individual Column Search in Datatables using Ajax</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container">    
   <br />
   <h3 align="center">Laravel 5.8 - Custom Search in Datatables using Ajax</h3>
   <br />
   <br />
   <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <form action="{{ route('customsearch.store') }}" method="POST">
           @csrf
           <div class="form-group">
            <select name="gender" id="filter_gender" class="form-control">
                <option value="">Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>
        <div class="form-group">
            <select name="country" id="filter_country" class="form-control">
                <option value="">Select Country</option>
                @foreach($country_name as $country)

                <option value="{{ $country->Country }}">{{ $country->Country }}</option>

                @endforeach
            </select>
        </div>

        <div class="form-group" align="center">
            <button type="submit" name="filter" id="filter" class="btn btn-info">Download</button>  
            <button type="button" name="reset" id="reset" class="btn btn-default">Reset</button>
        </div>
    </form> 
</div>
<div class="col-md-4"></div>
</div>
<br />
<div class="table-responsive">
    <table id="customer_data" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Customer Name</th>
                <th>Gender</th>
                <th>Address</th>
                <th>City</th>
                <th>Postal Code</th>
                <th>Country</th>
            </tr>
        </thead>
    </table>
</div>
<br />
<br />
</div>
</body>
</html>

<script>
    $(document).ready(function(){

        fill_datatable();

        function fill_datatable(filter_gender = '', filter_country = '')
        {
            console.log(filter_country);
            var dataTable = $('#customer_data').DataTable({
                processing: true,
                serverSide: true,
                ajax:{
                    url: "{{ route('customsearch.index') }}",
                    data:{filter_gender:filter_gender, filter_country:filter_country}
                },
                columns: [
                {
                    data:'CustomerName',
                    name:'CustomerName'
                },
                {
                    data:'Gender',
                    name:'Gender'
                },
                {
                    data:'Address',
                    name:'Address'
                },
                {
                    data:'City',
                    name:'City'
                },
                {
                    data:'PostalCode',
                    name:'PostalCode'
                },
                {
                    data:'Country',
                    name:'Country'
                }
                ]
            });
        }

        $('#filter_gender').change(function(){
            filtervals() ;
        });

        $('#filter_country').change(function(){
            filtervals() ;
        }); 

        function filtervals()
        {
            var filter_gender = $('#filter_gender').val();
            var filter_country = $('#filter_country').val();
            
            if(filter_gender != '' &&  filter_country != '')
            { 
                $('#customer_data').DataTable().destroy();
                fill_datatable(filter_gender, filter_country);
            }
            else if( filter_gender != '')
            { 
                $('#customer_data').DataTable().destroy();
                fill_datatable(filter_gender,null);
            }
            else if( filter_country != '')
            { 
                $('#customer_data').DataTable().destroy();
                fill_datatable(null,filter_country);
            }
            else 
            {
               $('#customer_data').DataTable().destroy();
               fill_datatable();
           }

       } 

       $('#reset').click(function(){
        $('#filter_gender').val('');
        $('#filter_country').val('');
        $('#customer_data').DataTable().destroy();
        fill_datatable();
    });

   });
</script>
