<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="display-4 fw-bold mb-4">Koleksi Sepatu Terbaik</h1>
                <p class="lead mb-4">Temukan sepatu impian Anda dari brand-brand ternama dengan kualitas terjamin dan harga terjangkau.</p>
                <a href="<?= base_url('products') ?>" class="btn btn-light btn-lg">Lihat Koleksi</a>
            </div>
            <div class="col-md-6">
                <!-- Image removed -->
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-4 text-center mb-4">
                <i class="fas fa-shipping-fast fa-3x text-primary mb-3"></i>
                <h4>Pengiriman Cepat</h4>
                <p>Pengiriman ke seluruh Indonesia dengan jaminan keamanan produk.</p>
            </div>
            <div class="col-md-4 text-center mb-4">
                <i class="fas fa-medal fa-3x text-primary mb-3"></i>
                <h4>Kualitas Terjamin</h4>
                <p>Semua produk original dengan garansi resmi dari distributor.</p>
            </div>
            <div class="col-md-4 text-center mb-4">
                <i class="fas fa-headset fa-3x text-primary mb-3"></i>
                <h4>Customer Service 24/7</h4>
                <p>Tim support siap membantu Anda kapan saja dengan respon cepat.</p>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-5">Produk Unggulan</h2>
        <div class="row">
            <?php if (!empty($products)): ?>
                <?php foreach ($products as $product): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card product-card h-100">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title"><?= esc($product['name']) ?></h5>
                                <p class="card-text flex-grow-1"><?= esc(substr($product['description'], 0, 100)) ?>...</p>
                                <div class="mt-auto">
                                    <h6 class="text-primary">Rp <?= number_format($product['price'], 0, ',', '.') ?></h6>
                                    <a href="#" class="btn btn-primary">Lihat Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center">
                    <p>Belum ada produk yang ditampilkan.</p>
                </div>
            <?php endif; ?>
        </div>
        <div class="text-center mt-4">
            <a href="<?= base_url('products') ?>" class="btn btn-outline-primary">Lihat Semua Produk</a>
        </div>
    </div>
</section>
<?= $this->endSection() ?>
