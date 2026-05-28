<?php include '../includes/db.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Customers Management</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

<style>

body{
    background: #eafaf7;
    font-family: 'Segoe UI', sans-serif;
}

/* SIDEBAR */
.sidebar{
    width: 250px;
    height: 100vh;
    position: fixed;
    background: linear-gradient(180deg,#0f766e,#115e59);
    padding: 20px;
}

.sidebar a{
    display: block;
    color: #d1fae5;
    text-decoration: none;
    padding: 12px;
    border-radius: 10px;
    margin-bottom: 8px;
    transition: 0.3s;
}

.sidebar a:hover{
    background: #99f6e4;
    color: #064e3b;
    transform: translateX(5px);
}

/* MAIN */
.main{
    margin-left: 250px;
}

/* HEADER */
.page-header{
    background: linear-gradient(135deg,#0f766e,#14b8a6);
    color: white;
    border-radius: 20px;
}

/* BUTTON */
.btn-teal{
    background: linear-gradient(135deg,#14b8a6,#2dd4bf);
    border: none;
    color: white;
}

.btn-teal:hover{
    opacity: 0.9;
    transform: scale(1.03);
}

/* TABLE */
.card-table{
    border: none;
    border-radius: 20px;
    overflow: hidden;
}

table.dataTable thead{
    background: #0f766e;
    color: white;
}

/* MODAL */
.modal-content{
    border-radius: 18px;
}

.form-control{
    border-radius: 10px;
}

</style>

</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">

<h4 class="text-white mb-4">
<i class="bi bi-hammer"></i> Hardware System
</h4>

<a href="/hardware_system/customers/index.php">
<i class="bi bi-people"></i> Customers
</a>

<a href="/hardware_system/categories/index.php">
<i class="bi bi-tags"></i> Categories
</a>

<a href="/hardware_system/products/index.php">
<i class="bi bi-box"></i> Products
</a>

<a href="/hardware_system/suppliers/index.php">
<i class="bi bi-truck"></i> Suppliers
</a>

<a href="/hardware_system/shippers/index.php">
<i class="bi bi-send"></i> Shippers
</a>

<a href="/hardware_system/orders/index.php">
<i class="bi bi-cart-check"></i> Orders
</a>

<a href="/hardware_system/orderdetails/index.php">
<i class="bi bi-list-check"></i> Order Details
</a>

<a href="/hardware_system/employees/index.php">
<i class="bi bi-person-badge"></i> Employees
</a>

</div>

<!-- MAIN -->
<div class="main">

<div class="container-fluid p-4">

<!-- HEADER -->
<div class="page-header p-4 shadow mb-4">

<div class="d-flex justify-content-between align-items-center">

<div>
<h2 class="fw-bold">
<i class="bi bi-people"></i> Customers Management
</h2>
<p class="mb-0">Manage customer records efficiently</p>
</div>

<button class="btn btn-teal btn-lg" id="addBtn">
<i class="bi bi-plus-circle"></i> Add Customer
</button>

</div>

</div>

<!-- TABLE -->
<div class="card card-table shadow">

<div class="card-body">

<table id="customerTable" class="table table-hover align-middle">

<thead>
<tr>
<th>ID</th>
<th>Name</th>
<th>Contact</th>
<th>Address</th>
<th>City</th>
<th>Country</th>
<th>Action</th>
</tr>
</thead>

</table>

</div>

</div>

</div>

</div>

<!-- MODAL -->
<div class="modal fade" id="customerModal">

<div class="modal-dialog modal-lg">

<form id="customerForm">

<div class="modal-content">

<div class="modal-header" style="background:#0f766e;color:white;">

<h5 class="modal-title">
<i class="bi bi-person-plus"></i> Customer Form
</h5>

<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>

</div>

<div class="modal-body">

<input type="hidden" name="CustomerID" id="CustomerID">

<div class="row">

<div class="col-md-6 mb-3">
<label>Customer Name</label>
<input type="text" name="CustomerName" class="form-control" required>
</div>

<div class="col-md-6 mb-3">
<label>Contact Name</label>
<input type="text" name="ContactName" class="form-control" required>
</div>

<div class="col-md-6 mb-3">
<label>Address</label>
<input type="text" name="Address" class="form-control">
</div>

<div class="col-md-6 mb-3">
<label>City</label>
<input type="text" name="City" class="form-control">
</div>

<div class="col-md-6 mb-3">
<label>Country</label>
<input type="text" name="Country" class="form-control">
</div>

</div>

</div>

<div class="modal-footer">

<button type="submit" class="btn btn-teal">Save</button>
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

</div>

</div>

</form>

</div>

</div>

<!-- SCRIPTS -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

let table = $('#customerTable').DataTable({

ajax: 'fetch.php',
pageLength: 5,
lengthMenu: [[5,10],[5,10]],

columns: [

{ data: 'CustomerID' },
{ data: 'CustomerName' },
{ data: 'ContactName' },
{ data: 'Address' },
{ data: 'City' },
{ data: 'Country' },

{
data: null,
render: function(data){

return `
<button class="btn btn-warning btn-sm editBtn" data-id="${data.CustomerID}">
<i class="bi bi-pencil"></i>
</button>

<button class="btn btn-danger btn-sm deleteBtn" data-id="${data.CustomerID}">
<i class="bi bi-trash"></i>
</button>
`;
}
}

]

});

/* MODAL OBJECT */
let customerModal = new bootstrap.Modal(document.getElementById('customerModal'));

/* ADD */
$('#addBtn').click(function(){

$('#customerForm')[0].reset();
$('#CustomerID').val('');

customerModal.show();

});

/* EDIT */
$(document).on('click','.editBtn',function(){

let id = $(this).data('id');

$.get('fetch.php',{id:id},function(data){

let c = data[0];

$('#CustomerID').val(c.CustomerID);
$('[name="CustomerName"]').val(c.CustomerName);
$('[name="ContactName"]').val(c.ContactName);
$('[name="Address"]').val(c.Address);
$('[name="City"]').val(c.City);
$('[name="Country"]').val(c.Country);

customerModal.show();

},'json');

});

/* SAVE */
$('#customerForm').submit(function(e){

e.preventDefault();

let url = $('#CustomerID').val()
? 'update.php'
: 'insert.php';

$.post(url,$(this).serialize(),function(res){

customerModal.hide();

table.ajax.reload();

Swal.fire({
icon:'success',
title:'Success',
text:res.message,
timer:1500,
showConfirmButton:false
});

},'json');

});

/* DELETE */
$(document).on('click','.deleteBtn',function(){

let id = $(this).data('id');

Swal.fire({
title:'Delete this customer?',
icon:'warning',
showCancelButton:true,
confirmButtonColor:'#0f766e',
confirmButtonText:'Yes delete'

}).then((result)=>{

if(result.isConfirmed){

$.post('delete.php',{id:id},function(res){

table.ajax.reload();

Swal.fire('Deleted',res.message,'success');

},'json');

}

});

});

</script>

</body>
</html>