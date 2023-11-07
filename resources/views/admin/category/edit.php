<?php $title = 'Category | Edit' ?>
<?php require 'resources/views/admin/layouts/head.php'; ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Category /</span> Edit</h4>
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <?php if (isset($category)): ?>
                    <div class="card-header d-flex justify-content-end">
                        <a href="/admin/category" class="btn btn-warning text-white ms-2">Cancel</a>
                        <button onclick="document.getElementById('form-edit').submit();" type="submit"
                                class="btn btn-primary ms-2">Save
                        </button>

                    </div>
                    <div class="card-body">

                        <form action="/admin/category/update/<?= $category->getId() ?>" method="post" id="form-edit">
                            <div class="mb-3">
                                <label class="form-label" for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Laptop.."
                                       value="<?= $category->getName() ?? null ?>">
                            </div>
                        </form>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</div>
<?php require 'resources/views/admin/layouts/foot.php'; ?>
