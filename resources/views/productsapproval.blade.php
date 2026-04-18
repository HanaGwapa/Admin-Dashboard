<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Panel – Product Approvals</title>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600;700&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

  <link rel="stylesheet" href="{{ asset('assets/approval.css') }}">
  <style>
  </style>
</head>

<body>

  <!-- ══════════════ SIDEBAR ══════════════ -->
  <aside class="sidebar">
    <div class="sidebar-brand">
      <div class="logo-icon"><i class="fa-solid fa-store"></i></div>
      <span>Admin Panel</span>
    </div>

    <nav class="sidebar-nav">
      <a class="nav-item" href="{{ route('admin') }}"><i class="fa-solid fa-gauge-high"></i> Dashboard</a>
      <a class="nav-item active" href="{{ route('productsapproval') }}"><i class="fa-solid fa-box-open"></i> Product Approvals <span class="nav-badge">12</span></a>
      <a class="nav-item" href="{{ route('admin.sellers') }}"><i class="fa-solid fa-user-check"></i> Seller Verification</a>
      <a class="nav-item" href="{{ route('orders') }}"><i class="fa-solid fa-file-lines"></i> Orders</a>
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
      <div class="topbar-title">Product Approvals</div>
      <div class="topbar-right">
        <div class="btn-icon"><i class="fa-solid fa-bell"></i></div>
        <div class="admin-pill">
          <div class="avatar">IM</div>
          imemeru
          <i class="fa-solid fa-chevron-down" style="font-size:10px;color:var(--muted)"></i>
        </div>
      </div>
    </div>

    <!-- Content -->
    <div class="content">

      <!-- Header row -->
      <div class="section-header">
        <div class="section-title">Pending Products</div>
        <div class="search-wrap">
          <i class="fa-solid fa-magnifying-glass"></i>
          <input class="search-input" type="text" placeholder="Search products…" />
        </div>
      </div>

      <!-- Tabs -->
      <div class="tabs">
        <button class="tab-btn active" onclick="setTab(this,'all')">All</button>
        <button class="tab-btn" onclick="setTab(this,'jewelry')"><i class="fa-solid fa-gem"></i> Jewelry</button>
        <button class="tab-btn" onclick="setTab(this,'toys')"><i class="fa-solid fa-puzzle-piece"></i> Toys</button>
        <button class="tab-btn" onclick="setTab(this,'decor')"><i class="fa-solid fa-couch"></i> Home Decor</button>
      </div>

      <p class="pending-count"><b>12</b> Pending Products</p>

      <!-- Table -->
      <div class="table-card">
        <table>
          <thead>
            <tr>
              <th></th>
              <th>Product</th>
              <th>Seller</th>
              <th>Price</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>

            <!-- Row 1 -->
            <tr>
              <td></td>
              <td>
                <div class="product-cell">
                  <div class="product-img emoji-img">💎</div>
                  <div>
                    <div class="product-name">Handcrafted Clay Earrings</div>
                    <div class="product-meta">👤 crafty_jenny &nbsp;·&nbsp; Category: <span>Jewelry</span></div>
                  </div>
                </div>
              </td>
              <td class="seller-name">crafty_jenny</td>
              <td class="price">$15.00</td>
              <td>
                <div class="actions-cell">
                  <button class="btn btn-approve" data-id="1"><i class="fa-solid fa-check"></i> Approve</button>
                  <button class="btn btn-reject" data-id="1"><i class="fa-solid fa-xmark"></i> Reject</button>
                  <button class="btn btn-view" data-id="1"><i class="fa-solid fa-eye"></i> View Details</button>
                </div>
              </td>
            </tr>

            <!-- Row 2 -->
            <tr>
              <td></td>
              <td>
                <div class="product-cell">
                  <div class="product-img emoji-img">🧸</div>
                  <div>
                    <div class="product-name">Knitted Mini Plush Bear</div>
                    <div class="product-meta">👤 artisan_alex &nbsp;·&nbsp; Category: <span>Toys</span></div>
                  </div>
                </div>
              </td>
              <td class="seller-name">artisan_alex</td>
              <td class="price">$20.00</td>
              <td>
                <div class="actions-cell">
                  <button class="btn btn-approve" data-id="2"><i class="fa-solid fa-check"></i> Approve</button>
                  <button class="btn btn-reject" data-id="2"><i class="fa-solid fa-xmark"></i> Reject</button>
                  <button class="btn btn-view" data-id="2"><i class="fa-solid fa-eye"></i> View Details</button>
                </div>
              </td>
            </tr>

            <!-- Row 3 -->
            <tr>
              <td></td>
              <td>
                <div class="product-cell">
                  <div class="product-img emoji-img">🪢</div>
                  <div>
                    <div class="product-name">Boho Macrame Wall Hanging</div>
                    <div class="product-meta">👤 macrame_mia &nbsp;·&nbsp; Category: <span>Home Decor</span></div>
                  </div>
                </div>
              </td>
              <td class="seller-name">macrame_mia</td>
              <td class="price">$30.00</td>
              <td>
                <div class="actions-cell">
                  <button class="btn btn-approve" data-id="3"><i class="fa-solid fa-check"></i> Approve</button>
                  <button class="btn btn-reject" data-id="3"><i class="fa-solid fa-xmark"></i> Reject</button>
                  <button class="btn btn-view" data-id="3"><i class="fa-solid fa-eye"></i> View Details</button>
                </div>
              </td>
            </tr>

            <!-- Row 4 -->
            <tr>
              <td></td>
              <td>
                <div class="product-cell">
                  <div class="product-img emoji-img">🏺</div>
                  <div>
                    <div class="product-name">Hand-Painted Pottery Mug</div>
                    <div class="product-meta">👤 clayandcolor &nbsp;·&nbsp; Category: <span>Home Decor</span></div>
                  </div>
                </div>
              </td>
              <td class="seller-name">clayandcolor</td>
              <td class="price">$25.00</td>
              <td>
                <div class="actions-cell">
                  <button class="btn btn-approve" data-id="4"><i class="fa-solid fa-check"></i> Approve</button>
                  <button class="btn btn-reject" data-id="4"><i class="fa-solid fa-xmark"></i> Reject</button>
                  <button class="btn btn-view" data-id="4"><i class="fa-solid fa-eye"></i> View Details</button>
                </div>
              </td>
            </tr>

          </tbody>
        </table>

        <!-- Pagination -->
        <div class="pagination">
          <button class="page-btn"><i class="fa-solid fa-chevron-left" style="font-size:11px"></i></button>
          <button class="page-btn active">1</button>
          <button class="page-btn">2</button>
          <button class="page-btn">3</button>
          <button class="page-btn"><i class="fa-solid fa-chevron-right" style="font-size:11px"></i></button>
        </div>
      </div>

    </div><!-- /content -->
  </div><!-- /main -->


  <!-- ══════════════ PRODUCT DETAIL MODAL ══════════════ -->
  <div class="overlay" id="productOverlay" onclick="closeOnOverlay(event,'productOverlay')">
    <div class="modal" onclick="event.stopPropagation()">
      <div class="modal-header">
        <div class="modal-title" id="modal-product-name"></div>
        <button class="modal-close" onclick="closeModal('productOverlay')"><i class="fa-solid fa-xmark"></i></button>
      </div>
      <div class="modal-body">
        <div class="product-detail-grid">

          <!-- Left: Images -->
          <div>
            <div class="img-main emoji-img" id="modal-img-main" style="font-size:72px;"></div>
            <div class="img-thumbs" id="modal-img-thumbs"></div>

            <div class="product-details-section">
              <div class="product-details-title">Product Details</div>
              <div class="detail-row"><span class="detail-label">Category:</span><span class="detail-value" id="modal-detail-category-left"></span></div>
              <div class="detail-row"><span class="detail-label">Materials:</span><span class="detail-value" id="modal-detail-materials-left"></span></div>
              <div class="detail-row"><span class="detail-label">Dimensions:</span><span class="detail-value" id="modal-detail-dimensions-left"></span></div>
              <div class="detail-row"><span class="detail-label">Weight:</span><span class="detail-value" id="modal-detail-weight-left" style="color:var(--primary)"></span></div>
            </div>
          </div>

          <!-- Right: Info -->
          <div class="detail-right">
            <div class="detail-row"><span class="detail-label">Category:</span><span class="detail-value" id="modal-detail-category-right" style="color:var(--primary)"></span></div>
            <div class="detail-row"><span class="detail-label">Price:</span><span class="detail-price" id="modal-detail-price"></span></div>
            <div class="detail-row"><span class="detail-label">Materials:</span><span class="detail-value" id="modal-detail-materials-right"></span></div>
            <div class="detail-row"><span class="detail-label">Dimensions:</span><span class="detail-value" id="modal-detail-dimensions-right"></span></div>
            <div class="detail-row"><span class="detail-label">Weight:</span><span class="detail-value" id="modal-detail-weight-right" style="color:var(--primary)"></span></div>

            <div class="seller-box">
              <div class="seller-box-title">Seller Information</div>
              <div class="seller-info-row">
                <div class="seller-avatar" id="modal-seller-avatar"></div>
                <div>
                  <div class="seller-info-name" id="modal-seller-username"></div>
                  <div class="seller-info-sub" id="modal-seller-fullname"></div>
                </div>
              </div>
              <button class="btn btn-primary" style="width:100%;justify-content:center;" id="modal-view-seller-btn">
                <i class="fa-solid fa-user"></i> View Seller Profile
              </button>
            </div>
          </div>

        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-outline" onclick="closeModal('productOverlay')">Close</button>
        <button class="btn btn-reject" id="modal-footer-reject"><i class="fa-solid fa-xmark"></i> Reject</button>
        <button class="btn btn-approve" id="modal-footer-approve"><i class="fa-solid fa-check"></i> Approve</button>
      </div>
    </div>
  </div>


  <!-- ══════════════ SELLER PROFILE MODAL ══════════════ -->
  <div class="overlay" id="sellerOverlay" onclick="closeOnOverlay(event,'sellerOverlay')">
    <div class="modal seller-modal" onclick="event.stopPropagation()">
      <div class="modal-header">
        <div>
          <div style="font-size:13px;color:var(--muted);margin-bottom:6px;">Seller Profile: <span id="seller-modal-handle"></span></div>
          <div class="seller-profile-header">
            <div class="seller-profile-avatar" id="seller-modal-avatar"></div>
            <div>
              <div style="display:flex;align-items:center;gap:10px;">
                <div class="seller-profile-name" id="seller-modal-username"></div>
                <span class="status-badge badge-pending"><i class="fa-solid fa-clock"></i> Pending</span>
              </div>
              <div class="seller-profile-sub" id="seller-modal-fullname"></div>
            </div>
          </div>
        </div>
        <button class="modal-close" onclick="closeModal('sellerOverlay')"><i class="fa-solid fa-xmark"></i></button>
      </div>

      <div class="modal-body" style="padding-top:0">
        <!-- Seller Tabs -->
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
              <div class="doc-date" id="seller-doc-date-1"></div>
            </div>
            <div style="text-align:right">
              <div class="doc-badge"><i class="fa-solid fa-check"></i> Uploaded</div>
              <div style="font-size:11px;color:var(--muted);margin-top:4px;" id="seller-doc-date-1b"></div>
            </div>
          </div>

          <div class="doc-item">
            <div class="doc-thumb">📄</div>
            <div class="doc-info">
              <div class="doc-name">Business License / Permit</div>
              <div class="doc-date" id="seller-doc-date-2"></div>
            </div>
            <div style="text-align:right">
              <div class="doc-badge"><i class="fa-solid fa-check"></i> Uploaded</div>
              <div style="font-size:11px;color:var(--muted);margin-top:4px;" id="seller-doc-date-2b"></div>
            </div>
          </div>

          <div class="doc-item">
            <div class="doc-thumb">🏠</div>
            <div class="doc-info">
              <div class="doc-name">Proof of Address</div>
              <div class="doc-date" id="seller-doc-date-3"></div>
            </div>
            <div style="text-align:right">
              <div class="doc-badge"><i class="fa-solid fa-check"></i> Uploaded</div>
              <div style="font-size:11px;color:var(--muted);margin-top:4px;" id="seller-doc-date-3b"></div>
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
      </div>
    </div>
  </div>


  <script>
    const PRODUCTS = {
      1: {
        id: 1,
        name: 'Handcrafted Clay Earrings',
        emoji: '💎',
        thumbs: ['💎', '📿', '✨'],
        category: 'Jewelry',
        price: '$15.00',
        materials: 'Polymer clay, gold-plated brass hooks, jump rings',
        dimensions: '1.5″ length, 0.6″ width',
        weight: '8 grams',
        seller: {
          username: 'Crafty_Jenny',
          handle: 'crafty_jenny',
          fullname: 'Jenny M.',
          initials: 'CJ',
          docDate: 'Apr 22, 2024'
        }
      },
      2: {
        id: 2,
        name: 'Knitted Mini Plush Bear',
        emoji: '🧸',
        thumbs: ['🧸', '🐻', '🎀'],
        category: 'Toys',
        price: '$20.00',
        materials: 'Merino wool, polyfill stuffing, safety eyes',
        dimensions: '5″ height, 3″ width',
        weight: '120 grams',
        seller: {
          username: 'Artisan_Alex',
          handle: 'artisan_alex',
          fullname: 'Alex R.',
          initials: 'AA',
          docDate: 'Mar 10, 2024'
        }
      },
      3: {
        id: 3,
        name: 'Boho Macrame Wall Hanging',
        emoji: '🪢',
        thumbs: ['🪢', '🌿', '🤍'],
        category: 'Home Decor',
        price: '$30.00',
        materials: 'Natural cotton rope, driftwood dowel',
        dimensions: '18″ width, 36″ length',
        weight: '350 grams',
        seller: {
          username: 'Macrame_Mia',
          handle: 'macrame_mia',
          fullname: 'Mia L.',
          initials: 'MM',
          docDate: 'Feb 5, 2024'
        }
      },
      4: {
        id: 4,
        name: 'Hand-Painted Pottery Mug',
        emoji: '🏺',
        thumbs: ['🏺', '🎨', '☕'],
        category: 'Home Decor',
        price: '$25.00',
        materials: 'Stoneware clay, food-safe glazes, lead-free paint',
        dimensions: '3.5″ height, 3″ diameter',
        weight: '310 grams',
        seller: {
          username: 'ClayAndColor',
          handle: 'clayandcolor',
          fullname: 'Dana K.',
          initials: 'CC',
          docDate: 'Jan 18, 2024'
        }
      }
    };

    // Tracks the currently active product ID for the seller modal link
    let activeProductId = null;

    // ── OPEN PRODUCT MODAL ──────────────────────────────────────────────────────
    function openProductModal(id) {
      const p = PRODUCTS[id];
      if (!p) return;
      activeProductId = id;

      // Header
      document.getElementById('modal-product-name').textContent = p.name;

      // Main image
      document.getElementById('modal-img-main').textContent = p.emoji;

      // Thumbnails — rebuild dynamically
      const thumbsContainer = document.getElementById('modal-img-thumbs');
      thumbsContainer.innerHTML = '';
      p.thumbs.forEach((emoji, i) => {
        const t = document.createElement('div');
        t.className = 'img-thumb emoji-img' + (i === 0 ? ' active' : '');
        t.textContent = emoji;
        t.addEventListener('click', function() {
          document.querySelectorAll('#modal-img-thumbs .img-thumb').forEach(x => x.classList.remove('active'));
          this.classList.add('active');
          document.getElementById('modal-img-main').textContent = emoji;
        });
        thumbsContainer.appendChild(t);
      });

      // Left column details
      document.getElementById('modal-detail-category-left').textContent = p.category;
      document.getElementById('modal-detail-materials-left').textContent = p.materials;
      document.getElementById('modal-detail-dimensions-left').textContent = p.dimensions;
      document.getElementById('modal-detail-weight-left').textContent = p.weight;

      // Right column details
      document.getElementById('modal-detail-category-right').textContent = p.category;
      document.getElementById('modal-detail-price').textContent = p.price;
      document.getElementById('modal-detail-materials-right').textContent = p.materials;
      document.getElementById('modal-detail-dimensions-right').textContent = p.dimensions;
      document.getElementById('modal-detail-weight-right').textContent = p.weight;

      // Seller info inside product modal
      document.getElementById('modal-seller-avatar').textContent = p.seller.initials;
      document.getElementById('modal-seller-username').textContent = p.seller.username;
      document.getElementById('modal-seller-fullname').textContent = p.seller.fullname;

      // "View Seller Profile" button — opens seller modal with correct data
      document.getElementById('modal-view-seller-btn').onclick = function() {
        closeModal('productOverlay');
        openSellerModal(id);
      };

      // Footer approve/reject can carry the product id as data if needed
      document.getElementById('modal-footer-approve').dataset.id = id;
      document.getElementById('modal-footer-reject').dataset.id = id;

      document.getElementById('productOverlay').classList.add('open');
      document.body.style.overflow = 'hidden';
    }

    // ── OPEN SELLER MODAL ───────────────────────────────────────────────────────
    function openSellerModal(id) {
      const p = PRODUCTS[id];
      if (!p) return;
      const s = p.seller;

      document.getElementById('seller-modal-handle').textContent = s.handle;
      document.getElementById('seller-modal-avatar').textContent = s.initials;
      document.getElementById('seller-modal-username').textContent = s.username;
      document.getElementById('seller-modal-fullname').textContent = s.fullname;

      const docDateText = 'Uploaded ' + s.docDate;
      ['seller-doc-date-1', 'seller-doc-date-2', 'seller-doc-date-3'].forEach(id => {
        document.getElementById(id).textContent = docDateText;
      });
      ['seller-doc-date-1b', 'seller-doc-date-2b', 'seller-doc-date-3b'].forEach(id => {
        document.getElementById(id).textContent = docDateText;
      });

      // Reset to docs tab
      document.querySelectorAll('.modal-tab').forEach(b => b.classList.remove('active'));
      document.querySelectorAll('.modal-tab')[1].classList.add('active');
      ['docs', 'shop', 'products'].forEach(k => {
        document.getElementById('tab-' + k).style.display = k === 'docs' ? '' : 'none';
      });

      document.getElementById('sellerOverlay').classList.add('open');
      document.body.style.overflow = 'hidden';
    }

    // ── MODAL HELPERS ───────────────────────────────────────────────────────────
    function closeModal(id) {
      document.getElementById(id).classList.remove('open');
      const anyOpen = document.querySelectorAll('.overlay.open').length > 0;
      if (!anyOpen) document.body.style.overflow = '';
    }

    function closeOnOverlay(e, id) {
      if (e.target === document.getElementById(id)) closeModal(id);
    }

    // ── TAB SWITCHING (main tabs) ───────────────────────────────────────────────
    function setTab(el, key) {
      document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
      el.classList.add('active');
    }

    // ── SELLER MODAL TABS ───────────────────────────────────────────────────────
    function setSellerTab(el, key) {
      document.querySelectorAll('.modal-tab').forEach(b => b.classList.remove('active'));
      el.classList.add('active');
      ['docs', 'shop', 'products'].forEach(k => {
        document.getElementById('tab-' + k).style.display = k === key ? '' : 'none';
      });
    }

    // ── EVENT DELEGATION for table buttons ─────────────────────────────────────
    // Using event delegation on tbody so it works with dynamically rendered rows too.
    document.querySelector('tbody').addEventListener('click', function(e) {
      const btn = e.target.closest('button[data-id]');
      if (!btn) return;
      const id = parseInt(btn.dataset.id, 10);

      if (btn.classList.contains('btn-view')) {
        openProductModal(id);
      } else if (btn.classList.contains('btn-approve')) {
        // Approve logic placeholder
        alert('Approved product ID: ' + id);
      } else if (btn.classList.contains('btn-reject')) {
        // Reject logic placeholder
        alert('Rejected product ID: ' + id);
      }
    });

    // ── PAGINATION ──────────────────────────────────────────────────────────────
    document.querySelectorAll('.page-btn').forEach(btn => {
      btn.addEventListener('click', function() {
        document.querySelectorAll('.page-btn').forEach(b => b.classList.remove('active'));
        this.classList.add('active');
      });
    });
  </script>
</body>

</html>