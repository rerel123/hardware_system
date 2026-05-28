<?php include 'includes/db.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Hardware System Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>

/* ===================== BODY ===================== */
body{
    background: #eafaf7;
    font-family: 'Segoe UI', sans-serif;
    overflow-x: hidden;
}

/* ===================== SIDEBAR ===================== */
.sidebar{
    width: 250px;
    height: 100vh;
    position: fixed;
    background: linear-gradient(180deg,#0f766e,#115e59);
    padding: 20px;
}

.sidebar h4{
    color: white;
    margin-bottom: 20px;
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
    transform: translateX(6px);
}

/* ===================== MAIN ===================== */
.main{
    margin-left: 250px;
}

/* ===================== HERO ===================== */
.hero{
    background: linear-gradient(135deg,#0f766e,#14b8a6);
    color: white;
    border-radius: 20px;
    padding: 40px;
}

/* ===================== CARDS ===================== */
.card-box{
    border: none;
    border-radius: 18px;
    transition: 0.3s;
    overflow: hidden;
}

.card-box:hover{
    transform: translateY(-6px);
}

/* COLORS */
.teal{
    background: linear-gradient(135deg,#14b8a6,#2dd4bf);
}

.mint{
    background: linear-gradient(135deg,#5eead4,#99f6e4);
    color: #064e3b;
}

.green{
    background: linear-gradient(135deg,#6ee7b7,#a7f3d0);
    color: #064e3b;
}

.dark{
    background: linear-gradient(135deg,#0f766e,#115e59);
}

/* ICON */
.card-box i{
    font-size: 40px;
    opacity: 0.85;
}

/* TABLE HEADER */
table thead{
    background: #0f766e;
    color: white;
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

<!-- HERO -->
<div class="hero shadow mb-4">

<h1 class="fw-bold">
<i class="bi bi-tools"></i> Hardware Database System
</h1>

<p class="mb-0">
Inventory • Products • Orders • Suppliers • Employees Management System
</p>

</div>

<!-- CARDS -->
<div class="row g-4">

<div class="col-md-3">
<div class="card card-box teal text-white shadow">
<div class="card-body d-flex justify-content-between">
<div>
<h6>Total Products</h6>
<h3>120</h3>
</div>
<i class="bi bi-box-seam"></i>
</div>
</div>
</div>

<div class="col-md-3">
<div class="card card-box mint shadow">
<div class="card-body d-flex justify-content-between">
<div>
<h6>Customers</h6>
<h3>89</h3>
</div>
<i class="bi bi-people"></i>
</div>
</div>
</div>

<div class="col-md-3">
<div class="card card-box green shadow">
<div class="card-body d-flex justify-content-between">
<div>
<h6>Orders</h6>
<h3>54</h3>
</div>
<i class="bi bi-cart-check"></i>
</div>
</div>
</div>

<div class="col-md-3">
<div class="card card-box dark text-white shadow">
<div class="card-body d-flex justify-content-between">
<div>
<h6>Suppliers</h6>
<h3>18</h3>
</div>
<i class="bi bi-truck"></i>
</div>
</div>
</div>

</div>

<!-- TABLE + NOTIFICATION -->
<div class="row mt-4">

<!-- TABLE -->
<div class="col-md-8">

<div class="card shadow border-0">

<div class="card-body">

<h5 class="mb-3">
<i class="bi bi-bar-chart"></i> Inventory Overview
</h5>

<table class="table table-hover">

<thead>
<tr>
<th>Product</th>
<th>Stock</th>
<th>Status</th>
</tr>
</thead>

<tbody>

<tr>
<td>Hammer</td>
<td>120</td>
<td><span class="badge bg-success">In Stock</span></td>
</tr>

<tr>
<td>Drill</td>
<td>8</td>
<td><span class="badge bg-warning">Low Stock</span></td>
</tr>

<tr>
<td>Cement</td>
<td>0</td>
<td><span class="badge bg-danger">Out of Stock</span></td>
</tr>

</tbody>

</table>

</div>

</div>

</div>

<!-- NOTIFICATIONS -->
<div class="col-md-4">

<div class="card shadow border-0">

<div class="card-body">

<h5 class="mb-3">
<i class="bi bi-bell"></i> Notifications
</h5>

<div class="alert alert-warning">Low stock detected</div>
<div class="alert alert-danger">Cement is out of stock</div>
<div class="alert alert-info">New delivery arriving</div>

</div>

</div>

</div>

</div>

</div>

</div>

</body>
</html>