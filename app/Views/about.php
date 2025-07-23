<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div class="container py-5">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <h1 class="text-center mb-5">Tentang ShoesStore</h1>
            
            <div class="row mb-5">
                <div class="col-md-6">
                    <!-- Image removed -->
                </div>
                <div class="col-md-6">
                    <h3>Sejarah Kami</h3>
                    <p>ShoesStore didirikan pada tahun 2020 dengan visi menjadi toko sepatu terpercaya di Indonesia.</p>
                    <p>Dengan pengalaman lebih dari 5 tahun di industri fashion footwear, kami memahami kebutuhan pelanggan akan sepatu berkualitas dengan harga yang kompetitif.</p>
                </div>
            </div>

            <div class="row mb-5">
                <div class="col-md-6 order-md-2">
                </div>
                <div class="col-md-6 order-md-1">
                    <h3>Misi Kami</h3>
                    <ul>
                        <li>Menyediakan koleksi sepatu terlengkap dari brand ternama</li>
                        <li>Memberikan pelayanan terbaik kepada setiap pelanggan</li>
                        <li>Menjamin kualitas dan keaslian setiap produk yang dijual</li>
                        <li>Menghadirkan pengalaman berbelanja yang menyenangkan</li>
                    </ul>
                </div>
            </div>

            <div class="text-center">
                <h3>Mengapa Memilih Kami?</h3>
                <div class="row mt-4">
                    <div class="col-md-3 mb-3">
                        <div class="card h-100 text-center">
                            <div class="card-body">
                                <i class="fas fa-certificate fa-2x text-primary mb-3"></i>
                                <h5>100% Original</h5>
                                <p>Semua produk dijamin original</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card h-100 text-center">
                            <div class="card-body">
                                <i class="fas fa-exchange-alt fa-2x text-primary mb-3"></i>
                                <h5>Easy Return</h5>
                                <p>Kebijakan return 7 hari</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card h-100 text-center">
                            <div class="card-body">
                                <i class="fas fa-truck fa-2x text-primary mb-3"></i>
                                <h5>Free Shipping</h5>
                                <p>Gratis ongkir min. pembelian 500rb</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card h-100 text-center">
                            <div class="card-body">
                                <i class="fas fa-star fa-2x text-primary mb-3"></i>
                                <h5>Best Quality</h5>
                                <p>Kualitas terbaik dengan harga terjangkau</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>