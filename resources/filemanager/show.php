<div class="row">
  <div class="col">

    <div class="alert alert-success" role="alert"></div>
    <div class="alert alert-danger" role="alert"></div>

    <form class="form-inline">
      <div class="form-group mx-sm-3 mb-2">
        <label for="tz">Current time zone: </label>
        <input type="text" name="value" value="<?php echo $tz->value; ?>" class="form-control">
      </div>
      <button type="submit" id="submit" class="btn btn-primary mb-2">Save</button>
    </form>
  </div>
</div>

<div class="row">
  <div class="col d-flex justify-content-between align-items-center">
    <h2>Folder: <?php echo $current_folder->name; ?></h2>
      <?php if ($current_folder->parent_slug): ?>
        <a href="/filemanager/show/<?php echo $current_folder->parent_slug; ?>" class="btn btn-secondary">
          <i class="fas fa-reply"></i> Back
        </a>
      <?php endif; ?>
  </div>
</div>

<div class="row">
  <div class="col">
    <table class="table">
      <thead>
      <tr>
        <th></th>
        <th>Name</th>
        <th>Size</th>
        <th><?php echo Config::get('file_hash_function') ?> hash</th>
        <th>Created at</th>
      </tr>
      </thead>
      <tbody>
      <?php foreach ($folders as $folder): ?>
        <tr>
          <td><i class="far fa-folder"></i></td>
          <td>
            <strong>
              <a href="/filemanager/show/<?php echo $folder->slug; ?>"><?php echo $folder->name; ?></a>
            </strong>
          </td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
      <?php endforeach; ?>
      <?php foreach ($files as $file): ?>
        <tr>
          <td><i class="far fa-file-alt"></i></td>
          <td>
            <?php if ($file->isClickable): ?>
              <a href="/filemanager/file/<?php echo $current_folder->slug; ?>/<?php echo $file->slug; ?>"><?php echo $file->name; ?></a>
            <?php else: ?>
              <?php echo $file->name; ?>
            <?php endif; ?>
          </td>
          <td><?php echo $file->size; ?></td>
          <td><?php echo $file->hash; ?></td>
          <td><?php echo $file->createdAt; ?></td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
