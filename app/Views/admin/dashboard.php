<?= $this->extend('admin/layout/main') ?>

<?= $this->section('content') ?>
<div class="container-fluid py-4">
    <h1 class="h3 mb-4">Dashboard Admin</h1>
    
    <div class="row">
        <div class="col-md-3 mb-4">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4><?= $total_products ?></h4>
                            <p class="mb-0">Total Produk</p>
                        </div>
                        <div class="align-self-center">
                            <i class="fas fa-box fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-3 mb-4">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4><?= $total_articles ?></h4>
                            <p class="mb-0">Total Artikel</p>
                        </div>
                        <div class="align-self-center">
                            <i class="fas fa-newspaper fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-3 mb-4">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4><?= count($recent_contacts) ?></h4>
                            <p class="mb-0">Pesan Baru</p>
                        </div>
                        <div class="align-self-center">
                            <i class="fas fa-envelope fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Pesan Terbaru</h5>
                </div>
                <div class="card-body">
                    <?php if (!empty($recent_contacts)): ?>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Subjek</th>
                                        <th>Tanggal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($recent_contacts as $contact): ?>
                                    <tr>
                                        <td><?= esc($contact->name) ?></td>
                                        <td><?= esc($contact->email) ?></td>
                                        <td><?= esc($contact->subject) ?></td>
                                        <td><?= date('d/m/Y H:i', strtotime($contact->created_at)) ?></td>
                                        <td>
                                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#messageModal<?= $contact->id ?>">
                                                Lihat
                                            </button>
                                        </td>
                                    </tr>
                                    
                                    <!-- Modal untuk melihat pesan -->
                                    <div class="modal fade" id="messageModal<?= $contact->id ?>" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Pesan dari <?= esc($contact->name) ?></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p><strong>Email:</strong> <?= esc($contact->email) ?></p>
                                                    <p><strong>Subjek:</strong> <?= esc($contact->subject) ?></p>
                                                    <p><strong>Pesan:</strong></p>
                                                    <p><?= nl2br(esc($contact->message)) ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else: ?>
                        <p>Belum ada pesan masuk.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>