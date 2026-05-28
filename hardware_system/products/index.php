<?php include '../includes/db.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Products Management</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

<style>

/* ===== THEME ===== */
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
}

.sidebar a:hover{
    background: #99f6e4;
    color: #064e3b;
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
<i class="bi bi-box"></i> Products Management
</h2>
<p class="mb-0">Manage hardware products efficiently</p>
</div>

<button class="btn btn-teal btn-lg" id="addBtn">
<i class="bi bi-plus-circle"></i> Add Product
</button>

</div>

</div>

<!-- TABLE -->
<div class="card card-table shadow">

<div class="card-body">

<table id="productTable" class="table table-hover align-middle">

<thead>
<tr>
<th>ID</th>
<th>Product Name</th>
<th>Supplier ID</th>
<th>Category ID</th>
<th>Unit</th>
<th>Price</th>
<th>Action</th>
</tr>
</thead>

</table>

</div>

</div>

</div>

</div>

<!-- MODAL -->
<div class="modal fade" id="productModal">

<div class="modal-dialog modal-lg">

<form id="productForm">

<div class="modal-content">

<div class="modal-header" style="background:#0f766e;color:white;">
<h5 class="modal-title">
<i class="bi bi-box"></i> Product Form
</h5>

<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
</div>

<div class="modal-body">

<input type="hidden" name="ProductID" id="ProductID">

<div class="row">

<div class="col-md-6 mb-3">
<label>Product Name</label>
<input type="text" name="ProductName" class="form-control" required>
</div>

<div class="col-md-6 mb-3">
<label>Supplier ID</label>
<input type="number" name="SupplierID" class="form-control">
</div>

<div class="col-md-6 mb-3">
<label>Category ID</label>
<input type="number" name="CategoryID" class="form-control">
</div>

<div class="col-md-6 mb-3">
<label>Unit</label>
<input type="text" name="Unit" class="form-control">
</div>

<div class="col-md-6 mb-3">
<label>Price</label>
<input type="number" step="0.01" name="Price" class="form-control">
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

let table = $('#productTable').DataTable({

ajax: 'fetch.php',
pageLength: 5,

columns: [

{ data: 'ProductID' },
{ data: 'ProductName' },
{ data: 'SupplierID' },
{ data: 'CategoryID' },
{ data: 'Unit' },
{ data: 'Price' },

{
data: null,
render: function(data){

return `
<button class="btn btn-warning btn-sm editBtn" data-id="${data.ProductID}">
<i class="bi bi-pencil"></i>
</button>

<button class="btn btn-danger btn-sm deleteBtn" data-id="${data.ProductID}">
<i class="bi bi-trash"></i>
</button>
`;
}
}

]

});

/* ADD */
$('#addBtn').click(function(){
$('#productForm')[0].reset();
$('#ProductID').val('');
$('#productModal').modal('show');
});

/* EDIT */
$(document).on('click','.editBtn',function(){

let id = $(this).data('id');

$.get('fetch.php',{id:id},function(data){

let p = data[0];

$('#ProductID').val(p.ProductID);
$('[name="ProductName"]').val(p.ProductName);
$('[name="SupplierID"]').val(p.SupplierID);
$('[name="CategoryID"]').val(p.CategoryID);
$('[name="Unit"]').val(p.Unit);
$('[name="Price"]').val(p.Price);

$('#productModal').modal('show');

},'json');

});

/* SAVE */
$('#productForm').submit(function(e){

e.preventDefault();

let url = $('#ProductID').val() ? 'update.php' : 'insert.php';

$.post(url,$(this).serialize(),function(res){

$('#productModal').modal('hide');
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
title:'Delete Product?',
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