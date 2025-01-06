<form action="/daftar-menu/update/<?= $menu['id'] ?>" method="post">
    <?= csrf_field() ?>
    <div class="form-group">
        <label for="name">Nama Menu</label>
        <input type="text" name="name" id="name" value="<?= $menu['name'] ?>" class="form-control">
    </div>
    <div class="form-group">
        <label for="price">Harga</label>
        <input type="text" name="price" id="price" value="<?= $menu['price'] ?>" class="form-control">
    </div>
    <button type="submit" class="btn btn-success mt-3">Update</button>
</form>
