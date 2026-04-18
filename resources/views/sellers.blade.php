<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sellers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <x-layout>

        <div>
            <div class="topbar">
                <div class="topbar-title">Manage Sellers</div>
                <div class="topbar-right">
                    <div class="btn-icon"><i class="fa-solid fa-bell"></i></div>
                    <div class="admin-pill">
                        <div class="avatar">IM</div>
                        imemeru
                        <i class="fa-solid fa-chevron-down" style="font-size:10px;color:var(--muted)"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">

            <div class="cardd row mb-3">
                <div class="col-md-3">
                    <div class="card1 card-box">Total Sellers<br>
                        <h3>342</h3>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card2 card-box">Pending Verification<br>
                        <h3>8</h3>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card3 card-box">Reported Sellers<br>
                        <h3>5</h3>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card4 card-box blue">Banned Sellers<br>
                        <h3>12</h3>
                    </div>
                </div>
            </div>

            <form method="GET" action="{{ route('admin.sellers') }}" class="d-flex mb-3">
                <input type="text" name="search" class="form-control" placeholder="Search sellers...">
                <button class="btn btn-light ms-2">Filter</button>
            </form>

            <div class="table-card">
                <table>
                    <thead>
                        <tr>
                            <th>Seller</th>
                            <th>Category</th>
                            <th>Products</th>
                            <th>Status</th>
                            <th>Date Joined</th>
                            <th>Actions</th>
                        </tr>
                    </thead>


                    <tbody id="sellerTable">
                        @foreach($sellers as $seller)
                        <tr>
                            <td>{{ $seller['name'] }}</td>
                            <td>{{ $seller['category'] }}</td>
                            <td>{{ $seller['products'] }}</td>
                            <td>
                                <span class="{{ $seller['status']=='Active' ? 'status-active':'status-pending' }}">
                                    {{ $seller['status'] }}
                                </span>
                            </td>
                            <td>{{ $seller['date'] }}</td>
                            <td>
                                <button class="btn btn-view btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#sellerModal"><i class="fa-solid fa-eye"></i>
                                    View
                                </button>

                                <form method="POST" action="/admin/sellers/suspend/{{ $seller['id'] }}" style="display:inline;">
                                    @csrf
                                    <button class="btn btn-suspend btn-sm btn-warning">Suspend</button>
                                </form>

                                <form method="POST" action="/admin/sellers/ban/{{ $seller['id'] }}" style="display:inline;">
                                    @csrf
                                    <button class="btn btn-ban btn-sm btn-danger">Ban</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="pagination">
                    <button class="page-btn"><i class="fa-solid fa-chevron-left" style="font-size:11px"></i></button>
                    <button class="page-btn active">1</button>
                    <button class="page-btn">2</button>
                    <button class="page-btn">3</button>
                    <button class="page-btn"><i class="fa-solid fa-chevron-right" style="font-size:11px"></i></button>
                </div>
            </div>

        </div>


        <!-- Seller Details Modal -->
        <div class="modal fade" id="sellerModal" tabindex="-1">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title">Seller Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">

                        <!-- Seller Info -->
                        <div class="d-flex align-items-center mb-3">
                            <img src="https://i.pravatar.cc/60" class="rounded-circle me-3">
                            <div>
                                <h5 class="mb-0">CraftyJen</h5>
                                <small class="text-muted">CraftyJen</small>
                            </div>
                        </div>

                        <!-- Stats -->
                        <div class="border p-2 mb-3 rounded">
                            Joined 11/22/2023 |
                            Email craftyjen@email.com
                        </div>

                        <!-- Documents -->
                        <h6>Uploaded Documents</h6>
                        <div class="row mb-3">

                            <div class="col-md-6">
                                <div class="border p-2 rounded d-flex">
                                    <img src="https://via.placeholder.com/80" class="me-2">
                                    <div>
                                        <b>ID / Passport</b><br>
                                        <span class="text-success">Uploaded</span><br>
                                        <button class="btn btn-light btn-sm mt-1"
                                            onclick="openDocument('ID / Passport','https://via.placeholder.com/400')">
                                            View
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="border p-2 rounded d-flex">
                                    <img src="https://via.placeholder.com/80" class="me-2">
                                    <div>
                                        <b>Business License</b><br>
                                        <span class="text-success">Uploaded</span><br>
                                        <button class="btn btn-light btn-sm mt-1"
                                            onclick="openDocument('Business License','https://via.placeholder.com/400')">
                                            View
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- Request Documents -->
                        <h6>Request More Documents</h6>

                        <div class="d-flex mb-2">
                            <select class="form-select me-2" id="docReason">
                                <option>Select Reason</option>
                                <option>Proof of Address</option>
                                <option>Tax Identification Number</option>
                                <option>Bank Statement</option>
                            </select>

                            <button class="btn btn-warning" onclick="requestDocs()">Request Documents</button>
                        </div>

                        <div class="alert alert-light">
                            Additional document requests will notify the seller by email.
                        </div>

                    </div>

                    <!-- Footer Buttons -->
                    <div class="modal-footer">
                        <button class="btn btn-success" onclick="verifySeller()">✔ Verify Seller</button>
                        <button class="btn btn-danger" onclick="rejectSeller()">✖ Reject Seller</button>
                        <button class="btn btn-secondary" onclick="pendingSeller()">🗂 Save as Pending</button>
                    </div>

                </div>
            </div>
        </div>

        <!-- Document Viewer Modal -->
        <div class="modal fade" id="docModal" tabindex="-1">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="docTitle">Uploaded Document</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body text-center">

                        <h5 id="docName" class="mb-3"></h5>

                        <img id="docImage" src="" class="img-fluid" style="max-height:500px;">

                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>

        <script>
            function verifySeller() {
                alert("Seller verified!");
            }

            function rejectSeller() {
                alert("Seller rejected!");
            }

            function pendingSeller() {
                alert("Saved as pending!");
            }

            function requestDocs() {
                let reason = document.getElementById('docReason').value;
                if (reason === "Select Reason") {
                    alert("Please select a reason");
                } else {
                    alert("Requested: " + reason);
                }
            }

            function openDocument(title, image) {
                document.getElementById('docName').innerText = title;
                document.getElementById('docImage').src = image;

                let modal = new bootstrap.Modal(document.getElementById('docModal'));
                modal.show();
            }

            document.querySelectorAll('.page-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    document.querySelectorAll('.page-btn').forEach(b => b.classList.remove('active'));
                    this.classList.add('active');
                });
            });
        </script>

    </x-layout>
</body>

</html>