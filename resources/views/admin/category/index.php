<?php $title = 'Admin | Category' ?>
<?php $selected = 'category' ?>
<?php require 'resources/views/admin/layouts/head.php'; ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin /</span> Categories</h4>
    <div class="card">

        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="m-0">Categories</h5>
            <a href="/admin/category/create" class="btn btn-primary btn-add"><i name='plus-medical'></i> Add</a>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                <?php foreach ($categories ?? null as $category): ?>
                    <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                            <strong><?= $category->getId() ?></strong></td>
                        <td><?= $category->getName() ?></td>
                        <td><?= $category->getCreatedAt() ?></td>
                        <td><?= $category->getUpdatedAt() ?></td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="/admin/category/edit/<?= $category->getId() ?>"><i
                                                class="bx bx-edit-alt me-1"></i> Edit</a>
                                    <a class="dropdown-item" href="#"
                                       onclick="document.getElementById('from-destroy-<?= $category->getId() ?>').submit()"><i
                                                class="bx bx-trash me-1"></i>
                                        Delete</a>
                                </div>
                                <form action="/admin/category/destroy" id="from-destroy-<?= $category->getId() ?>"
                                      method="post">
                                    <input type="hidden" name="id" value="<?= $category->getId() ?>">
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="demo-inline-spacing d-flex justify-content-center navbar-detached rounded-3 bg-white mt-4">
        <!-- Basic Pagination -->
        <nav aria-label="Page navigation">
            <?php if (isset($counts)): ?>
                <?php $numPage = $counts/5; $currentPage =  $currentPage ?? null; ?>
                <ul class="pagination">
                    <li class="page-item first">
                        <a class="page-link" href="/admin/category"><i class="tf-icon bx bx-chevrons-left"></i></a>
                    </li>
                    <?php if ($currentPage > 0): ?>
                    <li class="page-item prev">
                        <a class="page-link" href="/admin/category?page=<?=$currentPage-1?>"><i class="tf-icon bx bx-chevron-left"></i></a>
                    </li>
                    <?php endif; ?>
                    <?php for ($i = 0;$i < $numPage;$i++ ) :?>

                    <li class="page-item <?= $currentPage === $i ? 'active' : ''?>">
                        <a class="page-link" href="/admin/category?page=<?=$i?>"><?=$i+1?></a>
                    </li>
                    <?php endfor; ?>
                    <?php if ($currentPage < $numPage-1): ?>
                    <li class="page-item next">
                        <a class="page-link" href="/admin/category?page=<?=$currentPage+1?>"><i class="tf-icon bx bx-chevron-right"></i></a>
                    </li>
                    <?php endif; ?>
                    <li class="page-item last">
                        <a class="page-link" href="/admin/category?page=<?=$numPage-1?>"><i class="tf-icon bx bx-chevrons-right"></i></a>
                    </li>
                </ul>
            <?php endif; ?>
        </nav>
        <!--/ Basic Pagination -->
    </div>
</div>
<?php require 'resources/views/admin/layouts/foot.php'; ?>
