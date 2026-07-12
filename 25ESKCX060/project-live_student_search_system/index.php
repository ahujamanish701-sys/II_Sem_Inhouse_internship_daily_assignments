<?php
// Simple front page with Bootstrap and live search UI
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Live Student Search</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS (via CDN) -->
  <link
    href="[cdn.jsdelivr.net](https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css)"
    rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
    crossorigin="anonymous">
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary mb-4">
    <div class="container">
      <a class="navbar-brand" href="#">Student Finder</a>
    </div>
  </nav>

  <div class="container">
    <div class="p-4 mb-4 search-card">
      <div class="row g-3 align-items-end">
        <div class="col-md-6">
          <label for="q" class="form-label">Search</label>
          <input type="text" id="q" class="form-control" placeholder="Type name, email, or department...">
        </div>
        <div class="col-md-3">
          <label for="department" class="form-label">Department</label>
          <select id="department" class="form-select">
            <option value="">All</option>
            <option>Computer Science</option>
            <option>Electronics</option>
            <option>Mechanical</option>
            <option>Civil</option>
            <option>Mathematics</option>
            <option>Physics</option>
            <option>Chemistry</option>
            <option>Biotechnology</option>
            <option>Economics</option>
            <option>English</option>
          </select>
        </div>
        <div class="col-md-3">
          <label for="year" class="form-label">Year</label>
          <select id="year" class="form-select">
            <option value="">Any</option>
            <option value="1">1st</option>
            <option value="2">2nd</option>
            <option value="3">3rd</option>
            <option value="4">4th</option>
          </select>
        </div>
      </div>
      <div class="d-flex justify-content-between mt-3 small-muted">
        <div id="status">Type to search...</div>
        <div>Results per page:
          <select id="limit" class="form-select d-inline-block" style="width: auto;">
            <option>5</option>
            <option selected>10</option>
            <option>20</option>
          </select>
        </div>
      </div>
    </div>

    <div id="results" class="table-responsive">
      <table class="table table-hover align-middle">
        <thead class="table-light">
          <tr>
            <th style="width: 60px;">#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Department</th>
            <th>Year</th>
            <th>Joined</th>
          </tr>
        </thead>
        <tbody id="tbody"></tbody>
      </table>
      <div id="no-results" class="alert alert-warning">No students found.</div>
    </div>

    <nav>
      <ul id="pagination" class="pagination justify-content-center"></ul>
    </nav>
  </div>

  <script>
    const qEl = document.getElementById('q');
    const deptEl = document.getElementById('department');
    const yearEl = document.getElementById('year');
    const limitEl = document.getElementById('limit');
    const statusEl = document.getElementById('status');
    const tbody = document.getElementById('tbody');
    const noResults = document.getElementById('no-results');
    const pagination = document.getElementById('pagination');

    let state = {
      q: '',
      department: '',
      year: '',
      page: 1,
      limit: 10
    };

    function debounce(fn, ms=300) {
      let t;
      return (...args) => {
        clearTimeout(t);
        t = setTimeout(() => fn(...args), ms);
      };
    }

    function updateStatus(text) {
      statusEl.textContent = text;
    }

    function renderRows(items, offset) {
      tbody.innerHTML = '';
      for (let i = 0; i < items.length; i++) {
        const s = items[i];
        const tr = document.createElement('tr');
        tr.className = 'result-row';
        tr.innerHTML = `
          <td>${offset + i + 1}</td>
          <td><strong>${escapeHtml(s.first_name)} ${escapeHtml(s.last_name)}</strong></td>
          <td>${escapeHtml(s.email)}</td>
          <td>${escapeHtml(s.department)}</td>
          <td>${s.year_level}</td>
          <td>${escapeHtml(s.created_at)}</td>
        `;
        tbody.appendChild(tr);
      }
    }

    function renderPagination(total, page, limit) {
      pagination.innerHTML = '';
      const pages = Math.max(1, Math.ceil(total / limit));

      function addItem(p, label = p, active = false, disabled = false) {
        const li = document.createElement('li');
        li.className = 'page-item' + (active ? ' active' : '') + (disabled ? ' disabled' : '');
        const a = document.createElement('a');
        a.className = 'page-link';
        a.href = '#';
        a.textContent = label;
        a.onclick = (e) => {
          e.preventDefault();
          if (!disabled) {
            state.page = p;
            fetchData();
            window.scrollTo({ top: 0, behavior: 'smooth' });
          }
        };
        li.appendChild(a);
        pagination.appendChild(li);
      }

      addItem(Math.max(1, page - 1), '«', false, page === 1);
      // Show up to 7 pages around current
      const start = Math.max(1, page - 3);
      const end = Math.min(pages, page + 3);
      for (let p = start; p <= end; p++) addItem(p, String(p), p === page);
      addItem(Math.min(pages, page + 1), '»', false, page === pages);
    }

    function escapeHtml(s) {
      return String(s).replace(/[&<>"'`=\/]/g, function (c) {
        return ({
          '&': '&amp;',
          '<': '&lt;',
          '>': '&gt;',
          '"': '&quot;',
          "'": '&#39;',
          '`': '&#96;',
          '=': '&#61;',
          '/': '&#47;'
        })[c];
      });
    }

    const fetchData = debounce(async function() {
      updateStatus('Searching...');
      const params = new URLSearchParams({
        q: state.q,
        department: state.department,
        year: state.year,
        page: state.page,
        limit: state.limit
      });
      try {
        const res = await fetch('api_search.php?' + params.toString(), {
          headers: { 'Accept': 'application/json' }
        });
        if (!res.ok) throw new Error('HTTP ' + res.status);
        const data = await res.json();

        const items = data.items || [];
        renderRows(items, data.offset || 0);
        renderPagination(data.total || 0, data.page || 1, data.limit || 10);

        noResults.style.display = items.length ? 'none' : 'block';
        updateStatus(`Showing ${items.length ? (data.offset + 1) : 0}-${items.length ? (data.offset + items.length) : 0} of ${data.total} result(s).`);
      } catch (e) {
        tbody.innerHTML = '';
        noResults.style.display = 'block';
        noResults.textContent = 'Error loading results.';
        updateStatus('Error.');
        console.error(e);
      }
    }, 300);

    qEl.addEventListener('input', () => {
      state.q = qEl.value;
      state.page = 1;
      fetchData();
    });
    deptEl.addEventListener('change', () => {
      state.department = deptEl.value;
      state.page = 1;
      fetchData();
    });
    yearEl.addEventListener('change', () => {
      state.year = yearEl.value;
      state.page = 1;
      fetchData();
    });
    limitEl.addEventListener('change', () => {
      state.limit = parseInt(limitEl.value, 10) || 10;
      state.page = 1;
      fetchData();
    });

    // Initial load
    fetchData();
  </script>
</body>
</html>

