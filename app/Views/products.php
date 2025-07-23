// app/Views/products.php
<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div class="container py-5">
    <h1 class="text-center mb-5">Koleksi Produk Kami</h1>
    
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
                        <small class="text-muted">Stok: <?= esc($product['stock']) ?></small><br>
                        <a href="#" class="btn btn-primary mt-2">Lihat Detail</a>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="col-12 text-center">
            <p>Tidak ada produk yang ditampilkan.</p>
        </div>
    <?php endif; ?>
</div>
    
    <?php if (isset($pager)): ?>
        <div class="d-flex justify-content-center mt-4">
            <?= $pager->links() ?>
        </div>
    <?php endif; ?>
</div>
<?= $this->endSection() ?>