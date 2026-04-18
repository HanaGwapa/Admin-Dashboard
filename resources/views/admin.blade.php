<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Panel – Dashboard</title>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600;700&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <link rel="stylesheet" href="{{ asset('assets/dashboard.css') }}">

</head>

<body>

  <!-- ══════════════ SIDEBAR ══════════════ -->
  <aside class="sidebar">
    <div class="sidebar-brand">
      <div class="logo-icon"><i class="fa-solid fa-store"></i></div>
      <span>Admin Panel</span>
    </div>

    <nav class="sidebar-nav">
      <a class="nav-item active" href="{{ route('admin') }}"><i class="fa-solid fa-gauge-high"></i> Dashboard</a>
      <a class="nav-item" href="{{ route('productsapproval') }}"><i class="fa-solid fa-box-open"></i> Product Approvals <span class="nav-badge">12</span></a>
      <a class="nav-item" href="{{ route('admin.sellers') }}"><i class="fa-solid fa-user-check"></i> Seller Verification</a>
      <a class="nav-item" href="{{ route('orders') }}"><i class="fa-solid fa-receipt"></i> Orders</a>
      <a class="nav-item" href="#"><i class="fa-solid fa-chart-bar"></i> Reports</a>
    </nav>

    <div class="sidebar-bottom">
      <!-- <a class="nav-item" href="#"><i class="fa-solid fa-gear"></i> Settings</a> -->
      <a class="nav-item" href="#"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
    </div>
  </aside>

  <!-- ══════════════ MAIN ══════════════ -->
  <div class="main">

    <!-- Topbar -->
    <div class="topbar">
      <div class="topbar-title">Welcome, Admin!</div>
      <div class="topbar-right">
        <div class="btn-icon">
          <i class="fa-solid fa-bell"></i>
          <span class="notif-dot"></span>
        </div>
        <div class="admin-pill">
          <div class="avatar">IM</div>
          imemeru
          <i class="fa-solid fa-chevron-down" style="font-size:10px;color:var(--muted)"></i>
        </div>
      </div>
    </div>

    <!-- Content -->
    <div class="content">

      <!-- ── STATS ROW ── -->
      <div class="stats-row">
        <div class="stat-card blue">
          <div class="stat-label">Pending Products</div>
          <div class="stat-value">12</div>
          <div class="stat-sub">Awaiting Approval</div>
          <i class="fa-solid fa-box-open stat-icon"></i>
        </div>
        <div class="stat-card orange">
          <div class="stat-label">Pending Sellers</div>
          <div class="stat-value">5</div>
          <div class="stat-sub">Verification Needed</div>
          <i class="fa-solid fa-user-clock stat-icon"></i>
        </div>
        <div class="stat-card green">
          <div class="stat-label">Total Sellers</div>
          <div class="stat-value">320</div>
          <div class="stat-sub">Approved Sellers</div>
          <i class="fa-solid fa-store stat-icon"></i>
        </div>
        <div class="stat-card teal">
          <div class="stat-label">Total Buyers</div>
          <div class="stat-value">1,560</div>
          <div class="stat-sub">Registered Buyers</div>
          <i class="fa-solid fa-users stat-icon"></i>
        </div>
      </div>

      <!-- ── DASHBOARD GRID ── -->
      <div class="dashboard-grid">

        <!-- Left: Pending Approvals + Recent Reports -->
        <div style="display:flex;flex-direction:column;gap:20px;">

          <!-- Pending Product Approvals -->
          <div>
            <div class="section-header">
              <div class="section-title">Pending Product Approvals</div>
              <a href="#" class="section-link">View All <i class="fa-solid fa-arrow-right" style="font-size:11px"></i></a>
            </div>
            <div class="product-grid">

              <!-- Card 1: Clay Earrings -->
              <div class="product-card">
                <div class="product-card-img emoji-img" style="background:#fff5f8;">💎</div>
                <div class="product-card-body">
                  <div class="product-card-name">Handcrafted Clay Earrings</div>
                  <div class="product-card-seller"><i class="fa-solid fa-user" style="font-size:10px;"></i> crafty_jenny</div>
                  <div class="product-card-divider"></div>
                  <div class="product-card-meta">
                    <div class="product-card-meta-item">
                      <div class="meta-label">Category</div>
                      <div class="meta-value">Jewelry</div>
                    </div>
                    <div class="product-card-meta-item" style="text-align:right">
                      <div class="meta-label">Price</div>
                      <div class="meta-value price-value">$15.00</div>
                    </div>
                  </div>
                  <div style="font-size:12px;color:var(--muted);margin-bottom:10px;">Seller: <span style="font-weight:600;color:var(--text)">crafty_jenny</span></div>
                  <div class="product-card-actions">
                    <button class="btn btn-approve btn-sm" onclick="openProductModal('earrings')"><i class="fa-solid fa-check"></i> Approve</button>
                    <button class="btn btn-reject btn-sm"><i class="fa-solid fa-xmark"></i> Reject</button>
                  </div>
                </div>
                <div class="product-card-footer">
                  <a href="#" class="view-link" onclick="openProductModal('earrings');return false;">View Details <i class="fa-solid fa-chevron-right" style="font-size:10px"></i></a>
                </div>
              </div>

              <!-- Card 2: Plush Bear -->
              <div class="product-card">
                <div class="product-card-img emoji-img" style="background:#f0fff4;">🧸</div>
                <div class="product-card-body">
                  <div class="product-card-name">Knitted Mini Plush Bear</div>
                  <div class="product-card-seller"><i class="fa-solid fa-user" style="font-size:10px;"></i> artisan_alex</div>
                  <div class="product-card-divider"></div>
                  <div class="product-card-meta">
                    <div class="product-card-meta-item">
                      <div class="meta-label">Category</div>
                      <div class="meta-value">Toys</div>
                    </div>
                    <div class="product-card-meta-item" style="text-align:right">
                      <div class="meta-label">Price</div>
                      <div class="meta-value price-value">$20.00</div>
                    </div>
                  </div>
                  <div style="font-size:12px;color:var(--muted);margin-bottom:10px;">Seller: <span style="font-weight:600;color:var(--text)">artisan_alex</span></div>
                  <div class="product-card-actions">
                    <button class="btn btn-approve btn-sm" onclick="openProductModal('bear')"><i class="fa-solid fa-check"></i> Approve</button>
                    <button class="btn btn-reject btn-sm"><i class="fa-solid fa-xmark"></i> Reject</button>
                  </div>
                </div>
                <div class="product-card-footer">
                  <a href="#" class="view-link" onclick="openProductModal('bear');return false;">View Details <i class="fa-solid fa-chevron-right" style="font-size:10px"></i></a>
                </div>
              </div>

            </div>
          </div>

          <!-- Recent Reports -->
          <div class="panel-card">
            <div class="section-header" style="margin-bottom:10px">
              <div class="section-title">Recent Reports</div>
              <a href="#" class="section-link">View All <i class="fa-solid fa-arrow-right" style="font-size:11px"></i></a>
            </div>
            <div class="report-item">
              <div class="report-left">
                <span class="report-dot red"></span>
                <span class="report-title">Suspicious Activity Reported</span>
              </div>
              <a href="#" class="report-view">View <i class="fa-solid fa-chevron-right" style="font-size:10px"></i></a>
            </div>
            <div class="report-item">
              <div class="report-left">
                <span class="report-dot orange"></span>
                <span class="report-title">Inappropriate Product Listing</span>
              </div>
              <a href="#" class="report-view">View <i class="fa-solid fa-chevron-right" style="font-size:10px"></i></a>
            </div>
            <div class="report-item">
              <div class="report-left">
                <span class="report-dot red"></span>
                <span class="report-title">Seller Payment Dispute</span>
              </div>
              <a href="#" class="report-view">View <i class="fa-solid fa-chevron-right" style="font-size:10px"></i></a>
            </div>
            <div class="report-item">
              <div class="report-left">
                <span class="report-dot orange"></span>
                <span class="report-title">Counterfeit Goods Complaint</span>
              </div>
              <a href="#" class="report-view">View <i class="fa-solid fa-chevron-right" style="font-size:10px"></i></a>
            </div>
          </div>

        </div>

        <!-- Right: Seller Verification + Site Statistics -->
        <div class="right-panel">

          <!-- Seller Verification Requests -->
          <div>
            <div class="section-header">
              <div class="section-title">Seller Verification Requests</div>
            </div>
            <div class="panel-card">
              <div class="seller-verif-header">
                <div class="seller-verif-avatar">
                  <!-- Placeholder avatar using initials -->
                  <div style="width:100%;height:100%;border-radius:50%;background:linear-gradient(135deg,#3b4b7c,#3b5bdb);display:flex;align-items:center;justify-content:center;color:#fff;font-weight:700;font-size:18px;">S</div>
                </div>
                <div>
                  <div class="seller-verif-name">HandmadeBySara</div>
                  <div class="seller-verif-sub">Sara P.</div>
                </div>
              </div>
              <div class="seller-verif-info">
                <div class="verif-row"><i class="fa-solid fa-briefcase"></i> artisan</div>
                <div class="verif-row"><i class="fa-solid fa-location-dot"></i> Location: Austin, TX</div>
                <div style="margin-top:4px">
                  <span class="verif-badge"><i class="fa-solid fa-id-card"></i> ID Verification Pending</span>
                </div>
              </div>
              <div class="seller-verif-actions">
                <button class="btn btn-approve" onclick="openSellerModal()"><i class="fa-solid fa-check"></i> Approve</button>
                <button class="btn btn-reject"><i class="fa-solid fa-xmark"></i> Reject</button>
              </div>
            </div>
          </div>

          <!-- Site Statistics -->
          <div>
            <div class="section-header">
              <div class="section-title">Site Statistics</div>
            </div>
            <div class="panel-card">
              <div class="site-stat-row">
                <div class="site-stat-left"><i class="fa-solid fa-store"></i> Active Sellers</div>
                <div class="site-stat-value">320</div>
              </div>
              <div class="site-stat-row">
                <div class="site-stat-left"><i class="fa-solid fa-users"></i> Active Buyers</div>
                <div class="site-stat-value">1,560</div>
              </div>
              <div class="site-stat-row">
                <div class="site-stat-left"><i class="fa-solid fa-boxes-stacked"></i> Total Products</div>
                <div class="site-stat-value">4,230</div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div><!-- /content -->
  </div><!-- /main -->


  <!-- ══════════════ PRODUCT DETAIL MODAL ══════════════ -->
  <div class="overlay" id="productOverlay" onclick="closeOnOverlay(event,'productOverlay')">
    <div class="modal" onclick="event.stopPropagation()">
      <div class="modal-header">
        <div class="modal-title" id="modalProductName">Handcrafted Clay Earrings</div>
        <button class="modal-close" onclick="closeModal('productOverlay')"><i class="fa-solid fa-xmark"></i></button>
      </div>
      <div class="modal-body">
        <div class="product-detail-grid">
          <!-- Left: Images -->
          <div>
            <div class="img-main emoji-img" id="modalProductEmoji" style="font-size:72px;">💎</div>
            <div class="img-thumbs">
              <div class="img-thumb active emoji-img" id="thumb1">💎</div>
              <div class="img-thumb emoji-img">📿</div>
              <div class="img-thumb emoji-img">✨</div>
            </div>
            <div class="product-details-section">
              <div class="product-details-title">Product Details</div>
              <div class="detail-row"><span class="detail-label">Category:</span><span class="detail-value" id="modalCategory">Jewelry</span></div>
              <div class="detail-row"><span class="detail-label">Materials:</span><span class="detail-value" id="modalMaterials">Polymer clay, plated brass hooks</span></div>
              <div class="detail-row"><span class="detail-label">Dimensions:</span><span class="detail-value" id="modalDimensions">1.5″ length, 0.6″ width</span></div>
              <div class="detail-row"><span class="detail-label">Weight:</span><span class="detail-value" style="color:var(--primary)" id="modalWeight">8 grams</span></div>
            </div>
          </div>
          <!-- Right: Info -->
          <div>
            <div class="detail-row"><span class="detail-label">Category:</span><span class="detail-value" style="color:var(--primary)" id="modalCategory2">Jewelry</span></div>
            <div class="detail-row"><span class="detail-label">Price:</span><span class="detail-price" id="modalPrice">$15.00</span></div>
            <div class="detail-row"><span class="detail-label">Materials:</span><span class="detail-value" id="modalMaterials2">Polymer clay, gold-plated brass hooks</span></div>
            <div class="detail-row"><span class="detail-label">Dimensions:</span><span class="detail-value" id="modalDimensions2">1.5″ length, 0.6″ width</span></div>
            <div class="detail-row"><span class="detail-label">Weight:</span><span class="detail-value" style="color:var(--primary)" id="modalWeight2">8 grams</span></div>
            <div class="seller-box">
              <div class="seller-box-title">Seller Information</div>
              <div class="seller-info-row">
                <div class="seller-avatar-lg" id="modalSellerAvatar">CJ</div>
                <div>
                  <div class="seller-info-name" id="modalSellerName">Crafty_Jenny</div>
                  <div class="seller-info-sub" id="modalSellerSub">Jenny M.</div>
                </div>
              </div>
              <button class="btn btn-primary btn-full" onclick="closeModal('productOverlay');openSellerModal()">
                <i class="fa-solid fa-user"></i> View Seller Profile
              </button>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-outline" onclick="closeModal('productOverlay')">Close</button>
        <button class="btn btn-reject"><i class="fa-solid fa-xmark"></i> Reject</button>
        <button class="btn btn-approve"><i class="fa-solid fa-check"></i> Approve</button>
      </div>
    </div>
  </div>


  <!-- ══════════════ SELLER PROFILE MODAL ══════════════ -->
  <div class="overlay" id="sellerOverlay" onclick="closeOnOverlay(event,'sellerOverlay')">
    <div class="modal seller-modal" onclick="event.stopPropagation()">
      <div class="modal-header">
        <div>
          <div style="font-size:13px;color:var(--muted);margin-bottom:6px;">Seller Profile: HandmadeBySara</div>
          <div class="seller-profile-header">
            <div class="seller-profile-avatar">S</div>
            <div>
              <div style="display:flex;align-items:center;gap:10px;">
                <div class="seller-profile-name">HandmadeBySara</div>
                <span class="status-badge badge-pending"><i class="fa-solid fa-clock"></i> Pending</span>
              </div>
              <div class="seller-profile-sub">Sara P.</div>
            </div>
          </div>
        </div>
        <button class="modal-close" onclick="closeModal('sellerOverlay')"><i class="fa-solid fa-xmark"></i></button>
      </div>

      <div class="modal-body" style="padding-top:0">
        <div class="modal-tabs">
          <button class="modal-tab" onclick="setSellerTab(this,'shop')">Shop Info</button>
          <button class="modal-tab active" onclick="setSellerTab(this,'docs')">Verification Documents</button>
          <button class="modal-tab" onclick="setSellerTab(this,'products')">Products</button>
        </div>

        <!-- Verification Documents Tab -->
        <div id="tab-docs">
          <div class="verif-header">
            <p>These documents have been submitted by the seller for verification.</p>
            <div class="verif-status"><i class="fa-solid fa-clock"></i> Verification Status: <span>Pending</span></div>
          </div>
          <div class="doc-item">
            <div class="doc-thumb">🪪</div>
            <div class="doc-info">
              <div class="doc-name">Government Issued ID</div>
              <div class="doc-date">Uploaded Apr 10, 2025</div>
            </div>
            <div style="text-align:right">
              <div class="doc-badge"><i class="fa-solid fa-check"></i> Uploaded</div>
              <div style="font-size:11px;color:var(--muted);margin-top:4px;">Apr 10, 2025</div>
            </div>
          </div>
          <div class="doc-item">
            <div class="doc-thumb">📄</div>
            <div class="doc-info">
              <div class="doc-name">Business License / Permit</div>
              <div class="doc-date">Uploaded Apr 10, 2025</div>
            </div>
            <div style="text-align:right">
              <div class="doc-badge"><i class="fa-solid fa-check"></i> Uploaded</div>
              <div style="font-size:11px;color:var(--muted);margin-top:4px;">Apr 10, 2025</div>
            </div>
          </div>
          <div class="doc-item">
            <div class="doc-thumb">🏠</div>
            <div class="doc-info">
              <div class="doc-name">Proof of Address</div>
              <div class="doc-date">Uploaded Apr 10, 2025</div>
            </div>
            <div style="text-align:right">
              <div class="doc-badge"><i class="fa-solid fa-check"></i> Uploaded</div>
              <div style="font-size:11px;color:var(--muted);margin-top:4px;">Apr 10, 2025</div>
            </div>
          </div>
        </div>

        <!-- Shop Info Tab (hidden) -->
        <div id="tab-shop" style="display:none;">
          <div style="padding:20px;background:var(--bg);border-radius:var(--radius);text-align:center;color:var(--muted);">
            <i class="fa-solid fa-store" style="font-size:32px;margin-bottom:10px;display:block;color:var(--border)"></i>
            Shop information will appear here.
          </div>
        </div>

        <!-- Products Tab (hidden) -->
        <div id="tab-products" style="display:none;">
          <div style="padding:20px;background:var(--bg);border-radius:var(--radius);text-align:center;color:var(--muted);">
            <i class="fa-solid fa-boxes-stacked" style="font-size:32px;margin-bottom:10px;display:block;color:var(--border)"></i>
            Listed products will appear here.
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button class="btn btn-outline" onclick="closeModal('sellerOverlay')">Close</button>
        <button class="btn btn-reject"><i class="fa-solid fa-xmark"></i> Reject</button>
        <button class="btn btn-approve"><i class="fa-solid fa-check"></i> Approve Seller</button>
      </div>
    </div>
  </div>


  <script>
    const products = {
      earrings: {
        name: 'Handcrafted Clay Earrings',
        emoji: '💎',
        category: 'Jewelry',
        materials: 'Polymer clay, plated brass hooks',
        dimensions: '1.5″ length, 0.6″ width',
        weight: '8 grams',
        price: '$15.00',
        sellerAvatar: 'CJ',
        sellerName: 'Crafty_Jenny',
        sellerSub: 'Jenny M.'
      },
      bear: {
        name: 'Knitted Mini Plush Bear',
        emoji: '🧸',
        category: 'Toys',
        materials: 'Acrylic yarn, poly-fill stuffing',
        dimensions: '6″ height, 4″ width',
        weight: '120 grams',
        price: '$20.00',
        sellerAvatar: 'AA',
        sellerName: 'Artisan_Alex',
        sellerSub: 'Alex R.'
      }
    };

    function openProductModal(key) {
      const p = products[key];
      document.getElementById('modalProductName').textContent = p.name;
      document.getElementById('modalProductEmoji').textContent = p.emoji;
      document.getElementById('modalCategory').textContent = p.category;
      document.getElementById('modalCategory2').textContent = p.category;
      document.getElementById('modalMaterials').textContent = p.materials;
      document.getElementById('modalMaterials2').textContent = p.materials;
      document.getElementById('modalDimensions').textContent = p.dimensions;
      document.getElementById('modalDimensions2').textContent = p.dimensions;
      document.getElementById('modalWeight').textContent = p.weight;
      document.getElementById('modalWeight2').textContent = p.weight;
      document.getElementById('modalPrice').textContent = p.price;
      document.getElementById('modalSellerAvatar').textContent = p.sellerAvatar;
      document.getElementById('modalSellerName').textContent = p.sellerName;
      document.getElementById('modalSellerSub').textContent = p.sellerSub;
      document.getElementById('thumb1').textContent = p.emoji;
      document.getElementById('productOverlay').classList.add('open');
      document.body.style.overflow = 'hidden';
    }

    function openSellerModal() {
      document.getElementById('sellerOverlay').classList.add('open');
      document.body.style.overflow = 'hidden';
    }

    function closeModal(id) {
      document.getElementById(id).classList.remove('open');
      const anyOpen = document.querySelectorAll('.overlay.open').length > 0;
      if (!anyOpen) document.body.style.overflow = '';
    }

    function closeOnOverlay(e, id) {
      if (e.target === document.getElementById(id)) closeModal(id);
    }

    function setSellerTab(el, key) {
      document.querySelectorAll('.modal-tab').forEach(b => b.classList.remove('active'));
      el.classList.add('active');
      ['docs', 'shop', 'products'].forEach(k => {
        document.getElementById('tab-' + k).style.display = k === key ? '' : 'none';
      });
    }

    document.querySelectorAll('.img-thumb').forEach(t => {
      t.addEventListener('click', function() {
        document.querySelectorAll('.img-thumb').forEach(x => x.classList.remove('active'));
        this.classList.add('active');
      });
    });
  </script>
</body>

</html>