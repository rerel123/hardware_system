<?php include '../includes/db.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suppliers Management</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    <style>
        /* ===== THEME ===== */
        body {
            background: #eafaf7;
            font-family: 'Segoe UI', sans-serif;
        }

        /* SIDEBAR */
        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            background: linear-gradient(180deg, #0f766e, #115e59);
            padding: 20px;
        }

        .sidebar a {
            display: block;
            color: #d1fae5;
            text-decoration: none;
            padding: 12px;
            border-radius: 10px;
            margin-bottom: 8px;
        }

        .sidebar a:hover {
            background: #99f6e4;
            color: #064e3b;
        }

        /* MAIN */
        .main {
            margin-left: 250px;
        }

        /* HEADER */
        .page-header {
            background: linear-gradient(135deg, #0f766e, #14b8a6);
            color: white;
            border-radius: 20px;
        }

        /* BUTTON */
        .btn-teal {
            background: linear-gradient(135deg, #14b8a6, #2dd4bf);
            border: none;
            color: white;
        }

        /* TABLE */
        .card-table {
            border: none;
            border-radius: 20px;
            overflow: hidden;
        }

        table.dataTable thead {
            background: #0f766e;
            color: white;
        }

        /* MODAL */
        .modal-content {
            border-radius: 18px;
        }

        .form-control {
            border-radius: 10px;
        }
    </style>
</head>

<body>

    <div class="sidebar">
        <h4 class="text-white mb-4">
            <i class="bi bi-hammer"></i> Hardware System
        </h4>
        <a href="/hardware_system/customers/index.php"><i class="bi bi-people"></i> Customers</a>
        <a href="/hardware_system/categories/index.php"><i class="bi bi-tags"></i> Categories</a>
        <a href="/hardware_system/products/index.php"><i class="bi bi-box"></i> Products</a>
        <a href="/hardware_system/suppliers/index.php"><i class="bi bi-truck"></i> Suppliers</a>
        <a href="/hardware_system/shippers/index.php"><i class="bi bi-send"></i> Shippers</a>
        <a href="/hardware_system/orders/index.php"><i class="bi bi-cart-check"></i> Orders</a>
        <a href="/hardware_system/orderdetails/index.php"><i class="bi bi-list-check"></i> Order Details</a>
        <a href="/hardware_system/employees/index.php"><i class="bi bi-person-badge"></i> Employees</a>
    </div>

    <div class="main">
        <div class="container-fluid p-4">

            <div class="page-header p-4 shadow mb-4">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h2 class="fw-bold"><i class="bi bi-truck"></i> Suppliers Management</h2>
                        <p class="mb-0">Manage supplier records efficiently</p>
                    </div>
                    <button class="btn btn-teal btn-lg" id="addBtn">
                        <i class="bi bi-plus-circle"></i> Add Supplier
                    </button>
                </div>
            </div>

            <div class="card card-table shadow">
                <div class="card-body">
                    <table id="supplierTable" class="table table-hover align-middle" style="width:100%;">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Supplier Name</th>
                                <th>Contact Name</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>Country</th>
                                <th>Phone</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <div class="modal fade" id="supplierModal">
        <div class="modal-dialog modal-lg">
            <form id="supplierForm">
                <div class="modal-content">
                    <div class="modal-header" style="background:#0f766e;color:white;">
                        <h5 class="modal-title"><i class="bi bi-truck"></i> Supplier Form</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <input type="hidden" name="SupplierID" id="SupplierID">

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Supplier Name</label>
                                <input type="text" name="SupplierName" class="form-control" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Contact Name</label>
                                <input type="text" name="ContactName" class="form-control" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Address</label>
                                <input type="text" name="Address" class="form-control">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">City</label>
                                <input type="text" name="City" class="form-control">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Country</label>
                                <input type="text" name="Country" class="form-control">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Phone</label>
                                <input type="text" name="Phone" class="form-control">
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

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Initialize DataTables with correct distinct data property mappings
        let table = $('#supplierTable').DataTable({
            ajax: 'fetch.php',
            pageLength: 5,
            columns: [
                { data: 'SupplierID' },
                { data: 'SupplierName' },
                { data: 'ContactName' },
                { data: 'Address' },
                { data: 'City' },
                { data: 'Country' }, // Points to distinct database column
                { data: 'Phone' },   // Points to distinct database column
                {
                    data: null,
                    orderable: false,
                    render: function(data) {
                        return `
                            <button class="btn btn-warning btn-sm editBtn" data-id="${data.SupplierID}">
                                <i class="bi bi-pencil"></i>
                            </button>
                            <button class="btn btn-danger btn-sm deleteBtn" data-id="${data.SupplierID}">
                                <i class="bi bi-trash"></i>
                            </button>
                        `;
                    }
                }
            ]
        });

        /* ADD */
        $('#addBtn').click(function() {
            $('#supplierForm')[0].reset();
            $('#SupplierID').val('');
            $('#supplierModal').modal('show');
        });

        /* EDIT */
        $(document).on('click', '.editBtn', function() {
            let id = $(this).data('id');

            $.get('fetch.php', { id: id }, function(data) {
                let s = data[0];

                $('#SupplierID').val(s.SupplierID);
                $('[name="SupplierName"]').val(s.SupplierName);
                $('[name="ContactName"]').val(s.ContactName);
                $('[name="Address"]').val(s.Address);
                $('[name="City"]').val(s.City);
                $('[name="Country"]').val(s.Country); // Mapped correctly
                $('[name="Phone"]').val(s.Phone);     // Mapped correctly

                $('#supplierModal').modal('show');
            }, 'json');
        });

        /* SAVE (INSERT / UPDATE) */
        $('#supplierForm').submit(function(e) {
            e.preventDefault();

            let url = $('#SupplierID').val() ? 'update.php' : 'insert.php';

            $.post(url, $(this).serialize(), function(res) {
                $('#supplierModal').modal('hide');
                table.ajax.reload();

                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: res.message,
                    timer: 1500,
                    showConfirmButton: false
                });
            }, 'json');
        });

        /* DELETE */
        $(document).on('click', '.deleteBtn', function() {
            let id = $(this).data('id');

            Swal.fire({
                title: 'Delete Supplier?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#0f766e',
                confirmButtonText: 'Yes, delete'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.post('delete.php', { id: id }, function(res) {
                        table.ajax.reload();
                        Swal.fire('Deleted', res.message, 'success');
                    }, 'json');
                }
            });
        });
    </script>

</body>
</html>