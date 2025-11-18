<?= view('templates/header', ['title' => 'Careers']) ?>

<h2 class="mb-4">Open Positions</h2>
<div class="table-responsive">
  <table class="table table-striped">
    <thead><tr><th>Role</th><th>Department</th><th>Location</th><th>Status</th></tr></thead>
    <tbody>
      <tr><td>Sales Executive</td><td>Sales</td><td>Quezon City</td><td><span class="badge bg-success">Open</span></td></tr>
      <tr><td>Service Advisor</td><td>After‑Sales</td><td>Makati</td><td><span class="badge bg-success">Open</span></td></tr>
      <tr><td>Technician</td><td>Workshop</td><td>Pasig</td><td><span class="badge bg-warning text-dark">Screening</span></td></tr>
    </tbody>
  </table>
</div>
<p class="mt-3">Send your CV to <a href="mailto:careers@example.com">careers@example.com</a> or apply in‑store.</p>

<?= view('templates/footer') ?>
