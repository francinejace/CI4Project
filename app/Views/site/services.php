<?= view('templates/header', ['title' => 'Services']) ?>

<h2 class="mb-4">Services Offered</h2>
<div class="row g-3">
  <div class="col-md-4">
    <div class="card h-100"><div class="card-body">
      <h5>Preventive Maintenance</h5>
      <p class="text-muted">Oil change, filters, multi-point inspection, and calibration.</p>
    </div></div>
  </div>
  <div class="col-md-4">
    <div class="card h-100"><div class="card-body">
      <h5>Repair & Diagnostics</h5>
      <p class="text-muted">ECU scans, drivetrain, suspension, and electrical systems.</p>
    </div></div>
  </div>
  <div class="col-md-4">
    <div class="card h-100"><div class="card-body">
      <h5>Financing Assistance</h5>
      <p class="text-muted">Partner banks, trade‑in appraisal, and insurance support.</p>
    </div></div>
  </div>
</div>

<?= view('templates/footer') ?>
