<?= view('templates/header', ['title' => 'Wheels, Inc.']) ?>

<section class="py-5 text-white bg-brand">
    <div class="container py-5 hero-red">
        <div class="col-lg-8">
            <div class="d-flex align-items-center mb-3">
                  <img src="<?= esc(base_url('images/wheels-logo.png')) ?>" alt="Wheels, Inc." class="brand-logo me-2" />
              <h1 class="display-5 fw-bold m-0">Wheels, Inc.</h1>
            </div>
            <p class="lead mt-2">Drive with confidence — certified service, genuine parts, and flexible financing.</p>
            <a href="/brands" class="btn btn-light btn-lg me-2">Explore Brands</a>
            <a href="/services" class="btn btn-outline-light btn-lg">Our Services</a>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5>Certified Workshops</h5>
                        <p class="text-muted">Brand-approved tools and expert mechanics for every visit.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5>Flexible Financing</h5>
                        <p class="text-muted">Partner banks with fast approvals and transparent terms.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5>Genuine Parts</h5>
                        <p class="text-muted">Manufacturer-backed parts with warranty support and tracking.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container text-center">
        <h2 class="mb-4">Join Our Team</h2>
        <p class="text-muted mb-4">We’re hiring sales executives, service advisors, and technicians.</p>
        <a href="/careers" class="btn btn-brand btn-lg">See Open Roles</a>
    </div>
</section>

<?= view('templates/footer') ?>